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
        'supports'            => array( 'title', 'thumbnail' ),
        'rewrite'             => array( 'slug' => 'products', 'with_front' => false ),
        'query_var'           => true,
        'exclude_from_search' => false,
    );

    register_post_type( 'fitra_product', $args );
}
add_action( 'init', 'fitra_register_product_cpt', 5 );

/**
 * Register 'fitra_product_cat' taxonomy for the Products CPT.
 *
 * Supports: Name, Slug, Description, Parent (hierarchical).
 * Appears as the "Categories" submenu under Products in wp-admin.
 */
function fitra_register_product_cat_taxonomy() {
    $labels = array(
        'name'              => __( 'Categories', 'fitra-perkasa' ),
        'singular_name'     => __( 'Category', 'fitra-perkasa' ),
        'menu_name'         => __( 'Categories', 'fitra-perkasa' ),
        'all_items'         => __( 'All Categories', 'fitra-perkasa' ),
        'edit_item'         => __( 'Edit Category', 'fitra-perkasa' ),
        'view_item'         => __( 'View Category', 'fitra-perkasa' ),
        'update_item'       => __( 'Update Category', 'fitra-perkasa' ),
        'add_new_item'      => __( 'Add New Category', 'fitra-perkasa' ),
        'new_item_name'     => __( 'New Category Name', 'fitra-perkasa' ),
        'parent_item'       => __( 'Parent Category', 'fitra-perkasa' ),
        'parent_item_colon' => __( 'Parent Category:', 'fitra-perkasa' ),
        'search_items'      => __( 'Search Categories', 'fitra-perkasa' ),
        'not_found'         => __( 'No categories found', 'fitra-perkasa' ),
        'back_to_items'     => __( '&larr; Back to Categories', 'fitra-perkasa' ),
    );

    $args = array(
        'labels'            => $labels,
        'hierarchical'      => true,       // Checkbox UI; supports Parent field
        'public'            => true,
        'publicly_queryable'=> true,
        'show_ui'           => true,
        'show_in_menu'      => true,       // Attaches under the Products menu
        'show_admin_column' => true,       // Shows taxonomy column in product list table
        'show_in_rest'      => false,      // Classic Editor only
        'query_var'         => true,
        'rewrite'           => array(
            'slug'       => 'product-category',
            'with_front' => false,
        ),
    );

    register_taxonomy( 'fitra_product_cat', 'fitra_product', $args );
}
add_action( 'init', 'fitra_register_product_cat_taxonomy', 6 );

/**
 * Remove the auto-generated WordPress taxonomy sidebar metabox and
 * default content editor / extra metaboxes for fitra_product.
 */
function fitra_remove_product_unnecessary_metaboxes() {
    remove_post_type_support( 'fitra_product', 'editor' );
    remove_meta_box( 'fitra_product_catdiv', 'fitra_product', 'side' );
    remove_meta_box( 'postcustom', 'fitra_product', 'normal' );
    remove_meta_box( 'postexcerpt', 'fitra_product', 'normal' );
    remove_meta_box( 'commentsdiv', 'fitra_product', 'normal' );
    remove_meta_box( 'commentstatusdiv', 'fitra_product', 'normal' );
    remove_meta_box( 'slugdiv', 'fitra_product', 'normal' );
    remove_meta_box( 'trackbacksdiv', 'fitra_product', 'normal' );
}
add_action( 'admin_menu', 'fitra_remove_product_unnecessary_metaboxes' );
add_action( 'do_meta_boxes', 'fitra_remove_product_unnecessary_metaboxes' );

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
            // Prefer taxonomy terms; fall back to ACF meta for legacy products.
            $terms = get_the_terms( $post_id, 'fitra_product_cat' );
            if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
                $term_names = wp_list_pluck( $terms, 'name' );
                echo esc_html( implode( ', ', $term_names ) );
            } else {
                $val = get_post_meta( $post_id, 'product_category', true );
                echo esc_html( $val ?: '&mdash;' );
            }
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
