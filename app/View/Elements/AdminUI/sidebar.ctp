<div class="page-sidebar-wrapper">
	<!-- BEGIN SIDEBAR -->
	<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
	<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
	<div class="page-sidebar navbar-collapse collapse">
		<!-- BEGIN SIDEBAR MENU -->
		<!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
		<!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
		<!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
		<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
		<!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
		<!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
		<ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
			<!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
			<li class="sidebar-toggler-wrapper hide">
				<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
				<div class="sidebar-toggler"> </div>
				<!-- END SIDEBAR TOGGLER BUTTON -->
			</li>
			<!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
			<li class="sidebar-search-wrapper">
				<!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
				<!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
				<!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
				<!--form class="sidebar-search  " action="page_general_search_3.html" method="POST">
					<a href="javascript:;" class="remove">
						<i class="icon-close"></i>
					</a>
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Search...">
						<span class="input-group-btn">
							<a href="javascript:;" class="btn submit">
								<i class="icon-magnifier"></i>
							</a>
						</span>
					</div>
				</form-->
				<!-- END RESPONSIVE QUICK SEARCH FORM -->
			</li>
			<li class="nav-item start ">
				<a href="<?=$this->Html->url(array('controller' => 'Admin', 'action' => 'index'))?>" class="nav-link">
					<i class="icon-home"></i>
					<span class="title"><?=__('Dashboard')?></span>
				</a>

			</li>
			<li class="heading">
				<h3 class="uppercase"><?=__('Admin area')?></h3>
			</li>
<?
	$aMenu = array(
		array('label' => __('Static content'), 'icon' => 'icon-layers', 'url' => '', 'submenu' => array(
			array('label' => __('Pages'), 'url' => array('controller' => 'AdminPages', 'action' => 'index')),
			array('label' => __('News'), 'url' => array('controller' => 'AdminNews', 'action' => 'index')),
			array('label' => __('FAQ'), 'url' => array('controller' => 'AdminFaq', 'action' => 'index')),
			//array('label' => __('Blocks'), 'url' => array('controller' => 'AdminBlocks', 'action' => 'index')),
		)),
		array('label' => __('eCommerce'), 'icon' => 'icon-basket', 'url' => '', 'submenu' => array(
			array('label' => __('Categories'), 'url' => array('controller' => 'AdminCategories', 'action' => 'index')),
			array('label' => __('Products'), 'url' => array('controller' => 'AdminProducts', 'action' => 'index')),
		)),
		array('label' => __('Settings'), 'icon' => 'icon-wrench', 'url' => '', 'submenu' => array(
			array('label' => __('System'), 'url' => array('controller' => 'AdminContent', 'action' => 'index')),
			array('label' => __('Contacts'), 'url' => array('controller' => 'AdminContent', 'action' => 'index')),
			array('label' => __('Prices'), 'url' => array('controller' => 'AdminContent', 'action' => 'index')),
			array('label' => __('Tech.params'), 'url' => array('controller' => 'AdminForms', 'action' => 'index')),
		)),
	);

	$menuID = 0;
	$currMenu = 0;
	foreach($aMenu as $item) {
		$menuID++;
		$icon = (isset($item['icon']) && $item['icon']) ? '<i class="'.$item['icon'].'"></i>' : '';
		$label = '<span class="title">'.$item['label'].'</span>';
?>
			<li id="menu<?=$menuID?>" class="nav-item">
<?
		if (!isset($item['submenu'])) {
?>
				<a href="<?=$this->Html->url($item['url'])?>" class="nav-link">
					<?=$icon?>
					<?=$label?>
				</a>
<?
		} else {
?>
				<a href="javascript:;" class="nav-link nav-toggle">
					<?=$icon?>
					<?=$label?>
					<span class="arrow"></span>
				</a>
				<ul class="sub-menu">
<?
			foreach($item['submenu'] as $_item) {
				$menuID++;
				if ($this->request->controller == $_item['url']['controller']) {
					$currMenu = $menuID;
				}
				$icon = (isset($_item['icon']) && $_item['icon']) ? '<i class="'.$_item['icon'].'"></i>' : '';
				$label = '<span class="title">'.$_item['label'].'</span>';
?>
					<li id="menu<?=$menuID?>" class="nav-item">
						<a href="<?=$this->Html->url($_item['url'])?>" class="nav-link">
							<span class="title"><?=$label?></span>
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
		<!-- END SIDEBAR MENU -->
		<!-- END SIDEBAR MENU -->
	</div>
	<!-- END SIDEBAR -->
</div>
<?
	if ($this->request->controller == 'AdminPageBlocks') {
		$currMenu = 2;
	} elseif (in_array($this->request->controller,  array('AdminCategoryBlocks', 'AdminParamGroups', 'AdminParams'))) {
		$currMenu = 6;
	} elseif ($this->request->controller == 'AdminProductBlocks') {
		$currMenu = 7;
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
?>
