<div class="login">
<h2>Login</h2>        

<?php echo $form->create('User', array('action' => 'login'));?>
<ul>
	<li><?php echo $form->input('username', array('label' => __('label_username', true), 'type'=>'text', 'value'=>'')); ?> </li> 
	<li><?php echo $form->password('password', array(array('label' => __('label_password'), true). 'type'=>'text', 'value'=>'')); ?></li>
</ul>
<?php echo $form->end('Submit');?>    

<?php echo $html->link('/users/register', '/users/register');?>    
    
</div> 


