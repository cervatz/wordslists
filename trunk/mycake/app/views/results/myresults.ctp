<?php foreach ($wordslists as $wordslist): ?>	
	<?=$wordslist['Wordlist']['name']; ?><br /><small><?=$wordslist['Wordlist']['description']; ?></small>
	<div id="<?='array'.$wordslist['Wordlist']['id']; ?>"></div><br />
<?php endforeach; ?>