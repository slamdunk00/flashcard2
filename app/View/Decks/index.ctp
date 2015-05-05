<?php 
	// echo 'This is Deck index.ctp';
	// echo $this->Form->create('Properties', array('type' => 'get'));
?>

<h1><?php echo $cat_name; ?></h1>
<?php 
	echo '<div class="decks">';
	foreach($decks as $deck):
	echo $deck['Deck']['name'];
	echo ' by '.$deck['Deck']['user_id'].'<br/>';
	echo ' ('.$deck['Deck']['description'].') ';
	echo '<u id="play">';
	echo $this->Html->link('play', array('controller'=>'cards','action'=>'index', '?' => array('deck_id' => $deck['Deck']['id'] )  ));
	echo '</u>';
	echo '</br>---------------------------------------------------------------------------';
	echo '</br>';
	//echo $users['User']['firstname'];	
	endforeach;
	echo '</div>';
?>
<span style="margin-right:10px;"><?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?></span>
<?php echo $this->Paginator->numbers(array(   'class' => 'numbers'     ));?>
<span style="margin-left:10px;"><?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?></span>
<?php	
	echo $users['User']['firstname'];
?>
