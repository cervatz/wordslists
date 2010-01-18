<?php
class LanguagesController extends SuperController
{
	var $name = 'Languages';

	function index()
	{
		$this->log('LanguagesController index() - entering ...',LOG_DEBUG);
		$this->pageTitle = 'Languages index';
		
		$languages = $this->Language->findAll();
		
		$this->set('languages', $languages);
	}

}
?>
