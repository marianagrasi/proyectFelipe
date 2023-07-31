<?php
/**
 *
 * Displays single galleries
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

$allowed_html = array(
    'img' => array(
        'class' => true,
        'alt' => true,
        'width' => true,
        'height' => true,
        'src' => true,
        'srcset' => true,
        'sizes' => true,
    ),
);
?>

<div class="container">
    <div class="row">
        <div id="primary" class="content-area <?php echo esc_attr($dental_care_cols_main); ?>">
            <main id="main" class="site-main">

                <div class="gallery-main-wrapper">


              <?php while (have_posts()) : the_post(); ?>

                <div class="gallery-content">
                    <?php the_content(); ?>
                </div>

            <?php endwhile; // end of the loop.        ?>

            <div class="single-gallery-wrapper">
                <?php
                $dental_care_images = explode(',', get_post_meta($post->ID, 'gallery_images_img', $single = true));
                $dental_care_gallery_type = get_post_meta($post->ID, 'gallery_select', $single = true);
                $dental_care_video_gallery_list = get_post_meta($post->ID, 'video_gallery_list', $single = true);
                $dental_care_filter_gallery_list = get_post_meta($post->ID, 'filter_gallery_list', $single = true);
                $dental_care_captions_en = get_post_meta($post->ID, 'image_captions_en', $single = true);
                $dental_care_lightbox_en = get_post_meta($post->ID, 'image_lightbox_en', $single = true);
                $dental_care_links_en = get_post_meta($post->ID, 'image_links_en', $single = true);

                if ($dental_care_gallery_type == 'gallery_slider') {
                    if ($dental_care_images) {
                        if ($dental_care_lightbox_en == 'on' || $dental_care_lightbox_en == NULL) {
                            echo '<div class="gallery-slider gallery-lightbox-en">';
                        } else {
                            echo '<div class="gallery-slider">';
                        }

                        foreach ($dental_care_images as $id) {
                            if (!empty($id)) {
                                $full_src = wp_get_attachment_image_src($id, 'full');
                                $gallery_img = wp_get_attachment_image($id, 'full');
                                echo '<div class="gallery-slider-img">';

                                if ($dental_care_links_en == 'on' || $dental_care_links_en == NULL) {
                                    echo '<a class="gallery-slide-img" href="' . esc_url($full_src[0]) . '"> ' . $gallery_img . ' ';
                                    echo '</a>';
                                } else {
                                    echo wp_kses($gallery_img, $allowed_html);
                                }

                                if ($dental_care_captions_en == "on") {

                                    if (wp_get_attachment_caption($id) != NULL) {
                                        $caption = wp_get_attachment_caption($id);
                                    } else {
                                        $caption = ' ';
                                    }

                                    echo '<div class="gallery-img-caption">' . esc_html($caption) . '</div>';
                                }
                                echo '</div>';
                            }
                        }
                        echo '</div>';
                    }
                } else if ($dental_care_gallery_type == 'gallery_carousel') {
                    if ($dental_care_images) {
                        if ($dental_care_lightbox_en == 'on' || $dental_care_lightbox_en == NULL) {
                            echo '<div class="gallery-lightbox-en gallery-carousel">';
                        } else {
                            echo '<div class="gallery-carousel">';
                        }
                        foreach ($dental_care_images as $id) {
                            if (!empty($id)) {
                                $full_src = wp_get_attachment_image_src($id, 'full');
                                $gallery_img = wp_get_attachment_image($id, 'full');
                                echo '<div class="gallery-carousel-img">';

                                if ($dental_care_links_en == 'on' || $dental_care_links_en == NULL) {
                                    echo '<a class="gallery-slide-img" href="' . esc_url($full_src[0]) . '"> ' . $gallery_img . ' ';
                                    echo '</a>';
                                } else {
                                    echo wp_kses($gallery_img, $allowed_html);
                                }

                                if ($dental_care_captions_en == "on") {
                                    if (wp_get_attachment_caption($id) != NULL) {
                                        $caption = wp_get_attachment_caption($id);
                                    } else {
                                        $caption = ' ';
                                    }
                                    echo '<div class="gallery-img-caption">' . esc_html($caption) . '</div>';
                                }
                                echo '</div>';
                            }
                        }
                        echo '</div>';
                    }
                } else if ($dental_care_gallery_type == 'gallery_justified') {
                    if ($dental_care_captions_en == "on") {
                        $caps_en = "true";
                    } else {
                        $caps_en = "false";
                    }
                    if ($dental_care_images) {
                        if ($dental_care_lightbox_en == 'on' || $dental_care_lightbox_en == NULL) {
                            echo '<div class="gallery-lightbox-en gallery-justified">';
                        } else {
                            echo '<div class="gallery-justified" data-caps="' . esc_attr($caps_en) . '">';
                        }
                        foreach ($dental_care_images as $id) {
                            if (!empty($id)) {
                                $full_src = wp_get_attachment_image_src($id, 'full');
                                $gallery_img = wp_get_attachment_image($id, 'full');

                                if ($dental_care_links_en == 'on' || $dental_care_links_en == NULL) {
                                    echo '<a href="' . esc_url($full_src[0]) . '"> <img src="' . esc_url($full_src[0]) . '" alt="';

                                    if ($dental_care_captions_en == "on") {

                                        if (wp_get_attachment_caption($id) != NULL) {
                                            $caption = wp_get_attachment_caption($id);
                                        } else {
                                            $caption = ' ';
                                        }

                                        echo esc_attr($caption);
                                    }

                                    echo '"/> ';

                                    echo '</a>';
                                } else {

                                    echo '<img src="' . esc_url($full_src[0]) . '" alt="';

                                    if ($dental_care_captions_en == "on") {

                                        if (wp_get_attachment_caption($id) != NULL) {
                                            $caption = wp_get_attachment_caption($id);
                                        } else {
                                            $caption = ' ';
                                        }

                                        echo esc_attr($caption);
                                    }

                                    echo '"/> ';
                                }
                            }
                        }
                        echo '</div>';
                    }
                } else if ($dental_care_gallery_type == 'gallery_col_two') {
                    if ($dental_care_images) {
                        $img_count = 0;
                        if ($dental_care_lightbox_en == 'on' || $dental_care_lightbox_en == NULL) {
                            echo '<div class="gallery-lightbox-en gallery-two-col">';
                        } else {
                            echo '<div class="gallery-two-col">';
                        }

                        echo '<div class="row">';
                        foreach ($dental_care_images as $id) {
                            if (!empty($id)) {
                                $full_src = wp_get_attachment_image_src($id, 'full');
                                $gallery_img = wp_get_attachment_image($id, 'full');
                                echo '<div class="col-md-6 gallery-col-item">';
                                echo '<div class="gallery-col-img-wrapper">';

                                if ($dental_care_links_en == 'on' || $dental_care_links_en == NULL) {
                                    echo '<a href="' . esc_url($full_src[0]) . '"><span class="gallery-col-img-overlay">
                                    <i class="fa fa-link"></i>
                                    </span> ' . $gallery_img . ' ';

                                    echo '</a>';
                                } else {

                                    echo '<span class="gallery-col-img-overlay">
                                    <i class="fa fa-link"></i>
                                    </span> ' . $gallery_img . ' ';
                                }
                                echo '</div>';

                                if ($dental_care_captions_en == "on") {

                                    if (wp_get_attachment_caption($id) != NULL) {
                                        $caption = wp_get_attachment_caption($id);
                                    } else {
                                        $caption = ' ';
                                    }

                                    echo '<div class="gallery-img-caption">' . esc_html($caption) . '</div>';
                                }

                                echo '</div>';
                                $img_count++;
                                if ($img_count == 2) {
                                    $img_count = 0;
                                    echo '</div>';
                                    echo '<div class="row">';
                                }
                            }
                        }
                        if ($img_count < 2) {

                            echo '</div>';
                        }
                        echo '</div>';
                    }
                } else if ($dental_care_gallery_type == 'gallery_col_three') {
                    if ($dental_care_images) {
                        $img_count = 0;
                        if ($dental_care_lightbox_en == 'on' || $dental_care_lightbox_en == NULL) {
                            echo '<div class="gallery-lightbox-en gallery-three-col">';
                        } else {
                            echo '<div class="gallery-three-col">';
                        }
                        echo '<div class="row">';
                        foreach ($dental_care_images as $id) {
                            if (!empty($id)) {
                                $full_src = wp_get_attachment_image_src($id, 'full');
                                $gallery_img = wp_get_attachment_image($id, 'full');
                                echo '<div class="col-md-4 gallery-col-item">';
                                echo '<div class="gallery-col-img-wrapper">';

                                if ($dental_care_links_en == 'on' || $dental_care_links_en == NULL) {
                                    echo '<a href="' . esc_url($full_src[0]) . '"><span class="gallery-col-img-overlay">
                                    <i class="fa fa-link"></i>
                                    </span> ' . $gallery_img . ' ';

                                    echo '</a>';
                                } else {

                                    echo '<span class="gallery-col-img-overlay">
                                    <i class="fa fa-link"></i>
                                    </span> ' . $gallery_img . ' ';
                                }
                                echo '</div>';

                                if ($dental_care_captions_en == "on") {

                                    if (wp_get_attachment_caption($id) != NULL) {
                                        $caption = wp_get_attachment_caption($id);
                                    } else {
                                        $caption = ' ';
                                    }

                                    echo '<div class="gallery-img-caption">' . esc_html($caption) . '</div>';
                                }

                                echo '</div>';
                                $img_count++;
                                if ($img_count == 3) {
                                    $img_count = 0;
                                    echo '</div>';
                                    echo '<div class="row">';
                                }
                            }
                        }
                        if ($img_count < 3) {

                            echo '</div>';
                        }
                        echo '</div>';
                    }
                } else if ($dental_care_gallery_type == 'gallery_col_four') {
                    if ($dental_care_images) {
                        $img_count = 0;
                        if ($dental_care_lightbox_en == 'on' || $dental_care_lightbox_en == NULL) {
                            echo '<div class="gallery-lightbox-en gallery-four-col">';
                        } else {
                            echo '<div class="gallery-four-col">';
                        }

                        echo '<div class="row">';
                        foreach ($dental_care_images as $id) {
                            if (!empty($id)) {
                                $full_src = wp_get_attachment_image_src($id, 'full');
                                $gallery_img = wp_get_attachment_image($id, 'full');
                                echo '<div class="col-md-3 gallery-col-item">';
                                echo '<div class="gallery-col-img-wrapper">';

                                if ($dental_care_links_en == 'on' || $dental_care_links_en == NULL) {
                                    echo '<a href="' . esc_url($full_src[0]) . '"><span class="gallery-col-img-overlay">
                                    <i class="fa fa-link"></i>
                                    </span> ' . $gallery_img . ' ';

                                    echo '</a>';
                                } else {

                                    echo '<span class="gallery-col-img-overlay">
                                    <i class="fa fa-link"></i>
                                    </span> ' . $gallery_img . ' ';
                                }
                                echo '</div>';

                                if ($dental_care_captions_en == "on") {

                                    if (wp_get_attachment_caption($id) != NULL) {
                                        $caption = wp_get_attachment_caption($id);
                                    } else {
                                        $caption = ' ';
                                    }

                                    echo '<div class="gallery-img-caption">' . esc_html($caption) . '</div>';
                                }

                                echo '</div>';
                                $img_count++;
                                if ($img_count == 4) {
                                    $img_count = 0;
                                    echo '</div>';
                                    echo '<div class="row">';
                                }
                            }
                        }
                        if ($img_count < 4) {

                            echo '</div>';
                        }
                        echo '</div>';
                    }
                } else if ($dental_care_gallery_type == 'gallery_video') {

                    $video_count = 0;
                    echo '<div class="video-gallery-wrapper">';
                    echo '<div class="row">';
                    if (!empty($dental_care_video_gallery_list)) {
                        foreach ($dental_care_video_gallery_list as $video_item) {
                            if (isset($video_item['title']) && !empty($video_item['title'])) {
                                $url = $video_item['title'];
                            } else
                            $url = '';
                            if (isset($video_item['video_thumb']) && !empty($video_item['video_thumb'])) {
                                $image = $video_item['video_thumb'];
                            } else
                            $image = '';
                            if (isset($video_item['title']) && !empty($video_item['title']) && isset($video_item['video_thumb']) && !empty($video_item['video_thumb'])) {

                                echo '<div class="col-md-4 video-item-wrapper">';
                                echo '<div class="video-item">';
                                echo '<a href="' . esc_url($url) . '&width=960&height=580' . '" data-rel="prettyPhoto" title="Video Link"><span class="gallery-col-img-overlay"><i class="fa fa-play"></i>
                                </span><img src="' . esc_url($image) . '" alt="Video Thumb" /></a>'
                                . '</div></div>';
                            }
                            $video_count++;
                            if ($video_count == 3) {
                                $video_count = 0;
                                echo '</div>';
                                echo '<div class="row">';
                            }
                        }
                        if ($video_count < 3) {

                            echo '</div>';
                        }
                    }

                    echo '</div>';
                } else if ($dental_care_gallery_type == 'gallery_filter_category') {

                    echo '<div class="filter-gallery-wrapper">';

                    $args = array(
                        'type' => 'post',
                        'child_of' => 0,
                        'parent' => '',
                        'orderby' => 'name',
                        'order' => 'ASC',
                        'hide_empty' => 0,
                        'hierarchical' => 1,
                        'number' => '9999',
                        'taxonomy' => 'gallery-categories',
                        'pad_counts' => false,
                    );
                    $categories = get_categories($args);

                    echo '<div class="isotope-filter classcatFilter">';
                    echo ' <a href="#" data-filter="*" class="current">' . esc_html__('All Images', 'dental-care') . '</a>';
                    foreach ($categories as $cat) {
                        echo '<a href="#" data-filter=".' . esc_attr($cat->slug) . '">' . esc_html($cat->name) . '</a>';
                    }
                    echo '</div>';

                    if ($dental_care_lightbox_en == 'on' || $dental_care_lightbox_en == NULL) {
                        echo '<div class="gallery-lightbox-en isotope-images-container">';
                    } else {
                        echo '<div class="isotope-images-container">';
                    }

                    if (!empty($dental_care_filter_gallery_list)) {
                        foreach ($dental_care_filter_gallery_list as $gallery_image) {

                            echo '<div style="width:32.5%;" class="iso-cat-item ';

                            if (isset($gallery_image['gallery_cat'])) {
                                foreach ($gallery_image['gallery_cat'] as $category) {
                                    echo esc_attr($category) . " ";
                                }
                            }
                            echo '">';

                            if ($dental_care_links_en == 'on' || $dental_care_links_en == NULL) {

                                echo '<div class="iso-cat-img-wrapper"><a href="' . esc_url($gallery_image['gallery_cat_img']) . '"><span class="iso-overlay"><span class="cat-img-title">' . esc_html($gallery_image['title']) . '</span></span><img src="' . esc_url($gallery_image['gallery_cat_img']) . '" alt="Gallery Image"></a></div>';
                            } else {

                                echo '<div class="iso-cat-img-wrapper"><span class="iso-overlay"><span class="cat-img-title">' . esc_html($gallery_image['title']) . '</span></span><img src="' . esc_url($gallery_image['gallery_cat_img']) . '" alt="Gallery Image"></div>';
                            }
                            echo '  </div>';
                        }
                    }

                    echo '</div>';
                    echo '</div>';
                }
                ?>
            </div>
                            </div>

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
