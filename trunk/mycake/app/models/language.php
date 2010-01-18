<?php
class Language extends AppModel
{
	var $name = 'Language';

	var $hasMany = array(
		'Wordslist1' => array(
			'className' => 'Wordslist',
			'foreignKey' => 'language_id1',
			),
		'Wordslist2' => array(
			'className' => 'Wordslist',
			'foreignKey' => 'language_id2',
			),
		'Mother' => array(
			'className' => 'Mother',
			'foreignKey' => 'language_id',
			),
		'Practice' => array(
			'className' => 'Practice',
			'foreignKey' => 'language_id',
			)						
		);


	//TODO: improve validation checks
			
	var $validate = array(
		'description' => VALID_NOT_EMPTY
	);


}
?>
