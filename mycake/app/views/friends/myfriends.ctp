<table>
	<tr>
		<th><?php __('column_title_username') ?></th>
		<th><?php __('column_title_first_name') ?></th>
		<th><?php __('column_title_last_name') ?></th>		
		<th><?php __('column_title_status') ?></th>
		<th><?php __('column_title_message') ?></th>		
	</tr>
	<?php foreach ($friends as $friend): ?>
	<tr>
		<td><?php echo $friend['User2']['username']; ?></td>
		<td><?php echo $friend['User2']['first_name']; ?></td>
		<td><?php echo $friend['User2']['last_name']; ?></td>		
		<td>
			<?php if ($friend['Friend']['status']==0): echo __('message_friend_request'); endif;?>
			<?php if ($friend['Friend']['status']==1): echo __('message_friend'); endif;?>
		</td>		
		<td>
			<? if ($friend['Friend']['status']==1): echo $html->link($html->image("icons/chat.ico"), array('controller'=>'messages', 'action' => 'add', $friend['User2']['id']), array('escape' => false)); endif;?>
		</td>
	</tr>
	<?php endforeach; ?>

</table>