<?=$javascript->link('jqBarGraph.js'); ?>

<script>
	<?php foreach ($wordslists as $wordslist): ?>
		
		<?='array'.$wordslist['Wordlist']['id']; ?> = new Array(<?=$wordslist['Wordlist']['Results']?>);
		
		$(function() {
		$('#<?='array'.$wordslist['Wordlist']['id']; ?>').jqBarGraph({ 
				data: <?='array'.$wordslist['Wordlist']['id']; ?>,
				width:<?=$wordslist['Wordlist']['numResults']*50; ?>,
				height: 100,
				colors: ['#122A47','#1B3E69'],
				color: '#1A2944',
				barSpace: 2,
				animate: true,
				speed: 3,
				postfix: '%'
			});
		});
			
	<?php endforeach; ?>
	
</script>

<?=$html->css('jqBarGraph.css'); ?>