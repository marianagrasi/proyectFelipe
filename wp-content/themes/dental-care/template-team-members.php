<?php
/**
 * Template Name: Team Members Grid Page
 * Displays team members grid page
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
$team_member_count = 3;
?>
<div class="container team-members-grid-container">
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

                    if ($team_member_count == 3) {
                        $team_member_count = 0;
                        echo '<div class="row">';
                    }
                    $team_member_count++;
                    ?>
                    <div class="col-md-4 team-member-block-item">
                        <div class="team-member-block">
                            <?php if (get_the_post_thumbnail() != NULL){?>
                            <div class="team-member-block-img">
                                <a rel="external" href="<?php echo the_permalink(); ?>"><?php the_post_thumbnail('dental-care-team-member-block-thumb'); ?><br /></a>
                                <div class="team-member-block-img-overlay">
                                    <div class="team-member-block-social">

                                        <?php
                                        if (!empty($dental_care_team_member_social)) {
                                            echo '<ul class="team-member-block-social-list social-icons-list">';
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
                                </div>
                            </div>
                            <?php }?>

                            <div class="team-member-main-detail">
                                <h5 class="team-member-main-name"><a href="<?php echo the_permalink(); ?>"><?php echo get_the_title(); ?></a></h5>
                                <h6 class="team-member-main-pos"><?php echo esc_html($dental_care_team_member_pos); ?></h6>
                            </div> 
                        </div>
                    </div>
                    <?php
                    if ($team_member_count == 3) {
                        echo '</div>';
                    }
                }
                if ($team_member_count < 3) {
                    echo '</div>';
                }
                ?>
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
  