<div id='ajaxDiv'>
   <?php
      echo $ajax->form(array('type' => 'post',
                             'options' => array('model' => 'Line',
                                                'update' => 'ajaxDiv',
                                                'id' => 'form_id',
                                                'url' => array('controller' => 'ajax',
                                                               'action' => 'updateTable'))));
   ?>

<table>
<tr>
<th><?=$session->read('Wordslist.Language1.description')?></th>
<th><?=$session->read('Wordslist.Language2.description')?></th>

</tr>
<tr>
<td><?=$form->input('string1', array('label' => false, 'class' => 'required'));?></td>
<td><?=$form->input('string2', array('label' => false, 'class' => 'required'));?></td>
</tr>

</table>  

<?=$form->end(); ?>
   
</div>



<?php echo $ajax->div('dynamic1'); ?>
<span>
<table>
	<tr>
		<th><?=__('column_title_listid') ?></th>
		<th><?=__('column_title_id') ?></th>
		<th><?=__('column_title_string1') ?></th>
		<th><?=__('column_title_string2') ?></th>
		<th/>
	</tr>
	<?php foreach ($session->read('Wordslist.Line') as $line): ?>
	<tr>
		<td><?=$line['wordslist_id']; ?></td>
		<td><?=$line['id']; ?></td>
		<td><?=$line['string1']; ?></td>
		<td><?=$line['string2']; ?></td>
		<td><?=$html->link($html->image("icons/delete.ico"), array('controller'=>'ajax', 'action' => 'deleteLine', $line['id']), array('escape' => false));?></td>
	</tr>
	<?php endforeach; ?>

</table>
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

$("#LineString1").focus();

</script>


<?php echo $ajax->divEnd('dynamic1'); ?>



