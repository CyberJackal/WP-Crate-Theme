<?php
/**
 * Crate functions and definitions
 *
 * Note that when copying this theme any functions should be prefixed
 * with the theme's name, so crate_ becomes your_theme_.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function crate_theme_setup() {
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
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	register_nav_menus(
		array(
			'menu-1' => __( 'Primary', 'crate' ),
			'footer' => __( 'Footer Menu', 'crate' ),
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	// Add support for Block Styles.
	add_theme_support( 'wp-block-styles' );

	// Add support for full and wide align images.
	add_theme_support( 'align-wide' );

	// Add support for editor styles.
	add_theme_support( 'editor-styles' );

	// Enqueue editor styles.
	add_editor_style( 'res/css/style-editor.css' );

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

	// Add support for responsive embedded content.
	add_theme_support( 'responsive-embeds' );
}
add_action( 'after_setup_theme', 'crate_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width Content width.
 */
function crate_content_width() {
	$GLOBALS['content_width'] = 621;

	if ( ( is_attachment() && wp_attachment_is_image() )
		|| is_page_template( 'page-templates/full-width.php' ) ) {

		$GLOBALS['content_width'] = 940;
	}
}
add_action( 'after_setup_theme', 'crate_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function crate_enqueue_scripts() {
	wp_enqueue_style( 'crate-style', get_stylesheet_uri() );

	wp_enqueue_script( 'crate_script', get_template_directory_uri() . '/res/scripts/script.js', 'jquery' );

	wp_enqueue_script( 'custom_select', get_template_directory_uri() . '/res/scripts/select.js', 'jquery' );

	wp_enqueue_style( 'crate-print-style', get_template_directory_uri() . '/res/css/print.min.css', array( 'crate-style' ), '20181123', 'print' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'crate_enqueue_scripts' );

/**
 * Register widget areas.
 */
function crate_register_sidebars() {
	register_sidebar(
		array(
			'name'          => __( 'Content Sidebar', 'crate-wordpress' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Additional sidebar that appears next to the content.', 'crate-wordpress' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget--title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'crate_register_sidebars' );

/**
 * Custom template tags for the theme.
 */
require get_template_directory() . '/inc/template-tags.php';
