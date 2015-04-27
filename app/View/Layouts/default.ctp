<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		FlashCard WebTech
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		// echo $this->Html->meta('icon');
		echo $this->Html->css('bootstrap.css');
		echo $this->Html->css('style2.css');
		echo $this->Html->css('MyFlip.css');
		echo $this->Html->script('jquery.js');
		echo $this->Html->script('flip.js');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div class="container-fluid" id="container">
	<div class="text-center">
		<div id="header">
			<?php
				if($this->Session->check('Auth.User')){
					// echo $this->Html->link( " HOME ",   array('controller'=>'decks','action'=>'index') ); 
					// if( $role == 'a'){
						// echo '|';
						// echo $this->Html->link( " Mange User ",   array('controller'=>'users','action'=>'index') ); 
					// }
					echo 'Welcome, '.$firstname;
					echo ' | ';
					echo $this->Html->link( "   Logout",   array('controller'=>'users','action'=>'logout') ); 
				}
			?>
		</div>
		
		<?php 
			if($this->Session->check('Auth.User')){
				echo '<div id="sidebar">';
				echo '<span>Category</span><ul>';
				foreach ($Last5Cat as $cat):
				echo '<li><p>'.$this->Html->link( $cat['Category']['name'],   array('controller'=>'decks','action'=>'index', '?' => array('cat_id' => $cat['Category']['id'], 'cat_name' => $cat['Category']['name'] ) ) ) .'</p></li>';
				endforeach;
				echo '</ul>';
				echo '<span>Profile</span><ul>';
				
				echo'<li><p>'.$this->Html->link( " HOME ",   array('controller'=>'decks','action'=>'index') ).'</p></li>'; 
				if( $role == 'a'){
					echo '<li><p>'.$this->Html->link( " Mange User ",   array('controller'=>'users','action'=>'index') ).'</p></li>'; 
				}
				echo '<li><p>'.$this->Html->link( " Add New Deck ",   array('controller'=>'decks','action'=>'add') ).'</p></li>';
				echo '<li><p>'.$this->Html->link( " All My Deck ",   array('controller'=>'decks','action'=>'index', $user_id ) ).'</p></li>';
				echo '<li><p>'.$this->Html->link( " Favourite ",   array('controller'=>'decks','action'=>'favourite', $user_id ) ).'</p></li>';
				echo '<li><p>'.$this->Html->link( " Achievement ",   array('controller'=>'achievements','action'=>'index', $user_id ) ).'</p></li>';
				echo '<li><p>'.$this->Html->link( " Edit Profile ",   array('controller'=>'users','action'=>'edit', $user_id ) ).'</p></li>';
				echo '</ul></div>';
			}
		?>

		<div id="content" <?php if($this->Session->check('Auth.User')){echo 'style="width:80%;"';}?>>

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		
		
		</div>
		
		<div id="footer">
		</div>
	</div>
	</div>
	<?php //echo $this->element('sql_dump'); ?>
</body>
</html>
