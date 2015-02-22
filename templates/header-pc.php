<header class="l-header">
	<div class="l-header__inner">
		<h1 class="siteLogo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/page/common/icon_exp.svg" alt="<?php bloginfo( 'name' ); ?>"></a></h1>
		<nav class="globalNav">
			<ul class="globalNav__list">
				<li class="globalNav__item globalNav__item--about"><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>">About</a></li>
				<li class="globalNav__item globalNav__item--category"><a href="<?php echo esc_url( home_url( '/member/' ) ); ?>">Member</a></li>
				<li clas="globalNav__item"><a href="">Categories</a><ul class="globalNav__subList"><?php echo get_category_sub_menu_item(); ?></ul></li>
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
	</div>
</header>
