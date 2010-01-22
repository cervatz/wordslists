<?php
class UsersController extends SuperController
{
	var $name = "Users";
	
	var $components = array('Security','Utility');

	var $uses = array('User','Mother','Practice');
	
	function beforeFilter()
	{
		$this->__validateLoginStatus();
	}

	function index()
	{
		$this->log('UsersController index() - entering ...',LOG_DEBUG);
		
		$this->pageTitle = 'Users index';
		
		$users=$this->User->findAll();
		
		$this->set('users', $this->User->findAll());
	}
	
	function view($id = null)
	{
		//TODO: make the user's view page in a nice way
		$this->log('UsersController view() - entering ...',LOG_DEBUG);
		
		$this->log('id=' . $id, LOG_DEBUG);
		
		$this->pageTitle = 'User\'s detail page';
		
		$this->User->id = $id;
		
		$this->set('user', $this->User->find('first', array('conditions' => array('User.id' => $id))));
	}

	function edit($id = null)
	{
		$this->log('UsersController edit() - entering ...',LOG_DEBUG);
		
		$this->log('id=' . $id, LOG_DEBUG);
		
		$this->pageTitle = 'User\'s detail page';
		
		$this->User->id = $id;
		
		$this->set('countries', $this->Session->read('Countries'));
		
		$this->set('languages', $this->Session->read('Languages'));
		
		if (!empty($this->data))
		{
			if ($this->User->save($this->data))
			{						
				
				//TODO here insert the mother languages and the practice languages. If the record are there already they cannot be inserted againg
				// a possible approach would be to delete all of them in the beginning and insert all of them from scratch
				
				
				$this->Session->setFlash(__('message_user_modified',true));
				
				$this->redirect(array('action' => 'index'));
			}
		}
		else{
			$myUser=$this->User->find('first', array('conditions' => array('User.id' => $id)));
			
			$this->set('user', $myUser);	
		}
	}	
	
	function add()
	{
		$this->log('UsersController add() - entering ...',LOG_DEBUG);
		
		$this->pageTitle = 'Users add';
		
		$this->set('countries', $this->Session->read('Countries'));	
		
		$this->set('languages', $this->Session->read('Languages'));
		
		$this->log('UsersController add() - 1',LOG_DEBUG);
						
		if (!empty($this->data))
		{		
			$this->log('UsersController add() - 2',LOG_DEBUG);
			
			$this->User->create();
			
			$this->log('UsersController add() - 3',LOG_DEBUG);
			
			// TODO perform all the checks

			
			
			
			if ($this->User->save($this->data))
			{
				$this->log('UsersController add() - 4',LOG_DEBUG);
				
				$newUser=$this->User->read();
								
				//TODO pay attention not to insert duplicates, otherwise there will be a key constraint error
				
				// insert the mother languages
				$arr = array(0, 1, 2, 3, 4);
				
				foreach ($arr as &$value) {
					
					$this->log('mother_language_id' . $value . '=' . $this->data['User']['mother_language_id' . $value],LOG_DEBUG);
					
					if(!empty($this->data['User']['mother_language_id' . $value])){
					
						$myarray = array('Mother' => array('user_id' => $newUser['User']['id'], 'language_id' => $this->data['User']['mother_language_id' . $value]));
					
						$this->Mother->create();
						
						$this->Mother->save($myarray);
					}
					
				}

				// insert the practice languages
				$arr = array(0, 1, 2, 3, 4);
				
				foreach ($arr as &$value) {
					
					$this->log('practice_language_id' . $value . '=' . $this->data['User']['practice_language_id' . $value],LOG_DEBUG);
					
					if(!empty($this->data['User']['practice_language_id' . $value])){
						$myarray = array('Practice' => array('user_id' => $newUser['User']['id'], 'language_id' => $this->data['User']['practice_language_id' . $value]));
					
						$this->Practice->create();
						$this->Practice->save($myarray);
					}
					
				}
				
				
				$this->log('UsersController add() - 5',LOG_DEBUG);		
		
				$this->Session->setFlash(__('message_user_saved',true));
								
				$this->redirect(array('action' => 'index'));
			}
		}
		
		pr($this->data);
	}
	
	function create()
	{
		$this->log('UsersController create() - entering ...',LOG_DEBUG);
		
		$this->pageTitle = 'Create user';
		
		$this->set('myJsFile','UserAddForm');

		if (!empty($this->data))
		{
			if ($this->User->save($this->data))
			{
				$this->Session->setFlash(__('message_user_saved',true));
				
				$this->redirect(array('action' => 'index'));
			}
		}
	}
	
	function delete($id)
	{
		$this->log('UsersController delete()',LOG_DEBUG);
		
		$this->User->del($id);		
		
		$this->Session->setFlash(__('message_user_deleted',true));
		
		$this->redirect(array('action' => 'index'));
	}
	

	function login()
	{
		$this->log('UsersController login() - entering ...',LOG_DEBUG);
		
		$this->pageTitle = 'Login';
		
		$this->layout = 'login';

		if(empty($this->data) == false)
		{		
			$user = $this->User->validateLogin($this->data['User']);
			
			if($user!=null)
			{
				$this->Session->write('User', $user);
				
				$this->Session->setFlash(__('message_successfully_logged_in',true));
				
				$this->Session->write('Countries', $this->Utility->getCountries());
				
				$this->Session->write('Languages', $this->Utility->getLanguages());			
				
				$this->redirect(array('controller'=>'wordslists','action' => 'mylists'));
			}
			else
			{
				$this->Session->setFlash(__('message_problems_logged_in',true));

				$this->redirect(array('action' => 'login'));
			}
		}
	}

	function logout()
	{
		$this->log('UsersController logout() - entering ...',LOG_DEBUG);
		
		$this->Session->destroy('user');
				
		$this->Session->setFlash(__('message_successfully_logged_out',true));
		
		$this->redirect(array('action' => 'login'));
	}

	function __validateLoginStatus()
	{
		$this->log('UsersController __validateLoginStatus() - entering ...',LOG_DEBUG);
		
		if($this->action != 'login' && $this->action != 'logout')
		{
			if($this->Session->check('User') == false)
			{
				$this->redirect(array('action' => 'login'));
				
				$this->Session->setFlash(__('message_you_must_log_in',true));
			}
		}
	}	
	
	function search()
	{
		$this->log('UsersController search() - entering ...',LOG_DEBUG);

		$this->pageTitle = 'Search users';
		
		if (!empty($this->data['User']['searchField'])) {
		
			$this->log($this->data,LOG_DEBUG);
			
			if (App::import('Model', 'Friend')) {			 
				$this->Friend = new Friend();
			}			
			
			$friends = $this->Friend->find('all',
				array(
						'conditions' => array('Friend.user_id1' => $this->Security->retrieveUserId())
				));		
		
			//$this->log($friends,LOG_DEBUG);
			
			// TODO - AU - Questa non è il massimo come soluzione, ma al momento non sapevo come inserire
			// TODO - AU - una condizione NOT IN nell'SQL.. ci ho anche provato ma non ne sono venuto fuori
			// TODO - AU - Creo un array con gli user_id degli utenti già associati all'utente in sessione
			// TODO - AU - e inserisco una clausola NOT nell'SQL più in basso
			foreach ($friends as $myarray) {
				$myfriends[] = $myarray['Friend']['user_id2'];
			}
			
			//$this->log($myfriends,LOG_DEBUG);
		
			$users = $this->User->find('all',
				array(
						'conditions' => array(
										'OR' => array(
												array('User.first_name LIKE' => '%'.$this->data['User']['searchField'].'%'),
												array('User.last_name LIKE' => '%'.$this->data['User']['searchField'].'%'),
												array('User.email LIKE' => '%'.$this->data['User']['searchField'].'%')
												),
										'AND' => array(
												array('User.public' => 1)
												),
										"NOT" => array("User.id " => $myfriends)
										),
						'order' => array('User.first_name')
				));

			$this->set('users', $users);		
		
		}		
	}	
	
}
?>
