<?php
class Practice extends AppModel
{
	var $name = 'Practice';

	var $belongsTo = array(
				 'User' =>
                 array('className'    => 'User',
                     'foreignKey'   => 'user_id'
                 ),
				 'Language' =>
                 array('className'    => 'Language',
                     'foreignKey'   => 'language_id'
                 )                 
			);					

}
?>
