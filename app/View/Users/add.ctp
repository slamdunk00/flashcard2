<!-- app/View/Users/add.ctp -->
<div class="users form">
 
<?php echo $this->Form->create('User');?>
    <fieldset>
        <legend><?php echo __('Add User'); ?></legend>
		<div align ="left">
		<table>
        <?php 

		echo '<tr>';
		echo '<td>';
		echo 'Username';
		echo '</td>';
		echo '<td>';
		echo $this->Form->input('username', array('label' => false));
		echo '</td>';
		echo '</tr>';
		
		echo '<tr>';
		echo '<td>';
		echo 'Email';
		echo '</td>';
		echo '<td>';
		echo $this->Form->input('email', array('label' => false));
		echo '</td>';
		echo '</tr>';
		
		echo '<tr>';
		echo '<td>';
		echo 'Password';
		echo '</td>';
		echo '<td>';
		echo $this->Form->input('password', array('label' => false));
		echo '</td>';
		echo '</tr>';
		
		echo '<tr>';
		echo '<td>';
		echo 'Confirm Password*';
		echo '</td>';
		echo '<td>';
		echo $this->Form->input('password_confirm', array('label' => false, 'maxLength' => 255, 'title' => 'Confirm password', 'type'=>'password'));
		echo '</td>';
		echo '</tr>';
		
		echo '<tr>';
		echo '<td>';
		echo 'First name';
		echo '</td>';
		echo '<td>';
		echo $this->Form->input('firstname', array('label' => false));
		echo '</td>';
		echo '</tr>';
		
		echo '<tr>';
		echo '<td>';
		echo 'Last name';
		echo '</td>';
		echo '<td>';
		echo $this->Form->input('lastname', array('label' => false));
		echo '</td>';
		echo '</tr>';
		if($this->Session->check('Auth.User')){
		if( $role == 'a'){
		echo '<tr>';
		echo '<td>';
		echo 'Role';
		echo '</td>';
		echo '<td>';
		echo $this->Form->input('category_id', array('label' => false, 'type' => 'select', 'empty' => 'select category','value' => 'u', 'options' => array(
    array('name' => 'Admin', 'value' => 'a'),
    array('name' => 'User', 'value' => 'u'),
 )));
		echo '</td>';
		echo '</tr>';
		}}
		
		echo '</table>';
		echo '</div>';

         
        echo $this->Form->submit('Add User', array('class' => 'form-submit',  'title' => 'Click here to add the user') ); 
		
?>

    </fieldset>
<?php echo $this->Form->end(); ?>
<?php 
if($this->Session->check('Auth.User')){
echo $this->Html->link( "Return to Dashboard",   array('action'=>'index') ); 
echo "<br>";
echo $this->Html->link( "Logout",   array('action'=>'logout') ); 
}else{
echo $this->Html->link( "Return to Login Screen",   array('action'=>'login') ); 
}
?>
</div>
