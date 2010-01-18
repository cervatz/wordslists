<?php
class SecurityComponent extends Object {

	var $components = array('Session');

	function retrieveUserId() {
		
		$this->log('SecurityComponent retrieveUserId()=' . $this->Session->read('User.id'),LOG_DEBUG);
		
		return $this->Session->read('User.id');
	}

		
	function currentUserOwnsList($wordslist_id){
		
		$this->log('WordslistsController currentUserOwnsList() - entering ...',LOG_DEBUG);
		
		if (App::import('Model', 'Wordslist')) {			 
			$this->Wordslist = new Wordslist();
		}		

		$this->log("wordslist_id=" . $wordslist_id, LOG_DEBUG);

		$count = $this->Wordslist->find('count', array('conditions' => array('Wordslist.id' => $wordslist_id,'Wordslist.user_id' => $this->Session->read('User.id'))));

		if ($count==1) return true;
		else return false;
	}


}
?>
