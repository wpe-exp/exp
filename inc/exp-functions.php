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
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// add_filter( 'wp_footer', 'show_wp_query' );
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

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
 * Original excerpt
 */
function get_my_excerpt( $str, $max = 40 ) {
	if ( !is_int($max) ) $max = 40;
	$str = strip_tags( $str );
	$str_count = mb_strlen( $str, "UTF-8" );
	if ( $str_count > $max ) $str = mb_substr( $str, 0, $max, "UTF-8" ) . "...";
	return $str;
}

/*
 * get_primary_tag return array
 */
if ( !function_exists( 'get_primary_cat' ) ) {
	function get_primary_cat() {
		$cats = get_the_category( get_the_ID() );
		if ( !$cats ) return;
		$cat = reset($cats);
		return $cat;
	}
}

/*
 * Get the archive title
 */
if( !function_exists( 'the_custom_archive_title' ) ) {
	function the_custom_archive_title() {
		global $wp_query;

		$suffix = '記事一覧';
		if( is_category() ) {

			// for category archive
			single_cat_title();
			$suffix = 'の' . $suffix;

		} elseif ( is_tag() ) {

			// for tag archive
			single_tag_title();
			$suffix = 'の' . $suffix;

		} else {

			// for post type post archive
			$suffix = '新着' . $suffix;

		}

		echo $suffix;

	}
}

/*
 *
 */
function get_category_sub_menu_item() {
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
		$catlist = '<li class="has-children">Categories<ul class="globalnav__subList">';
		foreach ( $categories as $cat ) {
			$catlist .= '<li><a href="' . get_category_link( $cat->term_id ) . '">' . $cat->name . '</a></li>';
		}
		$catlist .= '</ul></li>';

		$output .= "\n$indent<ul class=\"sub-menu\">\n";
		$indent = str_repeat("\t", $depth);
		$output .= "$indent\$catlist</ul>\n";
	}

}
