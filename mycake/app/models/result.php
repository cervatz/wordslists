<?php
class Result extends AppModel
{
	var $name = 'Result';
	
	var $belongsTo = array(
				 'Wordslist' =>
                 array('className'    => 'Wordslist',
                     'foreignKey'   => 'wordslist_id'
                 ),
				 'User' =>
                 array('className'    => 'User',
                     'foreignKey'   => 'user_id'
                 )
             );             
}
?>
