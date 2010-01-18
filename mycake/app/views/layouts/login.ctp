<?=$html->docType('xhtml-trans');?>

<head>
	<title><?php echo $title_for_layout?></title>
	
	<?php echo $scripts_for_layout ?>

	<?=$html->charset('UTF-8');?>

	<?=$html->meta('icon');?>
	        
	<?php echo $html->css('styles'); ?>

	 	
</head>
<body class="js">

	<div id="container">
		<div id="header">
			<?php echo $content_for_layout ?>
		</div>
		<?php echo $this->element('top_navigation'); ?>
		<div id="main_nav">	
			<?php if ($session->check('Message.flash')): $session->flash(); endif; // this line displays our flash messages ?>		
		</div>

		<div id="content">
			<div id="central">
				<p class="left">							
					info about the site
				</p>
			</div>
		</div>

		<?php echo $this->element('footer'); ?>
	</div>

	</body>
</html>

