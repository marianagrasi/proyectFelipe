<?php
/**
 *
 * Top Header
 *
 * @package Dental_Care
 */
?>

<?php
if (class_exists('OT_Loader')) {
 if (ot_get_option('header_bg_area')) {
  ?>
<div class="header-bg-wrapper">
 <?php
 }
}


 $allowed_html = array(
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

<div class="container-fluid header-top header-top-mobile">
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
