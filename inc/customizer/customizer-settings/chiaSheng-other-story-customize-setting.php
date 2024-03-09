<?php
function chiaSheng_other_story_customize_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Other Story Section Panel
	=========================================*/
	$wp_customize->add_section(
		'other_story_options', array(
			'title' => esc_html__( 'Other Story Section', 'chiaSheng' ),
			'panel' => 'footer_options',
			'priority' => 1,
		)
	);
	
	/*=========================================
	Other Story Setting
	=========================================*/
	$wp_customize->add_setting(
		'other_story_setting_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'chiaSheng_sanitize_text',
			'priority' => 4,
		)
	);

	$wp_customize->add_control(
	'other_story_setting_head',
		array(
			'type' => 'hidden',
			'label' => __('Other Story Setting','chiaSheng'),
			'section' => 'other_story_options',
		)
	);
	
	// Hide / Show
	$wp_customize->add_setting( 
		'chiaSheng_hs_other_story' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'chiaSheng_sanitize_checkbox',
			'priority' => 4,
		) 
	);
	
	$wp_customize->add_control(
	'chiaSheng_hs_other_story', 
		array(
			'label'	      => esc_html__( 'Hide/Show?', 'chiaSheng' ),
			'section'     => 'other_story_options',
			'type'        => 'checkbox'
		) 
	);
	
	/*=========================================
	Other Story Content 
	=========================================*/
	$wp_customize->add_setting(
		'other_story_options_heading'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'chiaSheng_sanitize_text',
			'priority' => 3,
		)
	);

	$wp_customize->add_control(
	'other_story_options_heading',
		array(
			'type' => 'hidden',
			'label' => __('Other Story Content Head','chiaSheng'),
			'section' => 'other_story_options',
		)
	);
	
	//  Title // 
	$wp_customize->add_setting(
    	'chiaSheng_other_story_ttl',
    	array(
	        'default'			=> __('Other Story','chiaSheng'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'chiaSheng_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 3,
		)
	);	
	
	$wp_customize->add_control( 
		'chiaSheng_other_story_ttl',
		array(
		    'label'   => __('Title','chiaSheng'),
		    'section' => 'other_story_options',
			'type'           => 'text',
		)  
	);
	
	/*=========================================
	Other Story Content
	=========================================*/
	$wp_customize->add_setting(
		'other_story_options_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'chiaSheng_sanitize_text',
			'priority' => 4,
		)
	);

	$wp_customize->add_control(
	'other_story_options_head',
		array(
			'type' => 'hidden',
			'label' => __('Other Story Content','chiaSheng'),
			'section' => 'other_story_options',
		)
	);
	
	// Select Blog Category
	$wp_customize->add_setting(
    'chiaSheng_other_story_cat',
		array(
		'default'	      => '0',	
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'absint',
		'priority' => 4,
		)
	);	
	$wp_customize->add_control( new chiaSheng_Post_Category_Control( $wp_customize, 
	'chiaSheng_other_story_cat', 
		array(
		'label'   => __('Select Category','chiaSheng'),
		'description'   => __('Posts to be shown on Other Story section','chiaSheng'),
		'section' => 'other_story_options',
		) 
	) );
	
	// Hide / Show
	$wp_customize->add_setting( 
		'chiaSheng_hs_other_story_title' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'chiaSheng_sanitize_checkbox',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'chiaSheng_hs_other_story_title', 
		array(
			'label'	      => esc_html__( 'Hide/Show Title?', 'chiaSheng' ),
			'section'     => 'other_story_options',
			'type'        => 'checkbox'
		) 
	);
	
	// Hide / Show
	$wp_customize->add_setting( 
		'chiaSheng_hs_other_story_cat_meta' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'chiaSheng_sanitize_checkbox',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'chiaSheng_hs_other_story_cat_meta', 
		array(
			'label'	      => esc_html__( 'Hide/Show Category?', 'chiaSheng' ),
			'section'     => 'other_story_options',
			'type'        => 'checkbox'
		) 
	);
	
	// Hide / Show
	$wp_customize->add_setting( 
		'chiaSheng_hs_other_story_auth_meta' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'chiaSheng_sanitize_checkbox',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'chiaSheng_hs_other_story_auth_meta', 
		array(
			'label'	      => esc_html__( 'Hide/Show Author?', 'chiaSheng' ),
			'section'     => 'other_story_options',
			'type'        => 'checkbox'
		) 
	);
	
	// Hide / Show
	$wp_customize->add_setting( 
		'chiaSheng_hs_other_story_date_meta' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'chiaSheng_sanitize_checkbox',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'chiaSheng_hs_other_story_date_meta', 
		array(
			'label'	      => esc_html__( 'Hide/Show Date?', 'chiaSheng' ),
			'section'     => 'other_story_options',
			'type'        => 'checkbox'
		) 
	);
	
	// Hide / Show
	$wp_customize->add_setting( 
		'chiaSheng_hs_other_story_content_meta' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'chiaSheng_sanitize_checkbox',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'chiaSheng_hs_other_story_content_meta', 
		array(
			'label'	      => esc_html__( 'Hide/Show Content?', 'chiaSheng' ),
			'section'     => 'other_story_options',
			'type'        => 'checkbox'
		) 
	);
	
	// No. of Slides
	if ( class_exists( 'chiaSheng_Customizer_Range_Control' ) ) {
		$wp_customize->add_setting(
			'chiaSheng_num_other_story',
			array(
				'default' => '6',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'chiaSheng_sanitize_range_value',
				'priority' => 11,
			)
		);
		$wp_customize->add_control( 
		new chiaSheng_Customizer_Range_Control( $wp_customize, 'chiaSheng_num_other_story', 
			array(
				'label'      => __( 'Number of Other Story', 'chiaSheng' ),
				'section'  => 'other_story_options',
				 'media_query'   => false,
					'input_attr'    => array(
						'desktop' => array(
							'min'           => 1,
							'max'           => 100,
							'step'          => 1,
							'default_value' => 6,
						),
					),
			) ) 
		);
	}
}
add_action( 'customize_register', 'chiaSheng_other_story_customize_setting' );