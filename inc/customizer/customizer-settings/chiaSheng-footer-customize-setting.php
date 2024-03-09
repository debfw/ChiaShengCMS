<?php
function chiaSheng_footer_customize_settings( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	// Footer Section Panel // 
	$wp_customize->add_panel( 
		'footer_options', 
		array(
			'priority'      => 34,
			'capability'    => 'edit_theme_options',
			'title'			=> __('Footer Options', 'chiaSheng'),
		) 
	);
	
	/*=========================================
	Footer Widget
	=========================================*/
	$wp_customize->add_section(
        'chiaSheng_footer_widget',
        array(
            'title' 		=> __('Footer Widget','chiaSheng'),
			'panel'  		=> 'footer_options',
			'priority'      => 3,
		)
    );
	
	// Heading
	$wp_customize->add_setting(
		'chiaSheng_footer_widget_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'chiaSheng_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'chiaSheng_footer_widget_head',
		array(
			'type' => 'hidden',
			'label' => __('Footer Widget','chiaSheng'),
			'section' => 'chiaSheng_footer_widget',
			'priority'  => 1,
		)
	);
	
	
	// column // 
	$wp_customize->add_setting(
    	'chiaSheng_footer_widget_column',
    	array(
	        'default'			=> '4',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'chiaSheng_sanitize_select',
			'priority' => 3,
		)
	);	

	$wp_customize->add_control(
		'chiaSheng_footer_widget_column',
		array(
		    'label'   		=> __('Select Widget Column','chiaSheng'),
		    'section' 		=> 'chiaSheng_footer_widget',
			'type'			=> 'select',
			'choices'        => 
			array(
				'' => __( 'None', 'chiaSheng' ),
				'1' => __( '1 Column', 'chiaSheng' ),
				'2' => __( '2 Column', 'chiaSheng' ),
				'3' => __( '3 Column', 'chiaSheng' ),
				'4' => __( '4 Column', 'chiaSheng' )
			) 
		) 
	);
	
	
	/*=========================================
	Footer Copright
	=========================================*/
	$wp_customize->add_section(
        'chiaSheng_footer_copyright',
        array(
            'title' 		=> __('Footer Copright','chiaSheng'),
			'panel'  		=> 'footer_options',
			'priority'      => 4,
		)
    );
	
	// Heading
	$wp_customize->add_setting(
		'chiaSheng_footer_copyright_first_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'chiaSheng_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'chiaSheng_footer_copyright_first_head',
		array(
			'type' => 'hidden',
			'label' => __('Copyright','chiaSheng'),
			'section' => 'chiaSheng_footer_copyright',
			'priority'  => 3,
		)
	);
	
	// footer  text // 
	$chiaSheng_copyright = esc_html__('Copyright &copy; [current_year] [site_title] | Powered by [theme_author]', 'chiaSheng' );
	$wp_customize->add_setting(
    	'chiaSheng_footer_copyright_text',
    	array(
			'default' => $chiaSheng_copyright,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'chiaSheng_sanitize_html',
		)
	);	

	$wp_customize->add_control( 
		'chiaSheng_footer_copyright_text',
		array(
		    'label'   		=> __('Copyright','chiaSheng'),
		    'section'		=> 'chiaSheng_footer_copyright',
			'type' 			=> 'textarea',
			'priority'      => 4,
		)  
	);	
	
	
	// Heading
	$wp_customize->add_setting(
		'chiaSheng_footer_copyright_social_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'chiaSheng_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'chiaSheng_footer_copyright_social_head',
		array(
			'type' => 'hidden',
			'label' => __('Social','chiaSheng'),
			'section' => 'chiaSheng_footer_copyright',
			'priority'  => 5,
		)
	);
	
	// Hide/Show
	$wp_customize->add_setting( 
		'chiaSheng_footer_copyright_social_hs' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'chiaSheng_sanitize_checkbox',
		) 
	);
	
	$wp_customize->add_control(
	'chiaSheng_footer_copyright_social_hs', 
		array(
			'label'	      => esc_html__( 'Hide/Show ?', 'chiaSheng' ),
			'section'     => 'chiaSheng_footer_copyright',
			'type'        => 'checkbox',
			'priority' => 5,
		) 
	);
	
	/**
	 * Customizer Repeater
	 */
		$wp_customize->add_setting( 'chiaSheng_footer_copyright_social', 
			array(
			 'sanitize_callback' => 'chiaSheng_repeater_sanitize',
			 'default' => chiaSheng_get_social_icon_default()
		)
		);
		
		$wp_customize->add_control( 
			new chiaSheng_Repeater( $wp_customize, 
				'chiaSheng_footer_copyright_social', 
					array(
						'label'   => esc_html__('Social Icons','chiaSheng'),
						'priority' => 5,
						'section' => 'chiaSheng_footer_copyright',
						'customizer_repeater_icon_control' => true,
						'customizer_repeater_link_control' => true,
					) 
				) 
			);
	
	/*=========================================
	Scroller
	=========================================*/
	// Heading
	$wp_customize->add_setting(
		'chiaSheng_scroller_option'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'chiaSheng_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'chiaSheng_scroller_option',
		array(
			'type' => 'hidden',
			'label' => __('Top Scroller','chiaSheng'),
			'section' => 'chiaSheng_footer_copyright',
			'priority' => 5,
		)
	);
	
	// Hide/show
	$wp_customize->add_setting( 
		'chiaSheng_hs_scroller_option' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'chiaSheng_sanitize_checkbox',
			'capability' => 'edit_theme_options',
		) 
	);
	
	$wp_customize->add_control(
	'chiaSheng_hs_scroller_option', 
		array(
			'label'	      => esc_html__( 'Hide / Show Scroller', 'chiaSheng' ),
			'section'     => 'chiaSheng_footer_copyright',
			'type'        => 'checkbox',
			'priority' => 5,
		) 
	);
	
	// Scroller text // 
	$wp_customize->add_setting(
    	'chiaSheng_scroller_text',
    	array(
			'default' => esc_html__( 'Back to Top', 'chiaSheng' ),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'chiaSheng_sanitize_html',
			'transport'         => $selective_refresh,
		)
	);	

	$wp_customize->add_control( 
		'chiaSheng_scroller_text',
		array(
		    'label'   		=> __('Scroller text','chiaSheng'),
		    'section'		=> 'chiaSheng_footer_copyright',
			'type' 			=> 'text',
			'priority'      => 5,
		)  
	);	
}
add_action( 'customize_register', 'chiaSheng_footer_customize_settings' );