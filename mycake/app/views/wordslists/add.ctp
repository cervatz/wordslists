<?php echo $form->create('Wordslist');?>

<ul>
<li><?php echo $form->input('id'); ?></li>
<li><?php echo $form->input('name'); ?></li>
<li><?php echo $form->input('description'); ?></li>
<li>
	<?php echo $form->input('language_id1',array(  
        	'label' => __('label_language1', true),
        	'type' => 'select',
        	'options'=>$languages,  
			'empty' => __('value_select_language', true)       
     	));?>
</li>
<li>
	<?php echo $form->input('language_id2',array(  
        	'label' => __('label_language2', true),
        	'type' => 'select',
        	'options'=>$languages,  
			'empty' => __('value_select_language', true)
     	));?>
     	</li>
</ul>
<?php echo $form->end('Submit');?>
