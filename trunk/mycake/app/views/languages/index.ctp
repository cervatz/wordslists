<!-- TODO: add in the list also the number of wordslists for every language -->

<div class="languages_index">
<table>
	<tr>
		<th>Id</th>
		<th>Description</th>
		
		<th>Count From</th>
		<th>Count To</th>
		
		<th>Total</th>
	</tr>
	<?php foreach ($languages as $language): ?>
	<tr>
		<td><?php echo $language['Language']['id']; ?></td>
		<td><?php echo $language['Language']['description']; ?></td>
		
		<td><?php echo count($language['Wordslist1']); ?></td>
		<td><?php echo count($language['Wordslist2']); ?></td>
		
		<td><?php echo (count($language['Wordslist1']) + count($language['Wordslist2'])); ?></td>
	</tr>
	<?php endforeach; ?>

</table>
</div>
