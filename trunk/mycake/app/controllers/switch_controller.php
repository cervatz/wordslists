<?php
class SwitchController extends AppController
{
	var $name = 'Switch';

	var $uses = array();	

	function index($id = null)		
	{				
		$this->log('SwitchController index() - entering ...',LOG_DEBUG);
		$_SESSION['Config']['language'] = $this->params['pass'][0];						
		$this->redirect(array('controller'=>'wordslists','action' => 'mylists'));
	}
	
	
	
	
}
?>
