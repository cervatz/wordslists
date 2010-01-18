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
	<?=$javascript->link('lib/jquery.jgrowl'); ?>

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
		
		// This value can be true, false or a function to be used as a callback when the closer is clciked
		$.jGrowl.defaults.closer = function() {
			console.log("Closing everything!", this);
		};
		
		$.jGrowl("Sticky notification with a header", { header: 'A Header', theme:  'manilla', life: 1000, speed:  'slow'});
		
		$.jGrowl.defaults.closerTemplate = '<div>hide all notifications</div>';
		
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

<div id="top_left_nav">
<ul id="lavaLampBorderOnly" class="navigation">
	<li><?php echo $html->link('Users', array('controller'=>'users', 'action' => 'index'), array('escape' => false));?></li>
	<li><?php echo $html->link('My wordslists', array('controller'=>'wordslists', 'action' => 'mylists'), array('escape' => false));?></li>
	<li><?php echo $html->link('Languages', array('controller'=>'languages', 'action' => 'index'), array('escape' => false));?></li>
	<li><?php echo $html->link('Admin page', array('controller'=>'admin', 'action' => 'index'), array('escape' => false));?></li>
	<li><?php echo $html->link('Log out', array('controller'=>'users', 'action' => 'logout'), array('escape' => false));?></li>
</ul>
</div>
<div id="language_nav">
<ul class="navigation">
	<li><?php echo $html->link($html->image("flags/UnitedKingdom.png"), array('controller'=>'switch', 'action' => 'index', 'eng'), array('escape' => false));?></li>
	<li><?php echo $html->link($html->image("flags/France.png"), array('controller'=>'switch', 'action' => 'index', 'fre'), array('escape' => false));?></li>
	<li><?php echo $html->link($html->image("flags/Germany.png"), array('controller'=>'switch', 'action' => 'index', 'ger'), array('escape' => false));?></li>
	<li><?php echo $html->link($html->image("flags/Spain.png"), array('controller'=>'switch', 'action' => 'index', 'spa'), array('escape' => false));?></li>
	<li><?php echo $html->link($html->image("flags/Italy.png"), array('controller'=>'switch', 'action' => 'index', 'ita'), array('escape' => false));?></li>
	<li><?php echo $html->link($html->image("flags/Netherlands.png"), array('controller'=>'switch', 'action' => 'index', 'ned'), array('escape' => false));?></li>
	<li><?php echo $html->link($html->image("flags/Finland.png"), array('controller'=>'switch', 'action' => 'index', 'fin'), array('escape' => false));?></li>
	<li><?php echo $html->link($html->image("flags/Lebanon.png"), array('controller'=>'switch', 'action' => 'index', 'leb'), array('escape' => false));?></li>
</ul>
</div>


		
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
				central	
				<input type="button" onclick="$.jGrowl('Default Positioning');" value="Default"/>



				
			</div>
		</div>
		<?php echo $this->element('footer'); ?>
	</div>

	</body>
</html>

