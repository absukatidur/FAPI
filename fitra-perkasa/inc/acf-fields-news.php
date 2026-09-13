<?php
/**
 * ACF Field Group: Events & News Fields
 *
 * Registers ACF fields for the 'fitra_news' Custom Post Type.
 * Fields:
 * 1. Header (Text field)
 * 2. Date (Text field)
 * 3. Author (Text field)
 * 4. Pull Quote (Optional text/textarea field)
 * 5. Article Body (WordPress visual/code editor with media support)
 *
 * @package FitraPerkasa
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Register ACF field group for Events & News.
 */
function fitra_acf_news_fields() {
    if ( ! function_exists( 'acf_add_local_field_group' ) ) {
        return;
    }

    acf_add_local_field_group( array(
        'key'      => 'group_fitra_news',
        'title'    => __( 'Article Information', 'fitra-perkasa' ),
        'fields'   => array(

            // 1. Header (Text field)
            array(
                'key'           => 'field_news_category_label',
                'label'         => __( 'Header', 'fitra-perkasa' ),
                'name'          => 'news_category_label',
                'type'          => 'text',
                'instructions'  => __( 'Header text displayed above the article title. Example: "INDUSTRY EVENTS" or "CORPORATE UPDATES"', 'fitra-perkasa' ),
                'required'      => 0,
            ),

            // 2. Date (Text field)
            array(
                'key'           => 'field_news_date_display',
                'label'         => __( 'Date', 'fitra-perkasa' ),
                'name'          => 'news_date_display',
                'type'          => 'text',
                'instructions'  => __( 'Date displayed next to the header (e.g. "MAR 18, 2024" or "18 MAR 2024"). If blank, uses post publish date.', 'fitra-perkasa' ),
                'required'      => 0,
            ),

            // 3. Author (Text field)
            array(
                'key'           => 'field_news_author_name',
                'label'         => __( 'Author', 'fitra-perkasa' ),
                'name'          => 'news_author_name',
                'type'          => 'text',
                'instructions'  => __( 'Author display name. Example: "Darmawan Santoso"', 'fitra-perkasa' ),
                'required'      => 0,
                'default_value' => 'Tim Editorial',
            ),

            // 3. Pull Quote (Optional text/textarea field)
            array(
                'key'           => 'field_news_pullquote',
                'label'         => __( 'Pull Quote', 'fitra-perkasa' ),
                'name'          => 'news_pullquote',
                'type'          => 'textarea',
                'instructions'  => __( 'Optional highlighted callout quote shown at the top of the article body. Leave blank to hide.', 'fitra-perkasa' ),
                'required'      => 0,
                'rows'          => 3,
            ),

            // 4. Article Body (WordPress visual/code editor with media support)
            array(
                'key'           => 'field_news_article_body',
                'label'         => __( 'Article Body', 'fitra-perkasa' ),
                'name'          => 'news_article_body',
                'type'          => 'wysiwyg',
                'instructions'  => __( 'Full article content. Supports rich text, links, and media upload.', 'fitra-perkasa' ),
                'required'      => 0,
                'tabs'          => 'all',      // Show both Visual and Code tabs
                'toolbar'       => 'full',     // Full formatting toolbar
                'media_upload'  => 1,          // Enable media upload button
                'delay'         => 0,
            ),
        ),
        'location'  => array(
            array(
                array(
                    'param'    => 'post_type',
                    'operator' => '==',
                    'value'    => 'fitra_news',
                ),
            ),
        ),
        'menu_order'            => 0,
        'position'              => 'normal',
        'style'                 => 'default',
        'label_placement'       => 'top',
        'instruction_placement' => 'label',
        'active'                => true,
    ) );
}
add_action( 'acf/init', 'fitra_acf_news_fields' );
