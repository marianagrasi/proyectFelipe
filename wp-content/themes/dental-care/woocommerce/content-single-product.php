<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
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

?>

<?php
$dental_care_cols_main = 'col-md-12';
$dental_care_col_prod_img = 'col-md-5 col-sm-12 pull-left';
$dental_care_col_prod_desc = 'col-md-7 col-sm-12';
$dental_care_cols_side = 'hidden';
$dental_care_layout_val = 'no-sidebar';

if (class_exists('OT_Loader')) {
    if (ot_get_option('layout-single-prod') != NULL) {
        $dental_care_layout_val = ot_get_option('layout-single-prod');
    } else {
        $dental_care_layout_val = 'no-sidebar';
    }
} else {
    $dental_care_layout_val = 'no-sidebar';
}

if ($dental_care_layout_val == 'no-sidebar') {
    $dental_care_cols_main = 'col-md-12';
    $dental_care_col_prod_img = 'col-md-5 col-sm-12 pull-left';
    $dental_care_col_prod_desc = 'col-md-7 col-sm-12';
    $dental_care_cols_side = 'hidden';
} else if ($dental_care_layout_val == 'sidebar-right') {
    $dental_care_cols_main = 'col-md-9 col-sm-12 col-xs-12';
    $dental_care_col_prod_img = 'col-md-5 col-sm-12 pull-left';
    $dental_care_col_prod_desc = 'col-md-7 col-sm-12';
    $dental_care_cols_side = 'col-md-3 col-sm-12 col-xs-12';
} else if ($dental_care_layout_val == 'sidebar-left') {
    $dental_care_cols_main = 'col-md-9 col-sm-12 col-xs-12 pull-right';
    $dental_care_col_prod_img = 'col-md-5 col-sm-12';
    $dental_care_col_prod_desc = 'col-md-7 col-sm-12';
    $dental_care_cols_side = 'col-md-3 col-sm-12 col-xs-12 pull-left';
}

$dental_care_sidebar = get_post_meta($post->ID, 'primary_sidebar', $single = true);
?>

<div class="container">
    <div class="row">
        <?php
        /**
         * woocommerce_before_single_product hook
         *
         * @hooked wc_print_notices - 10
         */
        do_action('woocommerce_before_single_product');

        if (post_password_required()) {
            echo get_the_password_form();
            return;
        }
        ?>

        <div class="<?php echo esc_attr($dental_care_cols_main); ?>">
              <div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>

                <div class="product-img-wrapper <?php echo esc_attr($dental_care_col_prod_img); ?>">
                    <?php
                    /**
                     * woocommerce_before_single_product_summary hook
                     *
                     * @hooked woocommerce_show_product_sale_flash - 10
                     * @hooked woocommerce_show_product_images - 20
                     */
                    do_action('woocommerce_before_single_product_summary');
                    ?>
                </div>
                <div class="<?php echo esc_attr($dental_care_col_prod_desc); ?> summary entry-summary">

                    <?php
                    /**
                     * woocommerce_single_product_summary hook
                     *
                     * @hooked woocommerce_template_single_title - 5
                     * @hooked woocommerce_template_single_rating - 10
                     * @hooked woocommerce_template_single_price - 10
                     * @hooked woocommerce_template_single_excerpt - 20
                     * @hooked woocommerce_template_single_add_to_cart - 30
                     * @hooked woocommerce_template_single_meta - 40
                     * @hooked woocommerce_template_single_sharing - 50
                     */
                    do_action('woocommerce_single_product_summary');
                    ?>

                </div><!-- .summary -->

                <?php
                /**
                 * woocommerce_after_single_product_summary hook
                 *
                 * @hooked woocommerce_output_product_data_tabs - 10
                 * @hooked woocommerce_upsell_display - 15
                 * @hooked woocommerce_output_related_products - 20
                 */
                do_action('woocommerce_after_single_product_summary');
                ?>

                <meta itemprop="url" content="<?php the_permalink(); ?>" />

            </div><!-- #product-<?php the_ID(); ?> -->
        </div>
        <?php

            echo '<div class="' . esc_attr($dental_care_cols_side) . '" role="complementary">';
            ?>
            <?php
            if ($dental_care_sidebar == NULL) {

                get_sidebar('shop');
            } else {
                if (!function_exists('dynamic_sidebar') || !dynamic_sidebar($dental_care_sidebar)) :
                    ?>
                    <?php
                endif;
            }
            echo '</div>';
            ?>
        </div>

</div>
<?php do_action('woocommerce_after_single_product'); ?>
