<?php echo $form->create('Wordslist');?>

<ul>
<li><?php echo $form->input('id'); ?></li>
<li><?php echo $form->input('name', array('class' => 'required', 'title' =>'name')); ?></li>
<li><?php echo $form->input('description', array('class' => 'required', 'title' =>'description')); ?></li>
<li>
	<?php echo $form->input('language_id1',array(  
        	'label' => __('label_language1', true),
        	'class' => 'required',
        	'type' => 'select',
        	'options'=>$languages,  
			'title'=>'label_language1',
			'empty' => __('value_select_language', true)       
     	));?>
</li>
<li>
	<?php echo $form->input('language_id2',array(  
        	'label' => __('label_language2', true),
        	'class' => 'required',
        	'type' => 'select',
        	'options'=>$languages,  
			'title'=>'label_language2',
			'empty' => __('value_select_language', true)
     	));?>
     	</li>
</ul>
<?php echo $form->end('Submit');?>
