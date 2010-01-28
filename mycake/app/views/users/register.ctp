<div class="users_register">
<?=$form->create('User', array('action' => 'register'));?>
<ul>
	<li><?=$form->input('id'); ?></li>
	<li><?=$form->input('username', array('label' => __('label_username', true), 'type'=>'text', 'value'=>'', 'class' => 'required')); ?> </li>
	<li><?=$form->input('password', array('label' => __('label_password', true), 'type'=>'text', 'value'=>'', 'class' => 'required')); ?> </li>
	<li><?=$form->input('email', array('label' => __('label_email', true), 'type'=>'text', 'value'=>'', 'class' => 'required')); ?> </li>
</ul>

<?=$form->end('Submit');?>
</div>