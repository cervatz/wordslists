<?php
class Country extends AppModel
{
	var $name = 'Country';

	var $hasMany = 'User';	

	//TODO: improve validation checks
		
	var $validate = array(
		'description' => VALID_NOT_EMPTY
	);
	
}

?>