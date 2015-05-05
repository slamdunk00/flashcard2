<h1>All Category</h1>
<?php
	echo '</br>';
	foreach($category as $cat): 
	echo $this->Html->link( $cat['Category']['name'],   array('controller'=>'decks','action'=>'index', '?' => array('cat_id' => $cat['Category']['id'], 'cat_name' => $cat['Category']['name'] ) ) ) ;

	echo '</br>';
	endforeach;
	
	if($this->Session->check('Auth.User')){
	if( $role == 'a'){
	echo $this->Html->link("+Add Category", ['controller' => 'Category', 'action' => 'add'], ['escape' => FALSE]);
}}
?>
