<?php

/**
 *
 * Header sticky
 *
 * @package Dental_Care
 */
?>





<?php
$offset = "0";

if (is_user_logged_in()) {
    $offset = "30";
}

$allowed_html = array(
    'img' => array(
        'class' => true,
        'alt' => true,
        'width' => true,
        'height' => true,
        'src' => true,
        'srcset' => true,
        'sizes' => true,
    ),
     'a' => array(
        'href' => array(),
        'rel' => array(),
        'class' => array(),
        'style' => array(),
        'target' => array(),
        'onclick' => array(),
    ),
);
?>

<header class="masthead sticky-header-wrapper container-fluid header-one" data-offset="<?php echo esc_attr($offset); ?>">

    <?php
    if (class_exists('OT_Loader')) {
        if (ot_get_option('header_bg_area')) {
            ?>
            <div class="header-bg-wrapper">
                <?php
            }
        }
        ?>

        <div class="container-fluid header-top">
            <div class="container">
                <?php
                if (class_exists('OT_Loader')) {
                    if (!ot_get_option('top_header_info') == '') {
                        $top_header_info = ot_get_option('top_header_info', array());
                        if (!empty($top_header_info)) {
                            foreach ($top_header_info as $header_info) {
                                ?>

                                <div class="row header-top-row">
                        <?php
                        if ($header_info['header_top_left_custom'] == NULL) {
                            ?>

                            <div class="col-md-6 col-sm-12 col-xs-12 header-top-left">

                                <!-- Top Left Column 1 -->
                                <?php
                                if ($header_info['header_top_left_one'] || $header_info['header_top_left_one'] != "header-left-none") {
                                    if (($header_info['header_top_left_one'] == "header-left-number")) {
                                        if($header_info['title'] != ''){
                                        ?>
                                        <div class="header-top-contact">
                                            <div class="icon-wrapper">
                                                <i class="fa fa-phone"></i>
                                            </div>
                                            <p class="header-top-number">
                                                <?php
                                                if (!isset($header_info['title']) && empty($header_info['title'])) {
                                                    $header_info['title'] = '';
                                                }
                                                echo wp_kses($header_info['title'], $allowed_html);
                                                ?>
                                            </p>
                                        </div>
                                <?php
                                       }
                                     } else if (($header_info['header_top_left_one'] == "header-left-email")) {
                                          if($header_info['title'] != ''){
                                         ?>
                                        <div class="header-top-contact">
                                            <i class="fa fa-envelope"></i>
                                            <p class="header-top-email">
                                                <?php
                                                if (!isset($header_info['title']) && empty($header_info['title'])) {
                                                    $header_info['title'] = '';
                                                }
                                                ?>
                                                <a href="mailto:<?php echo esc_html($header_info['title']); ?>"><?php echo esc_html($header_info['title']); ?></a>
                                            </p>
                                        </div>
                                    <?php
                                          }
                                                } else if (($header_info['header_top_left_one'] == "header-left-address")) {

                                                     if($header_info['title'] != ''){
                                                    ?>
                                        <div class="header-top-contact">
                                            <div class="icon-wrapper">
                                                <i class="fa fa-map-marker"></i>
                                            </div>
                                            <p class="header-top-address">
                                                <?php
                                                if (!isset($header_info['title']) && empty($header_info['title'])) {
                                                    $header_info['title'] = '';
                                                }
                                                ?>
                                                <?php echo wp_kses($header_info['title'], $allowed_html); ?>
                                            </p>
                                        </div>
                                    <?php
                                                     }

                                                } else if (($header_info['header_top_left_one'] == "header-left-opening")) {
                                                     if($header_info['title'] != ''){
                                                    ?>
                                        <div class="header-top-contact">
                                            <div class="icon-wrapper">
                                                <i class="fa fa-clock-o"></i>
                                            </div>
                                            <?php
                                            if (!isset($header_info['title']) && empty($header_info['title'])) {
                                                $header_info['title'] = '';
                                            }
                                            ?>
                                            <p class="header-top-opening">
                                                <?php
                                                if (!isset($header_info['title']) && empty($header_info['title'])) {
                                                    $header_info['title'] = '';
                                                }
                                                echo wp_kses($header_info['title'], $allowed_html);
                                                ?>

                                            </p>
                                        </div>

                                    <?php
                                                     }
                                                } else if (($header_info['header_top_left_one'] == "header-left-appointment")) {
                                                     if($header_info['title'] != ''){
                                                    ?>
                                        <div class="header-top-appointment">
                                            <i class="fa fa-calendar"></i>
                                            <?php
                                            if (!isset($header_info['title']) && empty($header_info['title'])) {
                                                $header_info['title'] = '';
                                            }
                                            ?>
                                            <a href="<?php echo esc_url($header_info['title']); ?>"><?php echo esc_html($header_info['title']); ?></a>
                                        </div>
                                    <?php
                                                     }
                                            } ?>
                                <?php } ?>
                                <!-- Top Left Column 1 End-->

                                <!-- Top Left Column 2 -->
                                <?php
                                if ($header_info['header_top_left_two'] || $header_info['header_top_left_two'] != "header-left-none") {
                                    if (($header_info['header_top_left_two'] == "header-left-number")) {
                                         if($header_info['header_top_left_two_val'] != ''){
                                        ?>
                                        <div class="header-top-contact">
                                            <div class="icon-wrapper">
                                                <i class="fa fa-phone"></i>
                                            </div>
                                            <p class="header-top-number">
                                                <?php
                                                if (!isset($header_info['header_top_left_two_val']) && empty($header_info['header_top_left_two_val'])) {
                                                    $header_info['header_top_left_two_val'] = '';
                                                }
                                                echo wp_kses($header_info['header_top_left_two_val'], $allowed_html);
                                                ?>
                                            </p>
                                        </div>
                                    <?php
                                         }
                                                } else if (($header_info['header_top_left_two'] == "header-left-email")) {
                                                     if($header_info['header_top_left_two_val'] != ''){
                                                    ?>
                                        <div class="header-top-contact">
                                            <div class="icon-wrapper">
                                                <i class="fa fa-envelope"></i>
                                            </div>
                                            <p class="header-top-email">
                                                <?php
                                                if (!isset($header_info['header_top_left_two_val']) && empty($header_info['header_top_left_two_val'])) {
                                                    $header_info['header_top_left_two_val'] = '';
                                                }
                                                ?>
                                                <a href="mailto:<?php echo esc_html($header_info['header_top_left_two_val']); ?>"><?php echo esc_html($header_info['header_top_left_two_val']); ?></a>
                                            </p>
                                        </div>
                                    <?php
                                                     }
                                                } else if (($header_info['header_top_left_two'] == "header-left-address")) {
                                                     if($header_info['header_top_left_two_val'] != ''){
                                                    ?>
                                        <div class="header-top-contact">
                                            <div class="icon-wrapper">
                                                <i class="fa fa-map-marker"></i>
                                            </div>
                                            <p class="header-top-address">
                                                <?php
                                                if (!isset($header_info['header_top_left_two_val']) && empty($header_info['header_top_left_two_val'])) {
                                                    $header_info['header_top_left_two_val'] = '';
                                                }
                                                ?>
                                                <?php echo wp_kses($header_info['header_top_left_two_val'], $allowed_html); ?>
                                            </p>
                                        </div>
                                    <?php
                                                     }
                                                } else if (($header_info['header_top_left_two'] == "header-left-opening")) {
                                                     if($header_info['header_top_left_two_val'] != ''){
                                            ?>
                                        <div class="header-top-contact">
                                            <div class="icon-wrapper">
                                                <i class="fa fa-clock-o"></i>
                                            </div>
                                            <?php
                                            if (!isset($header_info['header_top_left_two_val']) && empty($header_info['header_top_left_two_val'])) {
                                                $header_info['header_top_left_two_val'] = '';
                                            }
                                            ?>
                                            <p class="header-top-opening"><?php echo wp_kses($header_info['header_top_left_two_val'], $allowed_html); ?></p>
                                        </div>

                                    <?php
                                                     }
                                            } else if (($header_info['header_top_left_two'] == "header-left-appointment")) {
                                                 if($header_info['header_top_left_two_val'] != ''){
                                        ?>
                                        <div class="header-top-appointment">
                                            <i class="fa fa-calendar"></i>
                                            <?php
                                            if (!isset($header_info['header_top_left_two_val']) && empty($header_info['header_top_left_two_val'])) {
                                                $header_info['header_top_left_two_val'] = '';
                                            }
                                            ?>
                                            <a href="<?php echo esc_url($header_info['header_top_left_two_val']); ?>"><?php echo esc_html($header_info['header_top_left_two_val']); ?></a>
                                        </div>
                                    <?php
                                                 }
                                            } ?>
                                <?php } ?>
                                <!-- Top Left Column 2 End-->

                                <!-- Top Left Column 3 -->
                                <?php
                                if ($header_info['header_top_left_three'] || $header_info['header_top_left_three'] != "header-left-none") {
                                    if (($header_info['header_top_left_three'] == "header-left-number")) {
                                         if($header_info['header_top_left_three_val'] != ''){
                                        ?>
                                        <div class="header-top-contact">
                                            <div class="icon-wrapper">
                                                <i class="fa fa-phone"></i>
                                            </div>
                                            <p class="header-top-number">
                                                <?php
                                                if (!isset($header_info['header_top_left_three_val']) && empty($header_info['header_top_left_three_val'])) {
                                                    $header_info['header_top_left_three_val'] = '';
                                                }
                                                ?>
                                                <?php echo wp_kses($header_info['header_top_left_three_val'], $allowed_html); ?>
                                            </p>
                                        </div>
                                    <?php
                                         }
                                                } else if (($header_info['header_top_left_three'] == "header-left-email")) {
                                                     if($header_info['header_top_left_three_val'] != ''){
                                                    ?>
                                        <div class="header-top-contact">
                                            <div class="icon-wrapper">
                                                <i class="fa fa-envelope"></i>
                                            </div>
                                            <p class="header-top-email">
                                                <?php
                                                if (!isset($header_info['header_top_left_three_val']) && empty($header_info['header_top_left_three_val'])) {
                                                    $header_info['header_top_left_three_val'] = '';
                                                }
                                                ?>
                                                <a href="mailto:<?php echo esc_html($header_info['header_top_left_three_val']); ?>"><?php echo esc_html($header_info['header_top_left_three_val']); ?></a>
                                            </p>
                                        </div>
                                    <?php
                                                     }
                                                } else if (($header_info['header_top_left_three'] == "header-left-address")) {
                                                     if($header_info['header_top_left_three_val'] != ''){
                                                    ?>
                                        <div class="header-top-contact">
                                            <div class="icon-wrapper">
                                                <i class="fa fa-map-marker"></i>
                                            </div>
                                            <p class="header-top-address">
                                                <?php
                                                if (!isset($header_info['header_top_left_three_val']) && empty($header_info['header_top_left_three_val'])) {
                                                    $header_info['header_top_left_three_val'] = '';
                                                }
                                                echo wp_kses($header_info['header_top_left_three_val'], $allowed_html);
                                                ?>
                                            </p>
                                        </div>
                                    <?php
                                                     }
                                                } else if (($header_info['header_top_left_three'] == "header-left-opening")) {
                                                     if($header_info['header_top_left_three_val'] != ''){
                                                    ?>
                                        <div class="header-top-contact">
                                            <div class="icon-wrapper">
                                                <i class="fa fa-clock-o"></i>
                                            </div>
                                            <p class="header-top-opening">
                                                <?php
                                                if (!isset($header_info['header_top_left_three_val']) && empty($header_info['header_top_left_three_val'])) {
                                                    $header_info['header_top_left_three_val'] = '';
                                                }
                                                echo wp_kses($header_info['header_top_left_three_val'], $allowed_html);
                                                ?>

                                            </p>
                                        </div>

                                    <?php
                                                     }
                                                } else if (($header_info['header_top_left_three'] == "header-left-appointment")) {
                                                     if($header_info['header_top_left_three_val'] != ''){
                                          ?>
                                        <div class="header-top-appointment">
                                            <i class="fa fa-calendar"></i>
                                            <?php
                                            if (!isset($header_info['header_top_left_three_val']) && empty($header_info['header_top_left_three_val'])) {
                                                $header_info['header_top_left_three_val'] = '';
                                            }
                                            ?>
                                            <a href="<?php echo esc_url($header_info['header_top_left_three_val']); ?>"><?php echo esc_html($header_info['header_top_left_three_val']); ?></a>
                                        </div>
                                    <?php
                                                     }
                                            } ?>
                                <?php } ?>
                                <!-- Top Left Column 3 End-->

                                <!-- Top Left Column 4 -->
                                <?php
                                if ($header_info['header_top_left_four'] || $header_info['header_top_left_four'] != "header-left-none") {
                                    if (($header_info['header_top_left_four'] == "header-left-number")) {
                                         if($header_info['header_top_left_four_val'] != ''){
                                        ?>
                                        <div class="header-top-contact">
                                            <div class="icon-wrapper">
                                                <i class="fa fa-phone"></i>
                                            </div>
                                            <p class="header-top-number">
                                                <?php
                                                if (!isset($header_info['header_top_left_four_val']) && empty($header_info['header_top_left_four_val'])) {
                                                    $header_info['header_top_left_four_val'] = '';
                                                }
                                                ?>
                                                <?php echo wp_kses($header_info['header_top_left_four_val'], $allowed_html); ?>
                                            </p>
                                        </div>
                                    <?php
                                         }
                                                } else if (($header_info['header_top_left_four'] == "header-left-email")) {
                                                     if($header_info['header_top_left_four_val'] != ''){
                                                    ?>
                                        <div class="header-top-contact">
                                            <div class="icon-wrapper">
                                                <i class="fa fa-envelope"></i>
                                            </div>
                                            <p class="header-top-email">
                                                <?php
                                                if (!isset($header_info['header_top_left_four_val']) && empty($header_info['header_top_left_four_val'])) {
                                                    $header_info['header_top_left_four_val'] = '';
                                                }
                                                ?>
                                                <a href="mailto:<?php echo esc_html($header_info['header_top_left_four_val']); ?>"><?php echo esc_html($header_info['header_top_left_four_val']); ?></a>
                                            </p>
                                        </div>
                                    <?php
                                                     }
                                                } else if (($header_info['header_top_left_four'] == "header-left-address")) {
                                                     if($header_info['header_top_left_four_val'] != ''){
                                                    ?>
                                        <div class="header-top-contact">
                                            <div class="icon-wrapper">
                                                <i class="fa fa-map-marker"></i>
                                            </div>
                                            <p class="header-top-address">
                                                <?php
                                                if (!isset($header_info['header_top_left_four_val']) && empty($header_info['header_top_left_four_val'])) {
                                                    $header_info['header_top_left_four_val'] = '';
                                                }
                                                echo wp_kses($header_info['header_top_left_four_val'], $allowed_html);
                                                ?>
                                            </p>
                                        </div>
                                    <?php
                                                     }
                                                } else if (($header_info['header_top_left_four'] == "header-left-opening")) {
                                                     if($header_info['header_top_left_four_val'] != ' '){
                                                    ?>
                                        <div class="header-top-contact">
                                            <div class="icon-wrapper">
                                                <i class="fa fa-clock-o"></i>
                                            </div>
                                            <p class="header-top-opening">
                                                <?php
                                                if (!isset($header_info['header_top_left_four_val']) && empty($header_info['header_top_left_four_val'])) {
                                                    $header_info['header_top_left_four_val'] = '';
                                                }
                                                echo wp_kses($header_info['header_top_left_four_val'], $allowed_html);
                                                ?>

                                            </p>
                                        </div>

                                    <?php
                                                     }
                                                } else if (($header_info['header_top_left_four'] == "header-left-appointment")) {
                                                     if($header_info['header_top_left_four_val'] != ''){
                                                    ?>
                                        <div class="header-top-appointment">
                                            <i class="fa fa-calendar"></i>
                                            <?php
                                            if (!isset($header_info['header_top_left_four_val']) && empty($header_info['header_top_left_four_val'])) {
                                                $header_info['header_top_left_four_val'] = '';
                                            }
                                            ?>
                                            <a href="<?php echo esc_url($header_info['header_top_left_four_val']); ?>"><?php echo esc_html($header_info['header_top_left_four_val']); ?></a>
                                        </div>
                                    <?php
                                                     }
                                            } ?>
                                <?php } ?>
                                <!-- Top Left Column 4 End-->

                            </div>
                            <?php
                        }
                        ?>
                        <?php if ($header_info['header_top_left_custom'] != NULL) { ?>
                            <div class="col-md-6 col-sm-12 col-xs-12 header-top-left-custom">
                                <?php
                                if (!isset($header_info['header_top_left_custom']) && empty($header_info['header_top_left_custom'])) {
                                    $header_info['header_top_left_custom'] = '';
                                }
                                echo wp_kses($header_info['header_top_left_custom'], $allowed_html);
                                ?>
                            </div>
                        <?php }
                        ?>
                        <div class="col-md-6 col-sm-12 col-xs-12 header-top-right">
                            <?php
                            if ($header_info['header_top_right'] || $header_info['header_top_right'] != "header-right-none") {
                                if (($header_info['header_top_right'] == "header-right-social")) {
                                    dental_care_add_social_menu();
                                } else if (($header_info['header_top_right'] == "header-right-custom")) {
                                    ?>
                                    <div><?php echo wp_kses($header_info['header_top_right_text'], $allowed_html); ?></div>
                                <?php
                                } else if (($header_info['header_top_right'] == "header-right-menu")) {
                                    if (has_nav_menu('top-header-menu')) {
                                        wp_nav_menu(array(
                                            "theme_location" => "top-header-menu",
                                            'container_class' => 'top-header-menu-wrapper',
                                            'menu_class' => 'top-header-nav-menu'
                                        ));
                                    }
                                }
                                ?>
                    <?php } ?>
                        </div>
                    </div>
                                <?php
                            }
                        }
                    }
                }
                ?>

            </div>
        </div>

        <div class="container">
            <div class="row bottom-header ">
                <div class="col-md-3 col-sm-3 col-xs-12 logo-wrap">
                    <?php
                    if (class_exists('OT_Loader')) {
                        if (ot_get_option('logo_sticky')) {

                            $logosticky_id = dental_care_get_attachment_id(ot_get_option('logo_sticky'));
                            $logosticky_url = ot_get_option('logo_sticky');
                            $caption = wp_get_attachment_caption($logosticky_id);

                            ?>
                            <div class="sticky-logo">
                                <a href="<?php echo esc_url(home_url('/')); ?>">
                                    <img src="<?php echo esc_url($logosticky_url); ?>" alt="<?php echo esc_attr($caption); ?>">
                                </a>
                            </div>
                            <?php
                        } else if ((ot_get_option('logo') == NULL)) {
                            ?>
                            <div class="site-title"><a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
                                <?php esc_html(bloginfo('name')); ?>
                            </a></div>
                            <?php
                        }
                    } else {
                        ?>
                        <div class="site-title"><a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
                            <?php esc_html(bloginfo('name')); ?>
                        </a></div>
                        <?php
                    }
                    ?>
                </div>
                <!-- Main Navigation -->
                <div class="col-md-7 col-sm-9 col-xs-12  main-navigation">
                    <nav id="site-navigation" class="navbar">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle pull-right" data-toggle="collapse" data-target=".navbar-main-collapse">
                                <span class="sr-only"><?php echo esc_html__('Toggle navigation', 'dental-care'); ?></span>
                                <i class="fa fa-align-justify mobile-menu-icon"></i>
                            </button>
                            <button type="button" class="navbar-toggle pull-right small-search"><span class="search-toggle"><i class="ti-search"></i></span></button>
                        </div>
                        <div class="collapse navbar-collapse navbar-main-collapse">
                            <?php
                            if (class_exists('OT_Loader')) {

                                if (ot_get_option('one_page_en') == "on") {
                                    if (has_nav_menu('one-page-menu')) {
                                        wp_nav_menu(
                                            array(
                                                'menu' => 'main',
                                                'menu_class' => 'nav navbar-nav stronghold-menu',
                                                'theme_location' => 'one-page-menu',
                                                'depth' => 0,
                                                'container' => false,
                                                'walker' => new stronghold_mega_menu_walker
                                            )
                                        );
                                    }
                                } else {
                                    if (has_nav_menu('primary')) {
                                        wp_nav_menu(
                                            array(
                                                'menu' => 'main',
                                                'menu_class' => 'nav navbar-nav stronghold-menu',
                                                'theme_location' => 'primary',
                                                'depth' => 0,
                                                'container' => false,
                                                'walker' => new stronghold_mega_menu_walker
                                            )
                                        );
                                    }
                                }
                            } else {
                                if (has_nav_menu('primary')) {
                                    wp_nav_menu(
                                        array(
                                            'menu' => 'main',
                                            'menu_class' => 'nav navbar-nav stronghold-menu',
                                            'theme_location' => 'primary',
                                            'depth' => 0,
                                            'container' => false,
                                            'walker' => new stronghold_mega_menu_walker
                                        )
                                    );
                                }
                            }
                            ?>
                        </div>
                    </nav>
                    <!--#site-navigation -->
                </div>


                <!-- Cart Icon -->
                <div class="col-md-2 hidden-xs hidden-sm nav-icons-right">
                    <?php
                    if (class_exists('WooCommerce')) {
                        if (class_exists('OT_Loader')) {

                            if (ot_get_option('cart_icon_en') == "on") {
                                ?>
                                <span class="pull-right nav-icon"><a class="cart-icon" href="<?php echo esc_url(wc_get_cart_url()); ?>"><i class="ti-shopping-cart"></i></a>
                                    <a href="#" class="badge nav-cart-badge">
                                        <?php echo esc_html(WC()->cart->cart_contents_count); ?>
                                    </a>
                                </span>
                                <?php
                            }
                        }
                    }
                    ?>
                    <a class="search-toggle pull-right nav-icon"><i class="ti-search"></i></a>
                </div>
            </div>
            <!-- Search Container -->
            <div id="search-container" class="search-box-wrapper clear container">
                <div class="search-box clear">
                    <?php get_search_form(); ?>
                </div>
            </div>
        </div>

    </header>
