<header class="l-header">
	<div data-topbar="" class="tab-bar">
		<div class="left-small left-small"><a href="#" aria-expanded="true" class="left-off-canvas-toggle menu-icon menu-icon--globalSp"><span></span></a></div>
		<h1 class="siteLogoSP">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<svg viewBox="0 0 68 68" width="30px" height="30px" role="img" area-labelledby="title desc">
					<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite-global.symbol.svg#icon_exp"></use>
				</svg>
			</a>
		</h1>
	</div>
	<nav class="globalNavSp left-off-canvas-menu">
		<ul class="globalNavSp__list off-canvas-list">
			<li><label>Menu</label></li>
			<li class="globalNavSp__item"><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>">About</a></li>
			<li class="globalNavSp__item"><a href="<?php echo esc_url( home_url( '/author/' ) ); ?>">Member</a></li>
			<li class="globalNavSp__item"><a href="<?php echo esc_url( home_url( '/support/' ) ); ?>">Support</a></li>
		</ul>
		<ul class="off-canvas-list">
			<li><label>Categories</label></li>
			<?php echo get_category_sub_menu_item(); ?>
		</ul>
		<?php // global_nav
		$args = array(
			'theme_location'  => 'global_nav',
			'container'       => false,
			'menu_class'      => 'globalNav__list',
			'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
			'walker'          => new Custom_Walker_Nav_Menu()
		);
		// wp_nav_menu( $args );
		?>
	</nav>
</header>
