<?php
class Message extends AppModel
{
	var $name = 'Message';
	var $belongsTo = array(
				 'Mittente' =>
                 array('className'    => 'User',
                     'foreignKey'   => 'user_id1'
                 ),
				 'Ricevente' =>
                 array('className'    => 'User',
                     'foreignKey'   => 'user_id2'
                 )
             );             
}
?>