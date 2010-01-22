<?php // debug($users);?>

<p><?php echo $html->link('/users/add', '/users/add');?>&nbsp;-&nbsp;<?php echo $html->link('/users/search', '/users/search');?><br/><br/></p>

<table>
	<tr>
		<th><?php __('column_title_username') ?></th>
		<th><?php __('column_title_first_name') ?></th>
		<th><?php __('column_title_last_name') ?></th>
		
		<th><?php __('column_title_administrator') ?></th>
		<th><?php __('column_title_public') ?></th>
		<th><?php __('column_title_email') ?></th>
		<th><?php __('column_title_country') ?></th>
		<th><?php __('column_title_created') ?></th>
		<th><?php __('column_title_number_wordslists') ?></th>
		 	
		<th/>
		<th/>
		<th/>
	</tr>
	<?php foreach ($users as $user): ?>
	<tr>
		<td><?php echo $user['User']['username']; ?></td>
		<!-- td><?php echo $user['User']['password']; ?></td-->
		<td><?php echo $user['User']['first_name']; ?></td>
		<td><?php echo $user['User']['last_name']; ?></td>
		
		<td><?php echo $user['User']['administrator']; ?></td>
		<td><?php echo $user['User']['public']; ?></td>
		<td><?php echo $user['User']['email']; ?></td>
		<td><?php echo $user['Country']['description']; ?></td>
		<td><?php echo $user['User']['created']; ?></td>
		<td><?php echo count($user['Wordslist']); ?></td>
		
		<td><?php echo $html->link($html->image("icons/user.ico"), array('controller'=>'users', 'action' => 'view', $user['User']['id']), array('escape' => false));?></td>		
		<td><?php echo $html->link($html->image("icons/edit.ico"), array('controller'=>'users', 'action' => 'edit', $user['User']['id']), array('escape' => false));?></td>
		<td><?php echo $html->link($html->image("icons/deleteuser.ico"), array('controller'=>'users', 'action' => 'delete', $user['User']['id']), array('escape' => false));?></td>
	</tr>
	<?php endforeach; ?>

</table>
