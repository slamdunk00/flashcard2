<!-- app/View/Users/add.ctp -->
<h1>Edit User</h1>
<div class="users form">
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <?php 
		echo '<div align="left">';
		echo '<table>';
		echo '<tr>';
		echo '<td>';
		echo 'Usernames ( cannot be changed! )';
		echo '</td>';
		echo '<td>';
		echo $this->Form->input('username', array( 'readonly' => 'readonly', 'label' => false));
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
		echo 'New Password (leave empty if you do not want to change)';
		echo '</td>';
		echo '<td>';
		echo $this->Form->input('password_update', array( 'label' => false, 'maxLength' => 255, 'type'=>'password','required' => 0));
		echo '</td>';
		echo '</tr>';
		
		echo '<tr>';
		echo '<td>';
		echo 'Confirm New Password *';
		echo '</td>';
		echo '<td>';
		echo $this->Form->input('password_confirm_update', array('label' => false, 'maxLength' => 255, 'title' => 'Confirm New password', 'type'=>'password','required' => 0));
		echo '</td>';
		echo '</tr>';

		echo '</table>';
		echo '</div>';
        echo $this->Form->hidden('id', array('value' => $this->data['User']['id']));

		
		/* if($user['users']['role']=='a'){
			echo $this->Form->input('role', array(
					'options' => array( 'a' => 'Admin', 'u' => 'User')
			));
		} */
		echo $this->Form->submit('Edit User', array('class' => 'form-submit',  'title' => 'Click here to add the user') ); 
?>
    </fieldset>
<?php echo $this->Form->end(); ?>
</div>
<br/>

<?php 

echo '<br/>';
echo $this->Html->link( "Logout",   array('action'=>'logout') ); 
?>