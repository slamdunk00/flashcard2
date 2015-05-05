<?php
	echo '<div class="decks">';
	foreach($deck as $decks):
	echo 'Deck :	&nbsp'.$decks['Deck']['name'];
	
	foreach($user as $users):
	if ($decks['Deck']['user_id'] == $users['User']['id']){
		echo ' by '.$users['User']['firstname'];
	}
	endforeach;
	
	echo '<u id="play">';
	echo $this->Html->link('play', ['controller' => 'cards', 'action' => 'index', '?' => ['deck_id' => $decks['Deck']['id']]]);
	echo '</u>';
	echo '</br>';
	echo 'Deck Description : &nbsp'.$decks['Deck']['description'];
	echo '</br>---------------------------------------------------------------------------';
	echo '</br>';
	endforeach;
	echo '</div>';
?>
