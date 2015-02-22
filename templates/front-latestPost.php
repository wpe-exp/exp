<article class="postLatest">
	<a href="<?php the_permalink(); ?>">
		<div class="postLatest__imgWrap">
			<?php the_post_thumbnail( '' ); ?>
			<?php $cat = get_primary_cat(); ?>
		</div>
		<div class="postLatest__meta">
			<time><?php the_time( get_option( 'date_format' ) ); ?></time><?php echo get_avatar( get_the_author_meta( 'ID' ) ); ?><span><?php echo get_the_author_meta( 'display_name' ); ?></span>
		</div>
		<h3 class="postLatest__title"><?php the_title(); ?></h3>
	</a>
</article>
