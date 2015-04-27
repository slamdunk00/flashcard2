<html>
<head>

</head>
<body>
<?php
	//echo $this->Html->image('../cardImg/Penguins.jpg', array('width' => '50px','alt'=>'asd'));?>
	<table align = 'center' >
	<h1><?php echo $decks['Deck']['name'] ?></h1>
	<tr>
	<td>Deck Category</td>
	<td><?php echo $cat['Category']['name'] ?> </td>
	</tr>
	
	<tr>
	<td>Deck Description</td>
	<td width="300px"><?php echo $decks['Deck']['description'] ?></td>
	</tr>

	</table>
	
<p></p>
	<table align ="center" >
	<td><?php echo $this->Html->link( " Add New Card ",   array('controller'=>'cards','action'=>'add' ,'?' => array('deck_id' => $deck_id )) ).'</p></li>'; ?></td>
	<td><?php echo $this->Html->link( " Edit Deck ",   array('controller'=>'decks','action'=>'edit' ,'?' => array('deck_id' => $deck_id )) ).'</p></li>'; ?></td>
	<td><?php echo $this->Html->link( " Delete Deck ",   array('controller'=>'decks','action'=>'delete' ,'?' => array('deck_id' => $deck_id ) ),
    array('confirm' => 'Are you sure you want to delete this Deck?') ).'</p></li>'; ?></td>
	<td><?php echo $this->SocialShare->link('facebook',__('Share on Facebook')); ?></td>
	</table>
	
<p></p>
<p></p>



<?php foreach($cards as $card): ?>
 <div class="flip-container" ontouchstart="this.classList.toggle('hover');" id="card-container">
	<div class="flipper">
<?php
	$front = $card['Card']['front'];
	echo	'<div class="front">';
	echo	 $this->Html->image($front, array('width' => '50px','alt'=>$front));
	echo	'</div>';
	echo	'<div class="back">';
	echo	$card['Card']['back'];
	echo	'</div>';
?>	
	
		</div>
</div>

<p></p>

<span style="margin-right:10px;"><?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?></span>
<?php echo $this->Paginator->numbers(array(   'class' => 'numbers'     ));?>
<span style="margin-left:10px;"><?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?></span>


<p></p>
<div>
<table align = 'center'>
	<tr>
	<td><?php echo $this->Html->link( " Edit Card ",   array('controller'=>'cards','action'=>'edit' ,'?' => array('deck_id' => $deck_id , 'card_id' => $card['Card']['id'], )) ).'</p></li>'; ?></td>
	<td><?php echo $this->Html->link( " Delete Card ",   array('controller'=>'cards','action'=>'delete' ,'?' => array('deck_id' => $deck_id , 'card_id' => $card['Card']['id'] )),
    array('confirm' => 'Are you sure you want to delete this Card?') ).'</p></li>'; ?></td>
	</tr>
	</table>
</div>

<?php endforeach; ?>



</body>