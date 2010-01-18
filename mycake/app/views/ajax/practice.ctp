<div id='ajaxDiv'>
   <?=$ajax->form(array('type' => 'post',
                             'options' => array('model' => 'Line',
                                                'update' => 'ajaxDiv',
                                                'id' => 'form_id',
                                                'url' => array('controller' => 'ajax',
                                                               'action' => 'checkLine'))));
   ?>

<?=$form->input('id', array('label' => false,'type' => 'hidden', 'value' => $myLine['id']));?>

<table>
<tr>
<th><?=$session->read('Wordslist.Language1.description')?></th>
<th><?=$session->read('Wordslist.Language2.description')?></th>
</tr>
<tr>
<td><?=$form->input('string1', array('label' => false,'value' => $myLine['string1']));?></td>
<td><?=$form->input('string2', array('label' => false,'value' => ''));?></td>
</tr>

</table>  

<?=$form->end(); ?>
   
</div>


<?php echo $ajax->div('dynamic1'); ?>
<span>
</span>

<script type="text/javascript">

// Show the growl message

<?php 
if(!empty($growlStatus) and !empty($growlMessage)){
	if($growlStatus=="ok") e("growlSuccess('" . $growlMessage ."');");
	else if($growlStatus=="ko") e("growlError('" . $growlMessage ."');");
}
?>

//Give the focus to the first input text field

$("#LineString2").focus();

</script>

<?php echo $ajax->divEnd('dynamic1'); ?>
