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
<?php 	if($this->Session->check('Auth.User')){
		if( $role == 'a'){
echo $this->Html->link( " Add New Card ",   array('controller'=>'cards','action'=>'add' ,'?' => array('deck_id' => $deck_id )) ),'&nbsp'; 
echo $this->Html->link( " Edit Deck ",   array('controller'=>'decks','action'=>'edit' ,'?' => array('deck_id' => $deck_id )) ),'&nbsp'; 
echo $this->Html->link( " Delete Deck ",   array('controller'=>'decks','action'=>'delete' ,'?' => array('deck_id' => $deck_id ) ),
    array('confirm' => 'Are you sure you want to delete this Deck?') ),'&nbsp';
echo $this->SocialShare->link('facebook',__('Share on Facebook')); 
	}else{
	if ($user_id == $decks['Deck']['user_id'] ){
 echo $this->Html->link( " Add New Card ",   array('controller'=>'cards','action'=>'add' ,'?' => array('deck_id' => $deck_id )) ),'&nbsp';
 echo $this->Html->link( " Edit Deck ",   array('controller'=>'decks','action'=>'edit' ,'?' => array('deck_id' => $deck_id )) ),'&nbsp'; 
 echo $this->Html->link( " Delete Deck ",   array('controller'=>'decks','action'=>'delete' ,'?' => array('deck_id' => $deck_id ) ),
    array('confirm' => 'Are you sure you want to delete this Deck?') ),'&nbsp' ;	
 echo $this->SocialShare->link('facebook',__('Share on Facebook')); 
	}}
	}
	
	
	?>

	
<p></p>
<p></p>


        <legend></legend>
<?php foreach($cards as $card): ?>
 <div class="flip-container" ontouchstart="this.classList.toggle('hover');" id="card-container">
	<div class="flipper">

<?php
	$front = $card['Card']['frontpic'];
	$back = $card['Card']['backpic'];
	echo '<div>';
	echo	'<div class="front">';
	echo	 $card['Card']['front'];
	echo	'</div>';
	echo	'<div class="back">';
	echo	$card['Card']['back'];
	echo	'</div>';
	echo '</div>';
	echo '<div>';
	if($card['Card']['frontpic'] != null){
	echo	'<div class="front">';
	echo	 $this->Html->image($front, array('width' => '50px','alt'=>''));
	echo	'</div>';}
	if($card['Card']['backpic'] != null){
	echo	'<div class="back">';
	echo	$this->Html->image($back, array('width' => '50px','alt'=>''));
	echo	'</div>';}
	echo 	'</div>';
?>	

		</div>
</div>

<p></p>

<span style="margin-right:10px;"><?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?></span>
<?php echo $this->Paginator->numbers(array(   'class' => 'numbers'     )),'&nbsp';?>
<span style="margin-left:10px;"><?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?></span>


<p></p>
<div>
<?php 
	if($this->Session->check('Auth.User')){
	if( $role == 'a'){
	echo $this->Html->link( " Edit Card ",   array('controller'=>'cards','action'=>'edit' ,'?' => array('deck_id' => $deck_id , 'card_id' => $card['Card']['id'], )) ),'&nbsp&nbsp;' ;
	echo $this->Html->link( " Delete Card ",   array('controller'=>'cards','action'=>'delete' ,'?' => array('deck_id' => $deck_id , 'card_id' => $card['Card']['id'] )),
    array('confirm' => 'Are you sure you want to delete this Card?') );
	}else{
	if ($user_id == $decks['Deck']['user_id'] ){
	echo $this->Html->link( " Edit Card ",   array('controller'=>'cards','action'=>'edit' ,'?' => array('deck_id' => $deck_id , 'card_id' => $card['Card']['id'], )) ),'&nbsp&nbsp;'; 
	echo $this->Html->link( " Delete Card ",   array('controller'=>'cards','action'=>'delete' ,'?' => array('deck_id' => $deck_id , 'card_id' => $card['Card']['id'] )),
    array('confirm' => 'Are you sure you want to delete this Card?') );
	}}
	}?>


	
</div>

<?php endforeach; ?>



</body>