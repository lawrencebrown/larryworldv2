<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package larryworld
 */

?>
<content>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	
<h2><?php the_field('link_name'); ?></h2>
<a href="<?php the_field('link_url'); ?>"><?php the_field('link_url'); ?></a>
<?php the_field('link_notes'); ?>

<?php 
$terms = get_field('link_category');
if( $terms ): ?>
    <p>Tags</p>
    <ul>
    <?php foreach( $terms as $term ): ?>
        
        <li>
            <a href="<?php echo esc_url( get_term_link( $term ) ); ?>"><?php echo esc_html( $term->name ); ?></a>
        </li>
    <?php endforeach; ?>
    </ul>
<?php endif; ?>


<?php if ( get_field( 'link_favourite' ) ): ?>
<div class="featured">&#9733; Favourite</div>
<?php else: ?>
<?php endif; ?>
<hr>

<!--

What do want a single page view of a link to do?


v1. ------

link_url == url
link_name == text
link_category == taxonomy
link_notes == text area


v2. ------

link_screenshot == image

view more links from category, parent category, tags etc 
collections of links (e.g. SaaS freelancer apps)
-->



</article><!-- #post-<?php the_ID(); ?> -->
</content>