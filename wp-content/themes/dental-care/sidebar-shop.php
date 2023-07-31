<?php
/**
 * The sidebar containing the shop widget area.
 *
 * @package Dental_Care
 */

if ( ! is_active_sidebar( 'dental-care-shop-sidebar' ) ) {
	return;
}
?>

<div id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'dental-care-shop-sidebar' ); ?>
</div><!-- #secondary -->
