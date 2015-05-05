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
}
?>