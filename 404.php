<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package larryworld
 */

get_header(); ?>
<content>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'larryworld' ); ?></h1>
				</header><!-- .page-header -->
				
				
					<img src="<?php bloginfo('template_directory'); ?>/images/peaches-404.jpg" />

					

					

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->
</content>
<?php
get_footer();
