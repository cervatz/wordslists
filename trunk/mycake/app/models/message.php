<?php
class Message extends AppModel
{
	var $name = 'Message';
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
