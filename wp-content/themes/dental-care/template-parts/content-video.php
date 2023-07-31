<?php
/**
 * Video Post Format content
 * @package Dental_Care
 */

global $post;

$dental_care_videourl = get_post_meta($post->ID, 'video_url', $single = true);

$allowed_html = array(
    'webkitallowfullscreen' => array(),
    'mozallowfullscreen' => array(),
    'allowfullscreen' => array(),
    'i' => array(
        'class' => array(),
        'title' => array()
    ),
    'a' => array(
        'href' => array(),
        'rel' => array(),
        'onclick' => array(),
    ),
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
        if ($dental_care_videourl) {
            echo '<div class="video-featured-index">';
            echo wp_kses($dental_care_videourl, $allowed_html);
            echo '</div>';
        } else {
            echo '<div class="blog-index-featured">';
            echo '<a href="' . get_permalink() . '"><span class="blog-featured-img-overlay"><span class="overlay-read-more">' . esc_html__('Read Article', 'dental-care') . '</span></span></a>';
            echo '<a href="' . get_permalink() . '" title="' . esc_html__('Read ', 'dental-care') . get_the_title() . '" rel="bookmark">';
            echo the_post_thumbnail('dental-care-blog-thumb');
            echo '</a>';
            echo '</div>';
        }
        ?>

        <div class="article-content-wrapper">
            <header class="entry-header">
                <?php
                if (is_sticky()) {
                    echo '<i class="fa fa-thumb-tack sticky-post"></i>';
                }

                the_title(sprintf('<h4 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h4>');
                ?>
                <?php if ('post' == get_post_type()) : ?>
                    <div class="entry-meta">
                        <?php
                        dental_care_posted_on();
                        /* translators: used between list items, there is a space after the comma */
                        $dental_care_categories_list = get_the_category_list(esc_html__(', ', 'dental-care'));
                        if ($dental_care_categories_list && dental_care_categorized_blog()) {
                            printf('<span class="cat-links">' . esc_html__('in: %1$s', 'dental-care') . '</span>', $dental_care_categories_list);
                        }

                        if (!post_password_required() && ( comments_open() || '0' != get_comments_number() )) {
                            echo '<span class="comments-link">';
                            comments_popup_link(esc_html__('Leave a reply ', 'dental-care') . '<i class="fa fa-pencil-square-o"></i>', '<i class="fa fa-comment-o"></i>' . esc_html__('1 Comment', 'dental-care'), '<i class="fa fa-comments-o"></i>' . esc_html__('% Comments', 'dental-care'));
                            echo '</span>';
                        }
                        ?>

                    </div><!-- .entry-meta -->
                <?php endif; ?>
            </header><!-- .entry-header -->

            <div class="entry-content">
                 <?php
                if (class_exists('OT_Loader')) {
                if (ot_get_option('post_content_length') == 1) {
                    the_excerpt();
                } else {
                    /* translators: %s: Name of current post */
                    the_content(sprintf(
                                    /* translators: %s: Name of current post. */
                                    wp_kses(__('Continue reading %s <span class="meta-nav">&rarr;</span>', 'dental-care'), array('span' => array('class' => array()))), the_title('<span class="screen-reader-text">"', '"</span>', false)
                    ));
                }
            } else {
                    /* translators: %s: Name of current post */
                    the_content(sprintf(
                        /* translators: %s: Name of current post. */
                        wp_kses(__('Continue reading %s <span class="meta-nav">&rarr;</span>', 'dental-care'), array('span' => array('class' => array()))),
                        the_title('<span class="screen-reader-text">"', '"</span>', false)
                    ));
                }
                ?>

                <?php
                wp_link_pages(array(
                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'dental-care'),
                    'after' => '</div>',
                ));
                ?>
            </div><!-- .entry-content -->

            <footer class="entry-footer">

                <div class="read-more-wrapper pull-left">
                    <span><?php
                        echo '<a class="btn bread-more-btn" href="' . get_permalink() . '" title="' .
                        esc_html__('Read Article', 'dental-care') . get_the_title() . '" rel="bookmark"> ' . esc_html__('Read Article', 'dental-care') . ' <i class="fa fa-angle-double-right"></i></a>';
                        ?></span>
                </div>

            </footer><!-- .entry-footer -->
            <?php edit_post_link(esc_html__('Edit', 'dental-care'), '<span class="edit-link">', '</span>'); ?>
        </div>
    </div>
</article><!-- #post-## -->
