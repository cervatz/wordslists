<?php
class ErrorsController extends SuperController
{
	var $name = 'Errors';

	var $uses = array();
	
	function denied()
	{
		$this->log('ErrorsController denied() - entering ...',LOG_DEBUG);

		$this->pageTitle = 'Access denied';		
	}
		
}