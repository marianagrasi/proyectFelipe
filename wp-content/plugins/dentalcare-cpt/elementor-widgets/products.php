<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

/**
 * Products
 */

class Dental_Care_Products extends Widget_Base
{

    /**
     * Retrieve the widget name.
     *
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'dental-care-products';
    }

    /**
     * Retrieve the widget title.
     *
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return esc_html__('Products', 'dental-care');
    }

    /**
     * Retrieve the widget icon.
     *
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'eicon-product-related';
    }

    /**
     * Retrieve the list of categories the widget belongs to.
     *
     * Used to determine where to display the widget in the editor.
     *
     * Note that currently Elementor supports only one category.
     * When multiple categories passed, Elementor uses the first one.
     *
     * @access public
     *
     * @return array Widget categories.
     */
    public function get_categories()
    {
        return ['dental-care'];
    }

    /**
     * Register the widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @access protected
     */
    protected function register_controls()
    {


        $this->start_controls_section(
            'section_product_settings',
            [
                'label' => esc_html__('Products Settings', 'dental-care'),
            ]
        );

        $this->add_control(
            'products_type',
            [
                'label' => esc_html__('Products Display Type', 'dental-care'),
                'type' => Controls_Manager::SELECT,
                "options" => array(
                    "" => "",
                    "products_carousel" => "Products Carousel",
                ),
                'description' => esc_html__('Choose products display type.', 'dental-care'),
            ]
        );

        $this->add_control(
            'num_items',
            [
                'label' => esc_html_x('Number of items', 'dental-care'),
                'type' => Controls_Manager::TEXT,
                'description' => esc_html__('Enter the number of items to display. Enter -1 to display all.', 'dental-care'),
            ]
        );

        $this->add_control(
            'carousel_speed',
            [
                'label' => esc_html_x('Carousel Speed (ms)', 'dental-care'),
                'type' => Controls_Manager::TEXT,
                'description' => esc_html__('Enter the number for the carousel speed. (Default: 5000)', 'dental-care'),
                'condition' => [
                    'products_type' => 'products_carousel',
                ],
            ]
        );

        $this->add_control(
            'arrows_en',
            [
                'label' => esc_html__('Navigation Arrows', 'dental-care'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('ON', 'dental-care'),
                'label_off' => esc_html__('OFF', 'dental-care'),
                'return_value' => 'true',
                'condition' => [
                    'products_type' => 'products_carousel',
                ],
            ]
        );

        $this->add_control(
            'carousel_items',
            [
                'label' => esc_html_x('Number of carousel items', 'dental-care'),
                'type' => Controls_Manager::TEXT,
                'description' => esc_html__('Enter the number of product columns to display in carousel.', 'dental-care'),
                'condition' => [
                    'products_type' => 'products_carousel',
                ],
            ]
        );

        $this->add_control(
            'products_cat_type',
            [
                'label' => esc_html__('Product Display Type', 'dental-care'),
                'type' => Controls_Manager::SELECT,
                "options" => array(
                    "" => "",
                    "recent_products" => "Recent Products",
                    "featured_products" => "Featured Products",
                    "best_sellers" => "Best Sellers",

                ),
                'description' => esc_html__('Choose to display either Recent, Featured or Best Selling products.', 'dental-care'),
            ]
        );

        $this->add_control(
            'filter_products_en',
            [
                'label' => esc_html__('Filter products by category', 'dental-care'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('ON', 'dental-care'),
                'label_off' => esc_html__('OFF', 'dental-care'),
                'description' => esc_html__('Choose if to order items', 'dental-care'),
                'return_value' => 'true',
            ]
        );

        $this->add_control(
            'product_category',
            [
                'label' => esc_html__('Product Category', 'dental-care'),
                'type' => ProductCategorySelect_Control::ProductCategorySelect,
                'condition' => [
                    'filter_products_en' => 'true',
                ],
                'description' => esc_html__('Choose a product category.', 'dental-care'),
            ]
        );

        $this->add_control(
            'product_cols',
            [
                'label' => esc_html__('Number of Columns', 'dental-care'),
                'type' => Controls_Manager::SELECT,
                "options" => array(
                    "" => "",
                    "three_col" => "3 Columns",
                    "four_col" => "4 Columns",
                    "six_col" => "6 Columns",
                ),
                'condition' => [
                    'products_type' => 'products_grid',
                ],
                'description' => esc_html__('Choose number of item columns.', 'dental-care'),
            ]
        );



        $this->end_controls_section();
    }

    /**
     * Render the widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @access protected
     */
    protected function render()
    {


        $settings = $this->get_settings_for_display();
        global $post;
        global $woocommerce;

        $carousel_id = 'carousel-'.mt_rand();

        if (class_exists('WooCommerce')) {


            if ($settings['products_type'] == 'products_carousel') {


                if ($settings['products_cat_type'] == 'best_sellers') {
                    if ($settings['product_category'] != '') {
                        $args = array(
                            'post_status' => 'publish',
                            'post_type' => 'product',
                            'ignore_sticky_posts' => 1,
                            'posts_per_page' => $settings['num_items'],
                            'meta_key' => 'total_sales',
                            'orderby' => 'meta_value_num',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'product_cat',
                                    'field' => 'slug',
                                    'terms' => $settings['product_category'],
                                ),
                            ),
                        );
                    } else {
                        $args = array(
                            'post_status' => 'publish',
                            'post_type' => 'product',
                            'ignore_sticky_posts' => 1,
                            'posts_per_page' => $settings['num_items'],
                            'meta_key' => 'total_sales',
                            'orderby' => 'meta_value_num',
                        );
                    }
                } else

                if ($settings['products_cat_type'] == 'featured_products') {
                    if ($settings['product_category'] != '') {

                        $args = array(
                            'post_type' => 'product',
                            'posts_per_page' => $settings['num_items'],
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'product_visibility',
                                    'field'    => 'name',
                                    'terms'    => 'featured',
                                ),
                                array(
                                    'taxonomy' => 'product_cat',
                                    'field' => 'slug',
                                    'terms' => $settings['product_category'],
                                ),
                            ),
                        );
                    } else {

                        $args = array(
                            'post_type' => 'product',
                            'posts_per_page' => -1,
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'product_visibility',
                                    'field'    => 'name',
                                    'terms'    => 'featured',
                                ),
                            ),
                        );
                    }
                } else {
                    if ($settings['product_category'] != '') {
                        $args = array(
                            'post_status' => 'publish',
                            'post_type' => 'product',
                            'ignore_sticky_posts' => 1,
                            'posts_per_page' => $settings['num_items'],
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'product_cat',
                                    'field' => 'slug',
                                    'terms' => $settings['product_category'],
                                ),
                            ),
                        );
                    } else {
                        $args = array(
                            'post_status' => 'publish',
                            'post_type' => 'product',
                            'ignore_sticky_posts' => 1,
                            'posts_per_page' => $settings['num_items'],
                        );
                    }
                }

                $query = new WP_Query($args);


                if ($settings['products_type'] == 'products_carousel') {


                    echo '<div class="dental-care-services-wrapper">';

                    if ($settings['arrows_en'] == true) {
                        echo '<div class="carousel_arrow_nav_top">';
                        echo '<a class="btn arrow_prev_top"><i class="fa fa-chevron-left"></i></a>';
                        echo '<a class="btn arrow_next_top"><i class="fa fa-chevron-right"></i></a>';
                        echo '</div>';
                    }

                    $postcount = $query->post_count;

                    echo '<div id="'.esc_attr($carousel_id).'" class="dental-care-products" data-speed="' . esc_attr($settings['carousel_speed']) . '" data-items="' . esc_attr($settings['carousel_items']) . '"">';

                    while ($query->have_posts()) {
                        $query->the_post();

                        global $product;

                        if (has_post_thumbnail()) {
                            $productname = get_the_title();
                            $productlink = get_the_permalink();
                            $productcart = $product->add_to_cart_url();
                            $productcat = wc_get_product_category_list($product->get_id());
                            $productimg = get_the_post_thumbnail($post->ID, 'stronghold-product-carousel-thumb');
                            $currency_position = get_option('woocommerce_currency_pos');

                            $min_price = '';
                            $max_price = '';
                            $price = '';

                            if ($product->is_type('simple')) {
                                $price = get_post_meta(get_the_ID(), '_price', true);
                            } elseif ($product->is_type('variable')) {
                                $min_price = $product->get_variation_price('min', true);
                                $max_price = $product->get_variation_price('max', true);
                                $price = $min_price . ' - ' . $max_price;
                            }

                            $attachment_img_ids = $product->get_gallery_image_ids();
                            $back_img_set = true;

                            if (!(isset($attachment_img_ids[0]))) {
                                $back_img_set = false;
                            }

                            echo '<div class="dental-care-product-item animated">';

                            echo '<div class="product_img_container_sc">';
                            echo '<a href="' . esc_url($productlink) . '">';
                            echo '<div class="product_img_front_sc"> ' . $productimg . ' </div>';

                            if ($back_img_set == true) {
                              echo '<div class="product_img_back_sc">' . wp_get_attachment_image($attachment_img_ids[0], 'stronghold-product-carousel-thumb') . '</div>';
                            }

                            echo '</a>';
                            echo '</div>';

                            if (!$product->is_in_stock()) :
                                echo '<span class="out_of_stock_badge onsale">' . esc_html__("Out of Stock", "dental-care") . '</span>';
                            endif;

                            if ($product->is_on_sale() && $product->is_in_stock()) :
                                echo '<span class="onsale">' . esc_html__("Sale!", "dental-care") . '</span>';
                        endif;

                        echo '<div class="product-info-wrapper">';
                        echo '<div class="product-info-sc" >';

                        echo '<div class="product-name-sc-wrap">';
                        echo '<h6 class="product-name-sc"><a href="' . esc_url($productlink) . '"> ' . esc_html($productname) . '</a></h6>';
                        echo '</div>';

                        echo '<div class="product-category">' . $productcat . '</div>';


                        if ($currency_position == 'left' && $price != '') {
                            echo '<div class="product-price">' . esc_html(get_woocommerce_currency_symbol()) . esc_html($price) . '</div>';
                        } elseif ($currency_position == 'right' && $price != '') {
                            echo '<div class="product-price">' . esc_html($price) . esc_html(get_woocommerce_currency_symbol()) . '</div>';
                        } elseif ($currency_position == 'left_space' && $price != '') {
                            echo '<div class="product-price">' . esc_html(get_woocommerce_currency_symbol()) . ' ' . esc_html($price) . '</div>';
                        } elseif ($currency_position == 'right_space' && $price != '') {
                            echo '<div class="product-price">' . esc_html($price) . ' ' . esc_html(get_woocommerce_currency_symbol()) . '</div>';
                        }

                        echo '</div>';
                        echo '</div>';

                        echo '</div>';
                    }


                }

                echo '</div>';
                echo '</div>';
                
                echo '</div>';
                wp_reset_postdata();
            } 
       

        wp_reset_postdata();
    } 
}

if (is_admin()){

  $items = $settings['carousel_items'];
  $speed = $settings['carousel_speed'];

  if($items == NULL){
    $items = 2;
}
if($speed == NULL){
    $speed = 5000;
}


if(($items != NULL) && ($speed != NULL)  && ($carousel_id != NULL)){

    echo
    "<script>

    'use strict';

    jQuery('#".$carousel_id."').slick({
      slidesToShow: ".$items.",
      autoplaySpeed: ".$speed.",
      autoplay: true,
      arrows: false,
      infinite: true,
      responsive: [
      {
          breakpoint: 1100,
          settings: {
            slidesToShow: 2
        }
        },
        {
          breakpoint: 800,
          settings: {
            slidesToShow: 1
        }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1
        }
    }
    ]
    });
    </script>";

}

}

}
}
