<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package exp
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <div id="fb-root"></div>

	<div data-offcanvas class="off-canvas-wrap">
		<div class="l-container inner-wrap">

			<?php (wp_is_mobile()) ? get_template_part( 'templates/header', 'sp' ) : get_template_part( 'templates/header', 'pc' ); ?>
