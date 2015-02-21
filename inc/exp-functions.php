<?php
//-----------------------------------------------------------------
// Modify queries -------------------------------------------------
//-----------------------------------------------------------------
function setup_pre_get_posts( $query ) {
	if ( !$query->is_main_query() || is_admin() ) return;
}
add_action( 'pre_get_posts', 'setup_pre_get_posts' );


//-----------------------------------------------------------------
// WordPress helper functions -------------------------------------
//-----------------------------------------------------------------
/*
 * Show wp_query after the footer area
 * Usuallythis should disabled.
 */
function show_wp_query() {
	global $wp_query;
	if ( $wp_query ) {
		echo '<pre><code style="display: block; padding: 2em; background-color: #eee;">';
		print_r($wp_query);
		echo '</code></pre>';
	}
}
// add_filter( 'wp_footer', 'show_wp_query' );

/*
 * Is 1st post in the roop
 */
if( !function_exists( 'is_first_post' ) ) {
	function is_first_post() {
		global $wp_query;
		if( $wp_query ) {
			echo $wp_query->current_post;
			return ( $wp_query->current_post === 0 );
		}
	}
}

/*
 * get_primary_tag return array
 */
if ( !function_exists( 'get_primary_tag' ) ) {
	function get_primary_tag() {
		$tags = get_the_tags( get_the_ID() );
		if ( !$tags ) return;
		$tag = reset($tags);
		return $tag;
	}
}

/*
 * Get the archive title
 */
if( !function_exists( 'the_custom_archive_title' ) ) {
	function the_custom_archive_title() {
		global $wp_query;
		$event_year = ( isset($wp_query->query['event-year']) && $wp_query->query['event-year'] ) ? true : false;

		$suffix = 'の一覧';
		if( is_category() ) {
			single_cat_title();
		} elseif ( is_tag() ) {
			single_tag_title();
			$suffix = '向けニュースの一覧';
		} elseif ( is_post_type_archive() ) {
			if ( is_tax() ) {
				$i = 0;
				foreach ( $wp_query->tax_query->queries as $tax_query ) {
					$tax = (get_taxonomy( $tax_query['taxonomy'] ));
					echo $tax->labels->singular_name . ': ';
					$j = 0;
					foreach ( get_the_terms( null, $tax->name ) as $term ) {
						if ( $j > 0 ) echo ',';
						echo ' ' . $term->name . ' ';
						$j++;
					}
					$i++;
				}
				echo 'の';
				$suffix = '一覧';
			} elseif ( $event_year ) {
				echo $wp_query->query_vars['event-year'] . '年度の';
				$suffix = '一覧';
			} elseif ( is_search() ) {
				echo ' "' . esc_html( $_GET['s'] ) . '" に関する';
				$suffix = '一覧';
			}
			post_type_archive_title();
		} elseif ( $event_year ) {
			echo $wp_query->query_vars['event-year'] . '年度のニュース';
			$suffix = '一覧';
		}
		echo $suffix;
	}
}

/*
 *
 */
function get_category_sub_menu() {
	$args = array(
		'type'                     => 'post',
		'child_of'                 => 0,
		'parent'                   => '',
		'orderby'                  => 'name',
		'order'                    => 'ASC',
		'hide_empty'               => 1,
		'hierarchical'             => 1,
		'exclude'                  => '',
		'include'                  => '',
		'number'                   => '',
		'taxonomy'                 => 'category',
		'pad_counts'               => false

	);
	$categories = get_categories( $args );
	$catlist = '<li clas="globalNav__item">Categories<ul>';
	foreach ( $categories as $cat ) {
		$catlist .= '<li><a href="' . get_category_link( $cat->term_id ) . '">' . $cat->name . '</a></li>';
	}
	$catlist .= '</ul></li>';

	return $catlist;
}

/*
 * Custom_Walker_nav Class
 */
class Custom_Walker_Nav_Menu extends Walker_Nav_Menu {

	public function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat( "\t", $depth );
		$output .= "\n$indent<ul role=\"menu\" class=\" dropdown-menu\">\n";
	}

	public function end_lvl( &$output, $depth = 0, $args = array() ) {

		$args = array(
			'type'                     => 'post',
			'child_of'                 => 0,
			'parent'                   => '',
			'orderby'                  => 'name',
			'order'                    => 'ASC',
			'hide_empty'               => 1,
			'hierarchical'             => 1,
			'exclude'                  => '',
			'include'                  => '',
			'number'                   => '',
			'taxonomy'                 => 'category',
			'pad_counts'               => false

		);
		$categories = get_categories( $args );
		$catlist = '<li>Categories<ul>';
		foreach ( $categories as $cat ) {
			$catlist .= '<li><a href="' . get_category_link( $cat->term_id ) . '">' . $cat->name . '</a></li>';
		}
		$catlist .= '</ul></li>';

		$output .= "\n$indent<ul class=\"sub-menu\">\n";
		$indent = str_repeat("\t", $depth);
		$output .= "$indent\$catlist</ul>\n";
	}

}
