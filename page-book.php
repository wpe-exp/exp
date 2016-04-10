<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package exp
 */

get_header(); ?>

	<div class="l-row">
		<div id="main" class="l-main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'book' ); ?>

			<?php endwhile; // end of the loop. ?>

		</div><!-- /.l-main -->
	</div><!-- /.l-row -->

<?php get_footer(); ?>
