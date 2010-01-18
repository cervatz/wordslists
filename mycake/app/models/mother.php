<?php
class Mother extends AppModel
{
	var $name = 'Mother';

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
