<?php
/**
 * @package exp
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'post--single' ); ?>>

	<?php // Category label
	$cats = get_the_category();
	$catHtml = '';
	foreach ( $cats as $cat) {
		$catHtml .= '<a href="' . get_category_link( $cat->cat_ID ) . '" class="post__label catLabel catLabel--wordpress">' . $cat->name . '</a>';
	}
	?>

	<header class="post__header">
		<?php // post thumbnail
		$size = ( wp_is_mobile() ) ? 'thumb640x280' : 'thumb940x400';
		the_post_thumbnail( $size, array( 'class'	=> 'attachment-' . $size . ' post__image' ) );
		?>
		<div class="post__meta">
			<time><?php the_time( get_option( 'date_format' ) ); ?></time><?php echo get_avatar( get_the_author_meta( 'ID' ) ); ?><span><?php echo get_the_author_meta( 'display_name' ); ?></span><?php echo $catHtml; ?>
		</div>
		<h1 class="post__title"><?php the_title(); ?></h1>
		<div class="snsShare">
			<ul class="snsShare__list">
				<li class="snsShare__item snsShare__item--fb">
					<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" class="snsShare__btnFb">
						<span class="snsShare__count snsShare__count--fb"></span>
						<div class="snsShare__icon snsShre__icon--fb">
							<svg viewBox="0 0 9 18" role="img" area-labelledby="title desc" width="7px" height="16px">
								<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite-global.symbol.svg#icon_shareFb"></use>
							</svg>
						</div>
					</a>
				</li>
				<li class="snsShare__item snsShare__item--ha">
					<a href="http://b.hatena.ne.jp/add?mode=confirm&amp;url=<?php echo urlencode(get_permalink()); ?>&amp;title=<?php echo urlencode(get_the_title()); ?>" class="snsShare__btnHa">
						<span class="snsShare__count snsShare__count--ha"></span>
						<div class="snsShare__icon snsShare__icon--ha">
							<svg viewBox="0 0 19 17" role="img" area-labelledby="title desc" width="14px" height="12px">
								<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite-global.symbol.svg#icon_shareHa"></use>
							</svg>
						</div>
					</a>
				</li>
				<li class="snsShare__item snsShare__item--tw">
					<a href="https://twitter.com/search?q=<?php echo urlencode(get_permalink()); ?>" class="snsShare__count snsShare__count--tw" target="_blank"></a>
					<a href="https://twitter.com/share?&amp;text=<?php echo urlencode(get_the_title()); ?>&amp;via=WPE34" class="snsShare__icon snsShare__icon--tw">
						<svg viewBox="0 0 20 17" role="img" area-labelledby="title desc" width="17px" height="13px">
							<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite-global.symbol.svg#icon_shareTw"></use>
						</svg>
					</a>
				</li>
				<li class="snsShare__item snsShare__item--po">
					<?php if ( wp_is_mobile() ): ?>
						<a href="https://getpocket.com/save" data-lang="ja" data-pocket-count="none" data-pocket-label="pocket" class="pocket-btn"></a>
					<?php else: ?>
						<a href="https://getpocket.com/save" data-lang="ja" data-pocket-count="horizontal" data-pocket-label="pocket" class="pocket-btn"></a>
					<?php endif; ?>
				</li>
			</ul>
		</div>
	</header>

	<div id="stylePost" class="post__content stylePost">
		<?php the_content(); ?>
	</div>
	<div class="postAuthor">
		<div class="postAuthor__authorThumb">
			<?php echo get_avatar( get_the_author_meta( 'ID' ) ); ?>
		</div>
		<h2 class="postAuthor__title">この記事を書いた人: <span class="postAuthor__name"><?php echo get_the_author_meta( 'display_name' ); ?></span></h2>
		<ul class="postAuthor__icons">
			<li>
				<a href="">
					<svg viewBox="0 0 35 35" role="img" area-labelledby="title desc" width="32px" height="32px">
						<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite-single.symbol.svg#icon_authorTw"></use>
					</svg>
				</a>
			</li>
			<li>
				<a href="">
					<svg viewBox="0 0 36 35" role="img" area-labelledby="title desc" width="32px" height="32px">
						<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite-single.symbol.svg#icon_authorFb"></use>
					</svg>
				</a>
			</li>
			<li>
				<a href="">
					<svg viewBox="0 0 34 34" role="img" area-labelledby="title desc" width="32px" height="32px">
						<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite-single.symbol.svg#icon_authorGh"></use>
					</svg>
				</a>
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
						<a href="<?php the_permalink(); ?>">
							<div class="authorsPosts__imgWrap">
								<?php ( wp_is_mobile() ) ? the_post_thumbnail( 'thumb340x340' ) : the_post_thumbnail( 'thumbnail' ); ?>
							</div>
							<div class="authorsPosts__meta">
								<time><?php the_date(); ?></time>
								<span class="authorsPosts__catLabel catLabel catLabel--authors"><?php echo get_the_category()[0]->name; ?></span>
							</div>
							<p class="authorsPosts__title"><?php echo get_my_excerpt( get_the_title(), 35 ); ?></p>
						</a>
					</li>
				<?php endwhile; ?>
			</ul>
		<?php endif; ?>
		<?php wp_reset_postdata(); ?>
	</div><!-- / .postAuthor -->
	<aside class="widget">
		<div class="snsShare snsShare--widget">
			<h2 class="snsShare__title">記事をシェアする</h2>
			<ul class="snsShare__list">
				<li class="snsShare__item snsShare__item--fb">
					<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" class="snsShare__btnFb">
						<span class="snsShare__count snsShare__count--fb"></span>
						<div class="snsShare__icon snsShre__icon--fb">
							<svg viewBox="0 0 9 18" role="img" area-labelledby="title desc" width="7px" height="16px">
								<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite-global.symbol.svg#icon_shareFb"></use>
							</svg>
						</div>
					</a>
				</li>
				<li class="snsShare__item snsShare__item--ha">
					<a href="http://b.hatena.ne.jp/add?mode=confirm&amp;url=<?php echo urlencode(get_permalink()); ?>&amp;title=<?php echo urlencode(get_the_title()); ?>" class="snsShare__btnHa">
						<span class="snsShare__count snsShare__count--ha"></span>
						<div class="snsShare__icon snsShare__icon--ha">
							<svg viewBox="0 0 19 17" role="img" area-labelledby="title desc" width="14px" height="12px">
								<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite-global.symbol.svg#icon_shareHa"></use>
							</svg>
						</div>
					</a>
				</li>
				<li class="snsShare__item snsShare__item--tw">
					<a href="https://twitter.com/search?q=<?php echo urlencode(get_permalink()); ?>" class="snsShare__count snsShare__count--tw" target="_blank"></a>
					<a href="https://twitter.com/share?&amp;text=<?php echo urlencode(get_the_title()); ?>&amp;via=WPE34" class="snsShare__icon snsShare__icon--tw">
						<svg viewBox="0 0 20 17" role="img" area-labelledby="title desc" width="17px" height="13px">
							<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite-global.symbol.svg#icon_shareTw"></use>
						</svg>
					</a>
				</li>
				<li class="snsShare__item snsShare__item--po">
					<?php if ( wp_is_mobile() ): ?>
						<a href="https://getpocket.com/save" data-lang="ja" data-pocket-count="none" data-pocket-label="pocket" class="pocket-btn"></a>
					<?php else: ?>
						<a href="https://getpocket.com/save" data-lang="ja" data-pocket-count="horizontal" data-pocket-label="pocket" class="pocket-btn"></a>
					<?php endif; ?>
				</li>
			</ul>
		</div>
	</aside>

</article>
