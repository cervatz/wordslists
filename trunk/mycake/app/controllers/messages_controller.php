<?php
class MessagesController extends SuperController
{
	var $name = 'Messages';

	var $uses = array('Message','User');

	var $components = array('RequestHandler', 'Security', 'Session');//, 'Utility');
	
	function beforeRender()
	{
		$this->set('menu', 'messages');
	}
	
	function mymessages()
	{
		$this->log('MessagesController mymessages() - entering ...',LOG_DEBUG);
		$this->pageTitle = 'My messages';

		$messages = $this->Message->find('all',
			array(
				'conditions' => array('Message.user_id2' => $this->Security->retrieveUserId()),
				'order' => array('Message.date DESC')
			));			

		$this->set('messages', $messages);
	}
	
	function loadAndSetMessage($id = null)
	{
		
		//$this->log("id=".$id, LOG_DEBUG);

		$this->Message->id = $id;
			
		$myMessage = $this->Message->read();	
		
		//$this->log($myMessage,LOG_DEBUG);			
	
		$this->Session->write('Message', $myMessage);
	}
	
	function add($id = null)
	{
		$this->log('MessagesController add() - entering ...'.$id,LOG_DEBUG);
		
/*		if ($id==null) {
			$users = $this->User->getFriends($this->Security->retrieveUserId());
		} else {
			$users = $this->User->getUsers($this->Security->retrieveUserId(), $id);
		}*/
		
		$users = $this->User->getFriends($this->Security->retrieveUserId(), $id);
		//$this->log($users,LOG_DEBUG);

		if ($users!=null) {
			
			$this->set('users',$users);
			
			$this->pageTitle = 'New Message';
			
			$this->set('myJsFile','MessageAddForm');
			
			if (!empty($this->data)) {
				$this->data['Message']['user_id1']=$this->Security->retrieveUserId();
	
				if ($this->Message->save($this->data)) {
									
					$this->Session->setFlash(__('message_messages_created',true));
													
					$this->redirect(array('controller'=>'messages','action' => 'mymessages'));
				}
				else{
					
					$this->Session->setFlash(__('message_messages_not_created',true));
								
				}
			}			
		} else {
			$this->Session->setFlash(__('message_you_have_no_friends',true));
			$this->redirect(array('controller'=>'messages','action' => 'mymessages'));	
		}
	}
	
	function view($id = null)
	{
		$this->log('MessagesController edit() - entering ...',LOG_DEBUG);

		if($this->Security->currentUserMessage($id))
		{
			$this->loadAndSetMessage($id);
			
			//TODO testate che new non sia già a 0 sennò fa sempre update
			$this->Message->saveField('new', 0);
			
		}
		else{

			$this->Session->setFlash(__('message_messages_not_yours',true));
				
			$this->redirect(array('action' => 'mymessages'));
		}
	}
	
	function delete($id = null)
	{
		$this->log('MessagesController delete() - entering ...',LOG_DEBUG);
		
		$this->log("id=".$id, LOG_DEBUG);

		if($this->Security->currentUserMessage($id))
		{						
			$this->Message->delete($id);		
		
			$this->Session->setFlash(__('message_messages_deleted',true));
		}
		else{
			$this->Session->setFlash(__('message_messages_not_yours',true));
		}
		$this->redirect(array('action' => 'mymessages'));
	}
		
}