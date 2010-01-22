<?php
class Friend extends AppModel
{
	var $name = 'Friend';
	
	var $hasMany = array(		
	    'Message1' => array(
			'className' => 'Message',
			'foreignKey' => 'user_id1',
			),
		'Message2' => array(
			'className' => 'Message',
			'foreignKey' => 'user_id2',
			));	
	
	var $belongsTo = array(
				 'User1' =>
                 array('className'    => 'User',
                     'foreignKey'   => 'user_id1'
                 ),
				 'User2' =>
                 array('className'    => 'User',
                     'foreignKey'   => 'user_id2'
                 )
             );             
}
?>
