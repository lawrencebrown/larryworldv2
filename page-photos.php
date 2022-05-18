<?php
/*
Template Name: Photos
*/
?>
<?php get_header(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	
<?php 

if( have_rows('content_editor') ): ?>
	
	<?php while( have_rows('content_editor') ): the_row(); ?>

		<?php if( get_row_layout() == 'header_one_post_title' ): ?>
    	<content>
    		<h1><?php the_sub_field('header_one'); ?></h1>
    	</content>


    <?php elseif( get_row_layout() =='header_one_with_header_two'): ?>
    	<content>
    		<h1><?php the_sub_field('header_one'); ?></h1>
    		<h3><?php the_sub_field('header_three'); ?></h3>
    	</content>


    <?php elseif( get_row_layout() =='full_width_media'): ?>      	
    	<content>
    		<img src="<?php the_sub_field('full_width_media'); ?>">
    	</content>


   	 <?php elseif( get_row_layout() =='wider_image'): ?>      	
    	<content>
    		<img src="<?php the_sub_field('wider_image'); ?>">
    	</content>


    <?php elseif( get_row_layout() =='full_width_embedded'): ?>      	
    	<content>
    		<div class="iframe-container">
    			<?php the_sub_field('full_width_embedded'); ?>
    		</div>
    	</content>


    <?php elseif( get_row_layout() =='wysiwyg_block'): ?>
    	<content>
    		<?php the_sub_field('wysiwyg_block'); ?>
    	</content>


    <?php elseif( get_row_layout() =='custom_colours'): ?>
    	<style>
    		h1{color: <?php the_sub_field('header_one_colour'); ?>;}      		
    		body{background-color: <?php the_sub_field('page_background_colour'); ?>;} 	
    	</style>


  	<?php endif;?>
	<?php endwhile; ?>
<?php endif;?>



<content class="wide">
	<div class="all-photos-container">
		<ul>
	<?php
		if ( get_query_var('paged') ) $paged = get_query_var('paged');  
		if ( get_query_var('page') ) $paged = get_query_var('page');
		 
		$query = new WP_Query( array( 'post_type' => 'photos', 'paged' => $paged ) );
	 
			if ( $query->have_posts() ) : ?>
				<?php while ( $query->have_posts() ) : $query->the_post(); ?>	
					<li class="photo-link">
						<a href="<?php the_permalink(); ?>" class="photo-anchor">
							<div class="unique-photo-container">							
							<?php the_content(); ?>
								<?php if( have_rows('photos') ): ?>
				    				<?php while( have_rows('photos') ): the_row();
				        				$image = get_sub_field('add_image'); ?>
					        			<img src="<?php echo $image['url']; ?>">
					    			<?php endwhile; ?>
								<?php endif; ?>
							</div><!--unique-photo-containerg-->
						</a><!--photo-anchor-->
					</li><!--photo-link-->
				<?php endwhile; wp_reset_postdata(); ?>
		<!-- show pagination here -->
		</ul>
</div><!--all-photos-container-->
</content>
</article><!-- #post-<?php the_ID(); ?> -->
<?php else : ?>
	<!-- show 404 error here -->
<?php endif; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>