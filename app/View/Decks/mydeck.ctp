<?php 
	// echo 'This is Deck index.ctp';
	// echo $this->Form->create('Properties', array('type' => 'get'));
?>

<h1><?php echo $cat_name; ?></h1>
<?php 
	foreach($user as $deck):
	echo '<u>';
	echo $this->Html->link($deck['Deck']['name'],   array('controller'=>'cards','action'=>'index', '?' => array('deck_id' => $deck['Deck']['id'] )  ));
	echo '</u></br>';
	//echo ' by '.$deck['Deck']['user_id'].'<br/>';
	//echo $users['User']['firstname'];	
	endforeach;
?>
<span style="margin-right:10px;"><?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?></span>
<?php echo $this->Paginator->numbers(array(   'class' => 'numbers'     ));?>
<span style="margin-left:10px;"><?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?></span>
<?php
	echo '<br/>';
	echo $this->Form->input('search', array('between'=>'<label for="search" class="main_search">Search</label>','label'=>false));
    echo $this->Form->button('Search', array('class'=>'btn btn-success btn-lg'));
    echo $this->Form->end
	
?>
