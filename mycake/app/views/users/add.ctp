<!-- TODO the add user and edit user are the same, use only one -->

<div class="users_add">
<?=$form->create('User');?>
<ul>	
	<li><?=$form->input('id'); ?></li>
	<li><?=$form->input('username', array('label' => __('label_username', true), 'type'=>'text', 'value'=>'', array('class' => 'required'))); ?> </li>
	<li><?=$form->input('password', array('label' => __('label_password', true), 'type'=>'text', 'value'=>'', array('class' => 'required'))); ?> </li>
	<li><?=$form->input('administrator', array('label' => __('label_administrator', true), 'type'=>'checkbox', 'value'=>'', array('class' => 'required'))); ?> </li> 	
	<li><?=$form->input('public', array('label' => __('label_public', true), 'type'=>'checkbox', 'value'=>'', array('class' => 'required'))); ?> </li>
	<li><?=$form->input('first_name', array('label' => __('label_first_name', true), 'type'=>'text', 'value'=>'', array('class' => 'required'))); ?> </li>
	<li><?=$form->input('last_name', array('label' => __('label_last_name', true), 'type'=>'text', 'value'=>'', array('class' => 'required'))); ?> </li>	
	<li><?=$form->input('email', array('label' => __('label_email', true), 'type'=>'text', 'value'=>'', array('class' => 'required'))); ?> </li>
	<li>
	<?=$form->input('country_id',array(  
        	'label' => __('label_country', true),
        	'type' => 'select',
			'class' => 'required',
        	'options'=>$countries,  
			'empty' => __('value_select_country', true),
     	));?>     	
	</li>
	
	<?php 
	$arr = array(0, 1, 2, 3, 4);
	foreach ($arr as &$value) {
		echo('<li>');
		echo $form->input('mother_language_id' . $value,array(  
        	'label' => __('label_mother_language', true),
        	'type' => 'select',
			'class' => 'required',
        	'options'=>$languages,  
			'empty' => __('value_select_language', true),
     	));		
    	echo('</li>');
	}	
	?>

	<?php 
	$arr = array(0, 1, 2, 3, 4);
	foreach ($arr as &$value) {
		echo('<li>');
		echo $form->input('practice_language_id' . $value,array(  
        	'label' => __('label_practice_language', true),
        	'type' => 'select',
			'class' => 'required',
        	'options'=>$languages,  
			'empty' => __('value_select_language', true),
     	));		
    	echo('</li>');
	}	
	?>
	
</ul>

<?=$form->end('Submit');?>
</div>