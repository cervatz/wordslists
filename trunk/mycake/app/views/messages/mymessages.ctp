<p><?php echo $html->link('/messages/add', '/messages/add');?><br/><br/></p>

<table>
	<tr>
		<th><?php __('column_title_id') ?></th>
		<th><?php __('column_title_user_id1') ?></th>
		<th><?php __('column_title_object') ?></th>
		<th><?php __('column_title_date') ?></th>
		<th/>
		<th/>
		<th/>
	</tr>
	<?php foreach ($messages as $message): ?>
	<tr>
		<td><?=$message['Message']['id']; ?></td>
		<td><?=$message['User1']['first_name']; ?>&nbsp;<?=$message['User1']['last_name']; ?></td>
		<td><?=$message['Message']['object']; ?></td>
		<td><?=$message['Message']['date']; ?></td>
		
		<td>
			<? if ($message['Message']['new']=='1' ): echo $html->image("icons/favb.ico"); endif; ?>
		</td>
		
		<td><?=$html->link($html->image("icons/textfile.ico"), array('controller'=>'messages', 'action' => 'view', $message['Message']['id']), array('escape' => false));?></td>		
		<td><?=$html->link($html->image("icons/delete.ico"), array('controller'=>'messages', 'action' => 'delete', $message['Message']['id']), array('escape' => false));?></td>		
	</tr>
	<?php endforeach; ?>

</table>
