

<?php echo $this->Form->create('Card');?>
    <fieldset>
        <legend><?php echo __('Add Card'); ?></legend>
        <?php echo $this->Form->input('front');
		echo $this->Form->hidden('deck_id', array('value' => $deck_id));
        echo $this->Form->input('back');
		//echo $this->Form->input('category_id');
        echo $this->Form->submit('Add Card', array('class' => 'form-submit',  'title' => 'Click here to add Card') ); 
?>
    </fieldset>
<?php echo $this->Form->end(); ?>



