<?php
class UtilityComponent extends Object {

	var $uses = array('Wordslist');

	var $components = array('Session', 'Security');

	function getLanguages()
	{

		if (App::import('Model', 'Language')) {			 
			$this->Language = new Language();
		}

		$languages = $this->Language->find
			(
				'list',  
				array
					(
                     'fields' => array('id', 'description'),  
                     'order' => 'description ASC',  
                     'recursive' => -1  
				)
			);
			
			
		return $languages; 
	}
	
	function getUsers($id)
	{

		if (App::import('Model', 'User')) {			 
			$this->User = new User();
		}

		$users = $this->User->find
			(
				'all',  
				array
					('conditions' => array('User.id' => $id),  
                     'order' => 'username ASC',  
                     'recursive' => -1  
				)
			);
			
			
		return $users; 
	}	

	function getFriends()
	{

		if (App::import('Model', 'Friend')) {			 
			$this->Friend = new Friend();
		}
		
		if (App::import('Model', 'User')) {			 
			$this->User = new User();
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
			
		$users = $this->User->find
			(
				'list',  
				array
					('conditions' => array("User.id" => $myfriends),
                     'fields' => array('id', 'username', 'first_name', 'last_name'),  
                     'order' => 'username ASC',  
                     'recursive' => -1  
				)
			);			
			
		return $users; 
	}	

	function getCountries()
	{
		if (App::import('Model', 'Country')) {			 
			$this->Country = new Country();
		}
		
		$countries = $this->Country->find
		(
			'list',  
				array
				(
                     'fields' => array('id', 'description'),  
                     'order' => 'description ASC',  
                     'recursive' => -1  
				)
		);
		
		return $countries;
	}
	
	function newUser($username, $email)
	{

		if (App::import('Model', 'User')) {			 
			$this->User = new User();
		}

		$count = $this->User->find
			(
				'count',  
				array( 'OR' => array (
				'username' => $username,
				'email' => $email)
				)
			);			
			
		if ($count==0) return true;
		else return false;
	}	
}
?>
