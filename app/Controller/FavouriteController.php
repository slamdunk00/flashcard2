<?php
class FavouriteController extends AppController {
	var $name = 'Favourites';
	var $uses = array('Favourite', 'Deck', 'User');
	
	public function index($user_id=NULL) {
		
		$user_list = $this->Favourite->find('list', array('conditions' => ['Favourite.user_id' => $user_id], 'fields' => ['Favourite.deck_id']));
		//$this->set('user', $user);
		
		$deck = $this->Deck->find('all', array('conditions' => ['Deck.id' => $user_list]));
		$this->set('deck', $deck);
		
		$user = $this->User->find('all');
		$this->set('user', $user);
		
		//$favourites = $this->Favourite->find('all', array('Favourite.user_id', 'Favourite.deck_id'));
		//$this->set('favourite', $favourites);
		
	}
	
		public function add() {
		$deck_id = $this->params['url']['deck_id'];
		$this->set('deck_id', $deck_id);
		$user_id = $this->params['url']['user_id'];
		$this->set('user_id', $user_id);
		

		if ($this->request->is('post')) {
		$this->Favourite->create();

		if ($this->Favourite->save($this->request->data)) {
        $this->redirect(array('controller' => 'cards','action' => 'index','?' => array('deck_id' => $deck_id )));
		$this->Session->setFlash(__('Add Favourite complete'));

		}else{
            $this->Session->setFlash(__('Unable to Add Favourite.'));
             }

		
		}}
	
		public function delete() {
		$deck_id = $this->params['url']['deck_id'];
		$this->set('deck_id', $deck_id);
		$user_id = $this->params['url']['user_id'];
		$this->set('user_id', $user_id);
		
		$this->Favourite->user_id = $user_id;
		$this->Favourite->deck_id = $deck_id;
		$this->Favourite->delete();
		$this->redirect(array('controller' => 'cards','action' => 'index','?' => array('deck_id' => $deck_id )));
		
		

		
	}
}
?>