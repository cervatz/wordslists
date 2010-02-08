<?php 
	$mymessage = $session->read('Message');
	$messaggeObject = '';
	if ($mymessage['Message']['object']!=null) {
		$messaggeObject = 'Re: '.$mymessage['Message']['object'];
	}
?>

<div id="dialog" title="Invio messaggio">

<?php echo $form->create('Message');?>

<ul>
<?php echo $form->input('id'); ?>

<?php echo $form->input('user_id2',array(  
	'label' => __('label_user_id2', true),
	'class' => 'required',
	'type' => 'select',
	'options'=>$users,  
	'empty' => __('value_select_user', true)       
));?>

<?php echo $form->input('object', array('class' => 'required', 'value' => $messaggeObject)); ?>
<?php echo $form->input('text', array('class' => 'required')); ?>

<?php echo $form->end();?>

</div>