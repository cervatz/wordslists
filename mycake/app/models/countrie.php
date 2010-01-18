<?php
class Countrie extends AppModel
{
	var $name = 'Countrie';

	var $hasMany = 'User';	

	//TODO: improve validation checks
		
	var $validate = array(
		'description' => VALID_NOT_EMPTY
	);
	
}

?>

