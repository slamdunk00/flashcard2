<?php 
	// echo 'This is Deck index.ctp';
	// echo $this->Form->create('Properties', array('type' => 'get'));
	echo '<h1>'.$cat_name.'</h1>';

	if($this->Session->check('Auth.User')){
	if( $role == 'a'){
	echo $this->Html->link( "Add New Deck",   array('action'=>'add' ) ),'&nbsp&nbsp&nbsp';
	echo $this->Html->link( "Edit Category",   array('controller'=>'category','action'=>'edit' ,'?' => array('cat_id' => $cat_id, 'cat_name' => $cat_name )) ),'&nbsp&nbsp&nbsp'; 
	echo $this->Html->link( "Delete Category",   array('controller'=>'category','action'=>'delete' ,'?' => array('cat_id' => $cat_id, 'cat_name' => $cat_name ) ),
    array('confirm' => 'Are you sure you want to delete this Deck?') ),'&nbsp';
	}
	}
	echo '<p></p>'
?>


<?php 

	foreach($decks as $deck):
	echo '<u>';
	echo $this->Html->link( $deck['Deck']['name'],   array('controller'=>'cards','action'=>'index', '?' => array('deck_id' => $deck['Deck']['id'] )  ));
	echo '</u>';
	foreach($users as $user):
	if($deck['Deck']['user_id'] == $user['User']['id']){
		echo ' by '.$user['User']['firstname'].'<br/>';
	}
	endforeach;

	//echo $users['User']['firstname'];	
	endforeach;
?>
<span style="margin-right:10px;"><?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?></span>
<?php echo $this->Paginator->numbers(array(   'class' => 'numbers'     ));?>
<span style="margin-left:10px;"><?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?></span>


<?php 

?>
