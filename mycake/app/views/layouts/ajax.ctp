<?=$html->docType('xhtml-trans');?>

<html>
<head>
	<title><?php echo $title_for_layout?></title>
	<?php echo $scripts_for_layout ?>

	<?=$html->charset('UTF-8');?>
	
    <?=$html->meta('icon');?>
    
	<?=$html->css('styles'); ?>	 	
	<?=$html->css('jquery.jgrowl'); ?>
	<?=$html->css('mygrowl'); ?>

	<?=$javascript->link('lib/jquery-1.3.1.js'); ?>
	<?=$javascript->link('lib/jquery.jgrowl'); ?>
	<?=$javascript->link('lib/jquery.validate.js'); ?>

<script type="text/javascript">
<!--

	function growlSuccess(string){
		$.jGrowl(string, { header: 'A Header', theme:  'success', life: 3000, speed:  'slow'});
	}

	function growlError(string){
		$.jGrowl(string, { header: 'A Header', theme:  'error', life: 3000, speed:  'slow'});
	}
	
	
	
// jquery initialize:
	$(function() {
		// This value can be true, false or a function to be used as a callback when the closer is clciked
		$.jGrowl.defaults.closer = function() {
			console.log("Closing everything!", this);
		};
		
		$.jGrowl.defaults.closerTemplate = '<div>hide all notifications</div>';        
        
        $("#LineString2").keydown(function(event){
 	         if(event.keyCode==9 || event.keyCode==13 ) $("form").submit();
        });
        
		
	});


-->
</script>

  <script>
  $(document).ready(function(){
    $("#form_id").validate();
  });
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
				<!-- li><?php echo $html->image("icons/home.ico", array('alt' => 'Home','url' => array('controller' => 'wordslists', 'action' => 'index'))); ?></li>
				<li><?php echo $html->image("icons/key.ico", array('alt' => 'Admin','url' => array('controller' => 'admin', 'action' => 'index'))); ?></li>			
				<li><?php echo $html->image("icons/undo.ico", array('alt' => 'Logout','url' => array('controller' => 'users', 'action' => 'logout'))); ?></li-->
			</ul>			
		</div>

		<div id="content">
			<div id="central">
				<p class="left">							
					<?php echo $content_for_layout ?>
				</p>
			</div>
		</div>
		<?php echo $this->element('footer'); ?>
	</div>

	</body>
</html>

