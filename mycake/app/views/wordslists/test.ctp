<p><?php echo $html->link('/wordslists/add', '/wordslists/add');?><br/><br/></p>

<table>
	<tr>
		<th><?php __('column_title_id') ?></th>
		<th><?php __('column_title_description') ?></th>
		<th><?php __('column_title_language1') ?></th>
		<th><?php __('column_title_language2') ?></th>
		<th><?php __('column_title_number_lines') ?></th>
		<th/>
		<th/>
		<th/>		
	</tr>
	<?php foreach ($wordslists as $wordslist): ?>
	<tr>
		<td><?php echo $wordslist['Wordslist']['id']; ?></td>
		<td><?php echo $wordslist['Wordslist']['description']; ?></td>
		<td><?php echo $wordslist['Language1']['description']; ?></td>
		<td><?php echo $wordslist['Language2']['description']; ?></td>
		<td><?php echo count($wordslist['Line']); ?></td>
		<td><?php echo $html->link($html->image("icons/textfile.ico"), array('controller'=>'wordslists', 'action' => 'view', $wordslist['Wordslist']['id']), array('escape' => false));?></td>		
		<td><?php echo $html->link($html->image("icons/edit.ico"), array('controller'=>'wordslists', 'action' => 'edit', $wordslist['Wordslist']['id']), array('escape' => false));?></td>
		<td><?php echo $html->link($html->image("icons/delete.ico"), array('controller'=>'wordslists', 'action' => 'delete', $wordslist['Wordslist']['id']), array('escape' => false));?></td>		
	</tr>
	<?php endforeach; ?>

</table>

