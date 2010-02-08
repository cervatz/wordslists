<?php

class User extends AppModel
{
	var $name = 'User';

	var $hasMany = array('Wordslist','Mother','Practice','Result',	
	    'Mittente' => array(
			'className' => 'Message',
			'foreignKey' => 'user_id1',
			),
		'Ricevente' => array(
			'className' => 'Message',
			'foreignKey' => 'user_id2',
			),		
	    'Richiedente' => array(
			'className' => 'Friend',
			'foreignKey' => 'user_id1',
			),
		'Richiesto' => array(
			'className' => 'Friend',
			'foreignKey' => 'user_id2',
			));
		
	var $belongsTo = array(
				 'Country' =>
                 array('className'    => 'Country',
                     'foreignKey'   => 'country_id'
                 )
			);					

	//TODO: improve validation checks
	
/*	var $validate = array(
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
	);*/

	function validateLogin($id, $username, $password)
	{		
		$this->log("validateLogin - entering ...",LOG_DEBUG);
		
		if(!empty($id)){
			$this->log("validateLogin - authentication with cookie",LOG_DEBUG);
			$user = $this->find('first', array('conditions' => array('User.id' => $id)));			
		}
		else if((!empty($username)) and (!empty($password))){
			$this->log("validateLogin - authentication with username and password",LOG_DEBUG);
			$user = $this->find(array('username' => $username, 'password' => $password));	
		}

		//pr($user);
		$this->log("validateLogin - leaving ...",LOG_DEBUG);
				
		if(empty($user) == false) return $user['User'];
		return false;
	}
	
	function getFriends($myid, $id=null)
	{
		$this->log('users_controller.getFriends entering.. ',LOG_DEBUG);
		
/*		if (App::import('Model', 'User')) {			 
			$this->User = new User();
		}	*/	
		
		// Semplificata utilizzando il metodo query
		$sql = "SELECT users.id, users.username, users.first_name, users.last_name "
  			." FROM mycake.friends friends "
     		."    , mycake.users users "
 			." WHERE friends.status = 1 "
   			." AND friends.user_id1 = " . $myid
   			." AND users.id = friends.user_id2 ";
   			
   		if ($id!=null) {
   			$sql = $sql . " AND users.id = $id ";
   		}
   			
   		//$this->log($sql,LOG_DEBUG);
   			
		$users = $this->query($sql);
		
		foreach ($users as $myarray) {
			//$this->log($myarray,LOG_DEBUG);
			$myfriends[$myarray['users']['id']] = ucfirst($myarray['users']['first_name']).' '.ucfirst($myarray['users']['last_name']);
		}		
		
		//$this->log($myfriends,LOG_DEBUG);
		
		return $myfriends;
		
	}	
	
/*	function getUsers($myid, $id)
	{

		$sql = "SELECT users.id, users.username, users.first_name, users.last_name "
  			." FROM mycake.friends friends "
     		."    , mycake.users users "
 			." WHERE friends.status = 1 "
   			." AND friends.user_id1 = " . $id
   			." AND users.id = friends.user_id2 ";		
		
		$users = $this->query($sql);
			
		foreach ($users as $myarray) {
			$myusers[$myarray['users']['id']] = ucfirst($myarray['users']['first_name']).' '.ucfirst($myarray['users']['last_name']);
		}		
			
		return $myusers; 
	}	*/
}

?>
