<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package larryworld
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	 
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">	
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;400;500;700&display=swap" rel="stylesheet">
	
	<link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>🌍</text></svg>">
	<link rel="apple-touch-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon-180.png" sizes="180x180">
	
	<?php wp_head(); ?>
</head>


<body <?php body_class(); ?>>
	<div id="page" class="whole-page-container">
		<!--<div class="whole-page-container">-->
		<nav class="primary">
			<?php wp_nav_menu( array( 'theme_location' => 'menu-1' ) ); ?>
		</nav>