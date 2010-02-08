<?php $mymessage = $session->read('Message');?>

Rispondi a: <b><?=$mymessage['Mittente']['username'];?></b>

<?php echo $form->create('Message');?>

<ul>
<li><?php echo $form->input('id'); ?></li>
<li><?php echo $form->input('user_id2', array('class' => 'required', 'type' => 'hidden', 'value' => $mymessage['Message']['user_id1'])); ?></li>
<li><?php echo $form->input('object', array('class' => 'required', 'value' => 'Re: '.$mymessage['Message']['object'])); ?></li>
<li><?php echo $form->input('text', array('class' => 'required')); ?></li>

</ul>
<?php echo $form->end('Submit');?>
