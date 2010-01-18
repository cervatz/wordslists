<?php
class ExportController extends AppController
{
	var $name = 'Export';

	var $uses = array();	

	function index($id = null)		
	{				
		$this->log('ExportController index() - entering ...',LOG_DEBUG);						
		$this->redirect(array('controller'=>'redirect','action' => 'home'));
	}
}
?>
