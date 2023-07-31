<?php

/**
 *
 * Header type 3
 *
 * @package Dental_Care
 */
?>

<?php
$allowed_html = array(
    'abbr' => array(
        'title' => true,
    ),
    'acronym' => array(
        'title' => true,
    ),
    'b' => array(),
    'blockquote' => array(
        'cite' => true,
    ),
    'cite' => array(),
    'code' => array(),
    'em' => array(),
    'i' => array(),
    'q' => array(
        'cite' => true,
    ),
    'strike' => array(),
    'strong' => array(),
    'i' => array(
        'class' => array(),
        'title' => array(),
        'style' => array(),
    ),
    'a' => array(
        'href' => array(),
        'rel' => array(),
        'class' => array(),
        'style' => array(),
        'onclick' => array(),
    ),
    'p' => array(
        'class' => array(),
        'style' => array(),
    ),
    'ul' => array(
        'class' => array(),
        'style' => array(),
    ),
    'ol' => array(
        'class' => array(),
        'style' => array(),
    ),
    'img' => array(
        'class' => true,
        'alt' => true,
        'width' => true,
        'height' => true,
        'src' => true,
        'srcset' => true,
        'sizes' => true,
    ),
    'li' => array(
        'class' => array(),
        'style' => array(),
    ),
    'br' => array(
        'class' => array(),
        'style' => array(),
    )
);
?>

<?php
if (class_exists('OT_Loader')) {

    if (ot_get_option('top_header_en') == 'off') {
        if (ot_get_option('header_bg_area')) {
            ?>
            <div class="header-bg-wrapper">
                <?php
            }
        }
    }
    ?>

    <header class="masthead header-three container-fluid ">
        <div class="container bottom-header-branding-contact">
            <div class="container bottom-header-branding-contact">
                <div class="row">
                    <div class="logo-title-wrap">

                        <div class="logo-wrap">
                            <?php
                            if (class_exists('OT_Loader')) {

                                $logo_id = dental_care_get_attachment_id(ot_get_option('logo'));
                                $logo_url = ot_get_option('logo');

                                $caption = wp_get_attachment_caption($logo_id);

                                if ($caption == "") {
                                    $caption = "Logo";
                                }

                                if (ot_get_option('logo')) :

                                    ?>
                                    <div class="site-logo">
                                        <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
                                            <img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr($caption); ?>">
                                        </a>
                                    </div>
                                    <?php
                                endif;
                            }

                            if (class_exists('OT_Loader')) {

                                if ((ot_get_option('logo') == NULL)) {
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
                    </div>

                    <div class="col-md-9 col-sm-9 col-xs-9 contact-icons-wrapper">

                        <?php
                        if (class_exists('OT_Loader')) {
                            if (ot_get_option('call_us_text') != "") { ?>
                                <div class="col-md-4 col-sm-4 col-xs-4 call-us-contact">
                                    <div class="icon-wrapper">
                                        <?php
                                        if (ot_get_option('call_icon') == "") {
                                            ?>
                                            <i class="lnr lnr-phone-handset"></i>
                                            <?php
                                        } else {
                                            ?>
                                            <i class="<?php echo esc_attr(ot_get_option('call_icon')); ?>"></i>
                                            <?php
                                        }
                                        ?>


                                    </div>
                                    <div class="header-three-contact-info">
                                        <h6><?php echo wp_kses(ot_get_option('call_us_text'), $allowed_html); ?></h6>
                                        <p><?php echo wp_kses(ot_get_option('contact_number'), $allowed_html); ?></p>
                                    </div>

                                </div>
                                <?php
                            }
                        }
                        ?>

                        <?php
                        if (class_exists('OT_Loader')) {
                            if (ot_get_option('opening_hours_text') != "") { ?>
                                <div class="col-md-4 col-sm-4 col-xs-4 open-hours-contact">
                                    <div class="icon-wrapper">
                                        <?php
                                        if (ot_get_option('openhrs_icon') == "") {
                                            ?>
                                            <i class="lnr lnr-clock"></i>
                                            <?php
                                        } else {
                                            ?>
                                            <i class="<?php echo esc_attr(ot_get_option('openhrs_icon')); ?>"></i>
                                            <?php
                                        }
                                        ?>

                                    </div>
                                    <div class="header-three-contact-info">
                                        <h6><?php echo wp_kses(ot_get_option('opening_hours_text'), $allowed_html); ?></h6>
                                        <p><?php echo wp_kses(ot_get_option('contact_hours'), $allowed_html); ?></p>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>

                        <?php
                        if (class_exists('OT_Loader')) {

                            $book_link_target = ot_get_option('contact_book_link_target');
                            $link_target = '';

                            if($book_link_target == 'new-window'){
                                $link_target = '_blank';
                            }

                            if (ot_get_option('contact_book_text') != "") { ?>
                                <div class="col-md-4 col-sm-4 col-xs-4 book-appointment-contact">
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
                                    <div class="header-three-contact-info">
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

                    </div>
                </div>
                <!-- Main Navigation -->
            </div>
        </div>
    </header>

    <?php
    if (class_exists('OT_Loader')) {
        if (ot_get_option('header_bg_area')) {
            ?>
        </div>
        <?php
    }
}
?>

<header class="container header-three header-three-bottom-header-wrapper">
    <div class="row bottom-header">
        <div class="col-md-10 col-sm-10 col-xs-12  main-navigation">
            <nav id="site-navigation" class="navbar ">
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

        <!-- Search Container -->
        <div id="search-container" class="search-box-wrapper clear container">
            <div class="search-box clear">
                <?php get_search_form(); ?>
            </div>
        </div>

    </div>
</header>
