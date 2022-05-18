<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package larryworld
 */

get_header(); ?>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script type="text/javascript">
	jQuery(document).ready(function () {
	 
	    jQuery(document).keydown(function(e) {
	        var url = false;
	        if (e.which == 39) {  // Left arrow key code
	            url = jQuery('.prev a').attr('href');
	        }
	        else if (e.which == 37) {  // Right arrow key code
	            url = jQuery('.next a').attr('href');
	        }
	        if (url) {
	            window.location = url;
	        }
	    });
	 });
	</script>
<content class="wide">
	<div class="all-photos-container">	
		
		<div class="single-photo">
		<?php the_content(); ?>
			<?php if( have_rows('photos') ): ?>
				<?php while( have_rows('photos') ): the_row();
    				$image = get_sub_field('add_image'); ?>
        			<img src="<?php echo $image['url']; ?>" class="image-on-own-page">
    			<?php endwhile; ?>		    			
			<?php endif; ?>
		</div>


			<div class="embed-container">
				<?php the_field('video'); ?>
			</div>


		<div class="photo-metadata">
			<h2><?php the_title(); ?></h2>
			<p><?php the_field('caption'); ?></p>
			<p><?php echo get_the_date('M Y'); ?></p>
			<?php
				if( get_the_tags() ){
		        echo '<div class="tags">';
		        the_tags('<ul class="tags"><li>', '</li><li>', '</li></ul>');
		        echo '</div>';
		        }
		    ;?> 
		 </div>


	    <div class="back-link">
	    	<a href="/photos">&larr; View All Photos</a>
	    </div>
		    

		<div class="photo-navigation-container">		
			<div class="next">
				<?php next_post_link('%link','&larr;'); ?>
			</div>
			<div class="prev">
				<?php previous_post_link('%link','&rarr;'); ?>    
			</div>
		</div>	
			
	</div><!--all-photos-container-->
</content>
<?php
get_sidebar();
get_footer();
