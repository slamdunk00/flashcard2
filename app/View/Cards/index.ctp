<?php
	echo 'This is cards index.ctp';
	//echo $this->Html->image('../cardImg/Penguins.jpg', array('width' => '200px','alt'=>'Little Penguins'));
	// echo '<img src="cardImg/Penguins.jpg" width="40px" height="40px">';
	?>
	<table align = 'center'>
	
	<tr>
	<td>Deck Name</td>
	<td><?php echo $decks['Deck']['name'] ?></td>
	</tr>
	
	<tr>
	<td>Deck Description</td>
	<td><?php echo $decks['Deck']['description'] ?></td>
	</tr>
	
	<tr>
	<td>Deck Category</td>
	<td><?php echo $decks['Deck']['name'] ?></td>
	</tr>
	</table>
	
<p></p>
	<table align = 'center'>
	<td><?php echo $this->Html->link( " Add New Card ",   array('controller'=>'cards','action'=>'add' ,'?' => array('deck_id' => $deck_id )) ).'</p></li>'; ?></td>
	<td><?php echo $this->Html->link( " Edit Deck ",   array('controller'=>'decks','action'=>'edit' ,'?' => array('deck_id' => $deck_id )) ).'</p></li>'; ?></td>
	<td><?php echo $this->Html->link( " Delete Deck ",   array('controller'=>'decks','action'=>'delete' , ) ).'</p></li>'; ?></td>
	<td><?php echo $this->SocialShare->link('facebook',__('Share on Facebook')); ?></td>
	</table>
	
<p></p>

 <div class="flip-container" ontouchstart="this.classList.toggle('hover');" id="card-container">
	<div class="flipper">
<?php foreach($cards as $card):
	echo	'<div class="front">';
	echo	$card['Card']['front'];
	echo	'</div>';
	echo	'<div class="back">';
	echo	$card['Card']['back'];
	echo	'</div>';
	endforeach; 

 ?>
	</div>
</div>

<span style="margin-right:10px;"><?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?></span>
<?php echo $this->Paginator->numbers(array(   'class' => 'numbers'     ));?>
<span style="margin-left:10px;"><?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?></span>