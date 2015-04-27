<body>
<div class="users form">
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User'); ?>
<?php
		// echo $this->Html->css('style2.css');
		// echo $this->fetch('css');
?>

    <fieldset>
	<div class="block">
			<div class="header">
				<div class="header2">
					<h2>Login</h2>
				</div>
				
			</div>
			
			<div class="login-signup">
				<div class="form">
						<?php 
							echo $this->Form->input('username');
							echo $this->Form->input('password');
						?>
						<?php echo $this->Form->end(__('Login')); ?>
						<?php
							echo $this->Html->link(
								'<input type="button" value="Sign Up">',
									[
										'action' => 'add',
									],
									[
										'escape' => FALSE
									]
									// array('action'=>'add'),array('escape' => false) );
							);
						?>
				</div>
				
				<div class="connect">
					<h4>or connect with</h4>
					<img src="images/social-facebook-box-blue-icon.png" width="40px" height="40px">
					<img src="images/Google_Plus_logo.png" width="34px" height="34px">
				</div>
			</div>
			
		</div>
    </fieldset>
</div>
</body>