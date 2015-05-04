<html>
<head>
<?php
echo $this->Html->css('card2.css');
?>
</head>
<body>
<h1>Add Card</h1>

<?php 

echo $this->Form->create('Card', array('type' => 'file'));?>
    <fieldset>
        <?php 
		echo $this->Form->input('front');
		echo '<div align="center" width="50%">';
		echo $this->Form->input('frontpic_update', array('type' => 'file','label' => false,'class'=>'file'));
		echo $this->Form->hidden('deck_id', array('value' => $deck_id));
		echo '</div>';
		echo '<div align="center">';
        echo $this->Form->input('back');
		echo $this->Form->input('backpic_update', array('type' => 'file','label' => false,'class'=>'file'));
		echo '</div>';
        echo $this->Form->submit('Add Card', array('class' => 'form-submit',  'title' => 'Click here to add Card') ); 
		echo $this->Html->link("Back", array('action'=> 'index','?' => array('deck_id' => $deck_id )), array( 'class' => 'button'));
?>
    </fieldset>
<?php echo $this->Form->end(); ?>


</body>
</html>