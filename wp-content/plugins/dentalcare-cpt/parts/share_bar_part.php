<?php
/**
 * 
 * Displays share bar on single posts.
 *
 * @package Dental_Care
 */
?>

<div class="share-bar">
 <?php 
 if (class_exists('OT_Loader')) {
     if (ot_get_option('share_post_title') == ''){?>
        <span><?php echo esc_html__('SHARE THIS POST', 'dental-care'); ?></span>
    <?php }else{ ?>
        <span><?php echo esc_html(ot_get_option('share_post_title')); ?></span>
        <?php 
    } 
}
?>


<?php 
$post_link = get_permalink(get_the_ID()); ?>
<?php
$post_link_tumb = $post_link;
$post_link_tumb = preg_replace('#^https?://#', '', $post_link_tumb);
?>
<?php $post_name = urlencode(get_the_title()); ?> 
<?php $post_image = urlencode(wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()))); ?>

<ul class="share-bar-items">
    <li class="share-item-fb"><a href="http://www.facebook.com/sharer.php?u=<?php echo esc_url($post_link); ?>" target='_blank' title="<?php esc_html_e('Share on Facebook', 'dental-care'); ?>"> <i class="fa fa-facebook"></i> </a></li>
    <li class="share-item-tw"><a href="http://twitter.com/share?url=<?php echo esc_url($post_link); ?>" target='_blank' title="<?php esc_html_e('Share on Twitter', 'dental-care'); ?>"><i class="fa fa-twitter"></i> </a></li>
    <li class="share-item-gp"><a href="https://plus.google.com/share?url=<?php echo esc_url($post_link); ?>" target='_blank' title="<?php esc_html_e('Share on Google+', 'dental-care'); ?>"><i class="fa fa-google-plus"></i> </a></li>
    <li class="share-item-li"><a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo esc_url($post_link); ?>" target='_blank' title="<?php esc_html_e('Share on Linkedin', 'dental-care'); ?>"><i class="fa fa-linkedin"></i> </a></li>
    <li class="share-item-pi"><a href="http://pinterest.com/pin/create/button/?url=<?php echo esc_url($post_link); ?>&amp;media=<?php echo esc_url($post_image); ?>" target='_blank' title="<?php esc_html_e('Share on Pinterest', 'dental-care'); ?>"><i class="fa fa-pinterest"></i> </a></li>
    <li class="share-item-su"><a href="http://www.stumbleupon.com/submit?url=<?php echo esc_url($post_link); ?>" target='_blank' title="<?php esc_html_e('Share on Stumbleupon', 'dental-care'); ?>"><i class="fa fa-stumbleupon"></i> </a></li>
    <li class="share-item-tr"><a href="http://www.tumblr.com/share/link?url=<?php echo esc_url($post_link_tumb); ?>&amp;name=<?php echo esc_attr($post_name); ?>" target='_blank' title="<?php esc_html_e('Share on Tumblr', 'dental-care'); ?>"><i class="fa fa-tumblr"></i> </a></li>
    <li class="share-item-dg"><a href="mailto:mail@email.com?subject=<?php echo esc_attr($post_name); ?>&amp;body=Check%20this%20out:<?php echo esc_url($post_link); ?>" target='_blank' title="<?php esc_html_e('Mail to Friend', 'dental-care'); ?>"><i class="fa fa-envelope-o"></i> </a></li>

</ul>
</div>

