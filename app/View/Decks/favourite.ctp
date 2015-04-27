<table>
	<thread>
		<th>User_id</th><th>deck_id</th>
	</thread>
	<?php foreach($favourite as $favourite); ?>
	<tr>
		<td><?php echo $favourite['favourites']['user_id'] ?></td>
		<td><?php echo $favourite['favourites']['deck_id'] ?></td>
	</tr>
</table>