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
		
			$decks = $this->Deck->find('first',
							array(
								'conditions' => [
									'Deck.id' => $deck_id
								]
							)
			);
			
			$this->set('decks', $decks);
			
			$cat = $this->Category->find('first',
			array(
			'conditions' => ['Category.id' => $decks['Deck']['category_id']]));
			
			$this->set('cat', $cat);
			
		
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
				}else{
                    $this->Session->setFlash(__('Unable to Created your Card.'));
                }
            } 
        }
    

	    public function edit() {		
		
		
		$card_id = $this->params['url']['card_id'];
		$this->set('card_id', $card_id);
		$deck_id = $this->params['url']['deck_id'];
		$this->set('deck_id', $deck_id);

		$card = $this->Card->find('first',
			array(
			'conditions' => ['Card.id' => $card_id]));
			
			$this->set('card', $card);
		

            if ($this->request->is('post') || $this->request->is('put')) {
                $this->Card->id = $card_id;
                if ($this->Card->save($this->request->data)) {
                    $this->Session->setFlash(__('Card has been Edit'));
                    $this->redirect(array('controller' => 'cards','action' => 'index', '?' => array('deck_id' => $deck_id ) ));
                }else{
                    $this->Session->setFlash(__('Unable to Edit your Card.'));
                }
            }
			
    }
	public function delete() {	
	
	
		$card_id = $this->params['url']['card_id'];
		$this->set('card_id', $card_id);
		$deck_id = $this->params['url']['deck_id'];
		$this->set('deck_id', $deck_id);
		
		$this->Card->id = $card_id;
		$this->Card->delete();
		
		$this->redirect(array('controller' => 'cards','action' => 'index', '?' => array('deck_id' => $deck_id ) ));
			
    }
	
}
?>