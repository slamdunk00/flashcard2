<?php  echo 'This is Deck index.ctp';?>
<h1><?php echo $cat_name; ?></h1>

<table>
	<thread>
		<th>User_id</th><th>deck_id</th>
	</thread>
	<?php foreach($favourite as $favourite); ?>
	<tr>
		<td><?php echo $favourite['Favourites']['user_id'] ?></td>
		<td><?php echo $favourite['Favourites']['deck_id'] ?></td>
	</tr>
	<?php endforeach; ?>
</table>