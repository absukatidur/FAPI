<?php
/**
 * Custom Post Type: Products (fitra_product)
 *
 * Registers the 'fitra_product' CPT for managing industrial products
 * from the WordPress Admin using Classic Editor + ACF fields.
 *
 * @package FitraPerkasa
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Register 'fitra_product' Custom Post Type.
 */
function fitra_register_product_cpt() {
    $labels = array(
        'name'                  => __( 'Products', 'fitra-perkasa' ),
        'singular_name'         => __( 'Product', 'fitra-perkasa' ),
        'menu_name'             => __( 'Products', 'fitra-perkasa' ),
        'all_items'             => __( 'All Products', 'fitra-perkasa' ),
        'add_new'               => __( 'Add New Product', 'fitra-perkasa' ),
        'add_new_item'          => __( 'Add New Product', 'fitra-perkasa' ),
        'edit_item'             => __( 'Edit Product', 'fitra-perkasa' ),
        'new_item'              => __( 'New Product', 'fitra-perkasa' ),
        'view_item'             => __( 'View Product', 'fitra-perkasa' ),
        'search_items'          => __( 'Search Products', 'fitra-perkasa' ),
        'not_found'             => __( 'No products found', 'fitra-perkasa' ),
        'not_found_in_trash'    => __( 'No products found in Trash', 'fitra-perkasa' ),
        'featured_image'        => __( 'Product Image', 'fitra-perkasa' ),
        'set_featured_image'    => __( 'Set product image', 'fitra-perkasa' ),
        'remove_featured_image' => __( 'Remove product image', 'fitra-perkasa' ),
        'use_featured_image'    => __( 'Use as product image', 'fitra-perkasa' ),
    );

    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_rest'        => false, // Classic Editor only, no Gutenberg
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-cart',
        'capability_type'     => 'post',
        'has_archive'         => false, // Custom template routing handles archives
        'hierarchical'        => false,
        'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
        'rewrite'             => array( 'slug' => 'products', 'with_front' => false ),
        'query_var'           => true,
        'exclude_from_search' => false,
    );

    register_post_type( 'fitra_product', $args );
}
add_action( 'init', 'fitra_register_product_cpt', 5 );

/**
 * Custom admin columns for Products list table.
 */
function fitra_product_admin_columns( $columns ) {
    $new_columns = array();
    $new_columns['cb']               = $columns['cb'];
    $new_columns['title']            = $columns['title'];
    $new_columns['product_category'] = __( 'Category', 'fitra-perkasa' );
    $new_columns['product_brand']    = __( 'Brand', 'fitra-perkasa' );
    $new_columns['product_stock']    = __( 'Stock', 'fitra-perkasa' );

    if ( function_exists( 'pll_get_post_language' ) ) {
        $new_columns['language'] = __( 'Language', 'fitra-perkasa' );
    }

    $new_columns['date'] = $columns['date'];

    return $new_columns;
}
add_filter( 'manage_fitra_product_posts_columns', 'fitra_product_admin_columns' );

/**
 * Populate custom admin columns for Products.
 */
function fitra_product_admin_column_content( $column, $post_id ) {
    switch ( $column ) {
        case 'product_category':
            $val = get_post_meta( $post_id, 'product_category', true );
            echo esc_html( $val ?: '—' );
            break;
        case 'product_brand':
            $val = get_post_meta( $post_id, 'product_brand', true );
            echo esc_html( $val ?: '—' );
            break;
        case 'product_stock':
            $val = get_post_meta( $post_id, 'product_stock_status', true );
            $color = ( $val === 'IN STOCK' ) ? '#10b981' : '#ef4444';
            echo '<span style="color:' . esc_attr( $color ) . '; font-weight:600;">' . esc_html( $val ?: '—' ) . '</span>';
            break;
        case 'language':
            if ( function_exists( 'pll_get_post_language' ) ) {
                $lang = pll_get_post_language( $post_id, 'slug' );
                echo '<strong>' . esc_html( strtoupper( $lang ?: '—' ) ) . '</strong>';
            }
            break;
    }
}
add_action( 'manage_fitra_product_posts_custom_column', 'fitra_product_admin_column_content', 10, 2 );
