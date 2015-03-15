<?php
/*
Template Name: members
*/

get_header(); ?>

	<div class="l-row">
		<div id="main" class="l-main">

			<article id="post-<?php the_ID(); ?>" <?php post_class( 'post post--page' ); ?>>

				<header class="post__header"><h1 class="post__title"><?php the_title(); ?></h1></header>

				<div class="styleMember">
					<ul class="styleMember__list">

						<?php
						$args = array(
							'role'         => '',
							'meta_key'     => '',
							'meta_value'   => '',
							'meta_compare' => '',
							'meta_query'   => array(),
							'include'      => array(),
							'exclude'      => array(),
							'orderby'      => 'ID',
							'order'        => 'ASC',
							'offset'       => '',
							'search'       => '',
							'number'       => '',
							'count_total'  => false,
							'fields'       => 'all',
							'who'          => ''
						);
						$authors = get_users( $args );
						$role = array( 'administrator', 'editor', 'author' );
						?>

						<?php foreach ( $authors as $author ): ?>
							<?php if ( array_search( $author->roles[0], $role ) !== false ): ?>

								<li>
									<a href="<?php echo esc_url( get_author_posts_url( $author->ID ) ); ?>">
										<div class="styleMember__list__thumb"><?php echo get_avatar( $author->ID ); ?></div>
										<div class="styleMember__list__name"><?php echo esc_html( $author->display_name ); ?></div>
									</a>
								</li>
							<?php endif; ?>

						<?php endforeach; ?>


					</ul>
				</div>

			</article>

		</div><!-- /.l-main -->
	</div><!-- /.l-row -->

<?php get_footer(); ?>
