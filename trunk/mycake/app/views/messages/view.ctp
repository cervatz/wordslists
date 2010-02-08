<?php echo $html->link('/messages/mymessages', '/messages/mymessages');?>&nbsp;-&nbsp;
<?php echo $html->link('/messages/reply', '/messages/reply');?><br/><br/><br/>

<?php $mymessage = $session->read('Message');?>
Inviato da: <b><?=$mymessage['Mittente']['username'];?></b> il <b><?=$mymessage['Message']['date'];?></b>
<br /><br />
Oggetto: <b><?=$mymessage['Message']['object'];?></b>
<br /><br />
<?=$mymessage['Message']['text'];?>


