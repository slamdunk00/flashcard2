<?php
	echo '<div class="decks">';
	foreach($deck as $decks):
	echo $decks['Deck']['name'];
	echo ' by ';
	echo $user_id;
	echo '<u id="play">';
	echo $this->Html->link('play', ['controller' => 'cards', 'action' => 'index',
	'?' => ['deck_id' => $decks['Deck']['id']]]);echo '</u>';
	echo '</br>';
	echo $decks['Deck']['description'];
	echo '</br>---------------------------------------------------------------------------';
	//echo $decks['Deck']['user_id'];
	//echo $user_id;
	echo '</br>';
	endforeach;
	echo '</div>';
?>
