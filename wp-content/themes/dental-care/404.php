<?php

/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Dental_Care
 */

get_header();
?>

<?php
if (class_exists('OT_Loader')) {

    if (ot_get_option('notfound_text')) {
        $notfoundtext = ot_get_option('notfound_text');
    } else {
        $notfoundtext = 'The page you are looking for does not exist. Try using the search form below.';
    }
} else {
    $notfoundtext = 'The page you are looking for does not exist. Try using the search form below.';
}

if (class_exists('OT_Loader')) {
    if (ot_get_option('notfound_title')) {
        $notfoundtitle = ot_get_option('notfound_title');
    } else {
        $notfoundtitle = 'Sorry, the requested page can\'t be found.';
    }
} else {
    $notfoundtitle = 'Sorry, the requested page can\'t be found.';
}

?>
<div class="notfound-wrapper">
    <div class="container">
        <div class="row">
            <div id="primary" class="content-area container">
                <main id="main" class="site-main">

                    <section class="error-404 not-found">
                        <header class="page-header">
                            <h1 class="page-title notfoundheader"><?php esc_html_e('404', 'dental-care'); ?></h1>
                        </header><!-- .page-header -->

                        <div class="page-content notfoundcontent">
                            <h3 class="notfound-title"><?php echo esc_html($notfoundtitle); ?></h3>
                            <p><?php echo esc_html($notfoundtext); ?></p>

                            <?php get_search_form(); ?>
                            <div class="home-btn-wrapper">
                                <a class="btn home-btn" href="<?php echo esc_url(home_url('/')); ?>"><?php echo esc_html__('Back to Home', 'dental-care'); ?></a>
                            </div>

                        </div><!-- .page-content -->
                    </section><!-- .error-404 -->

                </main><!-- #main -->
            </div><!-- #primary -->

        </div>
    </div>
</div>

<?php get_footer(); ?>