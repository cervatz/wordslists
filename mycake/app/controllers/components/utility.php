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
	
	function getUsers()
	{

		if (App::import('Model', 'User')) {			 
			$this->User = new User();
		}

		$users = $this->User->find
			(
				'list',  
				array
					(
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
	

}
?>
