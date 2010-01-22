
<p><?php echo $html->link('/wordslists/add', '/wordslists/add');?><br/><br/></p>

<table>
	<tr>
		<th><?php __('column_title_id') ?></th>
		<th><?php __('column_title_name') ?></th>
		<th><?php __('column_title_language1') ?></th>
		<th><?php __('column_title_language2') ?></th>
		<th><?php __('column_title_number_lines') ?></th>
		<th><?php __('column_title_shared') ?></th>
		<th/>
		<th/>
		<th/>		
		<th/>
		<th/>
	</tr>
	<?php foreach ($wordslists as $wordslist): ?>
	<tr>
		<td><?=$wordslist['Wordslist']['id']; ?></td>
		<td><?=$wordslist['Wordslist']['name']; ?></td>
		<td><?=$wordslist['Language1']['description']; ?></td>
		<td><?=$wordslist['Language2']['description']; ?></td>
		<td><?=count($wordslist['Line']); ?></td>
		<td><?=$wordslist['Wordslist']['shared']; ?></td>
		<td><?=$html->link($html->image("icons/textfile.ico"), array('controller'=>'wordslists', 'action' => 'view', $wordslist['Wordslist']['id']), array('escape' => false));?></td>		
		<td><?=$html->link($html->image("icons/edit.ico"), array('controller'=>'wordslists', 'action' => 'edit', $wordslist['Wordslist']['id']), array('escape' => false));?></td>
		<td>
			<?if (count($wordslist['Line'])>0): echo $html->link('practice', array('controller'=>'wordslists', 'action' => 'practice', $wordslist['Wordslist']['id']), array('escape' => false)); endif;?>
		</td>
		<td>
			<?php
				if($wordslist['Wordslist']['shared'] == 1) echo $html->link('unshare', array('controller'=>'wordslists', 'action' => 'unshare', $wordslist['Wordslist']['id']), array('escape' => false));
				else echo $html->link('share', array('controller'=>'wordslists', 'action' => 'share', $wordslist['Wordslist']['id']), array('escape' => false));
			?>
		</td>
		<td><?=$html->link($html->image("icons/delete.ico"), array('controller'=>'wordslists', 'action' => 'delete', $wordslist['Wordslist']['id']), array('escape' => false));?></td>		
	</tr>
	<?php endforeach; ?>

</table>
