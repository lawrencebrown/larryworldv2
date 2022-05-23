<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package larryworld
 */

?>

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

    <?php elseif( get_row_layout() =='wide_hang_left'): ?>
      <content class="wide hang left">
        <img class="full-width" src="<?php the_sub_field('wide_hang_left'); ?>">
      </content>

    <?php elseif( get_row_layout() =='full_width_horizontal_rule'): ?>
        <hr class="full-width"><?php the_sub_field('full_width_horizontal_rule'); ?>
     

    <?php elseif( get_row_layout() =='wide_hang_right'): ?>
      <content class="wide hang right">
        <img class="full-width" src="<?php the_sub_field('wide_hang_right'); ?>">
      </content>

    <?php elseif( get_row_layout() =='wide'): ?>
      <content class="wide">
        <img class="full-width" src="<?php the_sub_field('wide'); ?>">
      </content>

    <?php elseif( get_row_layout() =='full_width'): ?>
      <content class="full-width">
        <img class="full-width" src="<?php the_sub_field('full_width'); ?>">
      </content>

      <?php elseif( get_row_layout() =='full_width_background_with_wide_card_shadow'): ?>
      <content class="full-width background-colour blue-pink-gradient">
            <content class="card shadow">
                <div class="padding-large">
                <?php the_sub_field('full_width_background_with_wide_card_shadow'); ?>
                </div>
            </content>
        </content>



    <?php elseif( get_row_layout() =='custom_colours'): ?>
    	<style>
    		h1{color: <?php the_sub_field('header_one_colour'); ?>;}      		
    		body{background-color: <?php the_sub_field('page_background_colour'); ?>;} 	
    	</style>


  	<?php endif;?>
	<?php endwhile; ?>
<?php endif;?>

</article><!-- #post-<?php the_ID(); ?> -->