<?php
/**
 * 
 * Author Box 
 *
 * @package Dental_Care
 */
if (get_the_author()) {
    $dental_care_author_mail = get_the_author_meta('user_email');
}

if (get_the_author_meta('first_name'))
    $dental_care_author_name = get_the_author_meta('first_name') . ' ' . get_the_author_meta('last_name');
else {
    $dental_care_author_name = get_the_author();
}
$dental_care_author_link = esc_url(get_author_posts_url(get_the_author_meta('ID')));
?>
<div class="author-box author-box-archive col-md-12">
    <a href="<?php echo esc_url($dental_care_author_link); ?>" class="author-img">
        <?php echo get_avatar($dental_care_author_mail, '90'); ?>
    </a>

    <h5 class="author-name"><a href="<?php echo esc_url($dental_care_author_link); ?>"><?php echo esc_html($dental_care_author_name); ?></a> </h5>
    <p class="author-bio"><?php echo get_the_author_meta('description'); ?></p>

    <ul class="author_soclinks">

        <?php if (get_the_author_meta('url')) : ?>
            <li class="author_website">
                <a href="<?php the_author_meta('url'); ?>" title="<?php esc_html_e('Website', 'dental-care'); ?>" target="_blank"><i class="fa fa-home"></i></a>
            </li>
        <?php endif ?>
        <?php if (get_the_author_meta('facebook_profile')) : ?>
            <li class="author_facebook">
                <a href="<?php the_author_meta('facebook_profile'); ?>" title=" <?php esc_html_e('Facebook', 'dental-care'); ?>" target="_blank"><i class="fa fa-facebook"></i></a>
            </li>
        <?php endif ?>
        <?php if (get_the_author_meta('twitter_profile')) : ?>
            <li class="author_twitter">
                <a href="<?php the_author_meta('twitter_profile'); ?>" title=" <?php esc_html_e('Twitter', 'dental-care'); ?>" target="_blank"><i class="fa fa-twitter"></i></a>
            </li>
        <?php endif ?>
        <?php if (get_the_author_meta('dribbble_profile')) : ?>
            <li class="author_dribble">
                <a href="<?php the_author_meta('dribbble_profile'); ?>" title=" <?php esc_html_e('Dribble', 'dental-care'); ?>" target="_blank"><i class="fa fa-dribbble"></i></a>
            </li>
        <?php endif ?>
        <?php if (get_the_author_meta('github_profile')) : ?>
            <li class="author_github">
                <a href="<?php the_author_meta('github_profile'); ?>" title="<?php esc_html_e('Github', 'dental-care'); ?>" target="_blank"><i class="fa fa-github"></i></a>
            </li>
        <?php endif ?>
        <?php if (get_the_author_meta('instagram_profile')) : ?>
            <li class="author_instagram">
                <a href="<?php the_author_meta('instagram_profile'); ?>" title=" <?php esc_html_e('Instagram', 'dental-care'); ?>" target="_blank"><i class="fa fa-instagram"></i></a>
            </li>
        <?php endif ?>
        <?php if (get_the_author_meta('linkedin_profile')) : ?>
            <li class="author_linkedin">
                <a href="<?php the_author_meta('linkedin_profile'); ?>" title="<?php esc_html_e('Linkedin', 'dental-care'); ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
            </li>
        <?php endif ?>
        <?php if (get_the_author_meta('pinterest_profile')) : ?>
            <li class="author_pinterest">
                <a href="<?php the_author_meta('pinterest_profile'); ?>" title="<?php esc_html_e('Pinterest', 'dental-care'); ?>" target="_blank"><i class="fa fa-pinterest"></i></a>
            </li>
        <?php endif ?>
        <?php if (get_the_author_meta('skype_profile')) : ?>
            <li class="author_skype">
                <a href="<?php the_author_meta('skype_profile'); ?>" title="<?php esc_html_e('Skype', 'dental-care'); ?>" target="_blank"><i class="fa fa-skype"></i></a>
            </li>
        <?php endif ?>
        <?php if (get_the_author_meta('soundcloud_profile')) : ?>
            <li class="author_soundcloud">
                <a href="<?php the_author_meta('soundcloud_profile'); ?>" title="<?php esc_html_e('Soundcloud', 'dental-care'); ?>" target="_blank"><i class="fa fa-cloud"></i></a>
            </li>
        <?php endif ?>
        <?php if (get_the_author_meta('youtube_profile')) : ?>
            <li class="author_youtube">
                <a href="<?php the_author_meta('youtube_profile'); ?>" title=" <?php esc_html_e('Youtube', 'dental-care'); ?>" target="_blank"><i class="fa fa-youtube"></i></a>
            </li>
        <?php endif ?>
        <?php if (get_the_author_meta('tumblr_profile')) : ?>
            <li class="author_tumblr">
                <a href="<?php the_author_meta('tumblr_profile'); ?>" title=" <?php esc_html_e('Tumblr', 'dental-care'); ?>" target="_blank"><i class="fa fa-tumblr"></i></a>
            </li>
        <?php endif ?>
        <?php if (get_the_author_meta('vimeo_profile')) : ?>
            <li class="author_vimeo">
                <a href="<?php the_author_meta('vimeo_profile'); ?>" title=" <?php esc_html_e('Vimeo', 'dental-care'); ?>" target="_blank"><i class="fa fa-star"></i></a>
            </li>
        <?php endif ?>
        <?php if (get_the_author_meta('flickr_profile')) : ?>
            <li class="author_flickr">
                <a href="<?php the_author_meta('flickr_profile'); ?>" title="<?php esc_html_e('Flickr', 'dental-care'); ?>" target="_blank"><i class="fa fa-flickr"></i></a>
            </li>
        <?php endif ?>
        <?php if (get_the_author_meta('google_profile')) : ?>
            <li class="author_google">
                <a href="<?php the_author_meta('google_profile'); ?>" title=" <?php esc_html_e('Google+', 'dental-care'); ?>" target="_blank"><i class="fa fa-google-plus"></i></a>
            </li>
        <?php endif ?>
        <?php if (get_the_author_meta('foursquare_profile')) : ?>
            <li class="author_foursquare">
                <a href="<?php the_author_meta('foursquare_profile'); ?>" title=" <?php esc_html_e('Foursquare', 'dental-care'); ?>" target="_blank"><i class="fa fa-foursquare"></i></a>
            </li>
        <?php endif ?>

    </ul> 

</div>

