<?php
/**
 * Template Name: Team Members List Page
 * Displays team members list page
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
<div class="container">
    <div class="row">
        <div id="primary" class="content-area  <?php echo esc_attr($dental_care_cols_main); ?>">
            <main id="main" class="site-main">

                <?php
                // WP_Query arguments
                $args = array(
                    'post_type' => 'team-member',
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

                    $dental_care_team_member_pos = get_post_meta($post->ID, 'team_member_pos', $single = true);
                    $dental_care_team_member_social = get_post_meta($post->ID, 'team_member_social_list', $single = true);
                    $dental_care_team_member_bio = get_post_meta($post->ID, 'team_member_bio', $single = true);
                    ?>

                    <div class="team-member-block-list row">

                        <div class="col-md-4 team-member-block-list-img-wrapper">
                            <?php if (get_the_post_thumbnail() != NULL){?>
                            <div class="team-member-block-img">
                                <a rel="external" href="<?php echo the_permalink(); ?>"><?php the_post_thumbnail('dental-care-team-member-block-thumb'); ?><br /></a>

                                <a rel="external" href="<?php echo the_permalink(); ?>">
                                    <span class="team-member-block-img-overlay">
                                        <i class="fa fa-link"></i>
                                    </span>
                                </a>
                            </div>
                            <?php } ?>

                        </div>

                        <div class="col-md-8">
                            <div class="team-member-main-detail-list">
                                <h5 class="team-member-main-name"><a href="<?php echo the_permalink(); ?>"><?php echo get_the_title(); ?></a></h5>
                                <h6 class="team-member-main-pos"><?php echo esc_html($dental_care_team_member_pos); ?></h6>
                            </div>
                            <div class="team-member-block-social">

                                <?php
                                if (!empty($dental_care_team_member_social)) {
                                    echo '<ul class="team-member-block-social-list team-member-block-list-social-list social-icons-list">';
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
                            <div class="team-member-bio">
                                <?php echo wp_kses($dental_care_team_member_bio, $allowed_html); ?>
                            </div>

                            <div class="view-team-member-btn-wrapper">
                                <a class="btn view-team-member-btn" href="<?php echo the_permalink(); ?>"><?php echo esc_html__('Read More', 'dental-care') ?></a>
                            </div>
                        </div>

                    </div>
                <?php } ?>

            </main><!-- #main -->
        </div>

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
