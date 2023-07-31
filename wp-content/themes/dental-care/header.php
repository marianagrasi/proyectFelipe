<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Dental_Care
 */

global $post;

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <?php
    if (!function_exists('has_site_icon') || !has_site_icon()) {
        if (class_exists('OT_Loader')) {
            if (ot_get_option('favicon')) {
                echo '<link rel="shortcut icon" href="' . esc_url(ot_get_option('favicon')) . '" />' . "\n";
            }
        }
    }
    ?>
    <?php wp_head(); ?>
</head>



<?php

if (class_exists('OT_Loader')) {

    if (ot_get_option('header_type') == "header-six") { ?>
        <body <?php body_class('side-menu'); ?>>
         <?php
         if ( ! function_exists( 'wp_body_open' ) ) {
            function wp_body_open() {
                do_action( 'wp_body_open' );
            }
        }
        ?>

    <?php } else {
        ?>
        <body <?php body_class(); ?>>
         <?php
         if ( ! function_exists( 'wp_body_open' ) ) {
            function wp_body_open() {
                do_action( 'wp_body_open' );
            }
        }
        ?>

        <?php
    }

}else{
    ?>
    <body <?php body_class(); ?>>
     <?php
     if ( ! function_exists( 'wp_body_open' ) ) {
        function wp_body_open() {
            do_action( 'wp_body_open' );
        }
    }
    ?>

    <?php
}
?>



<?php
if (class_exists('OT_Loader')) {
    if (ot_get_option('header_type') == "header-six") {
        get_template_part("inc/parts/header-six-part");
    }
}


$page_class = '';

if (get_post_type() == 'page' || get_post_type() == 'post' || get_post_type() == 'team-member' || get_post_type() == 'gallery' || get_post_type() == 'service' || get_post_type() == 'product') {
    $page_class = get_post_meta($post->ID, 'page_class', $single = true);
}
?>

<?php
if (class_exists('OT_Loader')) {
    if (ot_get_option('site_layout_style') == "boxed") { ?>
        <div class="container site-wrap">
            <div class="row">
                <?php
            }
        }

        ?>

        <div id="page" class="hfeed site <?php echo esc_attr($page_class); ?>">
            <a class="skip-link screen-reader-text" href="#main-content"><?php esc_html_e('Skip to content', 'dental-care'); ?></a>

            <?php
            if (class_exists('OT_Loader')) {
                if (ot_get_option('top_header_en') == "on") {
                    get_template_part("inc/parts/header-top-part");
                }
                if (ot_get_option('header_type') == "header-one") {
                    get_template_part("inc/parts/header-one-part");
                } else if (ot_get_option('header_type') == "header-two") {
                    get_template_part("inc/parts/header-two-part");
                } else if (ot_get_option('header_type') == "header-three") {
                    get_template_part("inc/parts/header-three-part");
                } else if (ot_get_option('header_type') == "header-four") {
                    get_template_part("inc/parts/header-four-part");
                } else if (ot_get_option('header_type') == "header-five") {
                    get_template_part("inc/parts/header-five-part");
                } else if (ot_get_option('header_type') == "header-seven") {
                    get_template_part("inc/parts/header-seven-part");
                } else if (ot_get_option('header_type') == "header-eight") {
                    get_template_part("inc/parts/header-eight-part");
                } else if (ot_get_option('header_type') == "header-nine") {
                    get_template_part("inc/parts/header-nine-part");
                } else if (ot_get_option('header_type') == "header-ten") {
                    get_template_part("inc/parts/header-ten-part");
                } else if (ot_get_option('header_type') == "header-eleven") {
                    get_template_part("inc/parts/header-eleven-part");
                } else if (ot_get_option('header_type') == "header-twelve") {
                    get_template_part("inc/parts/header-twelve-part");
                } else if (ot_get_option('header_type') == "header-thirteen") {
                    get_template_part("inc/parts/header-thirteen-part");
                } else if (ot_get_option('header_type') == "header-fourteen") {
                    get_template_part("inc/parts/header-fourteen-part");
                } else if (ot_get_option('header_type') == "header-fifteen") {
                    get_template_part("inc/parts/header-fifteen-part");
                }else if (ot_get_option('header_type') == "header-sixteen") {
                    get_template_part("inc/parts/header-sixteen-part");
                }else if (ot_get_option('header_type') == "header-seventeen") {
                    get_template_part("inc/parts/header-seventeen-part");
                }else if (ot_get_option('header_type') == "header-eighteen") {
                    get_template_part("inc/parts/header-eighteen-part");
                }else if (ot_get_option('header_type') == "header-nineteen") {
                    get_template_part("inc/parts/header-nineteen-part");
                }

            }else{
                get_template_part("inc/parts/header-one-part");
            }


            if (class_exists('OT_Loader')) {
                if (ot_get_option('header_type') == NULL) {
                    get_template_part("inc/parts/header-one-part");
                }
            }

            if (class_exists('OT_Loader')) {
                if (ot_get_option('sticky_nav_en') == 'on') {
                    if (ot_get_option('sticky_header_type') == "header-one") {
                        get_template_part("inc/parts/header-sticky-one-part");
                    } else if (ot_get_option('sticky_header_type') == "header-two") {
                        get_template_part("inc/parts/header-sticky-two-part");
                    }else if (ot_get_option('sticky_header_type') == "header-three") {
                        get_template_part("inc/parts/header-sticky-three-part");
                    }

                    if (ot_get_option('sticky_header_type') == NULL) {
                        get_template_part("inc/parts/header-sticky-one-part");
                    }
                }
            }

            if (class_exists('OT_Loader')) {

                if (ot_get_option('mobile_menu_type') == 'dropdown') {
                  get_template_part("inc/parts/header-mobile-one-part");
              }else{
               get_template_part("inc/parts/header-mobile-two-part");
           }
       }else {
        get_template_part("inc/parts/header-mobile-one-part");
    }

    ?>


    <?php
    if (class_exists('OT_Loader')) {

        if (ot_get_option('mobile_header_en') == "on") {
            get_template_part("inc/parts/header-mobile-part");
        }
    }
    ?>

    <?php
    get_template_part("inc/parts/page-title-part");
    ?>

    <?php
    $site_padding = '';
    $dental_care_padding_en = '';

    if (is_page() || is_single() || get_post_type() == 'gallery' || get_post_type() == 'service' || get_post_type() == 'team-member' || get_post_type() == 'product') {

        $dental_care_padding_en = get_post_meta($post->ID, 'page_padding_en', $single = true);

        if ($dental_care_padding_en == 'off') {
            $site_padding = 'no-padding';
        }
    }

    if (class_exists('WooCommerce')) {
        if (is_shop()) {
           if (class_exists('OT_Loader')) {
            $dental_care_padding_en = ot_get_option('shop_page_padding_en');
        }
    }
    if ($dental_care_padding_en == 'off') {
        $site_padding = 'no-padding';
    }
}
?>
<!-- #container fluid -->
<div class="container-fluid">
    <!-- #content -->
    <div id="main-content" class="site-content row <?php echo esc_attr($site_padding); ?>">
