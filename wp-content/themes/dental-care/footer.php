<?php

/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Dental_Care
 */
?>
</div><!-- #content -->
</div><!-- #container fluid -->

<?php
$site_info_set = "col-md-6";
if (class_exists('OT_Loader')) {

    if (ot_get_option('footer_menu_type') == "menunone") {
        $site_info_set = "col-md-12 copyright-center";
    }
}

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
        'target' => array(),
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
    'li' => array(
        'class' => array(),
        'style' => array(),
    )
);
?>

<footer id="colophon" class="site-footer container-fluid">
    <?php get_sidebar('footer'); ?>
    <div class="site-info-wrapper row">
        <div class="container site-info">
            <div class="site-info-inner <?php echo esc_attr($site_info_set); ?> col-sm-12 col-xs-12">
                <?php
                if (class_exists('OT_Loader')) {

                    if (ot_get_option('copyright_text')) : ?>
                        <span class="copyright"><?php echo wp_kses(ot_get_option('copyright_text'), $allowed_html); ?></span>
                    <?php else : ?>
                        <span class="copyright">Copyright © 2023 Dental Care. All Rights Reserved.</span>

                    <?php endif;
                } else {
                    ?>
                    <span class="copyright">Copyright © 2023 Dental Care. All Rights Reserved.</span>
                <?php
                }

                ?>

                <?php
                if (class_exists('OT_Loader')) {

                    if (ot_get_option('back_top_en') == 'on') { ?>
                        <a href="" id="to-top" title="Back to top"></a>
                <?php
                    }
                }
                ?>
            </div>

            <?php
            if (class_exists('OT_Loader')) {

                if (ot_get_option('footer_menu_type') == "navmenu") : ?>
                    <div class="footer-menu col-md-6 col-sm-12 col-xs-12">
                        <?php
                        if (has_nav_menu('footer-menu')) {
                            wp_nav_menu(array(
                                "theme_location" => "footer-menu",
                                'container_class' => 'footer-menu-wrapper',
                                'menu_class' => 'footer-nav-menu'
                            ));
                        }
                        ?>
                    </div>
                <?php
                endif;
            }

            if (class_exists('OT_Loader')) {

                if (ot_get_option('footer_menu_type') == "socialmenu") :
                ?>
                    <div class="footer-menu col-md-6 col-sm-12 col-xs-12">
                        <?php dental_care_add_social_menu(); ?>
                    </div>
            <?php
                endif;
            }
            ?>

        </div><!-- .site-info -->
    </div>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php
if (class_exists('OT_Loader')) {

    if (ot_get_option('site_layout_style') == "boxed") { ?>
        </div>
        </div>
<?php
    }
}
?>

<?php wp_footer(); ?>

</body>

</html>
