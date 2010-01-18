<?php
class RedirectController extends AppController
{
	var $name = 'Redirect';

	var $uses = array();	

	function home($id = null)		
	{				
		$this->log('RedirectController home() - entering ...',LOG_DEBUG);						
		$this->redirect(array('controller'=>'wordslists','action' => 'mylists'));
	}
}
?>
