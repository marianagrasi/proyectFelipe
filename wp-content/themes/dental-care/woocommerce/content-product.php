<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;
global $post;

$attachment_img_ids = $product->get_gallery_image_ids();

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<li <?php wc_product_class( '', $product ); ?>>
	<div class="product_item">
        <?php wc_get_template('loop/sale-flash.php'); ?>


        <?php if (!$product->is_in_stock()) : ?>
            <span class="out_of_stock_badge onsale"><?php echo esc_html__("Out of Stock", "dental-care"); ?></span>
        <?php endif; ?>

        <div class="product_img_container">
            <a href="<?php the_permalink(); ?>">

                <div class="product_img_front"><?php echo get_the_post_thumbnail($post->ID, 'shop_catalog') ?></div>

                <?php
                if ($attachment_img_ids) {
                    $loop = 0;
                    foreach ($attachment_img_ids as $attachment_id) {
                        $img_link = wp_get_attachment_url($attachment_id);
                        if (!$img_link)
                            continue;
                        $loop++;
                        printf('<div class="product_img_back">%s</div>', wp_get_attachment_image($attachment_id, 'shop_catalog'));
                        if ($loop == 1)
                            break;
                    }
                } else {
                    ?>

                    <div class="product_img_back "><?php echo get_the_post_thumbnail($post->ID, 'shop_catalog') ?></div>
                    <?php
                }
                ?>

            </a>

        </div>

        <h3 class="WC-product-name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

        <?php
        /**
         * woocommerce_before_shop_loop_item_title hook
         *
         * @hooked woocommerce_show_product_loop_sale_flash - 10
         * @hooked woocommerce_template_loop_product_thumbnail - 10
         */
          //do_action( 'woocommerce_before_shop_loop_item_title' );
        ?>

        <?php
        /**
         * woocommerce_after_shop_loop_item_title hook
         *
         * @hooked woocommerce_template_loop_rating - 5
         * @hooked woocommerce_template_loop_price - 10
         */
        do_action('woocommerce_after_shop_loop_item_title');
        ?>

        <?php
        //do_action('woocommerce_after_shop_loop_item');
        ?>
    </div>
</li>
