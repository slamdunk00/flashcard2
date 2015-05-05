<?php 
echo $this->Form->create('Favourite');
echo '<fieldset>';
echo $this->Form->hidden('user_id', array('value' => $user_id));
echo $this->Form->hidden('deck_id', array('value' => $deck_id));
echo $this->Form->submit('add Fav', array('class' => 'form-submit',  'title' => 'Click here to add the user') );  
echo '</fieldset>';
echo $this->Form->end(); 
?>