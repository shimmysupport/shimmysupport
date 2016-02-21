<?php
/**
 * Shimmy Support functions and definitions
 *
 * @package Shimmy Support
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'shimmysupport_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function shimmysupport_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Shimmy Support, use a find and replace
	 * to change 'shimmysupport' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'shimmysupport', get_template_directory() . '/languages' );

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

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'shimmysupport' ),
	) );
	register_nav_menus( array(
		'secondary' => __( 'Secondary Menu', 'shimmysupport' ),
	) );


	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'shimmysupport_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // shimmysupport_setup
add_action( 'after_setup_theme', 'shimmysupport_setup' );

function remove_admin_bar() {
if (!current_user_can('administrator') && !is_admin()) {
  show_admin_bar(false);
}
}

show_admin_bar( false );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function shimmysupport_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'shimmysupport' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'shimmysupport_widgets_init' );

function shimmysupport_search_init() {
	register_sidebar( array(
		'name'          => __( 'Search', 'shimmysupport' ),
		'id'            => 'top-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
register_sidebar( array(
'name' => 'Footer Sidebar 1',
'id' => 'footer-sidebar-1',
'description' => 'Appears in the footer area',
'before_widget' => '<aside id="%1$s" class="widget %2$s">',
'after_widget' => '</aside>',
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
register_sidebar( array(
'name' => 'Footer Sidebar 2',
'id' => 'footer-sidebar-2',
'description' => 'Appears in the footer area',
'before_widget' => '<aside id="%1$s" class="widget %2$s">',
'after_widget' => '</aside>',
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
register_sidebar( array(
'name' => 'Footer Sidebar 3',
'id' => 'footer-sidebar-3',
'description' => 'Appears in the footer area',
'before_widget' => '<aside id="%1$s" class="widget %2$s">',
'after_widget' => '</aside>',
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );

}
add_action( 'widgets_init', 'shimmysupport_search_init' );
/**
 * Enqueue scripts and styles.
 */
function shimmysupport_scripts() {
	wp_enqueue_style( 'shimmysupport-style', get_stylesheet_uri() );

	wp_enqueue_script( 'shimmysupport-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'shimmysupport-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'shimmysupport_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

function tml_action_url( $url, $action, $instance ) {
	switch ( $action ) {
		case 'register' :
			$url = '/wordpress/register/';
			break;
	}
	return $url;
}
add_filter( 'tml_action_url', 'tml_action_url', 10, 3 );

function splen_remove_admin_bar() {
	if( !is_super_admin() ) 
		add_filter( 'show_admin_bar', '__return_false' );
}
add_action('wp', 'splen_remove_admin_bar');

function custom_field_excerpt() {
	global $post;
	$text = get_field('featured_article_excerpt');
	if ( '' != $text ) {
		$text = strip_shortcodes( $text );
		$text = apply_filters('the_content', $text);
		$text = str_replace(']]>', ']]>', $text);
		$excerpt_length = 20; // 20 words
		$excerpt_more = ' ...';
		$text = wp_trim_words( $text, $excerpt_length, $excerpt_more );
	}
	return apply_filters('the_excerpt', $text);
}

function custom_field_2_excerpt() {
	global $post;
	$quote = get_field('quote');
	if ( '' != $quote ) {
		$quote = strip_shortcodes( $quote );
		$quote = apply_filters('the_content', $quote);
		$quote = str_replace(']]>', ']]>', $quote);
		$excerpt_length = 40; // 20 words
		$excerpt_more = ' ..."';
		$quote = wp_trim_words( $quote, $excerpt_length, $excerpt_more );
	}
	return apply_filters('the_excerpt', $quote);
}

/**
 * Redirect user after successful login.
 *
 * @param string $redirect_to URL to redirect to.
 * @param string $request URL the user is coming from.
 * @param object $user Logged user's data.
 * @return string
 */
function my_login_redirect( $redirect_to, $request, $user ) {
	//is there a user to check?
	global $user;
	if ( isset( $user->roles ) && is_array( $user->roles ) ) {
		//check for admins
		if ( in_array( 'subscriber', $user->roles ) ) {
			// redirect them to the default place
			wp_redirect( home_url('/userdashboard/') );
		} else {
			return home_url();
		}
	} else {
		return $redirect_to;
	}
}

function get_excerpt(){
$excerpt = get_the_content();
$excerpt = preg_replace(" (\[.*?\])",'',$excerpt);
$excerpt = strip_shortcodes($excerpt);
$excerpt = strip_tags($excerpt);
$excerpt = substr($excerpt, 0, 300);
$excerpt = substr($excerpt, 0, strripos($excerpt, " "));
$excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
$excerpt = $excerpt.'... <a href="'.$permalink.'">more</a>';
return $excerpt;
}
