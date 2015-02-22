<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package exp
 */

get_header(); ?>

	<div class="l-row">
		<div id="main" class="l-main">

      <section class="error-404 not-found post post--404">
        <header class="post__header">
          <h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'exp' ); ?></h1>
        </header><!-- .post__header -->

        <div class="post__content">
          <p><?php _e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'exp' ); ?></p>

          <?php get_search_form(); ?>

          <?php the_widget( 'WP_Widget_Recent_Posts' ); ?>

          <?php if ( exp_categorized_blog() ) : // Only show the widget if site has multiple categories. ?>
          <div class="widget widget_categories">
            <h2 class="widget-title"><?php _e( 'Most Used Categories', 'exp' ); ?></h2>
            <ul>
            <?php
              wp_list_categories( array(
                'orderby'    => 'count',
                'order'      => 'DESC',
                'show_count' => 1,
                'title_li'   => '',
                'number'     => 10,
              ) );
            ?>
            </ul>
          </div><!-- .widget -->
          <?php endif; ?>

          <?php
            /* translators: %1$s: smiley */
            $archive_content = '<p>' . sprintf( __( 'Try looking in the monthly archives. %1$s', 'exp' ), convertexpmilies( ':)' ) ) . '</p>';
            the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );
          ?>

          <?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>

        </div><!-- .post__content -->
      </section><!-- .error-404 -->

		</div><!-- /.l-main -->
	</div><!-- /.l-row -->

<?php get_footer(); ?>
