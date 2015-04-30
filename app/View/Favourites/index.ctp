<?php  echo 'This is Deck favourite.ctp';?>

<table>
	<thread>
		<th>Deck ID</th><th></th>
	</thread>
	<?php foreach($deck[user_id] as $decks): ?>
	<tr>
		<td><?php echo $decks['Deck']['name'];?></td>
	</tr>
	<?php endforeach; ?>
</table>