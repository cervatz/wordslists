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
												
				$this->redirect(array('controller'=>'friends','action' => 'myfriends'));
			}
			else{
				
				$this->Session->setFlash(__('message_friends_not_created',true));
							
			}
			
		}
	}
	
	function myfriends()
	{
		$this->log('FriendsController myfriends() - entering ...',LOG_DEBUG);
		$this->pageTitle = 'My friends';

		$friends = $this->Friend->find('all',
			array(
				'conditions' => array('Friend.user_id1' => $this->Security->retrieveUserId()),
				'order' => array('Friend.status DESC', 'User2.username')
			));

		$this->set('friends', $friends);
		
	}	
		
}