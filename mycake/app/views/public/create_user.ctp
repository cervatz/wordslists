<div id="create_user">
<h1>Add User</h1>
<?php echo $form->create(null, array('url' => array('controller' => 'public','action' => 'createUser'))); ?>

<ul>
	<li><?php echo $form->input('id'); ?></li>
	<li><?php echo $form->input('username'); ?></li>
	<li><?php echo $form->input('password'); ?></li>
	<li><?php echo $form->input('first_name'); ?></li>
	<li><?php echo $form->input('last_name'); ?></li>
	<li><?php echo $form->end('Submit');?></li>
</ul>
</div>