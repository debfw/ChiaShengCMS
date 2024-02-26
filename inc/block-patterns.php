<?php
/**
 * Chia Sheng CMS: Block Patterns
 *
 * @since 2024
 */

function ChiaShengCMS_register_block_patterns() {
    $block_pattern_categories = array(
        'featured' => array('label' => __('Featured', 'ChiaShengCMS')),
        'footer'   => array('label' => __('Footers', 'ChiaShengCMS')),
        'header'   => array('label' => __('Headers', 'ChiaShengCMS')),
        'query'    => array('label' => __('Query', 'ChiaShengCMS')),
        'pages'    => array('label' => __('Pages', 'ChiaShengCMS')),
    ); // Missing semicolon added

    $block_pattern_categories = apply_filters('ChiaShengCMS_block_pattern_categories', $block_pattern_categories);

    foreach ($block_pattern_categories as $name => $properties) {
        if (!WP_Block_Pattern_Categories_Registry::get_instance()->is_registered($name)) {
            register_block_pattern_category($name, $properties);
        }
    }

    $block_patterns = array(
		'footer-default',
		'footer-dark',
		'footer-logo',
		'footer-navigation',
		'footer-title-tagline-social',
		'footer-social-copyright',
		'footer-navigation-copyright',
		'footer-about-title-logo',
		'footer-query-title-citation',
		'footer-query-images-title-citation',
		'footer-blog',
		'general-subscribe',
		'general-featured-posts',
		'general-layered-images-with-duotone',
		'general-wide-image-intro-buttons',
		'general-large-list-names',
		'general-video-header-details',
		'general-list-events',
		'general-two-images-text',
		'general-image-with-caption',
		'general-video-trailer',
		'general-pricing-table',
		'general-divider-light',
		'general-divider-dark',
		'header-default',
		'header-large-dark',
		'header-small-dark',
		'header-image-background',
		'header-image-background-overlay',
		'header-with-tagline',
		'header-text-only-green-background',
		'header-text-only-salmon-background',
		'header-title-and-button',
		'header-text-only-with-tagline-black-background',
		'header-logo-navigation-gray-background',
		'header-logo-navigation-social-black-background',
		'header-title-navigation-social',
		'header-logo-navigation-offset-tagline',
		'header-stacked',
		'header-centered-logo',
		'header-centered-logo-black-background',
		'header-centered-title-navigation-social',
		'header-title-and-button',
		'hidden-404',
		'hidden-bird',
		'hidden-heading-and-bird',
		'page-about-media-left',
		'page-about-simple-dark',
		'page-about-media-right',
		'page-about-solid-color',
		'page-about-links',
		'page-about-links-dark',
		'page-about-large-image-and-buttons',
		'page-layout-image-and-text',
		'page-layout-image-text-and-video',
		'page-layout-two-columns',
		'page-sidebar-poster',
		'page-sidebar-grid-posts',
		'page-sidebar-blog-posts',
		'page-sidebar-blog-posts-right',
		'query-default',
		'query-simple-blog',
		'query-grid',
		'query-text-grid',
		'query-image-grid',
		'query-large-titles',
		'query-irregular-grid',
	);


    $block_patterns = apply_filters('ChiaShengCMS_block_patterns', $block_patterns);
	foreach ($block_patterns as $block_pattern) {
		$pattern_file = get_theme_file_path('/inc/patterns/' . $block_pattern . '.php');
	
		if (file_exists($pattern_file)) {
			$pattern_content = require $pattern_file;
			if ($pattern_content !== null) {
				register_block_pattern(
					'ChiaShengCMS/' . $block_pattern,
					$pattern_content
				);
			} else {
				// Handle the case where the pattern file exists but returns null.
				error_log('Pattern file for ' . $block_pattern . ' exists but does not return valid content.');
			}
		} else {
			// Handle the case where the pattern file does not exist.
			error_log('Missing pattern file for: ' . $block_pattern . '. It is missing patterns.');
		}
	}
}
add_action('init', 'ChiaShengCMS_register_block_patterns', 9);
