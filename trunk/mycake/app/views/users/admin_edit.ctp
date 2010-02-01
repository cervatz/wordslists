<!-- TODO the add user and edit user are the same, use only one -->

<div class="users_edit">

<?php

if($user['User']['administrator']==1) $administratorChecked=true;
else $administratorChecked=false;

if($user['User']['public']==1) $publicChecked=true;
else $publicChecked=false;

?>

<?=$form->create('User', array('action' => 'edit'));?>
<li>	
	<ul><?=$form->input('id', array('value'=>$user['User']['id'])); ?></ul>
	<li><?=$form->input('username', array('label' => __('label_username', true), 'type'=>'text', 'value'=>$user['User']['username'])); ?> </li>
	<li><?=$form->input('password', array('label' => __('label_password', true), 'type'=>'text', 'value'=>$user['User']['password'])); ?> </li>
	
	<!-- TODO the administrator and public checkboxes do not work -->
	
	<li><?=$form->input('administrator', array('label' => __('label_administrator', true), 'type'=>'checkbox', 'checked'=>$administratorChecked)); ?> </li> 	
	<li><?=$form->input('public', array('label' => __('label_public', true), 'type'=>'checkbox', 'checked'=>$publicChecked)); ?> </li>
	<li><?=$form->input('first_name', array('label' => __('label_first_name', true), 'type'=>'text', 'value'=>$user['User']['first_name'])); ?> </li>
	<li><?=$form->input('last_name', array('label' => __('label_last_name', true), 'type'=>'text', 'value'=>$user['User']['last_name'])); ?> </li>	
	<li><?=$form->input('email', array('label' => __('label_email', true), 'type'=>'text', 'value'=>$user['User']['email'])); ?> </li>
	<li>
	<?=$form->input('country_id',array(  
        	'label' => __('label_country', true),
			'selected'=> $user['Country']['id'],
        	'type' => 'select',
        	'options'=>$countries,  
         	'empty'=>'no country'			  
     	));?>
	</li>	
	
	<?php 
	$arr = array(0, 1, 2, 3, 4);
	foreach ($arr as &$value) {		
		
		$selectedValue = '';
		if(!empty($user['Mother'][$value]['user_id'])) $selectedValue=$user['Mother'][$value]['language_id'];
		
		echo('<li>');
		echo $form->input('mother_language_id' . $value,array(  
        	'label' => __('label_mother_language', true),
			'selected'=> $selectedValue,
        	'type' => 'select',
        	'options'=>$languages,  
			'empty' => __('value_select_language', true),
     	));		
    	echo('</li>');
	}	
	?>

	<?php 
	$arr = array(0, 1, 2, 3, 4);
	foreach ($arr as &$value) {		
		
		$selectedValue = '';
		if(!empty($user['Practice'][$value]['user_id'])) $selectedValue=$user['Practice'][$value]['language_id'];
		
		echo('<li>');
		echo $form->input('practice_language_id' . $value,array(  
        	'label' => __('label_practice_language', true),
			'selected'=> $selectedValue,
        	'type' => 'select',
        	'options'=>$languages,  
			'empty' => __('value_select_language', true),
     	));		
    	echo('</li>');
	}	
	?>

	
</li>

<?php echo $form->end('Submit');?>
</div>
