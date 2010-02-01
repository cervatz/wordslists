<?php
class ResultsController extends SuperController
{
	var $name = 'Results';

	var $uses = array('Results','Wordslist');

	var $components = array('RequestHandler', 'Security', 'Session', 'Utility');
	
	function result($id=null)
	{
		$this->log('ResultsController result() - entering ...',LOG_DEBUG);
		
		$myWordslist = $this->Session->read('Wordslist');
		$myUser = $this->Session->read('User');
		
		$this->data['Results']['wordslist_id'] = $myWordslist['Wordslist']['id'];
		$this->data['Results']['user_id'] = $myUser['id'];
		$this->data['Results']['result'] = ($this->Session->read('rightAnswers')/$this->Session->read('LineNumber'))*100;
		
		
		// TODO Eliminare la scrittura nel LOG
		if ($this->Results->save($this->data)) {
			$this->log('ResultsController result() - Data saved',LOG_DEBUG);
		} else {
			$this->log('ResultsController result() - Data NOT saved',LOG_DEBUG);
		}
		
		$this->set('myJsFile','raphael');
	}	

	function myresults()
	{
		$this->log('ResultsController result() - myresults ...',LOG_DEBUG);
		
		$myUser = $this->Session->read('User');

		$sql = "SELECT DISTINCT Wordlist.id, Wordlist.name, Wordlist.description ".
		" FROM mycake.results Result, mycake.wordslists Wordlist ".
		"WHERE Result.user_id=".$myUser['id'].
		"  AND Result.wordslist_id = Wordlist.id ".
		"ORDER BY Wordlist.name ";
		
/*		$results = $this->Results->find('all', array('conditions' => array('user_id' => $myUser['id']),
				'order' => array('wordslist_id')));*/
		$wordslists = $this->Results->query($sql);
		//$this->log($wordslists,LOG_DEBUG);
		
		$i=0;
		foreach ($wordslists as $wordlist) {
			$sql = "SELECT Result.result, DATE_FORMAT(Result.date,'%d/%m/%Y') as date FROM mycake.results Result WHERE Result.wordslist_id = " . $wordlist['Wordlist']['id'] . " ORDER BY Result.date";
			$results = $this->Results->query($sql);
			$this->log($results,LOG_DEBUG);
			$myResults = '';
			foreach ($results as $result) {
				//$myResults = $myResults."[".$result["Result"]["result"].",'".$result["0"]["date"]."']";
				$myResults = $myResults."[".$result["Result"]["result"]."]";
			}
			$wordslists[$i]['Wordlist']['Results']=str_replace('][','],[',$myResults);
			$i=$i+1;
		}
		//$this->log($wordslists,LOG_DEBUG);
		
		$this->set('wordslists', $wordslists);
		
		$this->set('myJsFile','MyResults');
	}	
	
}