<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Dental_Care
 */
get_header();
?>

<?php
$dental_care_cols_main = 'col-md-9 col-sm-12 col-xs-12';
$dental_care_cols_side = 'col-md-3 col-sm-12 col-xs-12';
$dental_care_layout = 'sidebar-right';

if (class_exists('OT_Loader')) {
$dental_care_layout = ot_get_option('layout-global');
}

if ($dental_care_layout == 'no-sidebar') {
    $dental_care_cols_main = 'col-md-12';
    $dental_care_cols_side = 'hidden';
} else if ($dental_care_layout == 'sidebar-right') {
    $dental_care_cols_main = 'col-md-9 col-sm-12 col-xs-12 pull-left';
    $dental_care_cols_side = 'col-md-3 col-sm-12 col-xs-12 pull-right';
} else if ($dental_care_layout == 'sidebar-left') {
    $dental_care_cols_main = 'col-md-9 col-sm-12 col-xs-12 pull-right';
    $dental_care_cols_side = 'col-md-3 col-sm-12 col-xs-12 pull-left';
}
?>

<div class="container">
    <div class="row">
        <div id="primary" class="content-area <?php echo esc_attr($dental_care_cols_main); ?>">
            <main id="main" class="site-main">

                <?php if (have_posts()) : ?>

                    <?php if (is_home() && !is_front_page()) : ?>
                        <header>
                            <h3 class="page-title screen-reader-text"><?php single_post_title(); ?></h3>
                        </header>
                    <?php endif; ?>

                    <?php /* Start the Loop */ ?>
                    <?php while (have_posts()) : the_post(); ?>

                        <?php
                        /*
                         * Include the Post-Format-specific template for the content.
                         * If you want to override this in a child theme, then include a file
                         * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                         */
                        get_template_part('template-parts/content', get_post_format());
                        ?>

                    <?php endwhile; ?>

                    <?php the_posts_navigation(); ?>

                <?php else : ?>

                    <?php get_template_part('template-parts/content', 'none'); ?>

                <?php endif; ?>

            </main><!-- #main -->
        </div><!-- #primary -->
        <?php
        if ($dental_care_cols_main != 'col-md-12') {
            echo '<div id="secondary" class="widget-area ' . esc_attr($dental_care_cols_side) . '">';
            get_sidebar();
            echo '</div>';
        }
        ?>  
    </div>    
</div>       
<?php get_footer(); ?>
