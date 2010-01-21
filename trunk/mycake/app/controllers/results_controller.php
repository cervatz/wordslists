<?php
class ResultsController extends SuperController
{
	var $name = 'Results';

	var $uses = array('Results','Wordslist');

	var $components = array('RequestHandler', 'Security', 'Session', 'Utility');
	
	function result($id=null)
	{
		$this->log('ResultsController result() - entering ...',LOG_DEBUG);
		
		$myWordslist = $this->Session->read('Wordslist');
		$myUser = $this->Session->read('User');
		
		$this->data['Results']['wordslist_id'] = $myWordslist['Wordslist']['id'];
		$this->data['Results']['user_id'] = $myUser['id'];
		$this->data['Results']['result'] = ($this->Session->read('rightAnswers')/$this->Session->read('LineNumber'))*100;
		
		
		// TODO Eliminare la scrittura nel LOG
		if ($this->Results->save($this->data)) {
			$this->log('ResultsController result() - Data saved',LOG_DEBUG);
		} else {
			$this->log('ResultsController result() - Data NOT saved',LOG_DEBUG);
		}
		
		$this->set('myJsFile','raphael');
	}	
	
}