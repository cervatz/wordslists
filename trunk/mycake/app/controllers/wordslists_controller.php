<?php
class WordslistsController extends SuperController
{
	var $name = 'Wordslists';

	var $uses = array('Wordslist','Line');

	var $components = array('RequestHandler', 'Security', 'Session', 'Utility');

	function beforeRender()
	{
		$this->set('menu', 'wordslists');
	}
	
	function index()
	{
		$this->log('WordslistsController index() - entering ...',LOG_DEBUG);
		$this->pageTitle = 'All the words lists';

		$wordslists = $this->Wordslist->find('all',
			array(
				'order' => array('Wordslist.name')
			));

		$this->set('wordslists', $wordslists);
	}

	function mylists()
	{
		$this->log('WordslistsController mylists() - entering ...',LOG_DEBUG);
		$this->pageTitle = 'My words lists';
		
		$this->set('myJsFile','WordslistListForm');

		$this->Wordslist->unbindModel(array('hasMany' => array('Result')));

		$wordslists = $this->Wordslist->find('all',
			array(
				'conditions' => array('Wordslist.user_id' => $this->Security->retrieveUserId()),
				'order' => array('Wordslist.name')
			));

		$this->set('wordslists', $wordslists);
		
	}
	

	function add()
	{
		$this->log('WordslistsController add() - entering ...',LOG_DEBUG);
		
		$this->set('languages',$this->Utility->getLanguages());

		$this->pageTitle = 'Add a wordslist';
		
		$this->set('myJsFile','WordslistAddForm');
		
		if (!empty($this->data)) {
			$this->data['Wordslist']['user_id']=$this->Security->retrieveUserId();

			$this->set('languages', $this->Wordslist->Language1->find('list'));

			if ($this->Wordslist->save($this->data)) {
								
				$this->Session->setFlash(__('message_wordlists_created',true));
				
				$myWordslist=$this->Wordslist->read();
												
				$this->redirect(array('controller'=>'wordslists','action' => 'edit', $myWordslist['Wordslist']['id']));
			}
			else{
				
				$this->Session->setFlash(__('message_wordlists_not_created',true));
							
			}
		}
	}
	
	function loadAndSetWordslist($id = null)
	{
		
		$this->log("id=".$id, LOG_DEBUG);

		$this->Wordslist->id = $id;

		$this->Wordslist->unbindModel(array('hasMany' => array('Result')));
		
		$myWordslist = $this->Wordslist->read();
		
		//AU - Modifico l'array $myWordslist aggiungendo una colonna ad ogni oggetto Line
		//     Aggiungo la colonna check che utilizzo per testare se vengono date risposte corrette 
		//     al primo colpo
		foreach ($myWordslist['Line'] as $i => $value) {
			$myWordslist['Line'][$i]['check'] = 0;
		}	
	
		//$this->log($myWordslist, LOG_DEBUG);
	
		// I put in the session context the data for the wordlist and the lines
		$this->Session->write('Wordslist', $myWordslist);
		
		//AU - Put in the sessions number of words (LINES)
		$this->Session->write('LineNumber',count($myWordslist['Line']));		
	
	}
	
	function edit($id = null)
	{
		$this->log('WordslistsController edit() - entering ...',LOG_DEBUG);

		if($this->Security->currentUserOwnsList($id))
		{
			$this->loadAndSetWordslist($id);

			// I redirect towards the ajax/edit view and use the ajax layout
			$this->render('/ajax/edit', 'ajax');

		}
		else{

			$this->Session->setFlash(__('message_wordlists_not_yours',true));
				
			$this->redirect(array('action' => 'mylists'));
		}
	}

	function practice($id = null)
	{
		$this->log('WordslistsController practice() - entering ...',LOG_DEBUG);
		$this->Session->write('rightAnswers', 0);		

		if($this->Security->currentUserOwnsList($id))
		{

			$this->loadAndSetWordslist($id);
			
			$myWordslist = $this->Session->read('Wordslist');
					    			
		    $myLine = $myWordslist['Line'][array_rand($myWordslist['Line'])];
		    
		    $this->set('myLine',$myLine);
		    		    
			// I redirect towards the ajax/edit view and use the ajax layout
			$this->render('/ajax/practice', 'ajax');

		}
		else{

			$this->Session->setFlash(__('message_wordlists_not_yours',true));
				
			$this->redirect(array('action' => 'mylists'));
		}

	}
	
	function view($id = null)
	{
		$this->log('WordslistsController view() - entering ...',LOG_DEBUG);
		
		if($this->Security->currentUserOwnsList($id))
		{
			$this->loadAndSetWordslist($id);
		}
		else{
			$this->Session->setFlash(__('message_wordlists_not_yours',true));
			
			$this->redirect(array('action' => 'mylists'));
		}
	}

	function share ($id = null)
	{
		$this->log('WordslistsController share() - entering ...',LOG_DEBUG);
		
		$this->setShared($id, 1, 'message_wordslist_shared');
		
		$this->redirect(array('action' => 'mylists'));
	}

	function unshare ($id = null)
	{
		$this->log('WordslistsController unshare() - entering ...',LOG_DEBUG);
		
		$this->setShared($id, 0, 'message_wordslist_unshared');
		
		$this->redirect(array('action' => 'mylists'));
	}
	
	function setShared($id, $sharedValue, $idMessage)
	{
		$this->log('WordslistsController setShared() - entering ...',LOG_DEBUG);
		
		$this->log("id=".$id, LOG_DEBUG);
		
		$this->log("sharedValue=".$sharedValue, LOG_DEBUG);
		
		if($this->Security->currentUserOwnsList($id))
		{
			$this->Wordslist->id = $id;
			
			$this->Wordslist->read();
			
   			$this->Wordslist->set('shared', $sharedValue);
   			
			$this->Wordslist->save();
						
			$this->Session->setFlash(__($idMessage,true));

		}
		else{
			$this->Session->setFlash(__('message_wordlists_not_yours',true));
		}
		
	}
	
	
	function delete($id = null)
	{
		$this->log('WordslistsController delete() - entering ...',LOG_DEBUG);
		
		$this->log("id=".$id, LOG_DEBUG);

		if($this->Security->currentUserOwnsList($id))
		{			
			//TODO When the Line in Wordslist model is marked with dependent = true also other lines are deleted without apparent reason
			// At the moment they are Line is marked as not dependent, but in that case we must delete the lines separately.
			
			$this->Wordslist->delete($id);		
			
			$this->Line->deleteAll(array('wordslist_id' => $id),false);
		
			$this->Session->setFlash(__('message_wordlists_deleted',true));
			
		}
		else{
			$this->Session->setFlash(__('message_wordlists_not_yours',true));
		}
		$this->redirect(array('action' => 'mylists'));
	}
	
}
?>
