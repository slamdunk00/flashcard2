<?php
class CategoryController extends AppController {
	
	public function index() {
		$category = $this->Category->find('all', ['order' => ['Category.name' => 'ASC']]);
		$this->set('category', $category);
	}
	
	public function add() {
		if ($this->request->is('POST')) {
			$data = [
				'Category' => [
				'name' => trim($this->request->data['Category']['name']),
				'created' => date('Y-m-d H:i:s')]
			];
			
			if ($this->Category->save($data)) {
				$this->Session->setFlash("Add category: ". $data['Category']['name']. " completed");
				$this->redirect(['action' => 'index']);
			}
			else {
				$this->Session->setFlash('Add category: '. $data['Category']['name']. ' failed');
			}
		}
	}
	    public function edit($id = null) {		

		$cat_id = $this->params['url']['cat_id'];
		$cat_name = $this->params['url']['cat_name'];
		$this->set('cat_id', $cat_id);
		$this->set('cat_name', $cat_name);

            if ($this->request->is('post') || $this->request->is('put')) {
                $this->Category->id = $cat_id;
                if ($this->Category->save($this->request->data)) {
                    $this->Session->setFlash(__('Category has been Edit'));
                    $this->redirect(array('controller' => 'cards','action' => 'index', '?' => array('deck_id' => $deck_id ) ));
                }else{
                    $this->Session->setFlash(__('Unable to Edit your Category.'));
                }
            }
			
			//แอ้ดเพิ่มเข้ามา

			
		
			
    }
	
		public function delete() {	
	
	
		$cat_id = $this->params['url']['cat_id'];
		$this->set('cat_id', $cat_id);
		
		$this->Category->id = $cat_id;
		$this->Category->delete();
		
		$this->redirect(array('action' => 'index' ));
			
    }
	
}
?>