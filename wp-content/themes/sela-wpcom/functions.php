<?php
/**
 * sela functions and definitions
 *
 * @package Sela
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 620; /* pixels */
}

/**
 * Adjusts content_width value for few pages and attachment templates.
 */
function sela_content_width() {
	global $content_width;

	if ( is_page_template( 'page-templates/full-width-page.php' )
	  || is_page_template( 'page-templates/grid-page.php' )
	  || is_attachment()
	  || ! is_active_sidebar( 'sidebar-1' ) ) {
		$content_width = 778;
	}
}
add_action( 'template_redirect', 'sela_content_width' );

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function sela_setup() {

	load_theme_textdomain( 'sela', get_template_directory() . '/languages' );

	add_editor_style( array( 'editor-style.css', sela_fonts_url() ) );

	add_theme_support( 'automatic-feed-links' );

	add_theme_support( 'html5', array( 'comment-list', 'search-form', 'comment-form', ) );

	add_theme_support( 'title-tag' );

	add_theme_support( 'post-formats', array( 'aside', 'gallery', 'image', 'link', 'quote','video' ) );

	register_nav_menus( array(
		'primary'	=> __( 'Primary Menu', 'sela' ),
		'social'	=> __( 'Social Menu', 'sela' ),
	) );

	add_theme_support( 'post-thumbnails' );

	// Post thumbnails
	set_post_thumbnail_size( 820, 312, true );
	// Hero Image on the front page template
	add_image_size( 'sela-hero-thumbnail', 1180, 610, array( 'center', 'center' ) );
	// Full width and grid page template
	add_image_size( 'sela-page-thumbnail', 1180, 435, array( 'center', 'top' ) );
	// Full width and grid page template
	add_image_size( 'sela-post-thumbnail', 820, 312, true );
	// Grid child page thumbnail
	add_image_size( 'sela-grid-thumbnail', 360, 242, array( 'center', 'center' ) );
	// Carousel thumbnail
	add_image_size( 'sela-carousel-thumbnail', 450, 450, true);
	// Testimonial thumbnail
	add_image_size( 'sela-testimonial-thumbnail', 90, 90, array( 'center', 'center' ) );

	add_post_type_support( 'page', 'excerpt' );

	add_theme_support( 'custom-background', apply_filters( 'sela_custom_background_args', array(
		'default-color' => 'fafafa',
	) ) );
}
add_action( 'after_setup_theme', 'sela_setup' );

/**
 * Returns the Google font stylesheet URL, if available.
 */
function sela_fonts_url() {
	$fonts_url = '';

	/* translators: If there are characters in your language that are not supported
	 * by Source Sans Pro, translate this to 'off'. Do not translate into your own language.
	 */
	$source_sans_pro  = _x( 'on', 'Source Sans Pro font: on or off',  'sela' );

	/* translators: If there are characters in your language that are not supported
	 * by Droid Serif, translate this to 'off'. Do not translate into your own language.
	 */
	$droid_serif = _x( 'on', 'Droid Serif font: on or off', 'sela' );

	/* translators: If there are characters in your language that are not supported
	 * by Oswald, translate this to 'off'. Do not translate into your own language.
	 */
	$oswald  = _x( 'on', 'Oswald font: on or off',  'sela' );

	if ( 'off' !== $source_sans_pro || 'off' !== $droid_serif || 'off' !== $oswald ) {
		$font_families = array();

		if ( 'off' !== $source_sans_pro ) {
			$font_families[] = 'Source Sans Pro:300,300italic,400,400italic,600';
		}
		if ( 'off' !== $droid_serif ) {
			$font_families[] = 'Droid Serif:400,400italic';
		}
		if ( 'off' !== $oswald ) {
			$font_families[] = 'Oswald:300,400';
		}
		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);
		$fonts_url = add_query_arg( $query_args, "https://fonts.googleapis.com/css" );
	}

	return $fonts_url;
}

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function sela_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Main Sidebar', 'sela' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Before Footer Widget Area', 'sela' ),
		'id'            => 'sidebar-instagram',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'First Footer Widget Area', 'sela' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Second Footer Widget Area', 'sela' ),
		'id'            => 'sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Third Footer Widget Area', 'sela' ),
		'id'            => 'sidebar-4',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'First Front Page Widget Area', 'sela' ),
		'id'            => 'sidebar-5',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Second Front Page Widget Area', 'sela' ),
		'id'            => 'sidebar-6',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Third Front Page Widget Area', 'sela' ),
		'id'            => 'sidebar-7',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'sela_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function sela_scripts_styles() {
	// Add Oswald, Source Sans Pro and Droid Serif fonts.
	wp_enqueue_style( 'sela-fonts', sela_fonts_url(), array(), null );

	// Owl carousel
	wp_enqueue_style( 'owl-carousel-style', get_template_directory_uri() . '/owl-carousel/owl.carousel.css', array(), '1.3.3' );

	// Owl carousel
	wp_enqueue_style( 'owl-carousel-theme', get_template_directory_uri() . '/owl-carousel/owl.theme.css', array(), '1.3.3' );

	// Add Genericons font.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/fonts/genericons.css', array(), '3.4.1' );

	// Load the main stylesheet.
	wp_enqueue_style( 'sela-style', get_stylesheet_uri() );

	wp_enqueue_script( 'sela-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20140813', true );

	wp_enqueue_script( 'sela-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20140813', true );

	wp_enqueue_script( 'sela-script', get_template_directory_uri() . '/js/sela.js', array( 'jquery' ), '20140813', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'sela-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20130922' );
	}

	 wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/owl-carousel/owl.carousel.js', array( 'jquery' ), '1.3.3' );
}
add_action( 'wp_enqueue_scripts', 'sela_scripts_styles' );

/**
 * Enqueue Google fonts style to admin screen for custom header display.
 */
function sela_enqueue_admin_fonts( $hook ) {
    if ( 'appearance_page_custom-header' != $hook ) {
        return;
    }

    wp_enqueue_style( 'sela-fonts', sela_fonts_url(), array(), null );
}
add_action( 'admin_enqueue_scripts', 'sela_enqueue_admin_fonts' );

function crunchify_social_sharing_buttons($content) {
	if(is_singular() || is_home()){
	
		// Get current page URL 
		$crunchifyURL = urlencode(get_permalink());
 
		// Get current page title
		$crunchifyTitle = str_replace( ' ', '%20', get_the_title());
		
		// Get Post Thumbnail for pinterest
		$crunchifyThumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
 
		// Construct sharing URL without using any script
		$twitterURL = 'https://twitter.com/intent/tweet?text='.$crunchifyTitle.'&amp;url='.$crunchifyURL;
		$facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$crunchifyURL;
		$googleURL = 'https://plus.google.com/share?url='.$crunchifyURL;
		$linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$crunchifyURL.'&amp;title='.$crunchifyTitle;
 
		// Based on popular demand added Pinterest too
		$pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$crunchifyURL.'&amp;media='.$crunchifyThumbnail[0].'&amp;description='.$crunchifyTitle;
 
		

		// Add sharing button at the end of page/page content
		$content .= '<!-- Crunchify.com social sharing. Get your copy here: http://crunchify.me/1VIxAsz -->';
		$content .= '<div class="crunchify-social">';
		$content .= '<div class="social-links">';
			$content .= '<ul id="menu-social" class="menu">';
				$content .= '<li class="menu-item menu-item-type-custom menu-item-object-custom">';
					$content .= '<a href="'.$facebookURL.'" target="_blank"><span class="screen-reader-text">Facebook</span></a>';
				$content .= '</li>';
				$content .= '<li class="menu-item menu-item-type-custom menu-item-object-custom">';
					$content .= '<a href="'. $twitterURL .'" target="_blank"><span class="screen-reader-text">Twitter</span></a>';
				$content .= '</li>';
				$content .= '<li class="menu-item menu-item-type-custom menu-item-object-custom">';
					$content .= '<a href="'.$googleURL.'" target="_blank"><span class="screen-reader-text">Google+</span></a>';
				$content .= '</li>';
				$content .= '<li class="menu-item menu-item-type-custom menu-item-object-custom">';
					$content .= '<a href="'.$pinterestURL.'" target="_blank"><span class="screen-reader-text">Pinterest</span></a>';
				$content .= '</li>';
				$content .= '<li class="menu-item menu-item-type-custom menu-item-object-custom">';
					$content .= '<a href="'.$linkedInURL.'" target="_blank"><span class="screen-reader-text">Linkedin</span></a>';
				$content .= '</li>';
			$content .= '</ul>';
		$content .= '</div>';
		$content .= '</div>';
		
		return $content;
	}else{
		// if not a post/page then don't include sharing button
		return $content;
	}
};
add_filter( 'the_content', 'crunchify_social_sharing_buttons');

/**
 * Remove Gallery Inline Styling
 */
add_filter( 'use_default_gallery_style', '__return_false' );

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
 * Custom Header features.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


// updater for WordPress.com themes
if ( is_admin() )
	include dirname( __FILE__ ) . '/inc/updater.php';
