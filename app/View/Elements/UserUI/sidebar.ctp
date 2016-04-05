<div class="page-sidebar-wrapper">
	<div class="page-sidebar navbar-collapse collapse">
		<ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
			<li class="sidebar-toggler-wrapper hide">
				<div class="sidebar-toggler"> </div>
			</li>
			<li class="heading">
				<div style="text-align: center; margin-bottom: 15px;">
					<?=__('Welcome, %s!', '<b>'.$currUser['username']).'</b>'?><br />
					<?=__('Your balance: %s', '<b>'.$this->Price->format($currUser['balance'], 'rus').'</b>')?>
				</div>
				<h3 class="uppercase"><?=__('User area')?></h3>
			</li>
<?
	$aMenu = array(
		array('label' => __('Profile'), 'url' => array('controller' => 'user', 'action' => 'profile')),
		array('label' => __('Updates'), 'url' => 'javascript:;', 'submenu' => array(
			array('label' => __('Song packs'), 'url' => array('controller' => 'user', 'action' => 'songpacks')),
			array('label' => __('Order song'), 'url' => array('controller' => 'user', 'action' => 'songs')),
			array('label' => __('Custom order'), 'url' => array('controller' => 'user', 'action' => 'customorder'))
		)),
		array('label' => __('Upgrade'), 'url' => array('controller' => 'user', 'action' => 'upgrade')),
		array('label' => __('My orders'), 'url' => array('controller' => 'user', 'action' => 'orders')),
		array('label' => __('Logout'), 'url' => array('controller' => 'user', 'action' => 'logout'))
	);
	$currMenu = 0;
	$menuID = 0;
	foreach($aMenu as $menu) {
		$menuID++;
?>
			<li class="nav-item" id="menu<?=$menuID?>">
<?
		if (!isset($menu['submenu'])) {
			if ($this->request->action == $menu['url']['action']) {
				$currMenu = $menuID;
			}
?>
				<a class="nav-link" href="<?=$this->Html->url($menu['url'])?>">
					<span class="title"><?=$menu['label']?></span>
				</a>
<?
		} else {
?>
				<a class="nav-link nav-toggle" href="<?=$this->Html->url($menu['url'])?>">
					<span class="title"><?=$menu['label']?></span>
					<span class="arrow"></span>
				</a>
				<ul class="sub-menu">
<?
			foreach($menu['submenu'] as $_menu) {
				$menuID++;
				if ($this->request->action == $_menu['url']['action']) {
					$currMenu = $menuID;
				}
?>
					<li class="nav-item submenu" id="menu<?=$menuID?>">
						<a class="nav-link" href="<?=$this->Html->url($_menu['url'])?>">
							<span class="title"><?=$_menu['label']?></span>
						</a>
					</li>
<?
			}
?>
				</ul>
<?
		}
?>
			</li>
<?
	}
?>
		</ul>
	</div>
</div>
<?
	if ($currMenu) {
?>
<script>
	$(function(){
		var $currMenu = $('#menu<?=$currMenu?>');
		$currMenu.addClass('active');
		$currMenu.addClass('open');
		if ($currMenu.hasClass('submenu')) {
			$currMenu.parent().closest('li').addClass('active');
			$currMenu.parent().closest('li').addClass('open');
		}
	});
</script>
<?
	}
?>
