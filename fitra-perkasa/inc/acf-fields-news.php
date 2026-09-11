<?php
/**
 * ACF Field Group: Events & News Fields
 *
 * Registers all ACF fields for the 'fitra_news' Custom Post Type
 * using acf_add_local_field_group() so fields are defined in code, not the database.
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

            // ── Tab: Header ──
            array(
                'key'   => 'field_news_tab_header',
                'label' => __( 'Header', 'fitra-perkasa' ),
                'name'  => '',
                'type'  => 'tab',
            ),
            array(
                'key'           => 'field_news_category_label',
                'label'         => __( 'Category Label', 'fitra-perkasa' ),
                'name'          => 'news_category_label',
                'type'          => 'text',
                'instructions'  => __( 'Category label displayed in article header. Example: "CORPORATE UPDATES" or "PEMBARUAN KORPORAT"', 'fitra-perkasa' ),
                'required'      => 1,
            ),
            array(
                'key'           => 'field_news_date_display',
                'label'         => __( 'Display Date', 'fitra-perkasa' ),
                'name'          => 'news_date_display',
                'type'          => 'text',
                'instructions'  => __( 'Date as shown on frontend. Example: "DEC 12, 2024" or "12 DES 2024"', 'fitra-perkasa' ),
                'required'      => 1,
            ),
            array(
                'key'           => 'field_news_badge',
                'label'         => __( 'Badge Text', 'fitra-perkasa' ),
                'name'          => 'news_badge',
                'type'          => 'text',
                'instructions'  => __( 'Badge label shown on cards. Example: "NEWS", "EVENT", "MAIN HIGHLIGHT", "BERITA", "ACARA", "SOROTAN UTAMA"', 'fitra-perkasa' ),
                'required'      => 1,
            ),
            array(
                'key'           => 'field_news_meta_left',
                'label'         => __( 'Card Meta Left', 'fitra-perkasa' ),
                'name'          => 'news_meta_left',
                'type'          => 'text',
                'instructions'  => __( 'Meta info on left side of card (date for news, venue for events). Example: "08 MAY 2024" or "JAKARTA EXPO CENTER"', 'fitra-perkasa' ),
                'required'      => 0,
            ),
            array(
                'key'           => 'field_news_featured_desc',
                'label'         => __( 'Short Description (Card)', 'fitra-perkasa' ),
                'name'          => 'news_featured_desc',
                'type'          => 'textarea',
                'instructions'  => __( 'Short summary shown on news listing cards.', 'fitra-perkasa' ),
                'required'      => 0,
                'rows'          => 3,
            ),

            // ── Tab: Author ──
            array(
                'key'   => 'field_news_tab_author',
                'label' => __( 'Author', 'fitra-perkasa' ),
                'name'  => '',
                'type'  => 'tab',
            ),
            array(
                'key'           => 'field_news_author_name',
                'label'         => __( 'Author Name', 'fitra-perkasa' ),
                'name'          => 'news_author_name',
                'type'          => 'text',
                'instructions'  => __( 'Author display name. Example: "Darmawan Santoso"', 'fitra-perkasa' ),
                'required'      => 0,
                'default_value' => 'Tim Editorial',
            ),
            array(
                'key'           => 'field_news_author_role',
                'label'         => __( 'Author Role', 'fitra-perkasa' ),
                'name'          => 'news_author_role',
                'type'          => 'text',
                'instructions'  => __( 'Author role/title. Example: "Chief Operations Officer"', 'fitra-perkasa' ),
                'required'      => 0,
                'default_value' => 'Corporate Communications',
            ),

            // ── Tab: Article Body ──
            array(
                'key'   => 'field_news_tab_body',
                'label' => __( 'Article Body', 'fitra-perkasa' ),
                'name'  => '',
                'type'  => 'tab',
            ),
            array(
                'key'           => 'field_news_pullquote',
                'label'         => __( 'Pullquote', 'fitra-perkasa' ),
                'name'          => 'news_pullquote',
                'type'          => 'textarea',
                'instructions'  => __( 'Highlighted callout quote at the top of the article.', 'fitra-perkasa' ),
                'required'      => 0,
                'rows'          => 3,
            ),
            array(
                'key'           => 'field_news_section1_title',
                'label'         => __( 'Section 1 — Heading', 'fitra-perkasa' ),
                'name'          => 'news_section1_title',
                'type'          => 'text',
                'required'      => 0,
            ),
            array(
                'key'           => 'field_news_section1_p1',
                'label'         => __( 'Section 1 — Paragraph 1', 'fitra-perkasa' ),
                'name'          => 'news_section1_p1',
                'type'          => 'textarea',
                'required'      => 0,
                'rows'          => 5,
            ),
            array(
                'key'           => 'field_news_section1_p2',
                'label'         => __( 'Section 1 — Paragraph 2', 'fitra-perkasa' ),
                'name'          => 'news_section1_p2',
                'type'          => 'textarea',
                'required'      => 0,
                'rows'          => 5,
            ),

            // ── Tab: Features ──
            array(
                'key'   => 'field_news_tab_features',
                'label' => __( 'Features', 'fitra-perkasa' ),
                'name'  => '',
                'type'  => 'tab',
            ),
            array(
                'key'           => 'field_news_features_title',
                'label'         => __( 'Features Section Heading', 'fitra-perkasa' ),
                'name'          => 'news_features_title',
                'type'          => 'text',
                'required'      => 0,
            ),
            array(
                'key'           => 'field_news_features',
                'label'         => __( 'Feature Items', 'fitra-perkasa' ),
                'name'          => 'news_features',
                'type'          => 'textarea',
                'instructions'  => __( 'One feature per line. Format: icon|title|description. Icons: check, robot, analytics. Example: check|Real-time Monitoring|IoT sensors monitor humidity.', 'fitra-perkasa' ),
                'required'      => 0,
                'rows'          => 6,
            ),

            // ── Tab: Section 2 & Quote ──
            array(
                'key'   => 'field_news_tab_section2',
                'label' => __( 'Section 2 & Quote', 'fitra-perkasa' ),
                'name'  => '',
                'type'  => 'tab',
            ),
            array(
                'key'           => 'field_news_section2_title',
                'label'         => __( 'Section 2 — Heading', 'fitra-perkasa' ),
                'name'          => 'news_section2_title',
                'type'          => 'text',
                'required'      => 0,
            ),
            array(
                'key'           => 'field_news_section2_p1',
                'label'         => __( 'Section 2 — Paragraph 1', 'fitra-perkasa' ),
                'name'          => 'news_section2_p1',
                'type'          => 'textarea',
                'required'      => 0,
                'rows'          => 5,
            ),
            array(
                'key'           => 'field_news_quote',
                'label'         => __( 'Block Quote', 'fitra-perkasa' ),
                'name'          => 'news_quote',
                'type'          => 'textarea',
                'instructions'  => __( 'Inspirational or key quote for the article.', 'fitra-perkasa' ),
                'required'      => 0,
                'rows'          => 3,
            ),
            array(
                'key'           => 'field_news_quote_author',
                'label'         => __( 'Quote Attribution', 'fitra-perkasa' ),
                'name'          => 'news_quote_author',
                'type'          => 'text',
                'instructions'  => __( 'Who said the quote. Example: "MANAGEMENT BOARD, PT FITRA PERKASA INTI"', 'fitra-perkasa' ),
                'required'      => 0,
            ),
            array(
                'key'           => 'field_news_section2_p2',
                'label'         => __( 'Section 2 — Paragraph 2', 'fitra-perkasa' ),
                'name'          => 'news_section2_p2',
                'type'          => 'textarea',
                'required'      => 0,
                'rows'          => 5,
            ),

            // ── Tab: Event Details ──
            array(
                'key'   => 'field_news_tab_event',
                'label' => __( 'Event Badge', 'fitra-perkasa' ),
                'name'  => '',
                'type'  => 'tab',
            ),
            array(
                'key'           => 'field_news_event_day',
                'label'         => __( 'Event Day', 'fitra-perkasa' ),
                'name'          => 'news_event_day',
                'type'          => 'text',
                'instructions'  => __( 'Day number for event badge (events only). Example: "24"', 'fitra-perkasa' ),
                'required'      => 0,
            ),
            array(
                'key'           => 'field_news_event_month',
                'label'         => __( 'Event Month', 'fitra-perkasa' ),
                'name'          => 'news_event_month',
                'type'          => 'text',
                'instructions'  => __( 'Short month for event badge (events only). Example: "JUN"', 'fitra-perkasa' ),
                'required'      => 0,
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
