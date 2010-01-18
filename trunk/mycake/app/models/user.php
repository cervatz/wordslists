<?php

class User extends AppModel
{
	var $name = 'User';

	var $hasMany = array('Wordslist','Mother','Practice');
		
	var $belongsTo = array(
				 'Country' =>
                 array('className'    => 'Country',
                     'foreignKey'   => 'country_id'
                 )
			);					

	//TODO: improve validation checks
	
	var $validate = array(
		'username'=>array(
    		'alphaNumeric'=>array(
        		'rule'=>'alphaNumeric',
        		'required'=>true,
        		'message'=>'The username cannot contain any symbols'
    		),
   			'maxLength'=>array(
				'rule'=>array('maxLength',80),
        		'message'=>'The username must not exceed 80 characters'
			),
   			'minLength'=>array(
				'rule'=>array('minLength',5),
        		'message'=>'The username must be at least 5 characters long'
			)			
    	),
    	
		'password' => VALID_NOT_EMPTY,
		'first_name' => VALID_NOT_EMPTY,
		'last_name' => VALID_NOT_EMPTY,
		'email' => array(
			'rule' => array('email', true),
			'message' => 'Please supply a valid email address.'
		),
		'country_id' => VALID_NOT_EMPTY
	);

	function validateLogin($data)
	{		
		$this->log("validateLogin - before",LOG_DEBUG);
		$user = $this->find(array('username' => $data['username'], 'password' => $data['password']));

		//pr($user);
		
		if(empty($user) == false) return $user['User'];
		return false;
	}
}

?>
