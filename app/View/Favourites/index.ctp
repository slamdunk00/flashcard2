<?php
	foreach($deck as $decks): 
	echo '<ul>';
	echo '<li>';
	echo $this->Html->link($decks['Deck']['name'], ['controller' => 'cards', 'action' => 'index',
	'?' => ['deck_id' => $decks['Deck']['id']]]);
	echo ' by ';
	echo $decks['Deck']['user_id'];
	echo '</li>';
	echo '</ul>';
	echo $user_id;
	endforeach;
?>
