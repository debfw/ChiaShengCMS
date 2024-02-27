<?php
/*=========================================
NewsMash Featured Link
=========================================*/
if (!function_exists('ChiaSheng_site_featured_link')):
    function ChiaSheng_site_featured_link()
    {
        if (is_front_page() || is_home()) {
            $ChiaSheng_display_featured_link = get_theme_mod('ChaiSheng_display_featured_link', 'front_post');
            $ChiaSheng_hs_featured_link = get_theme_mod('ChiaSheng_hs_featured_link', '1');
            if ($ChiaSheng_hs_featured_link == '1'):
                if (is_home() && ($ChiaSheng_display_featured_link == 'post' || $ChiaSheng_display_featured_link == 'front_post')):
                    get_template_part('template-parts/section', 'featured-link');
                elseif (is_front_page() && ($ChiaSheng_display_featured_link == 'front' || $ChiaSheng_display_featured_link == 'front_post')):
                    get_template_part('template-parts/section', 'featured-link');
                endif;
            endif;
        }
    }
endif;
add_action('ChiaSheng_site_front_main2', 'ChiaSheng_site_featured_link');