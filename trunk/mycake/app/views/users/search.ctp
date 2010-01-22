<?php echo $form->create(array('controller' => 'users','action' => 'search'));?>
<ul>
<li><?php echo $form->input('searchField', array('class' => 'required')); ?></li>
</ul>
<?php echo $form->end('Submit');?>

<?php if(!empty($users)) {?>

<table>
	<tr>
		<th><?php __('column_title_username') ?></th>
		<th><?php __('column_title_first_name') ?></th>
		<th><?php __('column_title_last_name') ?></th>		
		<th><?php __('column_title_country') ?></th>
		<th><?php __('column_title_created') ?></th>
		<th><?php __('column_title_number_wordslists') ?></th>
		 	
	</tr>
	<?php foreach ($users as $user): ?>
	<tr>
		<td><?php echo $user['User']['username']; ?></td>
		<td><?php echo $user['User']['first_name']; ?></td>
		<td><?php echo $user['User']['last_name']; ?></td>		
		<td><?php echo $user['Country']['description']; ?></td>
		<td><?php echo $user['User']['created']; ?></td>
		<td><?php echo count($user['Wordslist']); ?></td>
		
	</tr>
	<?php endforeach; ?>

</table>

<?php }?>
