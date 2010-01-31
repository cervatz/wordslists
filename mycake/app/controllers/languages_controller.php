<?php
class LanguagesController extends SuperController
{
	var $name = 'Languages';

	function index()
	{
		$this->log('LanguagesController index() - entering ...',LOG_DEBUG);
		$this->pageTitle = 'Languages index';
		
		$this->Language->unbindModel(array('hasMany' => array('Mother','Practice')));	
		
		$languages = $this->Language->findAll();
		
		$this->set('languages', $languages);
	}

}
?>
