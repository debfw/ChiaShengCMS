<?php
/**
 * NewsMash functions and definitions
 *
 * @link    https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package NewsMash
 */
 
if ( ! function_exists( 'ChiaSheng_theme_setup' ) ) :
function ChiaSheng_theme_setup() {
	
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on NewsMash, use a find and replace
	 * to change 'NewsMash' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'ChiaSheng' );
	
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	
	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );
	
	add_theme_support( 'custom-header' );
	
	add_theme_support( 'post-formats', array( 'gallery', 'quote', 'video', 'aside', 'image', 'link', 'audio', 'status', 'chat' ) );
	
	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary_menu' => esc_html__( 'Primary Menu', 'ChiaSheng' )
	) );
	
	//Add selective refresh for sidebar widget
	add_theme_support( 'customize-selective-refresh-widgets' );
	
	// woocommerce support
	add_theme_support( 'woocommerce' );
	
	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support('custom-logo');
	
	/**
	 * Custom background support.
	 */
	add_theme_support( 'custom-background', apply_filters( 'ChiaSheng_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
	
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
	
	/**
	 * Set default content width.
	 */
	if ( ! isset( $content_width ) ) {
		$content_width = 800;
	}	
}
endif;
add_action( 'after_setup_theme', 'ChiaSheng_theme_setup' );


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

function ChiaSheng_widgets_init() {	
	if ( class_exists( 'WooCommerce' ) ) {
		register_sidebar( array(
			'name' => __( 'WooCommerce Widget Area', 'ChiaSheng' ),
			'id' => 'ChiaSheng-woocommerce-sidebar',
			'description' => __( 'This Widget area for WooCommerce Widget', 'ChiaSheng' ),
			'before_widget' => '<aside id="%1$s" class="widget rounded %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<div class="widget-header"><h4 class="widget-title">',
			'after_title' => '</h4></div>',
		) );
	}
	
	register_sidebar( array(
		'name' => __( 'Sidebar Widget Area', 'ChiaSheng' ),
		'id' => 'ChiaSheng-sidebar-primary',
		'description' => __( 'The Primary Widget Area', 'ChiaSheng' ),
		'before_widget' => '<aside id="%1$s" class="widget rounded %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<div class="widget-header"><h4 class="widget-title">',
		'after_title' => '</h4></div>',
	) );
	
	$ChiaSheng_footer_widget_column = get_theme_mod('ChiaSheng_footer_widget_column','4');
	for ($i=1; $i<=$ChiaSheng_footer_widget_column; $i++) {
		register_sidebar( array(
			'name' => __( 'Footer  ', 'ChiaSheng' )  . $i,
			'id' => 'ChiaSheng-footer-widget-' . $i,
			'description' => __( 'The Footer Widget Area', 'ChiaSheng' )  . $i,
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<div class="widget-header"><h4 class="widget-title">',
			'after_title' => '</h4></div>',
		) );
	}
}
add_action( 'widgets_init', 'ChiaSheng_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function ChiaSheng_scripts() {
	
	/**
	 * Styles.
	 */
	// Slick	
	wp_enqueue_style('slick',get_template_directory_uri().'/assets/vendors/css/slick.css');
	
	// Font Awesome
	wp_enqueue_style('all-css',get_template_directory_uri().'/assets/vendors/css/all.min.css');
	
	// Animate
	wp_enqueue_style('animate',get_template_directory_uri().'/assets/vendors/css/animate.min.css');
	
	// ChiaSheng Core
	wp_enqueue_style('ChiaSheng-core',get_template_directory_uri().'/assets/css/core.css');

	// ChiaSheng Theme
	wp_enqueue_style('ChiaSheng-theme', get_template_directory_uri() . '/assets/css/themes.css');
	
	// ChiaSheng WooCommerce
	wp_enqueue_style('ChiaSheng-woocommerce',get_template_directory_uri().'/assets/css/woo-styles.css');
	
	// ChiaSheng Dark
	wp_enqueue_style('ChiaSheng-dark',get_template_directory_uri().'/assets/css/dark.css');
	
	// ChiaSheng Responsive
	wp_enqueue_style('ChiaSheng-responsive',get_template_directory_uri().'/assets/css/responsive.css');
	
	// ChiaSheng Style
	wp_enqueue_style( 'ChiaSheng-style', get_stylesheet_uri() );
	
	// Scripts
	wp_enqueue_script( 'jquery' );
	
	// Owl Crousel
	wp_enqueue_script('slick', get_template_directory_uri() . '/assets/vendors/js/slick.min.js', array('jquery'), true);
	
	// ChiaSheng Theme
	wp_enqueue_script('ChiaSheng-theme', get_template_directory_uri() . '/assets/js/theme.js', array('jquery'), false, true);

	// ChiaSheng custom
	wp_enqueue_script('ChiaSheng-custom-js', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'), false, true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ChiaSheng_scripts' );


/**
 * Enqueue admin scripts and styles.
 */
function ChiaSheng_admin_enqueue_scripts(){
	wp_enqueue_style('ChiaSheng-admin-style', get_template_directory_uri() . '/inc/admin/assets/css/admin.css');
	wp_enqueue_script( 'ChiaSheng-admin-script', get_template_directory_uri() . '/inc/admin/assets/js/ChiaSheng-admin-script.js', array( 'jquery' ), '', true );
    wp_localize_script( 'ChiaSheng-admin-script', 'ChiaSheng_ajax_object',
        array( 'ajax_url' => admin_url( 'admin-ajax.php' ) )
    );
}
add_action( 'admin_enqueue_scripts', 'ChiaSheng_admin_enqueue_scripts' );

function ChiaSheng_customizer_value( $control, $css_selector, $css_prop, array $default, $ext = '' ) {
    if ( $control ) {
        $control        = get_theme_mod( $control );
        $return         = '';

        if( is_string( $control ) && is_array( json_decode( $control, true ) ) ){
            $desktop_val    = ChiaSheng_media_range( $css_prop, $control,  $default[0], 'desktop', $ext );
            $tablet_val     = ChiaSheng_media_range( $css_prop, $control, $default[1], 'tablet', $ext );
            $mobile_val     = ChiaSheng_media_range( $css_prop, $control, $default[2], 'mobile', $ext );

            if ( !empty( $desktop_val ) ) {
                $return         = $css_selector . ' { ';
                $return        .= $desktop_val;
                $return        .= '} ';
            }

            if ( !empty( $tablet_val ) ) {
                $return        .= '@media (max-width:768px) {';
                $return        .= $css_selector . ' { ';
                $return        .= $tablet_val;
                $return        .= '} } ';
            }

            if ( !empty( $mobile_val ) ) {
                $return        .= '@media (max-width:480px) {';
                $return        .= $css_selector . ' { ';
                $return        .= $mobile_val;
                $return        .= '} } ';
            }
        } else {
            if ( !empty( $control ) && $control != $default[0] ) {
                $return        .= $css_selector . ' { ';
                $return        .= esc_attr( $control ) . $ext . ';';
                $return        .= ' } ';
            }
        }

        return $return;
    }

    return false;
}

/**
 * Enqueue User Custom styles.
 */
 if( ! function_exists( 'ChiaSheng_user_custom_style' ) ):
    function ChiaSheng_user_custom_style() {

		$ChiaSheng_print_style = '';
		
		 /*=========================================
		 ChiaSheng Page Title
		=========================================*/
		 $ChiaSheng_print_style   .=  ChiaSheng_customizer_value( 'ChiaSheng_breadcrumb_title_size', '.page-header h1', array( 'font-size' ), array( 30, 30, 30 ), 'px' );
		  $ChiaSheng_print_style   .=  ChiaSheng_customizer_value( 'ChiaSheng_breadcrumb_content_size', '.page-header .breadcrumb li', array( 'font-size' ), array( 15, 15, 15 ), 'px' );
		
		
	
		 /*=========================================
		 ChiaSheng Logo Size
		=========================================*/
		$ChiaSheng_print_style   .= ChiaSheng_customizer_value( 'hdr_logo_size', '.site--logo img', array( 'max-width' ), array( 150, 150, 150 ), 'px !important' );
		$ChiaSheng_print_style   .= ChiaSheng_customizer_value( 'hdr_site_title_size', '.site--logo .site--title', array( 'font-size' ), array( 55, 55, 55 ), 'px !important' );
		$ChiaSheng_print_style   .= ChiaSheng_customizer_value( 'hdr_site_desc_size', '.site--logo .site--description', array( 'font-size' ), array( 16, 16, 16 ), 'px !important' );
		
		$ChiaSheng_site_container_width 			 = get_theme_mod('ChiaSheng_site_container_width','1340');
			if($ChiaSheng_site_container_width >=768 && $ChiaSheng_site_container_width <=2000){
				$ChiaSheng_print_style .=".dt-container-md,.dt__slider-main .owl-dots {
						max-width: " .esc_attr($ChiaSheng_site_container_width). "px;
					}\n";
			}
					
		/**
		 *  Sidebar Width
		 */
		$ChiaSheng_sidebar_width = get_theme_mod('ChiaSheng_sidebar_width',33);
		if($ChiaSheng_sidebar_width !== '') { 
			$ChiaSheng_primary_width   = absint( 100 - $ChiaSheng_sidebar_width );
				$ChiaSheng_print_style .="	@media (min-width: 992px) {#dt-main {
					max-width:" .esc_attr($ChiaSheng_primary_width). "%;
					flex-basis:" .esc_attr($ChiaSheng_primary_width). "%;
				}\n";
				$ChiaSheng_print_style .="#dt-sidebar {
					max-width:" .esc_attr($ChiaSheng_sidebar_width). "%;
					flex-basis:" .esc_attr($ChiaSheng_sidebar_width). "%;
				}}\n";
        }
		$ChiaSheng_print_style   .= ChiaSheng_customizer_value( 'ChiaSheng_widget_ttl_size', '.widget-title', array( 'font-size' ), array( 24, 24, 24 ), 'px' );
		
		/**
		 *  Typography Body
		 */
		 $ChiaSheng_body_font_weight_option	 	 = get_theme_mod('ChiaSheng_body_font_weight_option','inherit');
		 $ChiaSheng_body_text_transform_option	 = get_theme_mod('ChiaSheng_body_text_transform_option','inherit');
		 $ChiaSheng_body_font_style_option	 	 = get_theme_mod('ChiaSheng_body_font_style_option','inherit');
		 $ChiaSheng_body_txt_decoration_option	 = get_theme_mod('ChiaSheng_body_txt_decoration_option','none');
		
		 $ChiaSheng_print_style   .= ChiaSheng_customizer_value( 'ChiaSheng_body_font_size_option', 'body', array( 'font-size' ), array( 16, 16, 16 ), 'px' );
		 $ChiaSheng_print_style   .= ChiaSheng_customizer_value( 'ChiaSheng_body_line_height_option', 'body', array( 'line-height' ), array( 1.6, 1.6, 1.6 ) );
		 $ChiaSheng_print_style   .= ChiaSheng_customizer_value( 'ChiaSheng_body_ltr_space_option', 'body', array( 'letter-spacing' ), array( 0, 0, 0 ), 'px' );	 
		
		/**
		 *  Typography Heading
		 */
		 for ( $i = 1; $i <= 6; $i++ ) {
			 $ChiaSheng_heading_font_weight_option	 	= get_theme_mod('ChiaSheng_h' . $i . '_font_weight_option','700');
			 $ChiaSheng_heading_text_transform_option 	= get_theme_mod('ChiaSheng_h' . $i . '_text_transform_option','inherit');
			 $ChiaSheng_heading_font_style_option	 	= get_theme_mod('ChiaSheng_h' . $i . '_font_style_option','inherit');
			 $ChiaSheng_heading_txt_decoration_option	= get_theme_mod('ChiaSheng_h' . $i . '_txt_decoration_option','inherit');
			 
			 $ChiaSheng_print_style   .= ChiaSheng_customizer_value( 'ChiaSheng_h' . $i . '_font_size_option', 'h' . $i .'', array( 'font-size' ), array( 36, 36, 36 ), 'px' );
			 $ChiaSheng_print_style   .= ChiaSheng_customizer_value( 'ChiaSheng_h' . $i . '_line_height_option', 'h' . $i . '', array( 'line-height' ), array( 1.2, 1.2, 1.2 ) );
			 $ChiaSheng_print_style   .= ChiaSheng_customizer_value( 'ChiaSheng_h' . $i . '_ltr_space_option', 'h' . $i . '', array( 'letter-spacing' ), array( 0, 0, 0 ), 'px' );
		 }
		
		
		/*=========================================
		Post Format 
		=========================================*/
		$ChiaSheng_hs_latest_post_format_icon			= get_theme_mod('ChiaSheng_hs_latest_post_format_icon','1');
		if($ChiaSheng_hs_latest_post_format_icon !=='1'):
			 $ChiaSheng_print_style .=".post .post-format, .post .post-format-sm{ 
				    display: none;
			}\n";
		endif;
		
		/*=========================================
		Mainfeatured Section
		=========================================*/
		$ChiaSheng_slider_bg_img			= get_theme_mod('ChiaSheng_slider_bg_img');
		if(!empty($ChiaSheng_slider_bg_img)):
			 $ChiaSheng_print_style .=".mainfeatured_section {
				background-repeat: no-repeat;
				background-size: cover;
				background-position: center;
				padding-bottom: 30px;
				padding-top: 30px;
				background-color: rgba(18,16,38,0.6);
				background-blend-mode: overlay;
				z-index: 0;
			}
			.mainfeatured_section .post-tabs {
				background-color: #fff;
			}\n";
		endif;
        wp_add_inline_style( 'ChiaSheng-style', $ChiaSheng_print_style );
    }
endif;
add_action( 'wp_enqueue_scripts', 'ChiaSheng_user_custom_style' );


/**
 * Define Constants
 */
 
$ChiaSheng_theme = wp_get_theme();
define( 'CHIASHENG_THEME_VERSION', $ChiaSheng_theme->get( 'Version' ) );

// Root path/URI.
define( 'CHIASHENG_THEME_DIR', get_template_directory() );
define( 'CHIASHENG_THEME_URI', get_template_directory_uri() );

// Root path/URI.
define( 'CHIASHENG_THEME_INC_DIR', CHIASHENG_THEME_DIR . '/inc');
define( 'CHIASHENG_THEME_INC_URI', CHIASHENG_THEME_URI . '/inc');


/**
 * Implement the Custom Header feature.
 */
require_once get_template_directory() . '/inc/patterns/header.php';

/**
 * Custom template tags for this theme.
 */
require_once get_template_directory() . '/inc/template-tags.php';
require_once get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
 require_once get_template_directory() . '/inc/ChiaSheng-customizer.php';
 require get_template_directory() . '/inc/customizer.php';
 
/**
 * Nav Walker for Bootstrap Dropdown Menu.
 */
require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

/**
 * Widget
 */
require( get_template_directory() . '/inc/widgets-init.php');

/**
 * Control Style
 */

 require CHIASHENG_THEME_INC_DIR . 'style-functions.php';


/**
 * Getting Started
 */
require CHIASHENG_THEME_INC_DIR . '/admin/getting-started.php';