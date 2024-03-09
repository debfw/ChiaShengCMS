<?php
function chiaSheng_latest_post_customize_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Latest Post Section Panel
	=========================================*/
	$wp_customize->add_section(
		'latest_post_options', array(
			'title' => esc_html__( 'Latest Post Section', 'chiaSheng' ),
			'panel' => 'chiaSheng_frontpage_options',
			'priority' => 7,
		)
	);
	
	/*=========================================
	Latest Post Content 
	=========================================*/
	$wp_customize->add_setting(
		'latest_post_options_heading'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'chiaSheng_sanitize_text',
			'priority' => 3,
		)
	);

	$wp_customize->add_control(
	'latest_post_options_heading',
		array(
			'type' => 'hidden',
			'label' => __('Latest Post Head','chiaSheng'),
			'section' => 'latest_post_options',
		)
	);
	
	//  Title // 
	$wp_customize->add_setting(
    	'chiaSheng_latest_post_ttl',
    	array(
	        'default'			=> __('Latest Post','chiaSheng'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'chiaSheng_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 3,
		)
	);	
	
	$wp_customize->add_control( 
		'chiaSheng_latest_post_ttl',
		array(
		    'label'   => __('Title','chiaSheng'),
		    'section' => 'latest_post_options',
			'type'           => 'text',
		)  
	);
	
	/*=========================================
	Latest Post Content
	=========================================*/
	$wp_customize->add_setting(
		'latest_post_options_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'chiaSheng_sanitize_text',
			'priority' => 4,
		)
	);

	$wp_customize->add_control(
	'latest_post_options_head',
		array(
			'type' => 'hidden',
			'label' => __('Latest Post Content','chiaSheng'),
			'section' => 'latest_post_options',
		)
	);
	
	// Select Blog Category
	$wp_customize->add_setting(
    'chiaSheng_latest_post_cat',
		array(
		'default'	      => '0',	
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'absint',
		'priority' => 4,
		)
	);	
	$wp_customize->add_control( new chiaSheng_Post_Category_Control( $wp_customize, 
	'chiaSheng_latest_post_cat', 
		array(
		'label'   => __('Select Category','chiaSheng'),
		'description'   => __('Posts to be shown on latest_post section','chiaSheng'),
		'section' => 'latest_post_options',
		) 
	) );
	
	
	// Type
	$wp_customize->add_setting( 
		'chiaSheng_post_pagination_lm_btn' , 
			array(
			'default' => __( 'Load More', 'chiaSheng' ),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'chiaSheng_sanitize_html',
			'priority' => 6,
		) 
	);

	$wp_customize->add_control(
	'chiaSheng_post_pagination_lm_btn' , 
		array(
			'label'          => __( 'Load More Button Label', 'chiaSheng' ),
			'section'        => 'latest_post_options',
			'type'           => 'text'
		) 
	);
	
	
	/*=========================================
	Latest Post After Before
	=========================================*/
	$wp_customize->add_setting(
		'latest_post_option_before_after'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'chiaSheng_sanitize_text',
			'priority' => 12,
		)
	);

	$wp_customize->add_control(
	'latest_post_option_before_after',
		array(
			'type' => 'hidden',
			'label' => __('Before / After Content','chiaSheng'),
			'section' => 'latest_post_options',
		)
	);
	
	// Before
	if ( class_exists( 'chiaSheng_Page_Editor' ) ) {
		$chiaSheng_page_editor_path = trailingslashit( get_template_directory() ) . 'inc/customizer/controls/code/editor/customizer-page-editor.php';
		if ( file_exists( $chiaSheng_page_editor_path ) ) {
			require_once( $chiaSheng_page_editor_path );
		}
		$wp_customize->add_setting(
			'chiaSheng_latest_post_option_before', array(
				'default' => '',
				'sanitize_callback' => 'wp_kses_post',
				'priority' => 13,
				
			)
		);

		$wp_customize->add_control(
			new chiaSheng_Page_Editor(
				$wp_customize, 'chiaSheng_latest_post_option_before', array(
					'label' => esc_html__( 'Before Section', 'chiaSheng' ),
					'section' => 'latest_post_options',
					'needsync' => true,
				)
			)
		);
	}
	
	// After
	if ( class_exists( 'chiaSheng_Page_Editor' ) ) {
		$wp_customize->add_setting(
			'chiaSheng_latest_post_option_after', array(
				'default' => '',
				'sanitize_callback' => 'wp_kses_post',
				'priority' => 14,
				
			)
		);

		$wp_customize->add_control(
			new chiaSheng_Page_Editor(
				$wp_customize, 'chiaSheng_latest_post_option_after', array(
					'label' => esc_html__( 'After Section', 'chiaSheng' ),
					'section' => 'latest_post_options',
					'needsync' => true,
				)
			)
		);
	}
	
	// Upgrade
	if ( class_exists( 'Desert_Companion_Customize_Upgrade_Control' ) ) {
		$wp_customize->add_setting(
		'chiaSheng_latest_post_option_upsale', 
		array(
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'priority' => 26,
		));
		
		$wp_customize->add_control( 
			new Desert_Companion_Customize_Upgrade_Control
			($wp_customize, 
				'chiaSheng_latest_post_option_upsale', 
				array(
					'label'      => __( 'Blog Styles', 'chiaSheng' ),
					'section'    => 'latest_post_options'
				) 
			) 
		);
	}
}
add_action( 'customize_register', 'chiaSheng_latest_post_customize_setting' );