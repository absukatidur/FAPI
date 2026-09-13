<?php
/**
 * Custom Post Type: Events & News (fitra_news)
 *
 * Registers the 'fitra_news' CPT and 'fitra_news_type' taxonomy
 * for managing news articles and events from the WordPress Admin.
 *
 * @package FitraPerkasa
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Register 'fitra_news' Custom Post Type.
 */
function fitra_register_news_cpt() {
    $labels = array(
        'name'                  => __( 'Events & News', 'fitra-perkasa' ),
        'singular_name'         => __( 'News/Event', 'fitra-perkasa' ),
        'menu_name'             => __( 'Events & News', 'fitra-perkasa' ),
        'all_items'             => __( 'All Articles', 'fitra-perkasa' ),
        'add_new'               => __( 'Add New Article', 'fitra-perkasa' ),
        'add_new_item'          => __( 'Add New Article', 'fitra-perkasa' ),
        'edit_item'             => __( 'Edit Article', 'fitra-perkasa' ),
        'new_item'              => __( 'New Article', 'fitra-perkasa' ),
        'view_item'             => __( 'View Article', 'fitra-perkasa' ),
        'search_items'          => __( 'Search Articles', 'fitra-perkasa' ),
        'not_found'             => __( 'No articles found', 'fitra-perkasa' ),
        'not_found_in_trash'    => __( 'No articles found in Trash', 'fitra-perkasa' ),
        'featured_image'        => __( 'Article Image', 'fitra-perkasa' ),
        'set_featured_image'    => __( 'Set article image', 'fitra-perkasa' ),
        'remove_featured_image' => __( 'Remove article image', 'fitra-perkasa' ),
        'use_featured_image'    => __( 'Use as article image', 'fitra-perkasa' ),
    );

    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_rest'        => false, // Classic Editor only, no Gutenberg
        'menu_position'       => 6,
        'menu_icon'           => 'dashicons-megaphone',
        'capability_type'     => 'post',
        'has_archive'         => false, // Custom template routing handles archives
        'hierarchical'        => false,
        'supports'            => array( 'title', 'thumbnail' ),
        'rewrite'             => array( 'slug' => 'news', 'with_front' => false ),
        'query_var'           => true,
        'exclude_from_search' => false,
    );

    register_post_type( 'fitra_news', $args );
}
add_action( 'init', 'fitra_register_news_cpt', 5 );

/**
 * Remove any unnecessary meta boxes from the fitra_news edit screen.
 */
function fitra_remove_news_unnecessary_metaboxes() {
    remove_post_type_support( 'fitra_news', 'editor' );
    remove_meta_box( 'postcustom', 'fitra_news', 'normal' );
    remove_meta_box( 'postexcerpt', 'fitra_news', 'normal' );
    remove_meta_box( 'commentsdiv', 'fitra_news', 'normal' );
    remove_meta_box( 'commentstatusdiv', 'fitra_news', 'normal' );
    remove_meta_box( 'slugdiv', 'fitra_news', 'normal' );
    remove_meta_box( 'trackbacksdiv', 'fitra_news', 'normal' );
}
add_action( 'admin_menu', 'fitra_remove_news_unnecessary_metaboxes' );
add_action( 'do_meta_boxes', 'fitra_remove_news_unnecessary_metaboxes' );


/**
 * Register 'fitra_news_type' taxonomy (News / Event).
 */
function fitra_register_news_type_taxonomy() {
    $labels = array(
        'name'              => __( 'Article Type', 'fitra-perkasa' ),
        'singular_name'     => __( 'Article Type', 'fitra-perkasa' ),
        'search_items'      => __( 'Search Types', 'fitra-perkasa' ),
        'all_items'         => __( 'All Types', 'fitra-perkasa' ),
        'edit_item'         => __( 'Edit Type', 'fitra-perkasa' ),
        'update_item'       => __( 'Update Type', 'fitra-perkasa' ),
        'add_new_item'      => __( 'Add New Type', 'fitra-perkasa' ),
        'new_item_name'     => __( 'New Type Name', 'fitra-perkasa' ),
        'menu_name'         => __( 'Article Types', 'fitra-perkasa' ),
    );

    register_taxonomy( 'fitra_news_type', 'fitra_news', array(
        'labels'            => $labels,
        'hierarchical'      => true,
        'public'            => false,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_rest'      => false,
        'rewrite'           => false,
    ) );
}
add_action( 'init', 'fitra_register_news_type_taxonomy', 5 );

/**
 * Create default taxonomy terms for news types on theme activation.
 */
function fitra_create_news_type_terms() {
    $terms = array(
        'berita' => __( 'News (Berita)', 'fitra-perkasa' ),
        'acara'  => __( 'Event (Acara)', 'fitra-perkasa' ),
    );

    foreach ( $terms as $slug => $name ) {
        if ( ! term_exists( $slug, 'fitra_news_type' ) ) {
            wp_insert_term( $name, 'fitra_news_type', array( 'slug' => $slug ) );
        }
    }
}
add_action( 'init', 'fitra_create_news_type_terms', 10 );

/**
 * Custom admin columns for Events & News list table.
 */
function fitra_news_admin_columns( $columns ) {
    $new_columns = array();
    $new_columns['cb']             = $columns['cb'];
    $new_columns['title']          = $columns['title'];
    $new_columns['news_badge']     = __( 'Badge', 'fitra-perkasa' );
    $new_columns['news_category']  = __( 'Category', 'fitra-perkasa' );

    if ( isset( $columns['taxonomy-fitra_news_type'] ) ) {
        $new_columns['taxonomy-fitra_news_type'] = $columns['taxonomy-fitra_news_type'];
    }

    if ( function_exists( 'pll_get_post_language' ) ) {
        $new_columns['language'] = __( 'Language', 'fitra-perkasa' );
    }

    $new_columns['date'] = $columns['date'];

    return $new_columns;
}
add_filter( 'manage_fitra_news_posts_columns', 'fitra_news_admin_columns' );

/**
 * Populate custom admin columns for Events & News.
 */
function fitra_news_admin_column_content( $column, $post_id ) {
    switch ( $column ) {
        case 'news_badge':
            $val = get_post_meta( $post_id, 'news_badge', true );
            if ( $val ) {
                $bg = ( stripos( $val, 'EVENT' ) !== false || stripos( $val, 'ACARA' ) !== false ) ? '#3b82f6' : '#e8611a';
                echo '<span style="background:' . esc_attr( $bg ) . '; color:#fff; padding:2px 8px; border-radius:3px; font-size:11px; font-weight:600;">' . esc_html( $val ) . '</span>';
            } else {
                echo '—';
            }
            break;
        case 'news_category':
            $val = get_post_meta( $post_id, 'news_category_label', true );
            echo esc_html( $val ?: '—' );
            break;
        case 'language':
            if ( function_exists( 'pll_get_post_language' ) ) {
                $lang = pll_get_post_language( $post_id, 'slug' );
                echo '<strong>' . esc_html( strtoupper( $lang ?: '—' ) ) . '</strong>';
            }
            break;
    }
}
add_action( 'manage_fitra_news_posts_custom_column', 'fitra_news_admin_column_content', 10, 2 );
