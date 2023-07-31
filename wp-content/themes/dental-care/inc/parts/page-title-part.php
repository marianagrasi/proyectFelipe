<?php

/**
 *
 * Page title area
 *
 * @package Dental_Care
 */

global $post;

$dental_care_headeren = "off";
$dental_care_headerstyle = "";
$dental_care_title_en = "";

$dental_care_shop_page_header_en = '';
$dental_care_shop_headerselect = '';
$dental_care_shop_title_align = '';
$dental_care_shop_title_tag = '';
$dental_care_shop_header_img = '';
$dental_care_shop_header_overlay = '';
$dental_care_shop_header_style = '';
$dental_care_header_type = '';
$dental_care_archive_img = '';
$dental_care_title_tag = '';

$allowed_html = array(
    'span' => array(
        'class' => array(),
    )
);



if (is_page() || is_single() || get_post_type() == 'gallery' || get_post_type() == 'service' || get_post_type() == 'team-member' || get_post_type() == 'product') {
    $dental_care_headeren = get_post_meta($post->ID, 'page_header_en', $single = true);
    $dental_care_title_align = get_post_meta($post->ID, 'page_title_align', $single = true);
    $dental_care_title_tag = get_post_meta($post->ID, 'page_title_tag', $single = true);
    $dental_care_title_en = get_post_meta($post->ID, 'page_title_en', $single = true);
    $dental_care_headerselect = get_post_meta($post->ID, 'page_header_select', $single = true);
    $dental_care_headerstyle = get_post_meta($post->ID, 'page_header_style', $single = true);
    $dental_care_header_img = get_post_meta($post->ID, 'page_header_bg_img', $single = true);
    $dental_care_header_overlay = get_post_meta($post->ID, 'page_header_bg_overlay', $single = true);
    $dental_care_slider_en = get_post_meta($post->ID, 'head_slider_en', $single = true);
    $dental_care_slider_src = get_post_meta($post->ID, 'head_slider_select', $single = true);
}

if (class_exists('OT_Loader')) {
$dental_care_shop_page_header_en = ot_get_option('shop_page_header_en');
$dental_care_shop_headerselect = ot_get_option('shop_header_select');
$dental_care_shop_title_align = ot_get_option('shop_title_align');
$dental_care_shop_title_tag = ot_get_option('shop_title_tag');
$dental_care_shop_header_img = ot_get_option('shop_header_bg_img');
$dental_care_shop_header_overlay = ot_get_option('shop_header_bg_overlay');
$dental_care_shop_header_style = ot_get_option('shop_header_style');
$dental_care_header_type = ot_get_option('header_type');
$dental_care_archive_img = ot_get_option('archive_header_img');
}

/* Posts, pages, post types */
if (is_404()) {
    $dental_care_headeren = "off";
}

$header_style = "";
    if ($dental_care_headerstyle == "page_header_trsp"){
        $header_style = "page-header-transparent";
    }

if (is_search() || is_archive()) {
    $dental_care_headeren = "on";

    if($dental_care_header_type == 'header-five'){
        if($dental_care_archive_img != NULL){
           $dental_care_header_img = $dental_care_archive_img;
           $header_style = "page-header-transparent";
           $dental_care_headerselect = "page_header_bg";
        }else{
            $header_style = "page-header-transparent";
            $dental_care_headerselect = "page_header_std";
        }

    }else{
       $dental_care_headerselect = "page_header_std";
    }

    $dental_care_title_align = "page_title_left";
    $dental_care_header_overlay = "rgba(3, 169, 244, 0.8)";

    if (class_exists('WooCommerce')) {
        if (is_shop()) {
            $dental_care_headeren = "off";
            $dental_care_headerselect = "page_header_std";
            $dental_care_title_align = "page_title_left";
            $dental_care_header_overlay = "rgba(3, 169, 244, 0.8)";
        }
    }
}

if ($dental_care_headeren == NULL) {
    if (is_page() || is_single()) {
        $dental_care_headeren = "on";
        $dental_care_headerselect = "page_header_std";
        $dental_care_title_align = "page_title_left";
    }
}

if (($dental_care_headeren ) == "on" && !(is_404())) {
    $dental_care_page_title = get_the_title();

    if (is_search()) {
        $dental_care_page_title = esc_html__("Search Results", "dental-care");
    }

    if (is_archive()) {
        if (is_author()) {
            $dental_care_page_title = esc_html__("Author: ", "dental-care") . get_the_author();
        } else if (class_exists('WooCommerce')) {
            if (is_product_category()) {
                $dental_care_page_title = single_term_title("", false);
            } else {
                $dental_care_page_title = get_the_archive_title();
            }
        }
    }

    if ($dental_care_header_overlay == NULL) {
        $dental_care_header_overlay = 'rgba(3, 169, 244, 0.8)';
    }



    if ($dental_care_headerselect == "page_header_bg" && $dental_care_header_img != NULL) {

        echo '<div class="container-fluid page-title-wrapper-bg '.esc_attr($header_style).'" style="background: linear-gradient(
      ' . esc_attr($dental_care_header_overlay) . ',
      ' . esc_attr($dental_care_header_overlay) . '
    ),
    url(' . esc_url($dental_care_header_img) . ') no-repeat center center; background-size:cover;">';
    } else if ($dental_care_headerselect == "page_header_std") {
        echo '<div class="container-fluid page-title-wrapper '.esc_attr($header_style).'">';
    }

    echo '<div class="container">';
    echo '<div class="row page-title-info">';

    if($dental_care_title_en == "on" || $dental_care_title_en == ""){
    if ($dental_care_title_align == 'page_title_center') {
        echo '<div class="col-md-12 strhld-page-title strhld-page-title-center">';
    } else {
        echo '<div class="col-md-6 col-sm-12 col-xs-12 strhld-page-title">';
    }

    if($dental_care_title_tag == ''){
        $dental_care_title_tag = 'h1';
    }

    echo '<'.esc_html($dental_care_title_tag).' class="page-title-element">' . wp_kses($dental_care_page_title, $allowed_html) . '</'.esc_html($dental_care_title_tag).'>';
    echo '</div>';
    }


//Breadcrumbs
    if (($dental_care_headeren == "on") && !(is_404())) {
        if (is_search() || is_archive()) {
            $dental_care_breadcrumben = 'on';
        }

        if (is_page() || is_single() || get_post_type() == 'gallery' || get_post_type() == 'service' || get_post_type() == 'team-member') {
            $dental_care_breadcrumben = get_post_meta($post->ID, 'page_breadcrumben', $single = true);
        }

        if ($dental_care_breadcrumben == NULL) {
            if (is_page() || is_single() || get_post_type() == 'gallery' || get_post_type() == 'service' || get_post_type() == 'team-member') {
                $dental_care_breadcrumben = "on";
                $dental_care_title_align = 'page_title_left';
            }
        }

        if (($dental_care_breadcrumben) == 'on') {
            if ($dental_care_title_align == 'page_title_center') {
                echo '<div class="col-md-12  strhld-breadcrumb strhld-breadcrumb-center">';
            } else {
                echo '<div class="col-md-6 col-sm-12 col-xs-12  strhld-breadcrumb">';
            }

            if (function_exists('breadcrumb_trail') && !is_front_page() && !is_home()) {
                dental_care_add_breadcumb();
            }
        }
    }
    echo '</div>';

    echo '</div>';
    echo '</div>';
    echo '</div>';
}

//Revolution Slider area
if (!is_404()) {
    if (is_single() || is_page() || (get_post_type() == 'team-member') || (get_post_type() == 'service') || (get_post_type() == 'gallery')) {
        if ($dental_care_slider_en == "on") {

            if (class_exists('RevSliderFront')) {
                echo '<div class="dental-care-rev-wrapper container-fluid">';
                echo '<div class="row">';
                add_revslider($dental_care_slider_src);
                echo '</div>';
                echo '</div>';
            }
        }
    }
}


/* Shop */
if (class_exists('OT_Loader')) {

if (($dental_care_shop_page_header_en ) == "on") {
    if (class_exists('WooCommerce')) {
        if (is_shop()) {

            $shop_header_style = "";
            if ($dental_care_shop_header_style == "page_header_trsp"){
            $shop_header_style = "page-header-transparent";
            }

            $dental_care_page_title = dental_care_shop_page_title();

            if ($dental_care_shop_header_overlay == NULL) {
                $dental_care_shop_header_overlay = 'rgba(3, 169, 244, 0.8)';
            }

            if ($dental_care_shop_headerselect == "page_header_bg" && $dental_care_shop_header_img != NULL) {
                echo '<div class="container-fluid page-title-wrapper-bg '.esc_attr($shop_header_style).'" style="background: linear-gradient(
      ' . esc_attr($dental_care_shop_header_overlay) . ',
      ' . esc_attr($dental_care_shop_header_overlay) . '
    ),
    url(' . esc_url($dental_care_shop_header_img) . ') no-repeat center center; background-size:cover;">';
            } else if ($dental_care_shop_headerselect == "page_header_std") {
                echo '<div class="container-fluid page-title-wrapper '.esc_attr($shop_header_style).'">';
            }

            echo '<div class="container">';
            echo '<div class="row page-title-info">';

            if ($dental_care_shop_title_align == 'page_title_center') {
                echo '<div class="col-md-12 strhld-page-title strhld-page-title-center">';
            } else {
                echo '<div class="col-md-6 col-sm-12 col-xs-12 strhld-page-title">';
            }


             if($dental_care_shop_title_tag == ''){
               $dental_care_shop_title_tag = 'h1';
            }

            echo '<'.esc_html($dental_care_shop_title_tag).' class="page-title-element">' . esc_html($dental_care_page_title) . '</'.esc_html($dental_care_shop_title_tag).'>';
            echo '</div>';


            //Breadcrumbs
            $dental_care_breadcrumben_shop = ot_get_option('shop_breadcrumb_en');

            if (($dental_care_breadcrumben_shop) == 'on') {
                if ($dental_care_shop_title_align == 'page_title_center') {
                    echo '<div class="col-md-12  strhld-breadcrumb strhld-breadcrumb-center">';
                } else {
                    echo '<div class="col-md-6 col-sm-12 col-xs-12  strhld-breadcrumb">';
                }

                if (function_exists('breadcrumb_trail') && !is_front_page() && !is_home()) {
                    dental_care_add_breadcumb();
                }
            }
            echo '</div>';

            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
    }
}
}
