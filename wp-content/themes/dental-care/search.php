<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Dental_Care
 */
global $wp_query;
get_header();
?>

<?php
$dental_care_cols_main = 'col-md-9 col-sm-12 col-xs-12';
$dental_care_cols_side = 'col-md-3 col-sm-12 col-xs-12';
$dental_care_layout = 'no-sidebar';

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
        <section id="primary" class="content-area  <?php echo esc_attr($dental_care_cols_main); ?>">
            <main id="main" class="site-main">
                <div class="search-content">
                    <?php if (have_posts()) : ?>
                        <header class="page-header">
                            <h6 class="search-title lead"><?php
                        echo esc_html__('Displaying ', 'dental-care');
                        echo esc_html($wp_query->found_posts);
                        printf(esc_html__(' results for: %s', 'dental-care'), '<span>' . get_search_query() . '</span>');
                        ?></h6>
                            <div class="search-form-wrapper">
                                <?php get_search_form(); ?>
                            </div>
                        </header><!-- .page-header -->

                        <?php /* Start the Loop */
                        ?>
                        <?php while (have_posts()) : the_post(); ?>

                            <?php
                            /**
                             * Run the loop for the search to output the results.
                             * If you want to overload this in a child theme then include a file
                             * called content-search.php and that will be used instead.
                             */
                            get_template_part('template-parts/content', 'search');
                            ?>
                        <?php endwhile; ?>

                    <?php else : ?>
                        <?php get_template_part('template-parts/content', 'none'); ?>
                    <?php endif; ?>
                </div>

                <nav class="navigation posts-navigation">
                    <h2 class="screen-reader-text"><?php esc_html_e('Posts navigation', 'dental-care'); ?></h2>
                    <div class="nav-links">            
                        <div class="nav-next"><?php next_posts_link('Older Entries') ?></div>
                        <div class="nav-previous"><?php previous_posts_link('Newer Entries ') ?></div>            
                    </div><!-- .nav-links -->
                </nav><!-- .navigation -->  

                <?php //the_posts_navigation();    ?>

            </main><!-- #main -->
        </section><!-- #primary -->
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
