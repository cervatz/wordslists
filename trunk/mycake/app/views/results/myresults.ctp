<?php foreach ($wordslists as $wordslist): ?>	
	<?=$wordslist['Wordlist']['name']; ?><br /><small><?=$wordslist['Wordlist']['description']; ?></small><br /><br />
	<div id="<?='array'.$wordslist['Wordlist']['id']; ?>"></div><br /><br />
<?php endforeach; ?>