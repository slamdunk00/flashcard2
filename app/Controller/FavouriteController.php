<?php
class FavouriteController extends AppController {
	var $name = 'Favourites';
	var $uses = array('Favourite');
	
	public function index() {
		$cat_id = isset($this->request->query['cat_id']) ? $this->request->query['cat_id'] : null;
		$cat_name = isset($this->request->query['cat_name']) ? $this->request->query['cat_name'] : null;
		
		$favourites = $this->Favourite->find('all', array('fields' array('Favourite.user_id', 'Favourite.deck_id')));
		$this->set('favourite', $favourites);
	}
}
?>