<?php

/**
 * 
 * Header type 6
 *
 * @package Dental_Care
 */
?>

<?php
if (class_exists('OT_Loader')) {

    if (ot_get_option('header_bg_area')) {
        ?>
    </div>
    <?php
}
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



<header class="side-menu-fixed header-six">
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
            <div class="side-menu-nav">
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

    <div class="side-menu-icons">
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

        <!-- Search Container -->
        <div id="search-container" class="search-box-wrapper clear container">
            <div class="search-box clear">
                <?php get_search_form(); ?>
            </div>
        </div>
    </div>

</header>