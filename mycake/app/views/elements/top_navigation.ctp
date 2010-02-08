<div id="top_left_nav">
<?php 
$styles = array('users'=>'','friends'=>'','wordslists'=>'','languages'=>'','messages'=>'','search'=>'');
if(isset($menu)) $styles[$menu]='current'; 
?>

<ul class="navigation">
	<li class="<?=$styles['users']?>"><?php echo $html->link('Users', array('admin' => true, 'controller'=>'users', 'action' => 'index'), array('escape' => false));?></li>	
<!--	<?php if($session->read('User.administrator') == 1) {?>
			<li class="<?=$styles['users']?>"><?php echo $html->link('Users', array('admin' => true, 'controller'=>'users', 'action' => 'index'), array('escape' => false));?></li>
	<?php } else {?>
		<?php if($user['User']['administrator']==1) {?>			
			<li class="<?=$styles['friends']?>"><?php echo $html->link('Friends', array('admin' => false, 'controller'=>'friends', 'action' => 'index'), array('escape' => false));?></li>
		<?php }?>	
	<?php }?> -->
	<li class="<?=$styles['wordslists']?>"><?php echo $html->link('My wordslists', array('admin' => false, 'controller'=>'wordslists', 'action' => 'mylists'), array('escape' => false));?></li>
	<li class="<?=$styles['languages']?>"><?php echo $html->link('Languages', array('admin' => false, 'controller'=>'languages', 'action' => 'index'), array('escape' => false));?></li>
	<li class="<?=$styles['messages']?>"><?php echo $html->link('Messages', array('admin' => false, 'controller'=>'messages', 'action' => 'mymessages'), array('escape' => false));?></li>	
	<li class="<?=$styles['search']?>"><?php echo $html->link('Search', array('admin' => false, 'controller'=>'search', 'action' => 'index'), array('escape' => false));?></li>	
	<li><?php echo $html->link('Log out', array('admin' => false, 'controller'=>'users', 'action' => 'logout'), array('escape' => false));?></li>
</ul>
</div>
<div id="language_nav">
<ul class="navigation">
	<li><?php echo $html->link($html->image("flags/UnitedKingdom.png"), array('admin' => false, 'controller'=>'switch', 'action' => 'index', 'eng'), array('escape' => false));?></li>
	<li><?php echo $html->link($html->image("flags/France.png"), array('admin' => false, 'controller'=>'switch', 'action' => 'index', 'fre'), array('escape' => false));?></li>
	<li><?php echo $html->link($html->image("flags/Germany.png"), array('admin' => false, 'controller'=>'switch', 'action' => 'index', 'ger'), array('escape' => false));?></li>
	<li><?php echo $html->link($html->image("flags/Spain.png"), array('admin' => false, 'controller'=>'switch', 'action' => 'index', 'spa'), array('escape' => false));?></li>
	<li><?php echo $html->link($html->image("flags/Italy.png"), array('admin' => false, 'controller'=>'switch', 'action' => 'index', 'ita'), array('escape' => false));?></li>
	<li><?php echo $html->link($html->image("flags/Netherlands.png"), array('admin' => false, 'controller'=>'switch', 'action' => 'index', 'ned'), array('escape' => false));?></li>
	<li><?php echo $html->link($html->image("flags/Finland.png"), array('admin' => false, 'controller'=>'switch', 'action' => 'index', 'fin'), array('escape' => false));?></li>
	<li><?php echo $html->link($html->image("flags/Lebanon.png"), array('admin' => false, 'controller'=>'switch', 'action' => 'index', 'leb'), array('escape' => false));?></li>
</ul>
</div>
