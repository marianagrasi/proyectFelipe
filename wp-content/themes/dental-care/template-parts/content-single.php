<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Dental_Care
 */

global $post;

$allowed_html = array(
    'webkitallowfullscreen' => array(),
    'mozallowfullscreen' => array(),
    'allowfullscreen' => array(),
    'iframe' => array(
        'src' => array(),
        'width' => array(),
        'height' => array(),
        'frameborder' => array(),
    )
);
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="article-wrapper">
        <?php
        if (get_post_format() == 'video') {
            $dental_care_videourl = get_post_meta($post->ID, 'video_url', $single = true);
            if ($dental_care_videourl) {
                echo '<div class="video-featured-index">';
                echo wp_kses($dental_care_videourl, $allowed_html);
                echo '</div>';
            }
        } else if (get_post_format() == 'gallery') {
            $dental_care_images = explode(',', get_post_meta($post->ID, 'post_gallery_images_img', $single = true));
            if ($dental_care_images) {
                echo '<div class="gallery-featured-index">';
                echo '<div class="gallery-featured-slider owl-carousel">';
                foreach ($dental_care_images as $id) {
                    if (!empty($id)) {
                        $blogimg = wp_get_attachment_image($id, 'dental-care-featured-thumb');
                        echo '<a class="gallery-slide-img" href="' . get_permalink() . '"> ' . $blogimg . ' ';
                        echo '</a>';
                    }
                }
                echo '</div>';
                echo '</div>';
            }
        } else {
            ?>

            <div class="blog-single-featured">
                <?php the_post_thumbnail('full'); ?>
            </div>
        <?php } ?>
        <div class="article-content-wrapper">
            <header class="entry-header">


                <?php
                if (is_sticky()) {
                    echo '<i class="fa fa-thumb-tack sticky-post"></i>';
                }
                ?>

                <div class="entry-meta">
                    <?php
                    dental_care_posted_on();
                    /* translators: used between list items, there is a space after the comma */
                    $dental_care_categories_list = get_the_category_list(esc_html__(', ', 'dental-care'));
                    if ($dental_care_categories_list && dental_care_categorized_blog()) {
                        printf('<span class="cat-links">' . esc_html__('in: %1$s', 'dental-care') . '</span>', $dental_care_categories_list);
                    }
                    ?>
                </div><!-- .entry-meta -->
            </header><!-- .entry-header -->

            <div class="entry-content">
                <?php the_content(); ?>
                <?php
                wp_link_pages(array(
                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'dental-care'),
                    'after' => '</div>',
                ));
                ?>
            </div><!-- .entry-content -->
            <?php
            do_action('share_bar_include');
            ?>
            <footer class="entry-footer">
                <?php dental_care_entry_footer(); ?>

            </footer><!-- .entry-footer -->
        </div>
        <?php the_post_navigation(); ?>
    </div>

</article><!-- #post-## -->


<?php
get_template_part("inc/parts/author_box_part");
get_template_part("inc/parts/related_box_part");
?>
