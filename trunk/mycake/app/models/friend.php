<?php
class Friend extends AppModel
{
	var $name = 'Friend';
	
	var $hasMany = array(		
	    'Mittente' => array(
			'className' => 'Message',
			'foreignKey' => 'user_id1',
			),
		'Ricevente' => array(
			'className' => 'Message',
			'foreignKey' => 'user_id2',
			));	
	
	var $belongsTo = array(
				 'Richiedente' =>
                 array('className'    => 'User',
                     'foreignKey'   => 'user_id1'
                 ),
				 'Richiesto' =>
                 array('className'    => 'User',
                     'foreignKey'   => 'user_id2'
                 )
             );             
}
?>
