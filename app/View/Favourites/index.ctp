<?php  echo 'This is Deck favourite.ctp';?>

<table>
	<thread>
		<th>Deck ID</th><th></th>
	</thread>
	<?php foreach($deck_fav as $deck_fav): ?>
	<tr>
		<td><?php echo $deck_fav['Deck']['name'];?></td>
	</tr>
	<?php endforeach; ?>
</table>