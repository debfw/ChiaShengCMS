<?php
function chiaSheng_header_customize_settings( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Header Settings Panel
	=========================================*/
	$wp_customize->add_panel( 
		'header_options', 
		array(
			'priority'      => 2,
			'capability'    => 'edit_theme_options',
			'title'			=> __('Header Options', 'chiaSheng'),
		) 
	);
	
	/*=========================================
	chiaSheng Site Identity
	=========================================*/
	$wp_customize->add_section(
        'title_tagline',
        array(
        	'priority'      => 1,
            'title' 		=> __('Site Identity','chiaSheng'),
			'panel'  		=> 'header_options',
		)
    );
	
	// Logo Width // 
	if ( class_exists( 'chiaSheng_Customizer_Range_Control' ) ) {
		$wp_customize->add_setting(
			'hdr_logo_size',
			array(
				'default'			=> '150',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'chiaSheng_sanitize_range_value',
				'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control( 
		new chiaSheng_Customizer_Range_Control( $wp_customize, 'hdr_logo_size', 
			array(
				'label'      => __( 'Logo Size', 'chiaSheng' ),
				'section'  => 'title_tagline',
				 'media_query'   => true,
					'input_attr'    => array(
						'mobile'  => array(
							'min'           => 0,
							'max'           => 500,
							'step'          => 1,
							'default_value' => 150,
						),
						'tablet'  => array(
							'min'           => 0,
							'max'           => 500,
							'step'          => 1,
							'default_value' => 150,
						),
						'desktop' => array(
							'min'           => 0,
							'max'           => 500,
							'step'          => 1,
							'default_value' => 150,
						),
					),
			) ) 
		);
	}
	
	
	// Site Title Size // 
	if ( class_exists( 'chiaSheng_Customizer_Range_Control' ) ) {
		$wp_customize->add_setting(
			'hdr_site_title_size',
			array(
				'default'			=> '55',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'chiaSheng_sanitize_range_value',
				'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control( 
		new chiaSheng_Customizer_Range_Control( $wp_customize, 'hdr_site_title_size', 
			array(
				'label'      => __( 'Site Title Size', 'chiaSheng' ),
				'section'  => 'title_tagline',
				 'media_query'   => true,
					'input_attr'    => array(
						'mobile'  => array(
							'min'           => 0,
							'max'           => 100,
							'step'          => 1,
							'default_value' => 55,
						),
						'tablet'  => array(
							'min'           => 0,
							'max'           => 100,
							'step'          => 1,
							'default_value' => 55,
						),
						'desktop' => array(
							'min'           => 0,
							'max'           => 100,
							'step'          => 1,
							'default_value' => 55,
						),
					),
			) ) 
		);
	}
	
	// Site Tagline Size // 
	if ( class_exists( 'chiaSheng_Customizer_Range_Control' ) ) {
		$wp_customize->add_setting(
			'hdr_site_desc_size',
			array(
				'default'			=> '16',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'chiaSheng_sanitize_range_value',
				'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control( 
		new chiaSheng_Customizer_Range_Control( $wp_customize, 'hdr_site_desc_size', 
			array(
				'label'      => __( 'Site Tagline Size', 'chiaSheng' ),
				'section'  => 'title_tagline',
				 'media_query'   => true,
					'input_attr'    => array(
						'mobile'  => array(
							'min'           => 0,
							'max'           => 50,
							'step'          => 1,
							'default_value' => 16,
						),
						'tablet'  => array(
							'min'           => 0,
							'max'           => 50,
							'step'          => 1,
							'default_value' => 16,
						),
						'desktop' => array(
							'min'           => 0,
							'max'           => 50,
							'step'          => 1,
							'default_value' => 16,
						),
					),
			) ) 
		);
	}
	
	
	// Hide / Show
	$wp_customize->add_setting( 
		'chiaSheng_title_tagline_seo' , 
			array(
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'chiaSheng_sanitize_checkbox',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'chiaSheng_title_tagline_seo', 
		array(
			'label'	      => esc_html__( 'Enable Hidden Title (h1 missing SEO issue)', 'chiaSheng' ),
			'section'     => 'title_tagline',
			'type'        => 'checkbox'
		) 
	);	
	
	
	/*=========================================
	Top Header
	=========================================*/
	$wp_customize->add_section(
        'chiaSheng_top_header',
        array(
        	'priority'      => 2,
            'title' 		=> __('Top Header','chiaSheng'),
			'panel'  		=> 'header_options',
		)
    );	
	
	/*=========================================
	Global Setting
	=========================================*/
	$wp_customize->add_setting(
		'chiaSheng_hdr_top'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'chiaSheng_sanitize_text',
			'priority' => 3,
		)
	);

	$wp_customize->add_control(
	'chiaSheng_hdr_top',
		array(
			'type' => 'hidden',
			'label' => __('Global Setting','chiaSheng'),
			'section' => 'chiaSheng_top_header',
		)
	);
	
	// Hide / Show
	$wp_customize->add_setting( 
		'chiaSheng_hs_hdr' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'chiaSheng_sanitize_checkbox',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'chiaSheng_hs_hdr', 
		array(
			'label'	      => esc_html__( 'Hide/Show ?', 'chiaSheng' ),
			'section'     => 'chiaSheng_top_header',
			'type'        => 'checkbox'
		) 
	);	
	
	/*=========================================
	Date
	=========================================*/
	$wp_customize->add_setting(
		'chiaSheng_hdr_date'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'chiaSheng_sanitize_text',
			'priority' => 3,
		)
	);

	$wp_customize->add_control(
	'chiaSheng_hdr_date',
		array(
			'type' => 'hidden',
			'label' => __('Date','chiaSheng'),
			'section' => 'chiaSheng_top_header',
		)
	);
	
	// Hide / Show
	$wp_customize->add_setting( 
		'chiaSheng_hs_hdr_date' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'chiaSheng_sanitize_checkbox',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'chiaSheng_hs_hdr_date', 
		array(
			'label'	      => esc_html__( 'Hide/Show ?', 'chiaSheng' ),
			'section'     => 'chiaSheng_top_header',
			'type'        => 'checkbox'
		) 
	);	
	
	
	// Type
	$wp_customize->add_setting( 
		'chiaSheng_hdr_date_display' , 
			array(
			'default' => 'theme',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'chiaSheng_sanitize_select',
			'priority' => 2,
		) 
	);

	$wp_customize->add_control(
	'chiaSheng_hdr_date_display' , 
		array(
			'label'          => __( 'Date Display Type', 'chiaSheng' ),
			'section'        => 'chiaSheng_top_header',
			'type'           => 'select',
			'choices'        => 
			array(
				'theme' 	=> __( 'Theme Default', 'chiaSheng' ),
				'wp' 	=> __( 'WordPress', 'chiaSheng' )
			) 
		) 
	);
	
	/*=========================================
	Text
	=========================================*/
	$wp_customize->add_setting(
		'chiaSheng_hdr_left_text_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'chiaSheng_sanitize_text',
			'priority' => 24,
		)
	);

	$wp_customize->add_control(
	'chiaSheng_hdr_left_text_head',
		array(
			'type' => 'hidden',
			'label' => __('Left Text','chiaSheng'),
			'section' => 'chiaSheng_top_header',
		)
	);
	
	
	$wp_customize->add_setting( 
		'chiaSheng_hs_hdr_left_text' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'chiaSheng_sanitize_checkbox',
			'priority' => 24,
		) 
	);
	
	$wp_customize->add_control(
	'chiaSheng_hs_hdr_left_text', 
		array(
			'label'	      => esc_html__( 'Hide/Show ?', 'chiaSheng' ),
			'section'     => 'chiaSheng_top_header',
			'type'        => 'checkbox'
		) 
	);
	
	//  title // 
	$wp_customize->add_setting(
    	'chiaSheng_hdr_left_ttl',
    	array(
	        'default'			=> __('<i class="fas fa-fire-alt"></i> Trending News:','chiaSheng'),
			'sanitize_callback' => 'chiaSheng_sanitize_html',
			'capability' => 'edit_theme_options',
			'transport'         => $selective_refresh,
			'priority' => 24,
		)
	);	

	$wp_customize->add_control( 
		'chiaSheng_hdr_left_ttl',
		array(
		    'label'   		=> __('Title','chiaSheng'),
		    'section' 		=> 'chiaSheng_top_header',
			'type'		 =>	'text'
		)  
	);
	
	// Select Blog Category
	$wp_customize->add_setting(
    'chiaSheng_hdr_left_text_cat',
		array(
		'default'	      => '0',	
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'absint',
		'priority' => 24,
		)
	);	
	$wp_customize->add_control( new chiaSheng_Post_Category_Control( $wp_customize, 
	'chiaSheng_hdr_left_text_cat', 
		array(
		'label'   => __('Select Category','chiaSheng'),
		'description'   => __('Posts Title to be shown on Header Text','chiaSheng'),
		'section' => 'chiaSheng_top_header',
		) 
	) );
	
	
	/*=========================================
	Header Account
	=========================================*/	
	$wp_customize->add_setting(
		'chiaSheng_hdr_account'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'chiaSheng_sanitize_text',
			'priority' => 24,
		)
	);

	$wp_customize->add_control(
	'chiaSheng_hdr_account',
		array(
			'type' => 'hidden',
			'label' => __('My Account','chiaSheng'),
			'section' => 'chiaSheng_top_header',
		)
	);
	
	
	$wp_customize->add_setting( 
		'chiaSheng_hs_hdr_account' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'chiaSheng_sanitize_checkbox',
			'priority' => 24,
		) 
	);
	
	$wp_customize->add_control(
	'chiaSheng_hs_hdr_account', 
		array(
			'label'	      => esc_html__( 'Hide/Show ?', 'chiaSheng' ),
			'section'     => 'chiaSheng_top_header',
			'type'        => 'checkbox'
		) 
	);	
	
	/*=========================================
	Address
	=========================================*/
	$wp_customize->add_setting(
		'chiaSheng_hdr_top_ads'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'chiaSheng_sanitize_text',
			'priority' => 16,
		)
	);

	$wp_customize->add_control(
	'chiaSheng_hdr_top_ads',
		array(
			'type' => 'hidden',
			'label' => __('Address','chiaSheng'),
			'section' => 'chiaSheng_top_header',
			
		)
	);
	$wp_customize->add_setting( 
		'chiaSheng_hs_hdr_top_ads', 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'chiaSheng_sanitize_checkbox',
			'priority' => 17,
		) 
	);
	
	$wp_customize->add_control(
	'chiaSheng_hs_hdr_top_ads', 
		array(
			'label'	      => esc_html__( 'Hide/Show ?', 'chiaSheng' ),
			'section'     => 'chiaSheng_top_header',
			'type'        => 'checkbox'
		) 
	);	
	// icon // 
	$wp_customize->add_setting( 
		'chiaSheng_hdr_top_ads_icon', 
			array(
			'default' => 'fas fa-map-marker-alt',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'chiaSheng_sanitize_html',
		) 
	);
	
	$wp_customize->add_control(
	'chiaSheng_hdr_top_ads_icon', 
		array(
			'label'	      => esc_html__( 'Icon', 'chiaSheng' ),
			'section'     => 'chiaSheng_top_header',
			'type'        => 'text'
		) 
	);	
	
	// title // 
	$wp_customize->add_setting(
    	'chiaSheng_hdr_top_ads_title',
    	array(
	        'default'			=> __('Chicago 12, Melborne City, USA','chiaSheng'),
			'sanitize_callback' => 'chiaSheng_sanitize_html',
			'transport'         => $selective_refresh,
			'capability' => 'edit_theme_options',
			'priority' => 18,
		)
	);	

	$wp_customize->add_control( 
		'chiaSheng_hdr_top_ads_title',
		array(
		    'label'   		=> __('Title','chiaSheng'),
		    'section' 		=> 'chiaSheng_top_header',
			'type'		 =>	'text'
		)  
	);
	
	// Link // 
	$wp_customize->add_setting(
    	'chiaSheng_hdr_top_ads_link',
    	array(
			'sanitize_callback' => 'chiaSheng_sanitize_url',
			'capability' => 'edit_theme_options',
			'priority' => 19,
		)
	);	

	$wp_customize->add_control( 
		'chiaSheng_hdr_top_ads_link',
		array(
		    'label'   		=> __('Link','chiaSheng'),
		    'section' 		=> 'chiaSheng_top_header',
			'type'		 =>	'text'
		)  
	);
		
	
	/*=========================================
	Social
	=========================================*/
	$wp_customize->add_setting(
		'chiaSheng_hdr_social_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'chiaSheng_sanitize_text',
			'priority' => 24,
		)
	);

	$wp_customize->add_control(
	'chiaSheng_hdr_social_head',
		array(
			'type' => 'hidden',
			'label' => __('Social Icons','chiaSheng'),
			'section' => 'chiaSheng_top_header',
		)
	);
	
	
	$wp_customize->add_setting( 
		'chiaSheng_hs_hdr_social' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'chiaSheng_sanitize_checkbox',
			'priority' => 25,
		) 
	);
	
	$wp_customize->add_control(
	'chiaSheng_hs_hdr_social', 
		array(
			'label'	      => esc_html__( 'Hide/Show ?', 'chiaSheng' ),
			'section'     => 'chiaSheng_top_header',
			'type'        => 'checkbox'
		) 
	);
	
	/**
	 * Customizer Repeater
	 */
		$wp_customize->add_setting( 'chiaSheng_hdr_social', 
			array(
			 'sanitize_callback' => 'chiaSheng_repeater_sanitize',
			 'priority' => 26,
			 'default' => chiaSheng_get_social_icon_default()
		)
		);
		
		$wp_customize->add_control( 
			new chiaSheng_Repeater( $wp_customize, 
				'chiaSheng_hdr_social', 
					array(
						'label'   => esc_html__('Social Icons','chiaSheng'),
						'section' => 'chiaSheng_top_header',
						'customizer_repeater_icon_control' => true,
						'customizer_repeater_link_control' => true,
					) 
				) 
			);
	
	// Upgrade
	if ( class_exists( 'Desert_Companion_Customize_Upgrade_Control' ) ) {
		$wp_customize->add_setting(
		'chiaSheng_social_option_upsale', 
		array(
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'priority' => 26,
		));
		
		$wp_customize->add_control( 
			new Desert_Companion_Customize_Upgrade_Control
			($wp_customize, 
				'chiaSheng_social_option_upsale', 
				array(
					'label'      => __( 'Icons', 'chiaSheng' ),
					'section'    => 'chiaSheng_top_header'
				) 
			) 
		);
	}
	
	/*=========================================
	Header Navigation
	=========================================*/	
	$wp_customize->add_section(
        'chiaSheng_hdr_nav',
        array(
        	'priority'      => 4,
            'title' 		=> __('Navigation Bar','chiaSheng'),
			'panel'  		=> 'header_options',
		)
    );
	
	
	/*=========================================
	Header Cart
	=========================================*/	
	$wp_customize->add_setting(
		'chiaSheng_hdr_cart'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'chiaSheng_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'chiaSheng_hdr_cart',
		array(
			'type' => 'hidden',
			'label' => __('WooCommerce Cart','chiaSheng'),
			'section' => 'chiaSheng_hdr_nav',
		)
	);
	
	
	$wp_customize->add_setting( 
		'chiaSheng_hs_hdr_cart' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'chiaSheng_sanitize_checkbox',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'chiaSheng_hs_hdr_cart', 
		array(
			'label'	      => esc_html__( 'Hide/Show ?', 'chiaSheng' ),
			'section'     => 'chiaSheng_hdr_nav',
			'type'        => 'checkbox'
		) 
	);	
	
	
	
	
	/*=========================================
	Header Search
	=========================================*/	
	$wp_customize->add_setting(
		'chiaSheng_hdr_search'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'chiaSheng_sanitize_text',
			'priority' => 3,
		)
	);

	$wp_customize->add_control(
	'chiaSheng_hdr_search',
		array(
			'type' => 'hidden',
			'label' => __('Site Search','chiaSheng'),
			'section' => 'chiaSheng_hdr_nav',
		)
	);
	$wp_customize->add_setting( 
		'chiaSheng_hs_hdr_search' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'chiaSheng_sanitize_checkbox',
			'priority' => 4,
		) 
	);
	
	$wp_customize->add_control(
	'chiaSheng_hs_hdr_search', 
		array(
			'label'	      => esc_html__( 'Hide/Show ?', 'chiaSheng' ),
			'section'     => 'chiaSheng_hdr_nav',
			'type'        => 'checkbox'
		) 
	);	
	
	/*=========================================
	Header Button
	=========================================*/	
	$wp_customize->add_setting(
		'chiaSheng_hdr_button'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'chiaSheng_sanitize_text',
			'priority' => 7,
		)
	);

	$wp_customize->add_control(
	'chiaSheng_hdr_button',
		array(
			'type' => 'hidden',
			'label' => __('Button','chiaSheng'),
			'section' => 'chiaSheng_hdr_nav',
		)
	);
	

	$wp_customize->add_setting(
		'chiaSheng_hs_hdr_btn' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'chiaSheng_sanitize_checkbox',
			'priority' => 8,
		) 
	);
	
	$wp_customize->add_control(
	'chiaSheng_hs_hdr_btn', 
		array(
			'label'	      => esc_html__( 'Hide/Show ?', 'chiaSheng' ),
			'section'     => 'chiaSheng_hdr_nav',
			'type'        => 'checkbox'
		) 
	);
	
	// Button Label // 
	$wp_customize->add_setting(
    	'chiaSheng_hdr_btn_lbl',
    	array(
	        'default'			=> __('Get Started','chiaSheng'),
			'sanitize_callback' => 'chiaSheng_sanitize_html',
			'capability' => 'edit_theme_options',
			'transport'         => $selective_refresh,
			'priority' => 9,
		)
	);	

	$wp_customize->add_control( 
		'chiaSheng_hdr_btn_lbl',
		array(
		    'label'   		=> __('Button Label','chiaSheng'),
		    'section' 		=> 'chiaSheng_hdr_nav',
			'type'		 =>	'text'
		)  
	);
	
	// Button Link // 
	$wp_customize->add_setting(
    	'chiaSheng_hdr_btn_link',
    	array(
			'default'			=> '#',
			'sanitize_callback' => 'chiaSheng_sanitize_url',
			'capability' => 'edit_theme_options',
			'priority' => 10,
		)
	);	

	$wp_customize->add_control( 
		'chiaSheng_hdr_btn_link',
		array(
		    'label'   		=> __('Button Link','chiaSheng'),
		    'section' 		=> 'chiaSheng_hdr_nav',
			'type'		 =>	'text'
		)  
	);
	
	
	// Open New Tab
	$wp_customize->add_setting( 
		'chiaSheng_hdr_btn_target' , 
			array(
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'chiaSheng_sanitize_checkbox',
			'priority' => 11,
		) 
	);
	
	$wp_customize->add_control(
	'chiaSheng_hdr_btn_target', 
		array(
			'label'	      => esc_html__( 'Open in New Tab ?', 'chiaSheng' ),
			'section'     => 'chiaSheng_hdr_nav',
			'type'        => 'checkbox'
		) 
	);	
	
	/*=========================================
	Sticky Header
	=========================================*/	
	$wp_customize->add_section(
        'chiaSheng_sticky_header_set',
        array(
        	'priority'      => 4,
            'title' 		=> __('Header Sticky','chiaSheng'),
			'panel'  		=> 'header_options',
		)
    );
	
	// Heading
	$wp_customize->add_setting(
		'chiaSheng_hdr_sticky'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'chiaSheng_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'chiaSheng_hdr_sticky',
		array(
			'type' => 'hidden',
			'label' => __('Sticky Header','chiaSheng'),
			'section' => 'chiaSheng_sticky_header_set',
		)
	);
	$wp_customize->add_setting( 
		'chiaSheng_hs_hdr_sticky' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'chiaSheng_sanitize_checkbox',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'chiaSheng_hs_hdr_sticky', 
		array(
			'label'	      => esc_html__( 'Hide/Show ?', 'chiaSheng' ),
			'section'     => 'chiaSheng_sticky_header_set',
			'type'        => 'checkbox'
		) 
	);	
}
add_action( 'customize_register', 'chiaSheng_header_customize_settings' );

