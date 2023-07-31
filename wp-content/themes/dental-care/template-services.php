




<?php
/**
 * Template Name: Services Grid Page
 * Displays services grid page
 *
 * @package Dental_Care
 */
$orig_post = $post;
global $post;

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
$services_count = 3;

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
<div class="container service-grid-container">
    <div class="row">
        <div id="primary" class="content-area  <?php echo esc_attr($dental_care_cols_main); ?>">
            <main id="main" class="site-main">

                <?php
                // WP_Query arguments
                $args = array(
                    'post_type' => 'service',
                    'post_status' => 'publish',
                    'pagination' => true,
                    'posts_per_page' => 9999
                );
                // The Query
                $query = new WP_Query($args);
                ?>
                <?php
                while ($query->have_posts()) {
                    $query->the_post();

                    $dental_care_service_desc = get_post_meta($post->ID, 'service_desc', $single = true);

                    if ($services_count == 3) {
                        $services_count = 0;
                        echo '<div class="row">';
                    }
                    $services_count++;
                    ?>
                    <div class="col-md-4 service-block-block-item">
                        <div class="service-block">
                            <?php if (get_the_post_thumbnail() != NULL){?>
                            <div class="service-block-img">
                                <a rel="external" href="<?php echo the_permalink(); ?>">
                                    <span class="service-block-img-overlay">
                                        <i class="fa fa-link"></i>
                                    </span>
                                </a>
                                <a rel="external" href="<?php echo the_permalink(); ?>"><?php the_post_thumbnail('dental-care-block-thumb'); ?><br /></a>
                            </div>
                            <?php } ?>
                            <div class="service-main-detail">
                                <h5 class="service-main-name"><a href="<?php echo the_permalink(); ?>"><?php echo get_the_title(); ?></a></h5>
                                <span class="service-desc"><?php echo wp_kses($dental_care_service_desc, $allowed_html); ?></span>
                            </div>

                        </div>

                    </div>
                    <?php
                    if ($services_count == 3) {
                        echo '</div>';
                    }
                    ?>
                    <?php
                }
                if ($services_count < 3) {
                    echo '</div>';
                }
                ?>
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
            <!-- #secondary -->
        <?php } ?>
    </div>
</div>

<?php get_footer(); ?>
