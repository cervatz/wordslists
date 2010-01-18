<?=$html->docType('xhtml-trans');?>

<html>
<head>
	<title><?php echo $title_for_layout?></title>
	<?php echo $scripts_for_layout ?>
	
	<?=$html->charset('UTF-8');?>
	
    <?=$html->meta('icon');?>
    
	<?=$html->css('styles'); ?>

	<?=$html->css('lavalamp'); ?>		 	
	<?=$html->css('jquery.jgrowl'); ?>
	<?=$html->css('mygrowl'); ?>

	<?=$javascript->link('lib/jquery-1.3.1.js'); ?>
	<?=$javascript->link('lib/jquery.easing.1.3.js'); ?>
    <?=$javascript->link('lib/jquery.lavalamp.1.3.2-min.js'); ?>
	<?=$javascript->link('lib/jquery.j
	'); ?>

<script type="text/javascript">
<!--
	var query = new Object();
	window.location.search.replace(
	new RegExp( "([^?=&]+)(=([^&]*))?", 'g' ),
		function( $0, $1, $2, $3 ){
			query[ $1 ] = $3;
		}
	);
	easing = query['e'] || 'Expo';
	
	function loadEasing(e) {
		location.href = location.pathname+'?e='+e;
	}
	
	function setEasing(e) {
		loadLamps(e);
	}


//TODO: set the correct value for the selected item	
// for dynamic easing changes		
	function loadLamps(easing) {
		$('#lavaLampBorderOnly').lavaLamp({
			fx: 'easeInOut'+easing,
			speed: 1000,
			returnDelay:1000,
			startItem:3
		});
	}
	
// jquery initialize:

    $(function() {

		$('#menu').lavaLamp({fx: 'swing', speed: 333});
		loadLamps(easing);
		
		$('select#easing option[value='+easing+']').attr('selected','selected');
		$('.easingLabel').text(easing);
		        
      });


-->
</script>

</head>
<body class="js">

	<div id="container">
		<div id="header">
			<h1><?php echo $title_for_layout?>
			</h1>
			<p class="copy"></p>
		</div>
		<?php echo $this->element('top_navigation'); ?>		
		<div id="main_nav">
		<?php if ($session->check('Message.flash')): $session->flash(); endif; // this line displays our flash messages ?>
			<ul class="navigation">
				<!-- li><?php echo $html->image("icons/home.ico", array('alt' => 'Home','url' => array('controller' => 'redirect', 'action' => 'home'))); ?></li>
				<li><?php echo $html->image("icons/key.ico", array('alt' => 'Admin','url' => array('controller' => 'admin', 'action' => 'index'))); ?></li>			
				<li><?php echo $html->image("icons/undo.ico", array('alt' => 'Logout','url' => array('controller' => 'users', 'action' => 'logout'))); ?></li-->
			</ul>			
		</div>

		<div id="content">
			<div id="central">					
				<?php echo $content_for_layout ?>
			</div>
		</div>
		<?php echo $this->element('footer'); ?>
	</div>

	</body>
</html>

