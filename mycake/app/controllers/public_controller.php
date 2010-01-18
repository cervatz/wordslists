<?php

class PublicController extends AppController
{
	var $name = 'Public';

	var $uses = array('User');

	function createUser()
	{
		$this->log('PublicController createUser() - entering ...',LOG_DEBUG);
		
		$this->pageTitle = 'Admin index';
		
		if (!empty($this->data)) {
			
			if ($this->User->save($this->data)) {
				
				$user = $this->User->validateLogin($this->data['User']);
				
				$this->Session->write('User', $user);			

				$this->Session->setFlash(__('message_account_created',true));
				
				$this->redirect(array('controller'=>'redirect','action' => 'home'));
			}
		}
	}


}

?>
