<?php
function chiaSheng_site_selective_partials( $wp_customize ){
	// chiaSheng_hdr_left_ttl
	$wp_customize->selective_refresh->add_partial( 'chiaSheng_hdr_left_ttl', array(
		'selector'            => '.dt_header .dt_header-topbar .dt-news-headline .dt-news-heading',
		'settings'            => 'chiaSheng_hdr_left_ttl',
		'render_callback'  => 'chiaSheng_hdr_left_ttl_render_callback',
	) );
	
	// chiaSheng_hdr_left_text
	$wp_customize->selective_refresh->add_partial( 'chiaSheng_hdr_left_text', array(
		'selector'            => '.dt_header .dt_header-topbar .dt-news-headline .dt_heading_inner',
		'settings'            => 'chiaSheng_hdr_left_text',
		'render_callback'  => 'chiaSheng_hdr_left_text_render_callback',
	) );

	// chiaSheng_hdr_top_ads_title
	$wp_customize->selective_refresh->add_partial( 'chiaSheng_hdr_top_ads_title', array(
		'selector'            => '.dt_header .dt_header-topbar .dt-address span',
		'settings'            => 'chiaSheng_hdr_top_ads_title',
		'render_callback'  => 'chiaSheng_hdr_top_ads_title_render_callback',
	) );
	
	// chiaSheng_hdr_btn_lbl
	$wp_customize->selective_refresh->add_partial( 'chiaSheng_hdr_btn_lbl', array(
		'selector'            => '.dt_header .dt_navbar-button-item .dt-btn',
		'settings'            => 'chiaSheng_hdr_btn_lbl',
		'render_callback'  => 'chiaSheng_hdr_btn_lbl_render_callback',
	) );
	
	// chiaSheng_latest_post_ttl
	$wp_customize->selective_refresh->add_partial( 'chiaSheng_latest_post_ttl', array(
		'selector'            => '.latest-post-hm .section-title',
		'settings'            => 'chiaSheng_latest_post_ttl',
		'render_callback'  => 'chiaSheng_latest_post_ttl_render_callback',
	) );
	
	// chiaSheng_footer_copyright_text
	$wp_customize->selective_refresh->add_partial( 'chiaSheng_footer_copyright_text', array(
		'selector'            => '.dt_footer-inner .copyright',
		'settings'            => 'chiaSheng_footer_copyright_text',
		'render_callback'  => 'chiaSheng_footer_copyright_text_render_callback',
	) );
	
	// chiaSheng_scroller_text
	$wp_customize->selective_refresh->add_partial( 'chiaSheng_scroller_text', array(
		'selector'            => '.dt_footer-inner #return-to-top',
		'settings'            => 'chiaSheng_scroller_text',
		'render_callback'  => 'chiaSheng_scroller_text_render_callback',
	) );
	
	// chiaSheng_other_story_ttl
	$wp_customize->selective_refresh->add_partial( 'chiaSheng_other_story_ttl', array(
		'selector'            => '.other-story-hm .section-header .section-title',
		'settings'            => 'chiaSheng_other_story_ttl',
		'render_callback'  => 'chiaSheng_other_story_ttl_render_callback',
	) );
	
	// chiaSheng_top_tags_ttl
	$wp_customize->selective_refresh->add_partial( 'chiaSheng_top_tags_ttl', array(
		'selector'            => '.toptags title',
		'settings'            => 'chiaSheng_top_tags_ttl',
		'render_callback'  => 'chiaSheng_top_tags_ttl_render_callback',
	) );
	
	}
add_action( 'customize_register', 'chiaSheng_site_selective_partials' );