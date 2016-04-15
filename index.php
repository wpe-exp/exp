<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package exp
 */

$is_as_front = !is_paged() && !is_category() && !is_tag();

get_header(); ?>

<?php if ( $is_as_front ): ?>
	<div class="mainImgWrap"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/page/front/img_main.png" alt=""></div>
<?php endif; ?>

<section>
	<div class="l-row support-banner" style="margin-top:20px;">
		<a href="<?php echo esc_url( home_url( '/support/' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/page/front/wordpressbook.jpg" alt="ビジネスサイトをこれからつくる WordPressデザイン入門サポートページ"></a>
	</div>
	<div class="l-row">
		<h2 class="pageTitle"><?php the_custom_archive_title(); ?></h2>
	</div>
	<div class="l-row">
		<div id="main" class="l-main">

			<?php if ( have_posts() ) : ?>

				<?php /* Start the Loop */ $i = 0;?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php
						/* Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						if ( $i === 0 && $is_as_front ) {
							get_template_part( 'templates/front', 'latestPost' );
							$i++;
						} else {
							get_template_part( 'content', get_post_format() );
						}
					?>

				<?php endwhile; ?>

				<?php
				( wp_is_mobile() ) ? $item = 5 : $item = 7;
				if ( class_exists( 'WP_SiteManager_page_navi' ) ) {
					$args = array(
						'items'         => $item,
						'show_boundary' => false,
						'show_num'      => true,
						'num_position'  => 'after',
						'navi_element'  => 'nav',
						'elm_class'     => 'pageNav'
					);
					WP_SiteManager_page_navi::page_navi( $args );
				} else {
					the_posts_navigation();
				}
				?>

			<?php else : ?>

				<?php get_template_part( 'content', 'none' ); ?>

			<?php endif; ?>

		</div><!-- /.l-main -->
	</div><!-- /.l-row -->
</section>

<?php get_footer(); ?>
