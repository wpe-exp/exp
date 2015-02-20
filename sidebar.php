<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package exp
 */

if ( ! is_activeexpidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div id="secondary" class="widget-area" role="complementary">
	<?php dynamicexpidebar( 'sidebar-1' ); ?>
</div><!-- #secondary -->
