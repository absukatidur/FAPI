<?php
/**
 * Product Category Taxonomy Seeder
 *
 * Seeds the six default product categories into the `fitra_product_cat`
 * taxonomy and migrates existing CPT products from the legacy ACF
 * `product_category` meta value into proper taxonomy term assignments.
 *
 * Runs once on the `init` hook (guarded by an option flag so it never
 * runs again after completion).  Admins can add, edit, rename, re-order,
 * or delete categories from Products → Categories at any time after seeding.
 *
 * @package FitraPerkasa
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Default categories to seed.
 *
 * Each entry:
 *   slug        → used as the `data-category` / `data-filter` key in the DOM.
 *   name        → label shown in admin and on the frontend filter bar.
 *   description → optional, shown in the category edit screen.
 *   meta_values → ACF `product_category` meta values that map to this category
 *                 (used when migrating existing CPT products).
 */
function fitra_default_product_categories() {
    return array(
        array(
            'slug'        => 'pipes-fittings',
            'name'        => 'Pipes & Fittings',
            'description' => 'Industrial pipes, tubes, flanges, fittings, and related piping components.',
            'meta_values' => array( 'Pipes & Fittings', 'Pipes &amp; Fittings' ),
        ),
        array(
            'slug'        => 'steel-plates',
            'name'        => 'Steel & Plates',
            'description' => 'Structural steels, hot-rolled plates, beams, channels, and boiler-grade material.',
            'meta_values' => array( 'Steel & Plates', 'Steel &amp; Plates' ),
        ),
        array(
            'slug'        => 'gasket-seals',
            'name'        => 'Gasket & Seals',
            'description' => 'Industrial gaskets, packing, mechanical seals, bearings, and sealing solutions.',
            'meta_values' => array( 'Gasket & Seals', 'Gasket &amp; Seals' ),
        ),
        array(
            'slug'        => 'mechanical-drives',
            'name'        => 'Mechanical Drives',
            'description' => 'Gearboxes, electric motors, speed reducers, couplings, and drive components.',
            'meta_values' => array( 'Mechanical Drives' ),
        ),
        array(
            'slug'        => 'valves-gauges',
            'name'        => 'Valves & Gauges',
            'description' => 'Control valves, ball valves, safety/relief valves, pressure gauges, and instrumentation.',
            'meta_values' => array( 'Valves & Gauges', 'Valves &amp; Gauges' ),
        ),
        array(
            'slug'        => 'energy-fuel',
            'name'        => 'Energy & Fuel',
            'description' => 'Industrial fuels, lubricants, refinery spares, and power-generation consumables.',
            'meta_values' => array( 'Energy & Fuel', 'Energy &amp; Fuel' ),
        ),
    );
}

/**
 * Seed default product categories and migrate existing CPT products.
 * Runs once per installation (guarded by option `fitra_product_cat_seeded_v1`).
 */
function fitra_seed_product_categories() {
    // Only run if the taxonomy is registered
    if ( ! taxonomy_exists( 'fitra_product_cat' ) ) {
        return;
    }

    // Already seeded — skip
    if ( get_option( 'fitra_product_cat_seeded_v1' ) ) {
        return;
    }

    $categories = fitra_default_product_categories();

    // ── 1. Create/ensure all default terms exist ──────────────────────────
    $term_id_map = array(); // slug => term_id

    foreach ( $categories as $cat ) {
        $existing = get_term_by( 'slug', $cat['slug'], 'fitra_product_cat' );

        if ( $existing ) {
            $term_id_map[ $cat['slug'] ] = (int) $existing->term_id;
        } else {
            $result = wp_insert_term(
                $cat['name'],
                'fitra_product_cat',
                array(
                    'slug'        => $cat['slug'],
                    'description' => $cat['description'],
                )
            );
            if ( ! is_wp_error( $result ) ) {
                $term_id_map[ $cat['slug'] ] = (int) $result['term_id'];
            }
        }
    }

    // ── 2. Build a reverse lookup: meta_value string → term_id ───────────
    $meta_to_term = array();
    foreach ( $categories as $cat ) {
        if ( empty( $term_id_map[ $cat['slug'] ] ) ) {
            continue;
        }
        $tid = $term_id_map[ $cat['slug'] ];
        foreach ( $cat['meta_values'] as $mv ) {
            $meta_to_term[ $mv ] = $tid;
        }
    }

    // ── 3. Migrate existing CPT products to taxonomy terms ───────────────
    $posts = get_posts( array(
        'post_type'      => 'fitra_product',
        'post_status'    => 'publish',
        'posts_per_page' => -1,
        'fields'         => 'ids',
    ) );

    foreach ( $posts as $post_id ) {
        // Skip if the product already has taxonomy terms assigned
        $existing_terms = wp_get_object_terms( $post_id, 'fitra_product_cat', array( 'fields' => 'ids' ) );
        if ( ! empty( $existing_terms ) && ! is_wp_error( $existing_terms ) ) {
            continue;
        }

        // Read the legacy ACF meta value
        $meta_cat = get_post_meta( $post_id, 'product_category', true );
        if ( empty( $meta_cat ) ) {
            continue;
        }

        // Find matching term
        if ( isset( $meta_to_term[ $meta_cat ] ) ) {
            wp_set_object_terms( $post_id, array( $meta_to_term[ $meta_cat ] ), 'fitra_product_cat', false );
        } else {
            // Fuzzy-match via fitra_get_product_category_key logic
            $cat_key = function_exists( 'fitra_get_product_category_key' )
                ? fitra_get_product_category_key( $meta_cat )
                : '';
            $key_to_slug = array(
                'pipes'   => 'pipes-fittings',
                'steels'  => 'steel-plates',
                'gaskets' => 'gasket-seals',
                'drives'  => 'mechanical-drives',
                'valves'  => 'valves-gauges',
                'energy'  => 'energy-fuel',
            );
            if ( $cat_key && isset( $key_to_slug[ $cat_key ], $term_id_map[ $key_to_slug[ $cat_key ] ] ) ) {
                wp_set_object_terms(
                    $post_id,
                    array( $term_id_map[ $key_to_slug[ $cat_key ] ] ),
                    'fitra_product_cat',
                    false
                );
            }
        }
    }

    // ── 4. Mark as done ──────────────────────────────────────────────────
    update_option( 'fitra_product_cat_seeded_v1', true );
}
// Priority 20 — after both CPT (5) and taxonomy (6) are registered
add_action( 'init', 'fitra_seed_product_categories', 20 );
