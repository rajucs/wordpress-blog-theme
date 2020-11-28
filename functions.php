<?php

/**
 * SoftStak Blogger Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package SoftStak_Blogger_Theme
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

if (!function_exists('softstak_blogger_theme_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function softstak_blogger_theme_setup()
	{
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on SoftStak Blogger Theme, use a find and replace
		 * to change 'softstak-blogger-theme' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('softstak-blogger-theme', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__('Primary', 'softstak-blogger-theme'),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'softstak_blogger_theme_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action('after_setup_theme', 'softstak_blogger_theme_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function softstak_blogger_theme_content_width()
{
	$GLOBALS['content_width'] = apply_filters('softstak_blogger_theme_content_width', 640);
}
add_action('after_setup_theme', 'softstak_blogger_theme_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function softstak_blogger_theme_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'softstak-blogger-theme'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'softstak-blogger-theme'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'softstak_blogger_theme_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function softstak_blogger_theme_scripts()
{
	wp_enqueue_style('softstak-blogger-theme-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('softstak-blogger-theme-style', 'rtl', 'replace');

	wp_enqueue_script('softstak-blogger-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'softstak_blogger_theme_scripts');

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
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}


// hide admin bar for frontend
add_filter('show_admin_bar', '__return_false');

if (!function_exists('softstack_blog_nav')) {

	function softstack_blog_nav()
	{
		register_nav_menus(array(
			'header_main_menu'  => __('Header Main Menu', 'text_domain'),
			'footer_menu_one'  => __('Footer Menu One', 'text_domain'),
			'footer_menu_two'  => __('Footer Menu Two', 'text_domain'),
			'footer_menu_three'  => __('Footer Menu Three', 'text_domain'),
		));
	}
	add_action('after_setup_theme', 'softstack_blog_nav', 0);
}


// add bootstrap navbar walker class

if (!file_exists(get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php')) {
	// File does not exist... return an error.
	return new WP_Error('class-wp-bootstrap-navwalker-missing', __('It appears the class-wp-bootstrap-navwalker.php file may be missing.', 'wp-bootstrap-navwalker'));
} else {
	// File exists... require it.
	require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';
}

// Register gallery post type 


function gallery_post_type()
{

	$supports = array(
		'title', // post title
		'editor', // post content
		'author', // post author
		'thumbnail', // featured images
		'excerpt', // post excerpt
		'custom-fields', // custom fields
		'comments', // post comments
		'revisions', // post revisions
		'post-formats', // post formats
	);

	$labels = array(
		'name' => _x('Gallery', 'plural'),
		'singular_name' => _x('Gallery', 'singular'),
		'menu_name' => _x('Gallery', 'admin menu'),
		'name_admin_bar' => _x('Gallery', 'admin bar'),
		'add_new' => _x('Add New', 'add new'),
		'add_new_item' => __('Add New Gallery'),
		'new_item' => __('New Gallery'),
		'edit_item' => __('Edit Gallery'),
		'view_item' => __('View Gallery'),
		'all_items' => __('All Gallery'),
		'search_items' => __('Search Gallery'),
		'not_found' => __('No Gallery found.'),
	);

	$args = array(
		'supports' => $supports,
		'labels' => $labels,
		'public' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'gallery'),
		'has_archive' => true,
		'hierarchical' => false,
	);
	register_post_type('gallery', $args);
}
add_action('init', 'gallery_post_type');
	
	/*Custom Post type end*/
