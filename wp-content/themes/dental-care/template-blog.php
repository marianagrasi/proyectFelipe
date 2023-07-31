<?php
/**
 * Template Name: Blog Page
 * Displays blog page
 *
 * @package Dental_Care
 */
$orig_post = $post;
global $post, $paged;

get_header();
?>
<?php
$dental_care_cols_main = 'col-md-9 col-sm-12 col-xs-12';
$dental_care_cols_side = 'col-md-3 col-sm-12 col-xs-12';
$dental_care_layout_val = get_post_meta($post->ID, 'page_layout', $single = true);
if ($dental_care_layout_val == 'no-sidebar') {
    $dental_care_cols_main = 'col-md-12';
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
        <div id="primary" class="content-area  <?php echo esc_attr($dental_care_cols_main); ?>">
            <main id="main" class="site-main">
                <?php
                $temp = $wp_query;
                $wp_query = null;
                $wp_query = new WP_Query();
                $wp_query->query('post_type=post' . '&paged=' . $paged);
                ?>

                <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
                    <?php get_template_part('template-parts/content', get_post_format()); ?>

                <?php endwhile; ?>

                <nav class="navigation posts-navigation">
                    <h2 class="screen-reader-text"><?php esc_html_e('Posts navigation', 'dental-care'); ?></h2>
                    <div class="nav-links">
                        <div class="nav-next"><?php next_posts_link(esc_html__('Older Entries', 'dental-care')) ?></div>
                        <div class="nav-previous"><?php previous_posts_link(esc_html__('Newer Entries ', 'dental-care')) ?></div>
                    </div><!-- .nav-links -->
                </nav><!-- .navigation -->
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
        }
        ?>
    </div>
</div>
<?php
get_footer();

$post = $orig_post;
wp_reset_query();
?>
