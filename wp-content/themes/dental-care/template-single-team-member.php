
<?php

/**
 *
 * Template Name: Single Team Member Template
 * Template Post Type: team-member
 *
 * @package Dental_Care
 */
get_header();
global $post;

$dental_care_team_member_pos = get_post_meta($post->ID, 'team_member_pos', $single = true);
$dental_care_team_member_social = get_post_meta($post->ID, 'team_member_social_list', $single = true);
$dental_care_team_member_details = get_post_meta($post->ID, 'team_member_details_list', $single = true);

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
    ),
    'img' => array(
        'src' => array(),
        'alt' => array(),
        'height' => array(),
        'width' => array(),
    )
);

$team_members_img = '';
$img_width = '';
$img_height = '';

if (class_exists('OT_Loader')) {
    if(ot_get_option('team_member_custom_img_en') == 'on' ){
        $img_width = ot_get_option('team_member_width');
        $img_height = ot_get_option('team_member_height');
        $team_members_img = get_the_post_thumbnail($post->ID, array($img_width, $img_height));
    }else{
      $team_members_img = get_the_post_thumbnail($post->ID, 'dental-care-team-single-thumb');
  }
}else{
  $team_members_img = get_the_post_thumbnail($post->ID, 'dental-care-team-single-thumb');
}

?>

<div class="container">
    <div class="row">
        <div id="primary" class="content-area <?php echo esc_attr($dental_care_cols_main); ?>">
            <main id="main" class="site-main">
                <?php while (have_posts()) : the_post(); ?>
                    <div class="row">
                        <div class="col-md-6 team-member-main-info">
                            <div class="team-member-img">
                                <?php echo wp_kses($team_members_img, $allowed_html); ?>
                            </div>
                            <div class="team-member-main-detail">
                                <h5 class="team-member-main-name"><?php echo get_the_title(); ?></h5>
                                <h6 class="team-member-main-pos"><?php echo esc_html($dental_care_team_member_pos); ?></h6>
                            </div>
                        </div>

                        <div class="col-md-6 team-member-additional-details">
                            <div class="team-member-social">
                                <?php
                                if (!empty($dental_care_team_member_social)) {
                                    echo '<ul class="team-member-social-list social-icons-list">';
                                    foreach ($dental_care_team_member_social as $socialnetwork) {
                                        if (isset($socialnetwork['title']) && !empty($socialnetwork['title'])) {
                                            $title = $socialnetwork['title'];
                                        } else
                                            $title = '';
                                        if (isset($socialnetwork['team_member_social_link']) && !empty($socialnetwork['team_member_social_link'])) {
                                            $link = $socialnetwork['team_member_social_link'];
                                        } else
                                            $link = '';
                                        if (isset($socialnetwork['title']) && !empty($socialnetwork['title']) && isset($socialnetwork['team_member_social_link']) && !empty($socialnetwork['team_member_social_link'])) {

                                            echo '<li>'
                                            . '<a class="" href="' . esc_url($link) . '" target="_blank" title="' . esc_attr($title) . '"></a>'
                                            . '</li>';
                                        }
                                    }
                                    echo '</ul>';
                                }
                                ?>
                            </div>
                            <div class="team-member-detail">
                                <?php
                                if (!empty($dental_care_team_member_details)) {
                                    echo '<ul class="team-member-detail-list">';
                                    foreach ($dental_care_team_member_details as $detail) {
                                        if (isset($detail['title']) && !empty($detail['title'])) {
                                            $title = $detail['title'];
                                        } else
                                            $title = '';
                                        if (isset($detail['team_member_desc']) && !empty($detail['team_member_desc'])) {
                                            $description = $detail['team_member_desc'];
                                        } else
                                            $description = '';
                                        if (isset($detail['title']) && !empty($detail['title']) && isset($detail['team_member_desc']) && !empty($detail['team_member_desc'])) {

                                            echo '<li class="">'
                                            . '<h6>' . esc_attr($title) . '</h6>' . wp_kses($description, $allowed_html) . ''
                                            . '</li>';
                                        }
                                    }
                                    echo '</ul>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>

                    <div class="team-member-content">
                        <?php the_content(); ?>
                    </div>

                <?php endwhile; // end of the loop.       ?>

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
<?php get_footer(); ?>
