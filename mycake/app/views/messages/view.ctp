<?php $mymessage = $session->read('Message');?>

<?php echo $html->link('/messages/mymessages', '/messages/mymessages');?>&nbsp;-&nbsp;Reply:
<?php echo $html->link($html->image("icons/chat.ico"), array('controller'=>'messages', 'action' => 'add', $mymessage['Mittente']['id']), array('escape' => false));?><br/><br/><br/>

Inviato da: <b><?=$mymessage['Mittente']['username'];?></b> il <b><?=$mymessage['Message']['date'];?></b>
<br /><br />
Oggetto: <b><?=$mymessage['Message']['object'];?></b>
<br /><br />
<?=$mymessage['Message']['text'];?>


