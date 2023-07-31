<?php
/**
 *
 * Header Mobile Part 2
 *
 * @package Dental_Care
 */
?>

<?php
$displace = 'on';
$side = 'right';

if (class_exists('OT_Loader')) {
    $displace = ot_get_option('mobile_displsce_en');
    $side = ot_get_option('mobile_menu_side');
}

 if (class_exists('OT_Loader')) {
    if (ot_get_option('top_mobile_header_en') == "on") {
        get_template_part("inc/parts/header-top-mobile-part");

        if (ot_get_option('mobile_top_header_view') == '1') {
          ?>
          <div class="mobile-top-header-toggle">
            <a class="mobile-top-header-toggle-btn" type="button"><i class="fa fa-caret-down"></i></a>
          </div>
          <?php
        }
      }
    }

?>

<div class="mobile-header-wrapper container-fluid">


<div class="mobile-header row" data-displace="<?php echo esc_attr($displace); ?>" data-side="<?php echo esc_attr($side); ?>">

    <!-- Mobile Logo -->
    <div class="mobile-logo col-md-6 pull-left">
        <?php
        if (class_exists('OT_Loader')) {
            if (ot_get_option('logo')) { ?>
                <a class="" href="<?php echo esc_url(home_url('/')); ?>">
                    <img src="<?php echo esc_url((ot_get_option('logo'))); ?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">
                </a>
                <?php
            }
        }
        ?>

        <?php
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
    <!-- Mobile Menu-->
    <div class="mobile-menu-toggle-wrapper col-md-6 pull-right">
        <div class="mobile-menu-toggle">
            <a id="mobile-menu-toggle-icon" href="#sidr"><i class="fa fa-bars"></i></a>
        </div>
    </div>
</div>

</div>



<div class="mobile-menu" id="sidr">
    <?php
    if (has_nav_menu('mobile-menu')) {
        wp_nav_menu(array('theme_location' => 'mobile-menu'));
    }
    ?>
    <?php get_search_form(); ?>
</div>
