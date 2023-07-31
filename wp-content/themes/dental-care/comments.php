<?php
/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Dental_Care
 */
/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if (post_password_required()) {
    return;
}
?>
<div class="row">
    <div id="comments" class="comments-area col-md-12">

        <?php // You can start editing here -- including this comment!   ?>

        <?php if (have_comments()) : ?>
            <h2 class="comments-title">
                <?php
                printf(_nx('1 comment on &ldquo;%2$s&rdquo;', '%1$s comments on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'dental-care'), number_format_i18n(get_comments_number()), '<span>' . get_the_title() . '</span>');
                ?>
            </h2>

            <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : // are there comments to navigate through   ?>
                <nav id="comment-nav-above" class="comment-navigation">
                    <h1 class="screen-reader-text"><?php esc_html_e('Comment navigation', 'dental-care'); ?></h1>
                    <div class="nav-previous"><?php previous_comments_link(esc_html__('&larr; Older Comments', 'dental-care')); ?></div>
                    <div class="nav-next"><?php next_comments_link(esc_html__('Newer Comments &rarr;', 'dental-care')); ?></div>
                </nav><!-- #comment-nav-above -->
            <?php endif; // check for comment navigation   ?>

            <ol class="comment-list">
                <?php
                wp_list_comments(array(
                    'callback' => 'dental_care_comment',
                    'short_ping' => true,
                ));
                ?>
            </ol><!-- .comment-list -->

            <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : // are there comments to navigate through   ?>
                <nav id="comment-nav-below" class="comment-navigation">
                    <h1 class="screen-reader-text"><?php esc_html_e('Comment navigation', 'dental-care'); ?></h1>
                    <div class="nav-previous"><?php previous_comments_link(esc_html__('&larr; Older Comments', 'dental-care')); ?></div>
                    <div class="nav-next"><?php next_comments_link(esc_html__('Newer Comments &rarr;', 'dental-care')); ?></div>
                </nav><!-- #comment-nav-below -->
            <?php endif; // check for comment navigation   ?>

        <?php endif; // have_comments()  ?>

        <?php
        // If comments are closed and there are comments, let's leave a little note, shall we?
        if (!comments_open() && '0' != get_comments_number() && post_type_supports(get_post_type(), 'comments')) :
            ?>
            <p class="no-comments"><?php esc_html_e('Comments are closed.', 'dental-care'); ?></p>
        <?php endif; ?>

        <?php
        $req = get_option( 'require_name_email' );
        $aria_req = ( $req ? " aria-required='true'" : '' );
        $comment_args = array(
            'fields' => apply_filters('comment_form_default_fields', array(
                'author' =>
                '<p class="col-md-4 no-padding-left comment-form-author">' .
                ( $req ? '<span class="required"></span>' : '' ) .
                '<input id="author" name="author" placeholder="' . esc_attr__('Name*', 'dental-care') . '" type="text" value="' . esc_attr($commenter['comment_author']) .
                '" size="30"' . esc_attr($aria_req) . ' /></p>',
                'email' =>
                '<p class="col-md-4 no-padding-left comment-form-email"> ' .
                ( $req ? '<span class="required"></span>' : '' ) .
                '<input id="email" name="email" type="text" placeholder="' . esc_attr__('Email*', 'dental-care') . '" value="' . esc_attr($commenter['comment_author_email']) .
                '" size="30"' . esc_attr($aria_req) . ' /></p>',
                'url' =>
                '<p class="col-md-4 no-padding-left comment-form-url">' .
                '<input id="url" name="url" placeholder="' . esc_attr__('Website', 'dental-care') . '" type="text" value="' . esc_attr($commenter['comment_author_url']) .
                '" size="30" /></p>',)),
            'comment_field' => '<p class="col-md-12 no-padding-left">' .
            '' .
            '<textarea id="comment" placeholder="' . esc_attr__('Comment', 'dental-care') . '" name="comment" cols="45" rows="8" aria-required="true"></textarea>' .
            '</p>',
            'comment_notes_after' => '',
        );

        comment_form($comment_args);
        ?>

    </div><!-- #comments -->
</div>
