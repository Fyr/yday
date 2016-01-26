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
			<li class="nav-item  ">
				<a href="javascript:;" class="nav-link nav-toggle">
					<i class="icon-layers"></i>
					<span class="title"><?=__('Static content')?></span>
					<span class="arrow"></span>
				</a>
				<ul class="sub-menu">
					<li class="nav-item">
						<a href="<?=$this->Html->url(array('controller' => 'AdminContent', 'action' => 'index'))?>" class="nav-link ">
							<span class="title"><?=__('Pages')?></span>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?=$this->Html->url(array('controller' => 'AdminContent', 'action' => 'index'))?>" class="nav-link ">
							<span class="title"><?=__('News')?></span>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?=$this->Html->url(array('controller' => 'AdminContent', 'action' => 'index'))?>" class="nav-link ">
							<span class="title"><?=__('FAQ')?></span>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?=$this->Html->url(array('controller' => 'AdminContent', 'action' => 'index'))?>" class="nav-link ">
							<span class="title"><?=__('Blocks')?></span>
						</a>
					</li>
				</ul>
			</li>
			<li class="nav-item  ">
				<a href="javascript:;" class="nav-link nav-toggle">
					<i class="icon-basket"></i>
					<span class="title"><?=__('eCommerce')?></span>
					<span class="arrow"></span>
				</a>
				<ul class="sub-menu">
					<li class="nav-item  ">
						<a href="javascript:;" class="nav-link ">
							<span class="title"><?=__('Categories')?></span>
						</a>
					</li>
					<li class="nav-item  ">
						<a href="javascript:;" class="nav-link ">
							<span class="title"><?=__('Products')?></span>
						</a>
					</li>
				</ul>
			</li>
			<li class="nav-item">
				<a href="javascript:;" class="nav-link nav-toggle">
					<i class="icon-wrench"></i>
					<span class="title"><?=__('Settings')?></span>
					<span class="arrow"></span>
				</a>
				<ul class="sub-menu">
					<li class="nav-item">
						<a href="javascript:;" class="nav-link ">
							<span class="title"><?=__('System')?></span>
						</a>
					</li>
					<li class="nav-item">
						<a href="javascript:;" class="nav-link ">
							<span class="title"><?=__('Contacts')?></span>
						</a>
					</li>
					<li class="nav-item">
						<a href="javascript:;" class="nav-link ">
							<span class="title"><?=__('Prices')?></span>
						</a>
					</li>
				</ul>
			</li>
		</ul>
		<!-- END SIDEBAR MENU -->
		<!-- END SIDEBAR MENU -->
	</div>
	<!-- END SIDEBAR -->
</div>