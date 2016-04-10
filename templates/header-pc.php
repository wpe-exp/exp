<header class="l-header">
	<div class="l-header__inner">
		<h1 class="siteLogo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">
			<svg viewBox="0 0 68 68" role="img" area-labelledby="title desc">
				<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite-global.symbol.svg#icon_exp"></use>
			</svg>
		</a></h1>
		<nav class="globalNav">
			<ul class="globalNav__list">
				<li class="globalNav__item globalNav__item--about"><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>">About</a></li>
				<li class="globalNav__item globalNav__item--category"><a href="<?php echo esc_url( home_url( '/author/' ) ); ?>">Member</a></li>
				<li class="globalNav__item globalNav__item--category"><a href="<?php echo esc_url( home_url( '/support/' ) ); ?>">Support</a></li>
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
