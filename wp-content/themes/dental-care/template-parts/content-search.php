<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Dental_Care
 */

?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
            <span class="result-icon"><i class="fa fa-search"></i></span>
		<?php the_title( sprintf( '<h5 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h5>' ); ?>

		<div class="entry-meta">
			<?php dental_care_posted_on(); 
                       ?>
                    <span class="search-type-title"> <?php echo esc_html__('Type:', 'dental-care'); ?> </span>                   
                    <span class="search-type"><?php echo esc_html(get_post_type());?> </span>
                    
		</div><!-- .entry-meta -->
		<?php //endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<footer class="entry-footer">
		<?php dental_care_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

