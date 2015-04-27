<?php echo $this->Form->create('Deck');?>
    <fieldset>
        <legend><?php echo __('Add Deck'); ?></legend>
        <?php 
		echo $this->Form->hidden('id', array('value' => $deck_id));
		echo $this->Form->hidden('user_id', array('value' => $user_id));
		//echo $this->Form->hidden('category_id', array('value' => 2));?>
		
		<table align="center" border="0">
		
		<tr>
  <td>
  <p>name</p>
  </td>
    <td>
  <p><?php echo $this->Form->text('name', array('label' => false, 'cols' => '12', 'rows' => '1')); ?></p>
  </td>
  </tr>
  
   <tr>
  <td>
  <p>description</</p>
  </td>
    <td>
  <p><?php echo $this->Form->textarea('description', array('label' => false, 'cols' => '20', 'rows' => '3')); ?></p>
  </td>
  </tr>
  

     <tr>
  <td>
  <p>category</p>
  </td>
    <td>
  <p><?php echo $this->Form->input('category_id', array('label' => false, 'type' => 'select', 'empty' => 'select category', 'options' => $category)); ?></p>
  </td>
  </tr>
</table>
       <?php echo $this->Form->submit('Edit Deck', array('class' => 'form-submit',  'title' => 'Click here to add the user') );  ?>
    </fieldset>
<?php echo $this->Form->end(); ?>




