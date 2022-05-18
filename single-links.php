<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package larryworld
 */

get_header(); ?>
<content>
	<?php
	while ( have_posts() ) : the_post();

		get_template_part( 'template-parts/content-links', get_post_type() );

		/*the_post_navigation();*/

		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;

	endwhile; // End of the loop.
	?>
</content>
<?php
get_sidebar();
get_footer();
