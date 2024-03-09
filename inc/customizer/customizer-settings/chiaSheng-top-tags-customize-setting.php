<?php
function chiaSheng_top_tags_customize_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Top Tags Section Panel
	=========================================*/
	$wp_customize->add_section(
		'top_tags_options', array(
			'title' => esc_html__( 'Top Tags Section', 'chiaSheng' ),
			'panel' => 'chiaSheng_frontpage_options',
			'priority' => 1,
		)
	);
	
	/*=========================================
	Top Tags Setting
	=========================================*/
	$wp_customize->add_setting(
		'top_tags_setting_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'chiaSheng_sanitize_text',
			'priority' => 4,
		)
	);

	$wp_customize->add_control(
	'top_tags_setting_head',
		array(
			'type' => 'hidden',
			'label' => __('Top Tags Setting','chiaSheng'),
			'section' => 'top_tags_options',
		)
	);
	
	// Hide / Show
	$wp_customize->add_setting( 
		'chiaSheng_hs_top_tags' , 
			array(
			'default'     => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'chiaSheng_sanitize_checkbox',
			'priority' => 4,
		) 
	);
	
	$wp_customize->add_control(
	'chiaSheng_hs_top_tags', 
		array(
			'label'	      => esc_html__( 'Hide/Show?', 'chiaSheng' ),
			'section'     => 'top_tags_options',
			'type'        => 'checkbox'
		) 
	);
	
	// Display Top Tags
	$wp_customize->add_setting( 
		'chiaSheng_display_top_tags' , 
			array(
			'default' => 'front_post',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'chiaSheng_sanitize_select',
			'priority' => 4,
		) 
	);

	$wp_customize->add_control(
	'chiaSheng_display_top_tags' , 
		array(
			'label'          => __( 'Display Top Tags on', 'chiaSheng' ),
			'section'        => 'top_tags_options',
			'type'           => 'select',
			'choices'        => 
			array(
				'front' 	=> __( 'Front Page', 'chiaSheng' ),
				'post' 	=> __( 'Post Page', 'chiaSheng' ),
				'front_post' 	=> __( 'Front & Post Page', 'chiaSheng' ),
			) 
		) 
	);
	
	
	//  Title // 
	$wp_customize->add_setting(
    	'chiaSheng_top_tags_ttl',
    	array(
	        'default'			=> __('Top Tags','chiaSheng'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'chiaSheng_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 3,
		)
	);	
	
	$wp_customize->add_control( 
		'chiaSheng_top_tags_ttl',
		array(
		    'label'   => __('Title','chiaSheng'),
		    'section' => 'top_tags_options',
			'type'           => 'text',
		)  
	);
	
	// Upgrade
	if ( class_exists( 'Desert_Companion_Customize_Upgrade_Control' ) ) {
		$wp_customize->add_setting(
		'chiaSheng_top_tags_upsale', 
		array(
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'priority' => 3,
		));
		
		$wp_customize->add_control( 
			new Desert_Companion_Customize_Upgrade_Control
			($wp_customize, 
				'chiaSheng_top_tags_upsale', 
				array(
					'label'      => __( 'Top Tags Styles', 'chiaSheng' ),
					'section'    => 'top_tags_options'
				) 
			) 
		);	
	}
}
add_action( 'customize_register', 'chiaSheng_top_tags_customize_setting' );