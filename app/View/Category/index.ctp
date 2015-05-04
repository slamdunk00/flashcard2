<?php
	echo 'Category';
	echo '</br>';
	foreach($category as $decks): 
	echo $decks['Category']['name'];
	echo '</br>';
	endforeach;
	echo $this->Html->link("+Add Category", ['controller' => 'Category', 'action' => 'add'], ['escape' => FALSE]);
?>
