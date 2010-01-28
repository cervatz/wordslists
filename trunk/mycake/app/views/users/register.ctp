<div class="users_register">
<?=$form->create('User', array('action' => 'register'));?>
<ul>
	<li><?=$form->input('id'); ?></li>
	<li><?=$form->input('username', array('label' => __('label_username', true), 'type'=>'text', 'value'=>'', 'name' => 'username')); ?> </li>
	<li><?=$form->input('password', array('label' => __('label_password', true), 'type'=>'password', 'value'=>'', 'name' => 'password')); ?> </li>
	<li><?=$form->input('password2', array('label' => __('label_password_again', true), 'type'=>'password', 'value'=>'', 'name' => 'password2')); ?> </li>
	<li><?=$form->input('email', array('label' => __('label_email', true), 'type'=>'text', 'value'=>'', 'name' => 'email')); ?> </li>
</ul>

<?=$form->end('Submit');?>
</div>