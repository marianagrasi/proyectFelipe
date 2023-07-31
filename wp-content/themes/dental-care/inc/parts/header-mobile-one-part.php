<?php
/**
 *
 * Header Mobile Part 1
 *
 * @package Dental_Care
 */


$logo_id = dental_care_get_attachment_id(get_theme_mod('theme_logo'));
$caption = wp_get_attachment_caption($logo_id);

if ($caption == "") {
    $caption = "Logo";
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

<div class="mobile-header mobile-header-one">

    <div class="container-fluid mobile-logo-area-wrapper">

        <div class="row">

        <div class="mobile-logo-area">

            <!-- Mobile Logo -->
                <div class="mobile-logo">
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
            <div class="mobile-menu-toggle">
                <button class="hamburger hamburger-collapse" type="button">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>

        <div class="mobile-menu-area">
            <?php if (has_nav_menu('mobile-menu')) { ?>
                <div class="mobile-menu">
                    <?php
                    wp_nav_menu(array('theme_location' => 'mobile-menu'));
                    ?>
                </div><!--mobile menu-->
                <?php
            }
            ?>

        </div>
    </div>

  </div>

</div>
