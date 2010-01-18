<?php echo $form->create(array('controller' => 'search','action' => 'searchPublic'));?>
<ul>
<li>
	<?php echo $form->input('language_id1',array(  
        	'label' => __('label_language1', true),
        	'type' => 'select',
        	'options'=>$languages,  
         	'empty' => __('value_select_language', true),		
			'selected' => $language_id1	  
     	));?>
</li>
<li>
	<?php echo $form->input('language_id2',array(  
        	'label' => __('label_language2', true),
        	'type' => 'select',
        	'options'=>$languages,  
         	'empty' => __('value_select_language', true),
			'selected'=> $language_id2			  
     	));?>
     	</li>
</ul>
<?php echo $form->end('Submit');?>


<?php if(!empty($wordslists)) {?>

<table>
	<tr>
		<th><?php __('column_title_id') ?></th>
		<th><?php __('column_title_description') ?></th>
		<th><?php __('column_title_language1') ?></th>
		<th><?php __('column_title_language2') ?></th>
		<th><?php __('column_title_number_lines') ?></th>
		<th/>
		<th/>		
	</tr>
	<?php foreach ($wordslists as $wordslist): ?>
	<tr>
		<td><?php echo $wordslist['Wordslist']['id']; ?></td>
		<td><?php echo $wordslist['Wordslist']['description']; ?></td>
		<td><?php echo $wordslist['Language1']['description']; ?></td>
		<td><?php echo $wordslist['Language2']['description']; ?></td>
		<td><?php echo count($wordslist['Line']); ?></td>
		<td><?php echo $html->link($html->image("icons/textfile.ico"), array('controller'=>'wordslists', 'action' => 'view', $wordslist['Wordslist']['id']), array('escape' => false));?></td>		
		<td><?=$html->link('copy', array('controller'=>'wordslists', 'action' => 'practice', $wordslist['Wordslist']['id']), array('escape' => false));?></td>
	</tr>
	<?php endforeach; ?>

</table>

<?php }?>
