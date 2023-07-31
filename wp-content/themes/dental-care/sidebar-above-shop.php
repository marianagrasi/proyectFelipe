<?php
/**
 * The sidebar containing the above shop widget area.
 *
 * @package Dental_Care
 */

if ( ! is_active_sidebar( 'dental-care-above-shop-sidebar' ) ) {
	return;
}
?>

<div id="secondary" class="widget-area above-shop" role="complementary">
	<?php dynamic_sidebar( 'dental-care-above-shop-sidebar' ); ?>
</div><!-- #secondary -->
