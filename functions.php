<?php
/**
 * Theme functions and definitions.
 * 
 * @package StagFramework
 *
 */
if ( ! isset( $content_width ) )
	$content_width = 800;

if( ! function_exists( 'chc_theme_setup' ) ) :

function chc_theme_setup(){

	/* Load translation domain ---------------------------------------------*/
	load_theme_textdomain( 'chc', get_template_directory() . '/languages' );

	$locale = get_locale();

	$locale_file = get_template_directory(). "/languages/$locale.php";
	if( is_readable( $locale_file ) ){
	  require_once( $locale_file );
	}

	/* Register Menus ------------------------------------------------------*/
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'chc' ),
	) );

	/**
	 * Enable support for Post Thumbnails on posts and pages
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	set_post_thumbnail_size( 604, 270, true );
}
endif;
add_action( 'after_setup_theme', 'chc_theme_setup' );




if( ! function_exists('chc_sidebar_init') ) :
/**
* Register widget areas
* @return void
*/
function chc_sidebar_init(){
	register_sidebar(array(
		'name' => __( 'Blog Sidebar', 'chc' ),
		'id' => 'sidebar-main',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
		'description'   => __( 'Blog Widgets Area.', 'chc' )
	));
}
endif;
add_action('widgets_init', 'chc_sidebar_init');

if ( !function_exists( 'chc_wp_title' ) ) :
/**
* WordPress Title Filter
* 
* @since 1.0
* @param string $title Default title text for current view.
* @param string $sep Optional separator.
* @return string Filtered title.
*/
function chc_wp_title($title, $sep) {
		$title .= get_bloginfo( 'name' );

		$site_desc = get_bloginfo( 'description', 'display' );
		if( $site_desc && ( is_home() || is_front_page() ) ) {
			$title = "$title $sep $site_desc";
		}
	return $title;
}
endif;
add_filter('wp_title', 'chc_wp_title', 10, 2);

/**
* Enqueues scripts and styles for front end.
* @return void
*/
function chc_scripts_styles(){
	if( !is_admin() ) :
		
	/* Register Scripts ---------------------------------------------------*/
	// wp_register_script( 'stag-custom', get_template_directory_uri().'/assets/js/jquery.custom.js', array( 'jquery' ), STAG_THEME_VERSION, true );
	// wp_register_script( 'stag-plugins', get_template_directory_uri().'/assets/js/plugins.js', array( 'jquery' ), STAG_THEME_VERSION, true );
	
	/* Enqueue Scripts ---------------------------------------------------*/
	wp_enqueue_script( 'jquery' );
	// wp_enqueue_script( 'stag-custom' );
	// wp_enqueue_script( 'stag-plugins' );
	if( is_singular() ) wp_enqueue_script( 'comment-reply' ); // loads the javascript required for threaded comments
	
	/* Enqueue Styles ---------------------------------------------------*/
	wp_enqueue_style( 'stag-style', get_stylesheet_uri(), '', 0.1 );
	// wp_enqueue_style( 'stag-custom-style', get_template_directory_uri().'/assets/css/stag-custom-styles.php', 'stag-style', STAG_THEME_VERSION );

	endif;
}
add_action( 'wp_enqueue_scripts', 'chc_scripts_styles' );
