<?php

Class AjaxController extends AppController {
	
	var $name = 'Ajax';
	
	var $components = array('RequestHandler','Session');

	var $uses = array('Line','Wordslist');

	function index(){
		
		$this->log('AjaxController index() - entering ...',LOG_DEBUG);
		
		$this->set('data1', 'content data1 before');
		
		$this->pageTitle = 'Ajax index';
		
		$this->layout = 'ajax';
				
		$this->render('index');
	}
	
	function checkLine()
	{
		$this->log('AjaxController checkLine() - entering ...',LOG_DEBUG);

		$myWordslist = $this->Session->read('Wordslist');
		
		$this->log('count='.count($myWordslist['Line']),LOG_DEBUG);
				
		if(empty($this->data) == false)
		{
						
			foreach ($myWordslist['Line'] as $i => $value) {
    			if($myWordslist['Line'][$i]['id'] == $this->data['Line']['id'])
    			{
    				$this->log($myWordslist['Line'][$i]['string1'],LOG_DEBUG);
    				if($this->data['Line']['string2'] == $myWordslist['Line'][$i]['string2'])
    				{
    					// AU - Verifico se l'utente ha indovinato al primo colpo la risposta corretta
    					if ($myWordslist['Line'][$i]['check']==0) {
    						// AU - salvo in sessione il numero di risposte corrette date al primo colpo
    						$rightAnswers = $this->Session->read('rightAnswers');
    						$rightAnswers = $rightAnswers +1;
    						$this->Session->write('rightAnswers', $rightAnswers);
    						$this->log('Risposte corrette: '.$rightAnswers,LOG_DEBUG);
    					}
    				
						unset($myWordslist['Line'][$i]);
						
						//TODO: at the moment when the list is finished I redirect to mylists, but I should have a page with the results and statistics
						if(count($myWordslist['Line'])==0) $this->redirect(array('controller'=>'results','action' => 'result'));
						
						$this->log('correct',LOG_DEBUG);
						$this->Session->write('Wordslist', $myWordslist);

						$this->set('growlStatus', "ok");
						$this->set('growlMessage', __('message_line_correct',true));					
    					
    				}
    				else{
    					// AU - Marco che è stata data una risposta sbagliata per questa parola
    					$myWordslist['Line'][$i]['check']=1;
    					// AU - Carico $myWordslist in Sessione
    					$this->Session->write('Wordslist', $myWordslist);
    					
    					$this->log('wrong',LOG_DEBUG);
						$this->set('growlStatus', "ko");
						$this->set('growlMessage', __('message_line_correct_is',true). " " . $myWordslist['Line'][$i]['string2']);					    					
    				}
    			}    			
			}
			
			$myLine = $myWordslist['Line'][array_rand($myWordslist['Line'])];
		    
		    $this->set('myLine',$myLine);		    
			
		}
		
		$this->render('practice', 'ajax');
		
	}
		
	function updateTable()
	{
			
		$this->log('AjaxController updateTable() - entering ...',LOG_DEBUG);

		$myWordslistId = $this->Session->read('Wordslist.Wordslist.id');
		
		if(empty($this->data) == false)
		{

			$this->log('myWordslistId='.$myWordslistId,LOG_DEBUG);
			
			$this->data['Line']['wordslist_id'] = $myWordslistId;
			$this->data['Line']['id'] = $this->findIdNewLine($myWordslistId);

//			$this->log('Line.wordslist_id=' . $this->data['Line']['wordslist_id'],LOG_DEBUG);
//			$this->log('Line.id=' . $this->data['Line']['id'],LOG_DEBUG);
//			$this->log('Line.string1=' . $this->data['Line']['string1'],LOG_DEBUG);
//			$this->log('Line.string2=' . $this->data['Line']['string2'],LOG_DEBUG);

//			$this->Line->create($this->data);

			$sql = "INSERT INTO mycake.lines WVALUES ('".$this->data['Line']['wordslist_id']."','".$this->data['Line']['id']."','".$this->data['Line']['string1']."','".$this->data['Line']['string2']."');";

			/* TODO - AU 2010-01-28 - Ho commentato la IF che NON SO PERCHE' torna sempre FALSE sta merda, 
			nonostante scriva su DB e tutto funzioni correttamente, chiaro che bisogna gestire
			l'errore in qualche modo.
			Le istruzioni tipo SAVE, INSERT di cakephp non funzionano ed è per quello che ho introdotto
			la query($sql), altrimenti lo stronzo andava sempre in UPDATE, non tenendo conto della doppia
			chiave ID di Line e ID di Wordslist
			 */
			
/*			if ($this->Line->query($sql)) {*/
			
				$this->Line->query($sql);
				
				// After the insert I reload the wordslist from the DB
				$this->Wordslist->id = $myWordslistId;

				// I pass the newly loaded wordslist to the page and put it in the session
				$myWordslist = $this->Wordslist->read();

				$this->Session->write('Wordslist', $myWordslist);
								
				// message to display
				$this->Session->setFlash(__('message_line_saved',true));
				
				$this->set('growlStatus', "ok");
				$this->set('growlMessage', __('message_line_saved',true));
				
				// After inserting the new line I clean the fields
				$this->data['Line']['string1']='';
				$this->data['Line']['string2']='';
				
/*			}
			else{
					
				$this->log('AjaxController PROBLEMS INSERTING THE ROW '.$sql,LOG_DEBUG);
					
				$this->set('growlStatus', "ko");
				$this->set('growlMessage', __('message_line_not_saved',true));
				
				//$this->redirect(array('controller' => 'wordslists','action' => 'mylists'));
			}*/

		}

		//$this->log('DisableCache',LOG_DEBUG);
		//per IE... but doesn't work joder
		//$this->disableCache(); 
		$this->render('edit', 'ajax');
		
	}

	function deleteLine($lineId)
	{
			
		$this->log('AjaxController deleteLine() - entering ...',LOG_DEBUG);

		//TODO necessary to perform security checks?
		$myWordslistId = $this->Session->read('Wordslist.Wordslist.id');
		
		$this->log('myWordslistId='.$myWordslistId,LOG_DEBUG);			

		$this->Line->deleteAll(array('Line.wordslist_id' => $myWordslistId, 'Line.id' => $lineId),false);
	
		$this->Wordslist->id = $myWordslistId;			
		$this->Session->write('Wordslist', $this->Wordslist->read());
			
		// message to display
		$this->Session->setFlash(__('message_line_deleted',true));
				
		$this->set('growlStatus', "ok");
		$this->set('growlMessage', __('message_line_deleted',true));
			
		//TODO what happens if the line is not deleted correctly?

		$this->render('edit', 'ajax');
		
	}
	

	function findIdNewLine($wordslistId)
	{
		$this->log('AjaxController findMaxLine() - entering ...',LOG_DEBUG);
		
		$lastLine = $this->Line->find('first',
				array(
					'conditions' => array('Line.wordslist_id' => $wordslistId),
					'order' => array('Line.id DESC'),
				));
						
		$maxId=$lastLine['Line']['id'];
		$maxId++;
		$this->log('maxId='.$maxId,LOG_DEBUG);
		
		return $maxId;	
	}
	
					
}


?>