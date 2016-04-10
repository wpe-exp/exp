<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package exp
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'post post--page' ); ?>>

	<header class="post__header">
		<h1 class="post__title"><?php the_title(); ?></h1>
		<?php // sns share buttons
				get_template_part( 'content', 'sns' );
			?>

	</header>

	<div class="post__content stylePost">
		<?php the_content(); ?>
	</div>

</article>
