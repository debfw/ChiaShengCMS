<?php
/**
 * chiaSheng Customizer Class
 *
 * @package chiaSheng
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

 if ( ! class_exists( 'chiaSheng_Customizer' ) ) :

	class chiaSheng_Customizer {

		// Constructor customizer
		public function __construct() {
			add_action( 'customize_register',array( $this, 'chiaSheng_customizer_register' ) );
			add_action( 'customize_register',array( $this, 'chiaSheng_customizer_sainitization_selective_refresh' ) );
			add_action( 'customize_register',array( $this, 'chiaSheng_customizer_control' ) );
			add_action( 'customize_preview_init',array( $this, 'chiaSheng_customize_preview_js' ) );
			add_action( 'customize_controls_enqueue_scripts',array( $this, 'chiaSheng_controls_scripts' ) );
			add_action( 'after_setup_theme',array( $this, 'chiaSheng_customizer_settings' ) );
		}
		
		/**
		 * Add postMessage support for site title and description for the Theme Customizer.
		 *
		 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
		 */
		public function chiaSheng_customizer_register( $wp_customize ) {
			
			$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
			$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
			$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
			$wp_customize->get_setting( 'background_color' )->transport = 'postMessage';
			$wp_customize->get_setting('custom_logo')->transport = 'refresh';
		}
		
		// Register custom controls
		public function chiaSheng_customizer_control( $wp_customize ) {
			
			$chiaSheng_control_dir =  CHIASHENG_THEME_INC_DIR . '/customizer/controls';
			
			// Load custom control classes.
			$wp_customize->register_control_type( 'chiaSheng_Customizer_Range_Control' );
			require $chiaSheng_control_dir . '/code/chiaSheng-slider-control.php';
			require $chiaSheng_control_dir . '/code/chiaSheng-category-dropdown-control.php';
			require $chiaSheng_control_dir . '/code/editor/class/class-chiaSheng-page-editor.php';

		}
		
		
		// Customizer Controls
		public function chiaSheng_controls_scripts() {
			// Customizer Core.
			wp_enqueue_script( 'chiaSheng-customizer-controls-toggle-js', chiaSheng_THEME_INC_URI . '/customizer/controls/js/chiaSheng-toggle-control.js', array(), chiaSheng_THEME_VERSION, true );

			// Customizer Controls.
			wp_enqueue_script( 'chiaSheng-customizer-controls-js', chiaSheng_THEME_INC_URI . '/customizer/controls/js/chiaSheng-customizer-control.js', array( 'chiaSheng-customizer-controls-toggle-js' ), chiaSheng_THEME_VERSION, true );
		}
		
		// selective refresh.
		public function chiaSheng_customizer_sainitization_selective_refresh() {

			require CHIASHENG_THEME_INC_DIR . '/customizer/sanitization.php';
			
		}

		// Theme Customizer preview reload changes asynchronously.
		public function chiaSheng_customize_preview_js() {
			wp_enqueue_script( 'chiaSheng-customizer', chiaSheng_THEME_INC_URI . '/customizer/assets/js/customizer-preview.js', array( 'customize-preview' ), chiaSheng_THEME_VERSION, true );
		}

		// Include customizer settings.
		public function chiaSheng_customizer_settings() {	
			  // Recommended Plugin
			  require CHIASHENG_THEME_INC_DIR . '/customizer/chiaSheng-notify-plugin.php';			
			  $chiaSheng_customize_dir =  CHIASHENG_THEME_INC_DIR . '/customizer/customizer-settings';
			  require $chiaSheng_customize_dir . '/chiaSheng-header-customize-setting.php';
			  require $chiaSheng_customize_dir . '/chiaSheng-footer-customize-setting.php';
			  require $chiaSheng_customize_dir . '/chiaSheng-top-tags-customize-setting.php';
			  require $chiaSheng_customize_dir . '/chiaSheng-slider-customize-setting.php';
			  require $chiaSheng_customize_dir . '/chiaSheng-featured-link-customize-setting.php';
			  require $chiaSheng_customize_dir . '/chiaSheng-latest-post-customize-setting.php';
			  require $chiaSheng_customize_dir . '/chiaSheng-other-story-customize-setting.php';
			  require $chiaSheng_customize_dir . '/chiaSheng-theme-customize-setting.php';
			  require $chiaSheng_customize_dir . '/chiaSheng-prebuilt-page-customize-setting.php';
			  require $chiaSheng_customize_dir . '/chiaSheng-typography-customize-setting.php';
			  require CHIASHENG_THEME_INC_DIR . '/customizer/chiaSheng-selective-partial.php';
			  require CHIASHENG_THEME_INC_DIR . '/customizer/chiaSheng-selective-refresh.php';
		}

	}
endif;
new chiaSheng_Customizer();