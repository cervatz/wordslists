<?php
class SearchController extends SuperController
{
	var $name = 'Search';

	var $uses = array('Wordslist');

	var $components = array('RequestHandler', 'Security', 'Session', 'Utility');

	function beforeRender()
	{
		$this->set('menu', 'search');
	}
	
	function index()
	{
		$this->log('SearchController index() - entering ...',LOG_DEBUG);

		$this->pageTitle = 'Search';

		$this->set('languages',$this->Utility->getLanguages());

		$this->set('language_id1', '');
		$this->set('language_id2', '');
		
	}

	function searchPublic()
	{
		$this->log('WordslistsController searchPublic() - entering ...',LOG_DEBUG);

		$this->pageTitle = 'Retrieved public wordslists';


		if (!empty($this->data)) {
			$this->log('language_id1=' . $this->data['Wordslist']['language_id1'],LOG_DEBUG);
			$this->log('language_id2=' . $this->data['Wordslist']['language_id2'],LOG_DEBUG);

			$this->set('language_id1', $this->data['Wordslist']['language_id1']);
			$this->set('language_id2', $this->data['Wordslist']['language_id2']);

			$wordslists = $this->Wordslist->find('all',
				array(
						'conditions' => array('Wordslist.language_id1' => $this->data['Wordslist']['language_id1'],
											  'Wordslist.language_id2' => $this->data['Wordslist']['language_id2'],
											  'Wordslist.shared' => 1),
						'order' => array('Wordslist.name')
				));

			$this->set('wordslists', $wordslists);
			
			//TODO: would it be better to put the languages in session?			
			$this->set('languages',$this->Utility->getLanguages());
			
			$this->render('index');
		}
		else{
			$this->redirect(array('controller'=>'search','action' => 'index'));
		}

	}

}
?>
