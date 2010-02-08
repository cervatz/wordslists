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

<?php
//Se la lista degli amici è composta da un solo nominativo mi posiziono direttamente su quello

if (count($users)>1) {
	echo $form->input('user_id2',array(  
		'label' => __('label_user_id2', true),
		'class' => 'required',
		'type' => 'select',
		'options'=>$users,  
		'empty' => __('value_select_user', true)       
	));
} else {
	$myarray = array_keys($users);
	echo $form->input('user_id2', array('type' => 'hidden', 'value' => $myarray[0]));
	echo 'Invia un messagio a: '.$users[$myarray[0]];
}

?>

<br />

<?php echo $form->input('object', array('class' => 'required', 'value' => $messaggeObject)); ?>
<?php echo $form->input('text', array('class' => 'required')); ?>

<?php echo $form->end();?>

</div>