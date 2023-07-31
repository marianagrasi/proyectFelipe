<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Dental_Care
 */

if ( ! function_exists( 'dental_care_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function dental_care_posted_on() {
       $allowed_html = array(
    'i' => array(
        'class' => array (),
        'title' => array ()
        ),
     'a' => array (
         'href' => array (),
         'rel' => array ()
     )  
);
       
	  $dental_care_posted_on = sprintf('<i class="fa fa-clock-o"></i> '.
                                _x('%s', 'post date', 'dental-care'), '<a href="' . esc_url(get_permalink()) . '" rel="bookmark">' . get_the_date('d M Y') . '</a>'
                        );
                        $dental_care_byline = sprintf(
                                _x('<i class="fa fa-user"></i>  %s', 'post author', 'dental-care'), '<span class="author vcard"><a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">'. esc_html(get_the_author()) .'</a></span>'
                        );
                        
                        echo '<span class="posted-on">' . wp_kses(($dental_care_posted_on), $allowed_html) . '</span><span class="byline"> ' . wp_kses(($dental_care_byline), $allowed_html)  . '</span>';

}
endif;

if ( ! function_exists( 'dental_care_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function dental_care_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
	

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'dental-care' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . esc_html__( 'Tags: %1$s', 'dental-care' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( esc_html__( 'Leave a comment', 'dental-care' ), esc_html__( '1 Comment', 'dental-care' ), esc_html__( '% Comments', 'dental-care' ) );
		echo '</span>';
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'dental-care' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function dental_care_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'dental_care_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'dental_care_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so dental_care_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so dental_care_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in dental_care_categorized_blog.
 */
function dental_care_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'dental_care_categories' );
}
add_action( 'edit_category', 'dental_care_category_transient_flusher' );
add_action( 'save_post',     'dental_care_category_transient_flusher' );
