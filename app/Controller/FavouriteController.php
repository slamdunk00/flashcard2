<?php
class FavouriteController extends AppController {
	var $name = 'Favourites';
	var $uses = array('Favourite', 'Deck');
	
	public function index() {
		
		$favourites = $this->Favourite->find('all', array('Favourite.user_id', 'Favourite.deck_id'));
		//$this->set('favourite', $favourites);
		
		$deck_fav = $this->Deck->find('all', ['conditions' => ['Deck.id' => 'Favourite.deck_id'], 'recursive' => -1]);
		$this->set('deck_fav', $deck_fav);
	}
}
?>