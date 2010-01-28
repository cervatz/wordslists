<div class="users_register">
<?=$form->create('User', array('action' => 'register'));?>
<ul>
	<li><?=$form->input('id', array('label' => __('label_id', true), 'type'=>'hidden', 'value'=>'', 'id' => 'id', 'name' => 'id')); ?> </li>
	<li><?=$form->input('username', array('label' => __('label_username', true), 'type'=>'text', 'value'=>'', 'id' => 'username', 'name' => 'username')); ?> </li>
	<li><?=$form->input('password', array('label' => __('label_password', true), 'type'=>'password', 'value'=>'', 'id' => 'password', 'name' => 'password')); ?> </li>
	<li><?=$form->input('password2', array('label' => __('label_password_again', true), 'type'=>'password', 'value'=>'', 'id' => 'password2', 'name' => 'password2')); ?> </li>
	<li><?=$form->input('email', array('label' => __('label_email', true), 'type'=>'text', 'value'=>'', 'id' => 'email', 'name' => 'email')); ?> </li>
</ul>

<?=$form->end('Submit');?>
</div>