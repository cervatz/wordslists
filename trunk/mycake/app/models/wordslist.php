<?php
class Wordslist extends AppModel
{
	var $name = 'Wordslist';
	
	var $hasMany = array('Result',
		'Line' => array(
		'className' => 'Line',
		'foreignKey' => 'wordslist_id',
	     'order' => 'Line.id DESC',
		'dependent'=> false
	));
	
	var $belongsTo = array(
				 'User' =>
                 array('className'    => 'Language',
                     'foreignKey'   => 'user_id'
                 ),
				 'Language1' =>
                 array('className'    => 'Language',
                     'foreignKey'   => 'language_id1'
                 ),
                 'Language2' =>
                 array('className'    => 'Language',
                     'foreignKey'   => 'language_id2'
                 )
                 
             );
 /*            
	//TODO: improve validation checks
	             
	var $validate = array(
		'name' => VALID_NOT_EMPTY,
		'description' => VALID_NOT_EMPTY,
		'language_id1' => VALID_NOT_EMPTY,
		'language_id2' => VALID_NOT_EMPTY
	);*/
}
?>
