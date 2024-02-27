<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package ChiaSheng
 */
/**
 * Theme Page Header Title
 */
function ChiaSheng_theme_page_header_title()
{
    if (is_archive()) {
        echo '<h1>';
        if (is_day()):
            printf(esc_html__('%1$s %2$s', 'ChiaSheng'), esc_html__('Archives', 'ChiaSheng'), get_the_date());
        elseif (is_month()):
            printf(esc_html__('%1$s %2$s', 'ChiaSheng'), esc_html__('Archives', 'ChiaSheng'), get_the_date('F Y'));
        elseif (is_year()):
            printf(esc_html__('%1$s %2$s', 'ChiaSheng'), esc_html__('Archives', 'ChiaSheng'), get_the_date('Y'));
        elseif (is_author()):
            printf(esc_html__('%1$s %2$s', 'ChiaSheng'), esc_html__('All posts by', 'ChiaSheng'), get_the_author());
        elseif (is_category()):
            printf(esc_html__('%1$s %2$s', 'ChiaSheng'), esc_html__('Category', 'ChiaSheng'), single_tag_title('', false));
        elseif (is_tag()):
            printf(esc_html__('%1$s %2$s', 'ChiaSheng'), esc_html__('Tag', 'ChiaSheng'), single_tag_title('', false));
        elseif (class_exists('WooCommerce') && is_shop()):
            printf(esc_html__('%1$s %2$s', 'ChiaSheng'), esc_html__('Shop', 'ChiaSheng'), single_tag_title('', false));
        elseif (is_archive()):
            the_archive_title('<h1>', '</h1>');
        endif;
        echo '</h1>';
    } elseif (is_404()) {
        echo '<h1>';
        printf(esc_html__('%1$s', 'ChiaSheng'), esc_html__('404', 'ChiaSheng'));
        echo '</h1>';
    } elseif (is_search()) {
        echo '<h1>';
        /* translators: %1$s %2$s: search */
        printf(esc_html__('%1$s %2$s', 'ChiaSheng'), esc_html__('Search results for', 'ChiaSheng'), get_search_query());
        echo '</h1>';
    } else {
        echo '<h1>' . esc_html(get_the_title()) . '</h1>';
    }
}

