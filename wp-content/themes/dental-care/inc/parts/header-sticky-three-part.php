<?php

/**
 *
 * Header sticky
 *
 * @package Dental_Care
 */
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
);
?>

<header class="masthead sticky-header-wrapper container-fluid header-one" data-offset="<?php echo esc_attr($offset); ?>">
    <div class="container">
        <div class="row bottom-header ">
            <div class="logo-wrap">
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
            <div class="main-navigation">
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


            <!-- Book Button -->

            <?php
            if (class_exists('OT_Loader')) {

                $book_link_target = ot_get_option('contact_book_link_target');
                $link_target = '';

                if($book_link_target == 'new-window'){
                    $link_target = '_blank';
                }

                if (ot_get_option('contact_book_text') != "") { ?>
                    <div class="header-contact-info">
                        <div class="icon-wrapper">
                            <?php
                            if (ot_get_option('book_icon') == "") {
                                ?>
                                <i class="lnr lnr-calendar-full"></i>
                                <?php
                            } else {
                                ?>
                                <i class="<?php echo esc_attr(ot_get_option('book_icon')); ?>"></i>
                                <?php
                            }
                            ?>

                        </div>
                        <div class="hcontact-info">
                            <?php
                            $book_type = ot_get_option('contact_book_type');

                            if ($book_type == "book-email") {
                                ?>
                                <h6><a href="mailto:<?php echo get_permalink(ot_get_option('book_email')); ?>?subject=<?php echo wp_kses(ot_get_option('contact_book_text'), $allowed_html); ?>"><?php echo wp_kses(ot_get_option('contact_book_text'), $allowed_html); ?></a></h6>
                            <?php } else if ($book_type == "book-link") { ?>
                                <h6><a href="<?php echo esc_url(ot_get_option('book_link')); ?>" target="<?php echo esc_attr($link_target);?>"><?php echo wp_kses(ot_get_option('contact_book_text'), $allowed_html); ?></a></h6>
                            <?php } else { ?>
                                <h6><a href="<?php echo get_permalink(ot_get_option('contact_book_link')); ?>" target="<?php echo esc_attr($link_target);?>"><?php echo wp_kses(ot_get_option('contact_book_text'), $allowed_html); ?></a></h6>
                            <?php }
                            ?>
                            <p><?php echo wp_kses(ot_get_option('contact_book_subtext'), $allowed_html); ?></p>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
            <!-- Book Button -->




            <!-- Cart Icon -->

            <div class="nav-icons-right">
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

            <!-- Cart Icon -->



        </div>
        <!-- Search Container -->
        <div id="search-container" class="search-box-wrapper clear container">
            <div class="search-box clear">
                <?php get_search_form(); ?>
            </div>
        </div>
    </div>

</header>
