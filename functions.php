<?php

/**
 * larryworld functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package larryworld
 */

if ( ! function_exists( 'larryworld_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function larryworld_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on larryworld, use a find and replace
		 * to change 'larryworld' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'larryworld', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'main menu' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'larryworld_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'larryworld_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function larryworld_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'larryworld_content_width', 640 );
}
add_action( 'after_setup_theme', 'larryworld_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function larryworld_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'larryworld' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'larryworld' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'larryworld_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function larryworld_scripts() {
	wp_enqueue_style( 'larryworld-style', get_stylesheet_uri() );

	wp_enqueue_script( 'larryworld-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'larryworld-additions', get_template_directory_uri() . '/js/larry-additions.js', array(), '20151215', true );

	wp_enqueue_script( 'larryworld-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'larryworld_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


function my_custom_post_links() {
  $labels = array(
    'name'               => _x( 'Links', 'post type general name' ),
    'singular_name'      => _x( 'Link', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'link' ),
    'add_new_item'       => __( 'Add New Link' ),
    'edit_item'          => __( 'Edit Link' ),
    'new_item'           => __( 'New Link' ),
    'all_items'          => __( 'All Links' ),
    'view_item'          => __( 'View Links' ),
    'search_items'       => __( 'Search Links' ),
    'not_found'          => __( 'No links found' ),
    'not_found_in_trash' => __( 'No links found in the Trash' ), 
    'parent_item_colon'  => ’,
    'menu_name'          => 'Links'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Links saved from the internet',
    'public'        => true,
    'menu_position' => 5,
    'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
    'has_archive'   => true,
  );
  register_post_type( 'links', $args ); 
}

add_action( 'init', 'my_custom_post_links' );



add_action( 'init', 'gp_register_taxonomy_for_object_type' );
function gp_register_taxonomy_for_object_type() {
    register_taxonomy_for_object_type( 'post_tag', 'links' );
};


// First, create a function that includes the path to your favicon
function add_favicon() {
  	$favicon_url = get_stylesheet_directory_uri() . '/apple-touch-icon.png';
	echo '<link rel="apple-touch-icon" href="' . $favicon_url . '" />';
}
  
// Now, just make sure that function runs when you're on the login page and admin pages  
add_action('login_head', 'add_favicon');
add_action('admin_head', 'add_favicon');


//For example, you can paste this into your theme functions.php file

function meks_which_template_is_loaded() {
	if ( is_super_admin() ) {
		global $template;
		print_r( $template );
	}
}

//Rewrites the CSS in the WP menu to allow custom post types to have correct parent classes rather than default to the main posts as parent

function theme_current_type_nav_class($css_class, $item) {
    static $custom_post_types, $post_type, $filter_func;

    if (empty($custom_post_types))
        $custom_post_types = get_post_types(array('_builtin' => false));

    if (empty($post_type))
        $post_type = get_post_type();

    if ('page' == $item->object && in_array($post_type, $custom_post_types)) {
        $css_class = array_filter($css_class, function($el) {
            return $el !== "current_page_parent";
        });

        $template = get_page_template_slug($item->object_id);
        if (!empty($template) && preg_match("/^page(-[^-]+)*-$post_type/", $template) === 1)
            array_push($css_class, 'current_page_parent');

    }

    return $css_class;
}
add_filter('nav_menu_css_class', 'theme_current_type_nav_class', 1, 2);

// END