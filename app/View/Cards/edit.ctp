
<h1>Edit Card</h1>
<?php echo $this->Form->create('Card');?>
    <fieldset>
  
        <?php
		echo $this->Form->hidden('deck_id', array('value' => $deck_id));		
		echo $this->Form->input('front', array('value' => $card['Card']['front']));
        echo $this->Form->input('back', array('value' => $card['Card']['back']));
		//echo $this->Form->input('category_id');
        echo $this->Form->submit('Add Card', array('class' => 'form-submit',  'title' => 'Click here to add Card') ); 
		echo $this->Html->link("Back", array('action'=> 'index','?' => array('deck_id' => $deck_id )), array( 'class' => 'button'));
?>
    </fieldset>
<?php echo $this->Form->end(); ?>



