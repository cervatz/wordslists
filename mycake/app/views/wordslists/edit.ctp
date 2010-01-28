<div id='ajaxDiv'>
   <?php
      echo $ajax->form(array('type' => 'post',
                             'options' => array('model' => 'Line',
                                                'update' => 'ajaxDiv',
                                                'id' => 'form_id',
                                                'url' => array('controller' => 'wordslists',
                                                               'action' => 'updateTable'))));
   ?>
<?php echo $form->input('string1'); ?> 
<?php echo $form->input('string2'); ?>
<?php echo $ajax->submit('Submit', array('url' => '/wordslists/updateTable', 'update'=>'dynamic1')); ?>
<?php echo $form->end(); ?>
   
</div>


<?php echo $ajax->div('dynamic1'); ?>

<span>
<table>
	<tr>
		<th><?php __('column_title_listid') ?></th>
		<th><?php __('column_title_id') ?></th>
		<th><?php __('column_title_string1') ?></th>
		<th><?php __('column_title_string2') ?></th>
	</tr>
	<?php foreach ($wordslist['Line'] as $line): ?>
	<tr>
		<td><?php echo $line['wordslist_id']; ?></td>
		<td><?php echo $line['id']; ?></td>
		<td><?php echo $line['string1']; ?></td>
		<td><?php echo $line['string2']; ?></td>
	</tr>
	<?php endforeach; ?>

</table>
</span>
<?php echo $ajax->divEnd('dynamic1'); ?>



