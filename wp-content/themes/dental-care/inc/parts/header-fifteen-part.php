<?php

/**
 * 
 * Header type 15
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
    'br' => array(
        'class' => array(),
        'style' => array(),
    )
);
?>

<header class="masthead container-fluid header-thirteen header-fifteen">
    <div class="container">
        <div class="row bottom-header ">
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
                        <div class="site-title"><a class="" href="<?php echo esc_url(home_url('/')); ?>">
                            <?php esc_html(bloginfo('name')); ?>
                        </a></div>
                        <?php
                    }
                } else {
                    ?>
                    <div class="site-title"><a class="" href="<?php echo esc_url(home_url('/')); ?>">
                        <?php esc_html(bloginfo('name')); ?>
                    </a></div>
                    <?php
                }

                ?>
            </div>
            <!-- Main Navigation -->
            <div class=" main-navigation">
                <nav id="site-navigation" class="navbar">

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
                </nav>
                <!--#site-navigation -->
            </div>


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

            <?php 
            if (class_exists('OT_Loader')) {

                $book_link_target = ot_get_option('contact_book_link_target');
                $link_target = '';

                if($book_link_target == 'new-window'){
                    $link_target = '_blank';
                }

                if (ot_get_option('contact_book_text') != "") { ?>

                    <div class="header-booking-btn">
                        <?php
                        $book_type = ot_get_option('contact_book_type');

                        if ($book_type == "book-email") {
                            ?>
                            <a href="mailto:<?php echo get_permalink(ot_get_option('book_email')); ?>?subject=<?php echo esc_html(ot_get_option('contact_book_text')); ?>"><?php echo esc_html(ot_get_option('contact_book_text')); ?></a>
                        <?php } else if ($book_type == "book-link") { ?>
                            <a href="<?php echo esc_url(ot_get_option('book_link')); ?>" target="<?php echo esc_attr($link_target);?>"><?php echo wp_kses(ot_get_option('contact_book_text'), $allowed_html); ?></a>
                        <?php } else { ?>
                            <a href="<?php echo get_permalink(ot_get_option('contact_book_link')); ?>" target="<?php echo esc_attr($link_target);?>"><?php echo wp_kses(ot_get_option('contact_book_text'), $allowed_html); ?></a>
                        <?php }
                        ?>
                    </div>

                    <?php 
                } 
            }

            ?>


        </div>
        <!-- Search Container -->
        <div id="search-container" class="search-box-wrapper clear container">
            <div class="search-box clear">
                <?php get_search_form(); ?>
            </div>
        </div>
    </div>

</header>