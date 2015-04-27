<?php
class FavouriteController extends AppController {
	var $name = 'Favourites';
	var $uses = array('Favourite');
	
	public function index() {
		$favourites = $this->Favourite->find('all', array('conditions' => ['Favourites.user_id' => $user_id], 'recursive' => -1));
		$this->set('favourite', $favourites);
	}
}
?>