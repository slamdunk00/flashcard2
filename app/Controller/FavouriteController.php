<?php
class FavouriteController extends AppController {
	var $name = 'Favourites';
	var $uses = array('Favourite', 'Deck', 'User');
	
	public function index($user_id=NULL) {
		
		$user = $this->Favourite->find('list', array('conditions' => ['Favourite.user_id' => $user_id], 'fields' => ['Favourite.deck_id']));
		//$this->set('user', $user);
		
		$deck = $this->Deck->find('all', array('conditions' => ['Deck.id' => $user]));
		$this->set('deck', $deck);
		
		//$favourites = $this->Favourite->find('all', array('Favourite.user_id', 'Favourite.deck_id'));
		//$this->set('favourite', $favourites);
		
	}
}
?>