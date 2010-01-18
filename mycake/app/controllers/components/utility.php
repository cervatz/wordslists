<?php
class UtilityComponent extends Object {

	var $uses = array('Wordslist');

	var $components = array('Session');

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
	

}
?>
