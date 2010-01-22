<?php $mymessage = $session->read('Message');?>
Inviato da: <b><?=$mymessage['User1']['username'];?></b> il <b><?=$mymessage['Message']['date'];?></b>
<br /><br />
Oggetto: <b><?=$mymessage['Message']['object'];?></b>
<br /><br />
<?=$mymessage['Message']['text'];?>


