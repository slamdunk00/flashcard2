<?php
class FavouriteController extends AppController {
	var $name = 'Favourites';
	var $uses = array('Favourite', 'Deck', 'User');
	
	public function index($user_id=NULL) {
		if (empty($user_id=NULL)) {
			$this->redirect([
				'controller' => 'users',
				'action' => 'index'
			]);
		}
		
		$deck = $this->Deck->find('all', array(
			'conditions' => ['Deck.id' => $user_id]
		));
		
		if (empty($deck)) {
			$this->redirect([
				'controller' => 'users',
				'action' => 'index']);
		}
		
		$this->set('deck', $deck);
		
		//$favourites = $this->Favourite->find('all', array('Favourite.user_id', 'Favourite.deck_id'));
		//$this->set('favourite', $favourites);
		
	}
}
?>