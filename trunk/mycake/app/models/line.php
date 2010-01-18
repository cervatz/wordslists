<?php

class Line extends AppModel
{
	var $name = 'Line';

	var $belongsTo = array(
		'Wordslist' =>
			array('className'    => 'Wordslist',
                  'foreignKey'   => 'wordslist_id'
                 )                 
             );
             
	//TODO: improve validation checks
		
	var $validate = array(
		'string1' => VALID_NOT_EMPTY,
		'string2' => VALID_NOT_EMPTY
	);


}

?>
