<?php
class DecksController extends AppController {
	
	var $uses = [ 'User' ,'Deck' ];
	
    public function index() {
		
		if($this->request->isAjax()) {
            // $this->autoRender = false;
			$result = "";
			$key = $this->request->data('searchString').'%';
			$decks = $this->Deck->find('all', array( 'order' => array('Deck.name'=>'asc'), 'conditions'=>array('Deck.name LIKE'=>$key) ));
			// $this->set('decks',$decks);
			// $this->paginate = array(
							// 'order' => array('Deck.name'=>'asc'),
							// 'conditions' => [
								// array('decks.name LIKE' => 'a%')
							// ],
							// 'limit' => 5
			// );
			// $decks = $this->paginate('Deck');
			// $this->set(compact('decks'));
			$found = false;
			foreach($decks as $deck):
			$found = true;
			// echo $this->Html->link( $deck['Deck']['name'],  array('controller'=>'cards','action'=>'index', '?' => array('deck_id' => $deck['Deck']['id'] )  ));
			$result.=$deck['Deck']['name'].'<br/>';
			// $result.="$this->Html->link(";
			// $result.=$deck['Deck']['name'].",";
			// $result.="array('controller'=>'cards','action'=>'index',";
			// $result.=" '?' => array('deck_id' => ".$deck['Deck']['id']." ) ))";
			// $result.="<br/>";
			endforeach;
			// echo $result;
			if($found){
				echo '<h1>Search Result</h1>';
				echo $result;
			}else{
				echo "<h1>No item match your search...</h1>";
			}
			// echo $result;
            die();
		}
		
		$cat_id = isset($this->request->query['cat_id']) ? $this->request->query['cat_id'] : null;
		$cat_name = isset($this->request->query['cat_name']) ? $this->request->query['cat_name'] : null;
		
		// $user = $this->User->find('all');
		// $this->set('user', $user);
		if( $cat_id !== null ){
			$this->paginate = array(
								'order' => array('Deck.name'=>'asc'),
								'conditions' => [
									'Deck.category_id' => $cat_id
								],
								'limit' => 5
			);
		}else{
			$cat_name = "All Deck<br/>(from the Lastest)";
			$this->paginate = array(
								'order' => array('Deck.id'=>'desc'),
								'limit' => 10
			);
		}
		
		$decks = $this->paginate('Deck');
		$this->set(compact('decks'));
		
        // $decks = $this->paginate('Deck');
        // $this->set(compact('decks'));
		$this->set('cat_name', $cat_name);
		
			$users = $this->User->find('first',
				array(
				'conditions' => ['User.id' => 1]));
			
			$this->set('users', $users);
    }
	
	public function add(){
			$deck = $this->Deck->find('all');
			$this->set('deck', $deck); 
			
			
			$categories = $this->Category->getCategory(); 
			$this->set('category', $categories); 
	        if ($this->request->is('post')) {
            $this->Deck->create();
            if ($this->Deck->save($this->request->data)) {
                $this->redirect(array('action' => 'index'));
            } 
        }
    }
	
    public function edit($id = null) {		

		$deck_id = $this->params['url']['deck_id'];
		$this->set('deck_id', $deck_id);
 		$categories = $this->Category->getCategory(); 
		$this->set('category', $categories); 

            if ($this->request->is('post') || $this->request->is('put')) {
                $this->Deck->id = $id;
                if ($this->Deck->save($this->request->data)) {
                    $this->Session->setFlash(__('Deck has been Edit'));
                    $this->redirect(array('controller' => 'cards','action' => 'index', '?' => array('deck_id' => $deck_id ) ));
                }else{
                    $this->Session->setFlash(__('Unable to Edit your Deck.'));
                }
            }
			
			//แอ้ดเพิ่มเข้ามา
			$decks = $this->Deck->find('first',
				array(
				'conditions' => ['Deck.id' => $deck_id]));
			
			$this->set('decks', $decks);
			
    }
	
		public function delete() {	
	
	
		$deck_id = $this->params['url']['deck_id'];
		$this->set('deck_id', $deck_id);
		
		$this->Deck->id = $deck_id;
		$this->Deck->delete();
		
		$this->redirect(array('action' => 'index' ));
			
    }
	
	public function mydeck(){
		$cat_id = isset($this->request->query['cat_id']) ? $this->request->query['cat_id'] : null;
		$cat_name = isset($this->request->query['cat_name']) ? $this->request->query['cat_name'] : null;
		
		$user = $this->User->find('all');
		$this->set('user', $user);

			$cat_name = "My Deck<br/>";
		

		
		$decks = $this->paginate('Deck');
		
		
		$this->set(compact('decks'));
		
        // $decks = $this->paginate('Deck');
        // $this->set(compact('decks'));
		$this->set('cat_name', $cat_name);
		
			$users = $this->User->find('first',
				array(
				'conditions' => ['User.id' => $user_id]));
			
			$this->set('users', $users);
	}
}

?>