<div class="page-sidebar-wrapper">
	<div class="page-sidebar navbar-collapse collapse">
		<ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
			<li class="sidebar-toggler-wrapper hide">
				<div class="sidebar-toggler"> </div>
			</li>
			<li class="heading">
				<h3 class="uppercase"><?=__('User area')?></h3>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="javascript:;">
					<span class="title"><?=__('Profile')?></span>
				</a>
			</li>
			<li class="nav-item" id="menu1">
				<a class="nav-link nav-toggle" href="javascript:;">
					<span class="title"><?=__('Updates')?></span>
					<span class="arrow"></span>
				</a>
				<ul class="sub-menu" style="display: none;">
					<li class="nav-item" id="menu2">
						<a class="nav-link" href="/AdminPages">
							<span class="title"><span class="title"><?=__('Song packs')?></span></span>
						</a>
					</li>
					<li class="nav-item" id="menu3">
						<a class="nav-link" href="/AdminNews">
							<span class="title"><span class="title"><?=__('Custom song order')?></span></span>
						</a>
					</li>
				</ul>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="javascript:;">
					<span class="title"><?=__('Upgrade')?></span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="javascript:;">
					<span class="title"><?=__('My orders')?></span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?=$this->Html->url(array('controller' => 'user', 'action' => 'logout'))?>">
					<span class="title"><?=__('Logout')?></span>
				</a>
			</li>
		</ul>
	</div>
</div>
<? /*
	if ($this->request->controller == 'AdminPageBlocks') {
		$currMenu = 2;
	} elseif (in_array($this->request->controller,  array('AdminCategoryBlocks', 'AdminParamGroups', 'AdminParams'))) {
		$currMenu = 6;
	} elseif (in_array($this->request->controller, array('AdminProductBlocks', 'AdminProductPacks'))) {
		$currMenu = 7;
	} elseif ($this->request->controller == 'AdminSettings') {
		$submenu = array('index' => 16, 'contacts' => 17, 'prices' => 18, 'apps' => 19, 'catalogs' => 20);
		$currMenu = $submenu[$this->request->action];
	} elseif ($this->request->controller == 'AdminUsers') {
		$currMenu = ($this->request->action == 'edit' && $this->request->pass[0] == 1) ? 14 : 13;
	}
	if ($currMenu) {
?>
<script>
	$(function(){
		var $currMenu = $('#menu<?=$currMenu?>');
		$currMenu.addClass('active');
		$currMenu.addClass('open');
		$currMenu.parent().closest('li').addClass('active');
		$currMenu.parent().closest('li').addClass('open');
	});
</script>
<?
	}
 */
?>
