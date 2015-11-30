<?php
/**
 * The template for displaying all single posts.
 *
 * @package exp
 */

get_header(); ?>


	<div class="l-row">
		<div id="main" class="l-main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'single' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // end of the loop. ?>



		</div><!-- /.l-main -->
	</div><!-- /.l-row -->

<?php get_footer(); ?>
