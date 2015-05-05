<?php
class CardsController extends AppController {
	
	/* var $uses = [ 'User' ]; */
	 var $uses = [ 'Deck','Card','File', 'Utility' ]; 

 
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
		


	        if ($this->request->is('post')) {
				$this->Card->create();
				
				$permitted = array('image/gif','image/jpeg','image/pjpeg','image/png');
				$typeOK1 = false;

				// check filetype is ok
				foreach($permitted as $type) {
				if($type == $this->request->data['Card']['frontpic_update']['type']) {
				$typeOK1 = true;

				break;}}
				$permitted = array('image/gif','image/jpeg','image/pjpeg','image/png');
				$typeOK2 = false;
				foreach($permitted as $type) {
				if($type == $this->request->data['Card']['backpic_update']['type']) {
				$typeOK2 = true;

				break;}
				}
				$frontpic_update = null;
				$backpic_update = null;
				
if(($typeOK1) && (typeOK2)) {
if (
    !empty($this->request->data['Card']['frontpic_update']['tmp_name'])
    && is_uploaded_file($this->request->data['Card']['frontpic_update']['tmp_name'])
) {
    // Strip path information
    $frontpic_update = basename($this->request->data['Card']['frontpic_update']['name']); 
    move_uploaded_file(
        $this->data['Card']['frontpic_update']['tmp_name'],
        'cardImg/'.$frontpic_update
    );
}
if (
    !empty($this->request->data['Card']['backpic_update']['tmp_name'])
    && is_uploaded_file($this->request->data['Card']['backpic_update']['tmp_name'])
) {
    // Strip path information
    $backpic_update = basename($this->request->data['Card']['backpic_update']['name']); 
    move_uploaded_file(
        $this->data['Card']['backpic_update']['tmp_name'],
        'cardImg/'.$backpic_update
    );
}

$frontpath = '/cardImg/'.$frontpic_update;
$this->request->data['Card']['frontpic'] = $frontpath;

$backpath = '/cardImg/'.$backpic_update;
$this->request->data['Card']['backpic'] = $backpath;

			
            if ($this->Card->save($this->request->data)) {
                $this->redirect(array('action' => 'index','?' => array('deck_id' => $deck_id )));
				$this->Session->setFlash(__('The card has been created'));

				}else{
                    $this->Session->setFlash(__('Unable to Created your Card.'));
                }
}else{
	             if ($this->Card->save($this->request->data)) {
                $this->redirect(array('action' => 'index','?' => array('deck_id' => $deck_id )));
				$this->Session->setFlash(__('The card has been created'));

				}else{
                    $this->Session->setFlash(__('Unable to Created your Card.'));
                }
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
			
				
				$permitted = array('image/gif','image/jpeg','image/pjpeg','image/png');
				$typeOK1 = false;

				// check filetype is ok
				foreach($permitted as $type) {
				if($type == $this->request->data['Card']['frontpic_update']['type']) {
				$typeOK1 = true;

				break;}}
				$permitted = array('image/gif','image/jpeg','image/pjpeg','image/png');
				$typeOK2 = false;
				foreach($permitted as $type) {
				if($type == $this->request->data['Card']['backpic_update']['type']) {
				$typeOK2 = true;

				break;}
				}
				$frontpic_update = null;
				$backpic_update = null;
				
if(($typeOK1) && (typeOK2)) {
	
	
		$file = new File(WWW_ROOT . $card['Card']['frontpic'], false, 0777);
		$file->delete();
		$file->close();
		
		$file = new File(WWW_ROOT . $card['Card']['backpic'], false, 0777);
		$contents = $file->delete();
		$file->close();
if (
    !empty($this->request->data['Card']['frontpic_update']['tmp_name'])
    && is_uploaded_file($this->request->data['Card']['frontpic_update']['tmp_name'])
) {
    // Strip path information
    $frontpic_update = basename($this->request->data['Card']['frontpic_update']['name']); 
    move_uploaded_file(
        $this->data['Card']['frontpic_update']['tmp_name'],
        'cardImg/'.$frontpic_update
    );
}
if (
    !empty($this->request->data['Card']['backpic_update']['tmp_name'])
    && is_uploaded_file($this->request->data['Card']['backpic_update']['tmp_name'])
) {
    // Strip path information
    $backpic_update = basename($this->request->data['Card']['backpic_update']['name']); 
    move_uploaded_file(
        $this->data['Card']['backpic_update']['tmp_name'],
        'cardImg/'.$backpic_update
    );
}

$frontpath = '/cardImg/'.$frontpic_update;
$this->request->data['Card']['frontpic'] = $frontpath;

$backpath = '/cardImg/'.$backpic_update;
$this->request->data['Card']['backpic'] = $backpath;

			
				if ($this->Card->save($this->request->data)) {
					$this->Session->setFlash(__('Card has been Edit'));
                    $this->redirect(array('controller' => 'cards','action' => 'index', '?' => array('deck_id' => $deck_id ) ));
                }else{
                    $this->Session->setFlash(__('Unable to Edit your Card.'));
                }
}else{
				
				
				
                if ($this->Card->save($this->request->data)) {
                    $this->Session->setFlash(__('Card has been Edit'));
                    $this->redirect(array('controller' => 'cards','action' => 'index', '?' => array('deck_id' => $deck_id ) ));
                }else{
                    $this->Session->setFlash(__('Unable to Edit your Card.'));
                }
            }
			
		}}
	public function delete($card_id=null) {	
	
	
		$card_id = $this->params['url']['card_id'];
		$this->set('card_id', $card_id);
		$deck_id = $this->params['url']['deck_id'];
		$this->set('deck_id', $deck_id);
		
			$card = $this->Card->find('first',
							array(
								'conditions' => [
									'Card.id' => $card_id
								]
							)
			);
		
		$this->Card->id = $card_id;
		$this->Card->delete();
		$file = new File(WWW_ROOT . $card['Card']['frontpic'], false, 0777);
		$file->delete();
		$file->close();
		
		$file = new File(WWW_ROOT . $card['Card']['backpic'], false, 0777);
		$contents = $file->delete();
		$file->close();
		
		$this->redirect(array('controller' => 'cards','action' => 'index', '?' => array('deck_id' => $deck_id ) ));
			
    }
	
}
?>