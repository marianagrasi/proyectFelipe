<?php
/**
 *
 * Displays single team member
 *
 * @package Dental_Care
 */
get_header();
global $post;

$dental_care_cols_main = 'col-md-9 col-sm-12 col-xs-12';
$dental_care_cols_side = 'col-md-3 col-sm-12 col-xs-12';
$dental_care_layout_val = get_post_meta($post->ID, 'page_layout', $single = true);

if (class_exists('OT_Loader')) {
    if ($dental_care_layout_val == NULL) {
        $dental_care_layout_val = ot_get_option('layout-global');
    }
}


if ($dental_care_layout_val == 'no-sidebar') {
    $dental_care_cols_main = 'col-md-12';
    $dental_care_cols_side = 'hidden';
} else if ($dental_care_layout_val == 'sidebar-right') {
    $dental_care_cols_main = 'col-md-9 col-sm-12 col-xs-12 pull-left';
    $dental_care_cols_side = 'col-md-3 col-sm-12 col-xs-12 pull-right';
} else if ($dental_care_layout_val == 'sidebar-left') {
    $dental_care_cols_main = 'col-md-9 col-sm-12 col-xs-12 pull-right';
    $dental_care_cols_side = 'col-md-3 col-sm-12 col-xs-12 pull-left';
}
$dental_care_sidebar = get_post_meta($post->ID, 'primary_sidebar', $single = true);
?>

<div class="container">
    <div class="row">
        <div id="primary" class="content-area <?php echo esc_attr($dental_care_cols_main); ?>">
            <main id="main" class="site-main">
                <?php while (have_posts()) : the_post(); ?>

                    <div class="team-member-content">
                        <?php the_content(); ?>
                    </div>

                <?php endwhile; // end of the loop.        ?>

            </main><!-- #main -->
        </div><!-- #primary -->

        <?php
        if (!($dental_care_layout_val == 'no-sidebar')) {
            echo '<div id="secondary" class="widget-area ' . esc_attr($dental_care_cols_side) . '" role="complementary">';
            ?>
            <?php
            if ($dental_care_sidebar == NULL) {
                get_sidebar();
            } else {
                if (!function_exists('dynamic_sidebar') || !dynamic_sidebar($dental_care_sidebar)) :
                    ?>
                    <?php
                endif;
            }


            echo '</div>';
            ?>
        <?php } ?>
    </div>
</div>

<?php

get_footer();
?>
