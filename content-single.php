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
		<?php ( wp_is_mobile() ) ? the_post_thumbnail( 'thumb640x280' ) : the_post_thumbnail( 'thumb940x400' ); ?>
		<div class="post__meta">
			<time><?php the_time( get_option( 'date_format' ) ); ?></time><?php echo get_avatar( get_the_author_meta( 'ID' ) ); ?><span><?php echo get_the_author_meta( 'display_name' ); ?></span><?php echo $catHtml; ?>
		</div>
		<h1 class="post__title"><?php the_title(); ?></h1>
		<div class="snsShare">
		<?php if(function_exists("wp_social_bookmarking_light_output_e")) wp_social_bookmarking_light_output_e(null, get_permalink(), the_title("", "", false)); ?>
		</div>
	</header>

	<div class="post__content stylePost">
		<?php the_content(); ?>
	</div>
	<aside class="widget">
		<div class="snsShare">
			<h2 class="snsShare__title">記事をシェアする</h2>
			<?php if(function_exists("wp_social_bookmarking_light_output_e")) wp_social_bookmarking_light_output_e(null, get_permalink(), the_title("", "", false)); ?>
		</div>
	</aside>

</article>
