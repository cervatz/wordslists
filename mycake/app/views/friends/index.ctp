<?php echo $html->link('/users/search', '/users/search');?>
<br /><br />
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
		<td><?php echo $friend['Richiesto']['username']; ?></td>
		<td><?php echo $friend['Richiesto']['first_name']; ?></td>
		<td><?php echo $friend['Richiesto']['last_name']; ?></td>		
		<td>
			<?php if ($friend['Friend']['status']==0): echo __('message_friend_request'); endif;?>
			<?php if ($friend['Friend']['status']==1): echo __('message_friend'); endif;?>
		</td>		
		<td>
			<? if ($friend['Friend']['status']==1): echo $html->link($html->image("icons/chat.ico"), array('controller'=>'messages', 'action' => 'add', $friend['Richiesto']['id']), array('escape' => false)); endif;?>
		</td>
	</tr>
	<?php endforeach; ?>
</table>

<?php if (count($requests)>0) { ?>

Qualcuno ha richiesto la tua amicizia:

<table>
	<tr>	
		<th><?php __('column_title_username') ?></th>
		<th><?php __('column_title_first_name') ?></th>
		<th><?php __('column_title_last_name') ?></th>	
		<th><?php __('column_title_confirm') ?></th>	
	</tr>
	<?php foreach ($requests as $request): ?>
	<tr>		
		<td><?php echo $request['Richiedente']['username']; ?></td>
		<td><?php echo $request['Richiedente']['first_name']; ?></td>
		<td><?php echo $request['Richiedente']['last_name']; ?></td>	
		<td><?=$html->link($html->image("icons/adduser.ico"), array('controller'=>'friends', 'action' => 'confirm', $request['Richiedente']['id'], $request['Friend']['id']), array('escape' => false));?></td>			
	</tr>	
	<?php endforeach; ?>
</table>	

<?php } ?>