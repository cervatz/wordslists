<?php
class FriendsController extends SuperController
{
	var $name = 'Friends';

	var $uses = array('Friend','User');

	var $components = array('RequestHandler', 'Security', 'Session', 'Utility');
	
	function add($id)
	{
		$this->log('FriendsController add() - entering ...',LOG_DEBUG);
		
		//$this->log('ID['.$id.']',LOG_DEBUG);
		
		if (!empty($id)) {
		
			$this->data['Friend']['user_id2']=$id;
			$this->data['Friend']['user_id1']=$this->Security->retrieveUserId();
			
			//$this->log($this->data,LOG_DEBUG);
			
			if ($this->Friend->save($this->data)) {
								
				$this->Session->setFlash(__('message_friends_created',true));
												
				$this->redirect(array('controller'=>'friends','action' => 'index'));
			}
			else{
				
				$this->Session->setFlash(__('message_friends_not_created',true));
							
			}
			
		}
	}
	
	function index()
	{
		$this->log('FriendsController index() - entering ...',LOG_DEBUG);
		$this->pageTitle = 'My friends';
		
		$this->Friend->unbindModel(array('hasMany' => array('Message1','Message2')));
		
		$friends = $this->Friend->find('all',
			array(
				'conditions' => array('Friend.user_id1' => $this->Security->retrieveUserId()),
				'order' => array('Friend.status DESC', 'User2.username')
			));		

		$requests = $this->Friend->find('all',
			array(
				'conditions' => array('Friend.user_id2' => $this->Security->retrieveUserId(),
									  'Friend.status' => 0
									 ),
				'order' => array('User2.username')
			));

		$this->set('friends', $friends);
		$this->log('RICHIESTE: '.$requests,LOG_DEBUG);
		$this->set('requests', $requests);
		
	}	
	
	function confirm($id, $friend_id)
	{
		$this->log('FriendsController add() - entering ...',LOG_DEBUG);
		
		//$this->log('ID['.$id.']',LOG_DEBUG);
		
		if (!empty($id)) {
		
			// AU - Creo la nuova relazione
			$this->data['Friend']['user_id1']=$id;
			$this->data['Friend']['user_id2']=$this->Security->retrieveUserId();
			$this->data['Friend']['status']=1;
			
			$this->log('Creo nuova relazione',LOG_DEBUG);
			$this->log($this->data,LOG_DEBUG);
			
			if ($this->Friend->save($this->data)) {
			
				// AU - Aggiorno la vecchia richiesta
				$this->data['Friend']['id']=$friend_id;
				$this->data['Friend']['user_id1']=$this->Security->retrieveUserId();
				$this->data['Friend']['user_id2']=$id;
				$this->data['Friend']['status']=1;
				
				$this->log('Aggiorno la vecchia relazione',LOG_DEBUG);
				$this->log($this->data,LOG_DEBUG);				
			
				if ($this->Friend->save($this->data)) {
					$this->Session->setFlash(__('message_friends_created',true));												
					$this->redirect(array('controller'=>'friends','action' => 'index'));				
				}			
				else{
					$this->Session->setFlash(__('message_friends_not_updated',true));
				}
								
			}
			else{
				$this->Session->setFlash(__('message_friends_not_created',true));
			}
			
		}
	}	
		
}