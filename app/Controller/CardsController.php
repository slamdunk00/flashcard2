<?php
class CardsController extends AppController {
	
	/* var $uses = [ 'User' ]; */
	 var $uses = [ 'Deck','Card' ]; 

 
    public function index( $deck_id=null ){
		$deck_id = $this->params['url']['deck_id'];
		$this->set('deck_id', $deck_id);
		
		$this->paginate = array(
								'order' => array('Card.id'=>'asc'),
								'conditions' => [
									'Card.deck_id' => $deck_id
								],
								'limit' => 1
							);
		$cards = $this->paginate('Card');
        $this->set(compact('cards'));
		

			
		
	}

	public function add(){
		$deck_id = $this->params['url']['deck_id'];
		$this->set('deck_id', $deck_id);
		
		
		
			$d_id = isset($this->request->query['$d_id']) ? $this->request->query['$d_id'] : null;
	        if ($this->request->is('post')) {
            $this->Card->create();
            if ($this->Card->save($this->request->data)) {
                $this->redirect(array('action' => 'index','?' => array('deck_id' => $deck_id )));
				$this->Session->setFlash(__('The card has been created'));
                $this->redirect(array('action' => 'index','?' => array('deck_id' => $deck_id )));
            } 
        }
    } 
}
?>