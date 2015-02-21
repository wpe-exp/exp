<?php
/**
 * @package exp
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'postArchive' ); ?>>
	<a href="<?php the_permalink(); ?>">
		<div class="postArchive__imgWrap">
			<?php the_post_thumbnail( '' ); ?>
			<?php $cat = get_primary_cat(); ?>
			<span class="postArchive__label catLabel catLabel--<?php echo $cat->slug; ?>"><?php echo $cat->name; ?></span>
		</div>
		<div class="postArchive__meta">
			<time><?php the_time( get_option( 'date_format' ) ); ?></time><?php echo get_avatar( get_the_author_meta( 'ID' ) ); ?><span><?php echo get_the_author_meta( 'display_name' ); ?></span>
		</div>
		<h3 class="postArchive__title"><?php the_title(); ?></h3>
	</a>
</article>
