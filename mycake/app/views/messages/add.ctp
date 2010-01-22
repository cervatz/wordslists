<?php echo $form->create('Message');?>

<ul>
<li><?php echo $form->input('id'); ?></li>

<li>
	<?php echo $form->input('user_id2',array(  
        	'label' => __('label_user_id2', true),
        	'class' => 'required',
        	'type' => 'select',
        	'options'=>$users,  
			'empty' => __('value_select_user', true)       
     	));?>
</li>

<li><?php echo $form->input('object', array('class' => 'required')); ?></li>
<li><?php echo $form->input('text', array('class' => 'required')); ?></li>

</ul>
<?php echo $form->end('Submit');?>
