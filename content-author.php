<?php
/**
 * Post Author template file
 * @package exp
 */
 ?>

<div class="postAuthor">
	<div class="postAuthor__authorThumb">
		<?php echo get_avatar( get_the_author_meta( 'ID' ) ); ?>
	</div>
	<h2 class="postAuthor__title">written by: <span class="postAuthor__name"><?php echo get_the_author_meta( 'display_name' ); ?></span></h2>
	<ul class="postAuthor__icons">
		<li>
			<?php
			$svg = '<svg class="authorTw" viewBox="0 0 35 35" role="img" area-labelledby="title desc" width="32px" height="32px"><use xlink:href="' . get_template_directory_uri() . '/assets/images/sprite-single.symbol.svg#icon_authorTw"></use></svg>';

			if ( get_the_author_meta( 'twitter' ) ) {
				$html = '<a href="https://twitter.com/' . get_the_author_meta( 'twitter' ) . '" target="_blank">';
				$html .= $svg;
				$html .= '</a>';
			} else {
				$html = '<span>' . $svg . '</span>';
			}
			echo $html;
			?>
		</li>
		<li>
			<?php
			$svg = '<svg class="authorFb" viewBox="0 0 36 35" role="img" area-labelledby="title desc" width="32px" height="32px"><use xlink:href="' . get_template_directory_uri() . '/assets/images/sprite-single.symbol.svg#icon_authorFb"></use>';

			if ( get_the_author_meta( 'facebook' ) ) {
				$html = '<a href="' . get_the_author_meta( 'facebook' ) . '" target="_blank">';
				$html .= $svg;
				$html .= '</a>';
			} else {
				$html = '<span>' . $svg . '</span>';
			}
			echo $html;
			?>
		</li>
		<li>
			<?php
			$svg = '<svg class="authorGh" viewBox="0 0 34 34" role="img" area-labelledby="title desc" width="32px" height="32px"><use xlink:href="' . get_template_directory_uri() . '/assets/images/sprite-single.symbol.svg#icon_authorGh"></use>';

			if ( get_the_author_meta( 'github' ) ) {
				$html = '<a href="https://github.com/' . get_the_author_meta( 'github' ) . '" target="_blank">';
				$html .= $svg;
				$html .= '</a>';
			} else {
				$html = '<span>' . $svg . '</span>';
			}
			echo $html;
			?>
		</li>
	</ul>
	<p class="postAuthor__description"><?php the_author_meta( 'user_description' ); ?></p>
	<hr class="postAuthor__separator">
	<h3 class="postAuthor__subTitle">最近の記事</h3>
	<?php

	$args = array(
		'post_type'      => 'post',
		'posts_per_page' => 4,
		'post_status'    => 'publish',
		'author'         => get_the_author_meta( 'ID' )
	);

	// The Query
	$the_query = new WP_Query( $args );

	?>
	<?php
	// The Loop
	if ( $the_query->have_posts() ) : ?>
		<ul class="authorsPosts">
			<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
				<li class="authorsPosts__item">
					<div class="authorsPosts__imgWrap">
						<?php ( wp_is_mobile() ) ? the_post_thumbnail( 'thumb340x340' ) : the_post_thumbnail( 'thumb360x180' ); ?>
					</div>
					<div class="authorsPosts__meta">
						<time><?php the_date(); ?></time>
						<a href="<?php the_permalink(); ?>"><?php echo get_the_category()[0]->name; ?></a>
					</div>
					<h4 class="authorsPosts__title">
						<a href="<?php the_permalink(); ?>">
							<?php echo get_my_excerpt( get_the_title(), 35 ); ?>
						</a>
					</h4>
				</li>
			<?php endwhile; ?>
		</ul>
	<?php endif; ?>
	<?php wp_reset_postdata(); ?>
</div><!-- / .postAuthor -->
