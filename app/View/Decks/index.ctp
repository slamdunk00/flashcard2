<?php  echo 'This is Deck index.ctp';?>
<h1><?php echo $cat_name; ?></h1>
<?php 
	foreach($decks as $deck):
	// foreach($deck['user'] as $user):
	echo '<u>';
	echo $this->Html->link( $deck['Deck']['name'],   array('controller'=>'cards','action'=>'index', '?' => array('deck_id' => $deck['Deck']['id'] )  ));
	echo '</u>';
	// echo ' by '.$user['name'].'---'.$deck['Deck']['user_id'].'<br/>';
	echo ' by '.$deck['Deck']['user_id'].'<br/>';
	// endforeach;
	endforeach;
?>
