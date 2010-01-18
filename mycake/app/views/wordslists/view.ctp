<table>
	<tr>
		<th><?php __('column_title_listid') ?></th>
		<th><?php __('column_title_id') ?></th>
		<th><?php __('column_title_string1') ?></th>
		<th><?php __('column_title_string2') ?></th>
	</tr>
	<?php foreach ($session->read('Wordslist.Line') as $line): ?>
	<tr>
		<td><?php echo $line['wordslist_id']; ?></td>
		<td><?php echo $line['id']; ?></td>
		<td><?php echo $line['string1']; ?></td>
		<td><?php echo $line['string2']; ?></td>
	</tr>
	<?php endforeach; ?>

</table>

