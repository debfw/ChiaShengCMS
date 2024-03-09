<?php
function chiaSheng_typography_customize( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';	

	$wp_customize->add_panel(
		'chiaSheng_typography_options', array(
			'priority' => 38,
			'title' => esc_html__( 'Typography', 'chiaSheng' ),
		)
	);	
	
	/*=========================================
	chiaSheng Typography
	=========================================*/
	$wp_customize->add_section(
        'chiaSheng_typography_options',
        array(
        	'priority'      => 1,
            'title' 		=> __('Body Typography','chiaSheng'),
			'panel'  		=> 'chiaSheng_typography_options',
		)
    );
	
	 /**
     * Font Family
     */
	
	$wp_customize->add_setting( 'chiaSheng_body_font_family_option', array(
      'capability'        => 'edit_theme_options',
      'default'           => '',
      'transport'         => 'postMessage',
      'sanitize_callback' => 'chiaSheng_sanitize_select',
    ) );

    $wp_customize->add_control(
        new WP_Customize_Control(
                $wp_customize, 'chiaSheng_body_font_family_option', array(
            'label'       => __( 'Font Family', 'chiaSheng' ),
            'section'     => 'chiaSheng_typography_options',
            'type'        =>  'select',
            'priority'    => 1,
            'choices'     =>  array(
                ''   =>  __( 'Default', 'chiaSheng' ),
                ),
            )
        )
    );
	
	// Body Font Size // 
	if ( class_exists( 'chiaSheng_Customizer_Range_Control' ) ) {
		$wp_customize->add_setting(
			'chiaSheng_body_font_size_option',
			array(
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'chiaSheng_sanitize_range_value',
				'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control( 
		new chiaSheng_Customizer_Range_Control( $wp_customize, 'chiaSheng_body_font_size_option', 
			array(
				'label'      => __( 'Size', 'chiaSheng' ),
				'section'  => 'chiaSheng_typography_options',
				'priority'      => 2,
				 'media_query'   => true,
                'input_attr'    => array(
                    'mobile'  => array(
                        'min'           => 1,
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
	
	// Body Font Size // 
	if ( class_exists( 'chiaSheng_Customizer_Range_Control' ) ) {
		$wp_customize->add_setting(
			'chiaSheng_body_line_height_option',
			array(
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'chiaSheng_sanitize_range_value',
				'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control( 
		new chiaSheng_Customizer_Range_Control( $wp_customize, 'chiaSheng_body_line_height_option', 
			array(
				'label'      => __( 'Line Height', 'chiaSheng' ),
				'section'  => 'chiaSheng_typography_options',
				'priority'      => 3,
				 'media_query'   => true,
                'input_attr'    => array(
                    'mobile'  => array(
                        'min'           => 0,
                        'max'           => 3,
                        'step'          => 0.1,
                        'default_value' => 1.6,
                    ),
                    'tablet'  => array(
                        'min'           => 0,
                        'max'           => 3,
                        'step'          => 0.1,
                        'default_value' => 1.6,
                    ),
                    'desktop' => array(
                       'min'           => 0,
                        'max'           => 3,
                        'step'          => 0.1,
                        'default_value' => 1.6,
                    ),
				)	
			) ) 
		);
	}
	
	// Body Font Size // 
	if ( class_exists( 'chiaSheng_Customizer_Range_Control' ) ) {
		$wp_customize->add_setting(
			'chiaSheng_body_ltr_space_option',
			array(
                'default'           => '0.1',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'chiaSheng_sanitize_range_value',
				'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control( 
		new chiaSheng_Customizer_Range_Control( $wp_customize, 'chiaSheng_body_ltr_space_option', 
			array(
				'label'      => __( 'Letter Spacing', 'chiaSheng' ),
				'section'  => 'chiaSheng_typography_options',
				'priority'      => 4,
				 'media_query'   => true,
                'input_attr'    => array(
                    'mobile'  => array(
                        'min'           => -10,
                        'max'           => 10,
                        'step'          => 1,
                        'default_value' => 0,
                    ),
                    'tablet'  => array(
                       'min'           => -10,
                        'max'           => 10,
                        'step'          => 1,
                        'default_value' => 0,
                    ),
                    'desktop' => array(
                       'min'           => -10,
                        'max'           => 10,
                        'step'          => 1,
                        'default_value' => 0,
                    ),
				)	
			) ) 
		);
	}
	
	// Body Font weight // 
	 $wp_customize->add_setting( 'chiaSheng_body_font_weight_option', array(
      'capability'        => 'edit_theme_options',
      'default'           => 'inherit',
      'transport'         => 'postMessage',
      'sanitize_callback' => 'chiaSheng_sanitize_select',
    ) );

    $wp_customize->add_control(
        new WP_Customize_Control(
                $wp_customize, 'chiaSheng_body_font_weight_option', array(
            'label'       => __( 'Weight', 'chiaSheng' ),
            'section'     => 'chiaSheng_typography_options',
            'type'        =>  'select',
            'priority'    => 5,
            'choices'     =>  array(
                'inherit'   =>  __( 'Default', 'chiaSheng' ),
                '100'       =>  __( 'Thin: 100', 'chiaSheng' ),
                '200'       =>  __( 'Light: 200', 'chiaSheng' ),
                '300'       =>  __( 'Book: 300', 'chiaSheng' ),
                '400'       =>  __( 'Normal: 400', 'chiaSheng' ),
                '500'       =>  __( 'Medium: 500', 'chiaSheng' ),
                '600'       =>  __( 'Semibold: 600', 'chiaSheng' ),
                '700'       =>  __( 'Bold: 700', 'chiaSheng' ),
                '800'       =>  __( 'Extra Bold: 800', 'chiaSheng' ),
                '900'       =>  __( 'Black: 900', 'chiaSheng' ),
                ),
            )
        )
    );
	
	// Body Font style // 
	 $wp_customize->add_setting( 'chiaSheng_body_font_style_option', array(
      'capability'        => 'edit_theme_options',
      'default'           => 'inherit',
      'transport'         => 'postMessage',
      'sanitize_callback' => 'chiaSheng_sanitize_select',
    ) );

    $wp_customize->add_control(
        new WP_Customize_Control(
                $wp_customize, 'chiaSheng_body_font_style_option', array(
            'label'       => __( 'Font Style', 'chiaSheng' ),
            'section'     => 'chiaSheng_typography_options',
            'type'        =>  'select',
            'priority'    => 6,
            'choices'     =>  array(
                'inherit'   =>  __( 'Inherit', 'chiaSheng' ),
                'normal'       =>  __( 'Normal', 'chiaSheng' ),
                'italic'       =>  __( 'Italic', 'chiaSheng' ),
                'oblique'       =>  __( 'oblique', 'chiaSheng' ),
                ),
            )
        )
    );
	// Body Text Transform // 
	 $wp_customize->add_setting( 'chiaSheng_body_text_transform_option', array(
      'capability'        => 'edit_theme_options',
      'default'           => 'inherit',
      'transport'         => 'postMessage',
      'sanitize_callback' => 'chiaSheng_sanitize_select',
    ) );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize, 'chiaSheng_body_text_transform_option', array(
                'label'       => __( 'Transform', 'chiaSheng' ),
                'section'     => 'chiaSheng_typography_options',
                'type'        => 'select',
                'priority'    => 7,
                'choices'     => array(
                    'inherit'       =>  __( 'Default', 'chiaSheng' ),
                    'uppercase'     =>  __( 'Uppercase', 'chiaSheng' ),
                    'lowercase'     =>  __( 'Lowercase', 'chiaSheng' ),
                    'capitalize'    =>  __( 'Capitalize', 'chiaSheng' ),
                ),
            )
        )
    );
	
	// Body Text Decoration // 
	 $wp_customize->add_setting( 'chiaSheng_body_txt_decoration_option', array(
      'capability'        => 'edit_theme_options',
      'default'           => 'inherit',
      'transport'         => 'postMessage',
      'sanitize_callback' => 'chiaSheng_sanitize_select',
    ) );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize, 'chiaSheng_body_txt_decoration_option', array(
                'label'       => __( 'Text Decoration', 'chiaSheng' ),
                'section'     => 'chiaSheng_typography_options',
                'type'        => 'select',
                'priority'    => 8,
                'choices'     => array(
                    'inherit'       =>  __( 'Inherit', 'chiaSheng' ),
                    'underline'     =>  __( 'Underline', 'chiaSheng' ),
                    'overline'     =>  __( 'Overline', 'chiaSheng' ),
                    'line-through'    =>  __( 'Line Through', 'chiaSheng' ),
					'none'    =>  __( 'None', 'chiaSheng' ),
                ),
            )
        )
    );
	
	// Upgrade
	if ( class_exists( 'Desert_Companion_Customize_Upgrade_Control' ) ) {
		$wp_customize->add_setting(
		'chiaSheng_body_typography_option_upsale', 
		array(
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		));
		
		$wp_customize->add_control( 
			new Desert_Companion_Customize_Upgrade_Control
			($wp_customize, 
				'chiaSheng_body_typography_option_upsale', 
				array(
					'label'      => __( 'Typography Features', 'chiaSheng' ),
					'section'    => 'chiaSheng_typography_options',
					'priority' => 8,
				) 
			) 
		);	
	}
	/*=========================================
	 chiaSheng Typography Headings
	=========================================*/
	$wp_customize->add_section(
        'chiaSheng_headings_typography',
        array(
        	'priority'      => 2,
            'title' 		=> __('Headings (H1-H6) Typography','chiaSheng'),
			'panel'  		=> 'chiaSheng_typography_options',
		)
    );
	
	/*=========================================
	 chiaSheng Typography H1
	=========================================*/
	for ( $i = 1; $i <= 6; $i++ ) {
	if($i  == '1'){$j=36;}elseif($i  == '2'){$j=32;}elseif($i  == '3'){$j=28;}elseif($i  == '4'){$j=24;}elseif($i  == '5'){$j=20;}else{$j=16;}
	$wp_customize->add_setting(
		'h' . $i . '_typography'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'chiaSheng_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'h' . $i . '_typography',
		array(
			'type' => 'hidden',
			'label' => esc_html('H' . $i .' Typography','chiaSheng'),
			'section' => 'chiaSheng_headings_typography',
		)
	);
	
	
	$wp_customize->add_setting( 'chiaSheng_h' . $i . '_font_family_option', array(
      'capability'        => 'edit_theme_options',
      'default'           => '',
      'transport'         => 'postMessage',
      'sanitize_callback' => 'chiaSheng_sanitize_select',
    ) );

    $wp_customize->add_control(
        new WP_Customize_Control(
                $wp_customize, 'chiaSheng_h' . $i . '_font_family_option', array(
            'label'       => __( 'Font Family', 'chiaSheng' ),
            'section'     => 'chiaSheng_headings_typography',
            'type'        =>  'select',
            'choices'     =>  array(
                ''   =>  __( 'Default', 'chiaSheng' ),
                ),
            )
        )
    );
	

	// Heading Font Size // 
	if ( class_exists( 'chiaSheng_Customizer_Range_Control' ) ) {
		$wp_customize->add_setting(
			'chiaSheng_h' . $i . '_font_size_option',
			array(
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'chiaSheng_sanitize_range_value',
				'transport'         => 'postMessage'
			)
		);
		$wp_customize->add_control( 
		new chiaSheng_Customizer_Range_Control( $wp_customize, 'chiaSheng_h' . $i . '_font_size_option', 
			array(
				'label'      => __( 'Font Size', 'chiaSheng' ),
				'section'  => 'chiaSheng_headings_typography',
				'media_query'   => true,
				'input_attr'    => array(
                    'mobile'  => array(
                        'min'           => 1,
                        'max'           => 100,
                        'step'          => 1,
                        'default_value' => $j,
                    ),
                    'tablet'  => array(
                        'min'           => 1,
                        'max'           => 100,
                        'step'          => 1,
                        'default_value' => $j,
                    ),
                    'desktop' => array(
                       'min'           => 1,
                        'max'           => 100,
                        'step'          => 1,
					    'default_value' => $j,
                    ),
				)	
			) ) 
		);
	}
	
	// Heading Font Size // 
	if ( class_exists( 'chiaSheng_Customizer_Range_Control' ) ) {
		$wp_customize->add_setting(
			'chiaSheng_h' . $i . '_line_height_option',
			array(
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'chiaSheng_sanitize_range_value',
				'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control( 
		new chiaSheng_Customizer_Range_Control( $wp_customize, 'chiaSheng_h' . $i . '_line_height_option', 
			array(
				'label'      => __( 'Line Height', 'chiaSheng' ),
				'section'  => 'chiaSheng_headings_typography',
				'media_query'   => true,
				'input_attrs' => array(
					'min'    => 0,
					'max'    => 5,
					'step'   => 0.1,
					//'suffix' => 'px', //optional suffix
				),
				 'input_attr'    => array(
                    'mobile'  => array(
                        'min'           => 0,
                        'max'           => 3,
                        'step'          => 0.1,
                        'default_value' => 1.2,
                    ),
                    'tablet'  => array(
                        'min'           => 0,
                        'max'           => 3,
                        'step'          => 0.1,
                        'default_value' => 1.2,
                    ),
                    'desktop' => array(
                       'min'           => 0,
                        'max'           => 3,
                        'step'          => 0.1,
                        'default_value' => 1.2,
                    ),
				)	
			) ) 
		);
		}
	// Heading Letter Spacing // 
	if ( class_exists( 'chiaSheng_Customizer_Range_Control' ) ) {
		$wp_customize->add_setting(
			'chiaSheng_h' . $i . '_ltr_space_option',
			array(
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'chiaSheng_sanitize_range_value',
				'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control( 
		new chiaSheng_Customizer_Range_Control( $wp_customize, 'chiaSheng_h' . $i . '_ltr_space_option', 
			array(
				'label'      => __( 'Letter Spacing', 'chiaSheng' ),
				'section'  => 'chiaSheng_headings_typography',
				 'media_query'   => true,
                'input_attr'    => array(
                    'mobile'  => array(
                        'min'           => -10,
                        'max'           => 10,
                        'step'          => 1,
                        'default_value' => 0.1,
                    ),
                    'tablet'  => array(
                       'min'           => -10,
                        'max'           => 10,
                        'step'          => 1,
                        'default_value' => 0.1,
                    ),
                    'desktop' => array(
                       'min'           => -10,
                        'max'           => 10,
                        'step'          => 1,
                        'default_value' => 0.1,
                    ),
				)	
			) ) 
		);
	}
	
	// Heading Font weight // 
	 $wp_customize->add_setting( 'chiaSheng_h' . $i . '_font_weight_option', array(
		  'capability'        => 'edit_theme_options',
		  'default'           => '700',
		  'transport'         => 'postMessage',
		  'sanitize_callback' => 'chiaSheng_sanitize_select',
		) );

    $wp_customize->add_control(
        new WP_Customize_Control(
                $wp_customize, 'chiaSheng_h' . $i . '_font_weight_option', array(
            'label'       => __( 'Font Weight', 'chiaSheng' ),
            'section'     => 'chiaSheng_headings_typography',
            'type'        =>  'select',
            'choices'     =>  array(
                'inherit'   =>  __( 'Inherit', 'chiaSheng' ),
                '100'       =>  __( 'Thin: 100', 'chiaSheng' ),
                '200'       =>  __( 'Light: 200', 'chiaSheng' ),
                '300'       =>  __( 'Book: 300', 'chiaSheng' ),
                '400'       =>  __( 'Normal: 400', 'chiaSheng' ),
                '500'       =>  __( 'Medium: 500', 'chiaSheng' ),
                '600'       =>  __( 'Semibold: 600', 'chiaSheng' ),
                '700'       =>  __( 'Bold: 700', 'chiaSheng' ),
                '800'       =>  __( 'Extra Bold: 800', 'chiaSheng' ),
                '900'       =>  __( 'Black: 900', 'chiaSheng' ),
                ),
            )
        )
    );
	
	// Heading Font style // 
	 $wp_customize->add_setting( 'chiaSheng_h' . $i . '_font_style_option', array(
      'capability'        => 'edit_theme_options',
      'default'           => 'inherit',
      'transport'         => 'postMessage',
      'sanitize_callback' => 'chiaSheng_sanitize_select',
    ) );

    $wp_customize->add_control(
        new WP_Customize_Control(
                $wp_customize, 'chiaSheng_h' . $i . '_font_style_option', array(
            'label'       => __( 'Font Style', 'chiaSheng' ),
            'section'     => 'chiaSheng_headings_typography',
            'type'        =>  'select',
            'choices'     =>  array(
                'inherit'   =>  __( 'Inherit', 'chiaSheng' ),
                'normal'       =>  __( 'Normal', 'chiaSheng' ),
                'italic'       =>  __( 'Italic', 'chiaSheng' ),
                'oblique'       =>  __( 'oblique', 'chiaSheng' ),
                ),
            )
        )
    );
	
	// Heading Text Transform // 
	 $wp_customize->add_setting( 'chiaSheng_h' . $i . '_text_transform_option', array(
      'capability'        => 'edit_theme_options',
      'default'           => 'inherit',
      'transport'         => 'postMessage',
      'sanitize_callback' => 'chiaSheng_sanitize_select',
    ) );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize, 'chiaSheng_h' . $i . '_text_transform_option', array(
                'label'       => __( 'Text Transform', 'chiaSheng' ),
                'section'     => 'chiaSheng_headings_typography',
                'type'        => 'select',
                'choices'     => array(
                    'inherit'       =>  __( 'Default', 'chiaSheng' ),
                    'uppercase'     =>  __( 'Uppercase', 'chiaSheng' ),
                    'lowercase'     =>  __( 'Lowercase', 'chiaSheng' ),
                    'capitalize'    =>  __( 'Capitalize', 'chiaSheng' ),
                ),
            )
        )
    );
	
	// Heading Text Decoration // 
	 $wp_customize->add_setting( 'chiaSheng_h' . $i . '_txt_decoration_option', array(
      'capability'        => 'edit_theme_options',
      'default'           => 'inherit',
      'transport'         => 'postMessage',
      'sanitize_callback' => 'chiaSheng_sanitize_select',
    ) );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize, 'chiaSheng_h' . $i . '_txt_decoration_option', array(
                'label'       => __( 'Text Decoration', 'chiaSheng' ),
                'section'     => 'chiaSheng_headings_typography',
                'type'        => 'select',
                'choices'     => array(
                    'inherit'       =>  __( 'Inherit', 'chiaSheng' ),
                    'underline'     =>  __( 'Underline', 'chiaSheng' ),
                    'overline'     =>  __( 'Overline', 'chiaSheng' ),
                    'line-through'    =>  __( 'Line Through', 'chiaSheng' ),
					'none'    =>  __( 'None', 'chiaSheng' ),
                ),
            )
        )
    );
	
	// Upgrade
	if ( class_exists( 'Desert_Companion_Customize_Upgrade_Control' ) ) {
		$wp_customize->add_setting(
		'chiaSheng_h' . $i . '_typography_option_upsale', 
		array(
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		));
		
		$wp_customize->add_control( 
			new Desert_Companion_Customize_Upgrade_Control
			($wp_customize, 
				'chiaSheng_h' . $i . '_typography_option_upsale', 
				array(
					'label'      => __( 'Typography Features', 'chiaSheng' ),
					'section'    => 'chiaSheng_headings_typography',
				) 
			) 
		);	
	}
}
}
add_action( 'customize_register', 'chiaSheng_typography_customize' );