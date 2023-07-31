<?php
/*
*  Template Name: Coming Soon Page
*/
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php esc_attr(bloginfo( 'charset' )); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php esc_url(bloginfo( 'pingback_url' )); ?>">
<?php
      if (!function_exists('has_site_icon') || !has_site_icon()) {
        if (class_exists('OT_Loader')) {
            if (ot_get_option('favicon')) {
                echo '<link rel="shortcut icon" href="' . esc_url(ot_get_option('favicon')) . '" />' . "\n";
            }
        }
    }
        ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php
         if ( ! function_exists( 'wp_body_open' ) ) {
            function wp_body_open() {
                do_action( 'wp_body_open' );
            }
        } 
        ?>
        <div id="page" class="hfeed site">


<?php
$dental_care_cols_main = 'col-md-12';

?>
<div class="container coming-soon-container">
    <div class="row">
        <div id="primary" class="content-area  <?php echo esc_attr($dental_care_cols_main); ?>">
            <main id="main" class="site-main">
                <?php while (have_posts()) : the_post(); ?>
                    <?php get_template_part('template-parts/content', 'page'); ?>

                    <?php
                    // If comments are open or we have at least one comment, load up the comment template
                    if (comments_open() || get_comments_number()) :
                        comments_template();
                    endif;
                    ?>

                <?php endwhile; // end of the loop.  ?>

            </main><!-- #main -->
        </div><!-- #primary -->  
    </div>
</div>       
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
