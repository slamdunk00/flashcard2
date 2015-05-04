<html>
<head>
<?php
echo $this->Html->css('card2.css');
?>
</head>
<body>
<h1>Edit Card</h1>
<?php echo $this->Form->create('Card', array('type' => 'file'));?>
    <fieldset>
  
        <?php
		echo $this->Form->hidden('deck_id', array('value' => $deck_id));		
		
		echo '<div align="center">';
		echo $this->Form->input('front', array('value' => $card['Card']['front']));
		echo $this->Form->input('frontpic_update', array('type' => 'file','label' => false, 'value' => ' ','class'=>'file'));
		echo '</div>';
		
		echo '<div align="center">';
        echo $this->Form->input('back', array('value' => $card['Card']['back']));
		echo $this->Form->input('backpic_update', array('type' => 'file','label' => false, 'value' => ' ','class'=>'file'));
		echo '</div>';
		
        echo $this->Form->submit('Edit Card', array('class' => 'form-submit',  'title' => 'Click here to add Card') ); 
		echo $this->Html->link("Back", array('action'=> 'index','?' => array('deck_id' => $deck_id )), array( 'class' => 'button'));
?>
    </fieldset>
<?php echo $this->Form->end(); ?>


</body>
</html>
