<?php  echo 'This is Deck favourite.ctp';?>

<table>
	<thread>
		<th>Deck ID</th><th></th>
	</thread>
	<?php foreach($favourite as $favourites): ?>
	<tr>
		<td><?php echo $favourites['Favourite']['deck_id'];?></td>
	</tr>
	<?php endforeach; ?>
</table>