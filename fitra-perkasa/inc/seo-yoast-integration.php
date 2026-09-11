<?php
/**
 * Yoast SEO Integration & Schema Enhancements
 *
 * Provides dedicated Schema.org markup (Product, NewsArticle, Event, Organization),
 * canonical URL handling, and Open Graph metadata for PT Fitra Perkasa Inti.
 *
 * @package FitraPerkasa
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Configure default Yoast SEO settings on theme init.
 */
function fitra_configure_yoast_defaults() {
    if ( ! defined( 'WPSEO_VERSION' ) ) {
        return;
    }

    $titles = get_option( 'wpseo_titles', array() );
    if ( ! is_array( $titles ) ) {
        $titles = array();
    }

    $updated = false;

    // 1. Organization representation
    if ( empty( $titles['company_or_person'] ) || $titles['company_or_person'] !== 'company' ) {
        $titles['company_or_person'] = 'company';
        $updated = true;
    }
    if ( empty( $titles['company_name'] ) || $titles['company_name'] !== 'PT Fitra Perkasa Inti' ) {
        $titles['company_name'] = 'PT Fitra Perkasa Inti';
        $updated = true;
    }
    if ( empty( $titles['company_alternate_name'] ) || $titles['company_alternate_name'] !== 'FPI' ) {
        $titles['company_alternate_name'] = 'FPI';
        $updated = true;
    }

    // Logo
    $logo_url = get_template_directory_uri() . '/assets/images/logo.png';
    if ( empty( $titles['company_logo'] ) ) {
        $titles['company_logo'] = $logo_url;
        $updated = true;
    }

    // 2. Title separators & Breadcrumbs
    if ( empty( $titles['separator'] ) || $titles['separator'] !== 'sc-pipe' ) {
        $titles['separator'] = 'sc-pipe';
        $updated = true;
    }
    if ( empty( $titles['breadcrumbs-enable'] ) ) {
        $titles['breadcrumbs-enable'] = true;
        $titles['breadcrumbs-home']   = 'Home';
        $titles['breadcrumbs-sep']    = '›';
        $updated = true;
    }

    // 3. Post Types indexing settings
    // Pages
    $titles['title-page']    = '%%title%% | PT Fitra Perkasa Inti';
    $titles['noindex-page']  = false;

    // Products CPT
    $titles['title-fitra_product']    = '%%title%% | Industrial Supplier | PT Fitra Perkasa Inti';
    $titles['noindex-fitra_product']  = false;

    // News CPT
    $titles['title-fitra_news']       = '%%title%% | PT Fitra Perkasa Inti News';
    $titles['noindex-fitra_news']     = false;

    // 4. Disable unnecessary archives to prevent thin/duplicate content
    $titles['noindex-author-wpseo']   = true;
    $titles['disable-author']         = true;
    $titles['noindex-archive-wpseo']  = true;
    $titles['disable-date']           = true;
    $titles['noindex-tax-category']   = true;
    $titles['noindex-tax-post_tag']   = true;
    $titles['noindex-tax-post_format']= true;

    if ( $updated || ! get_option( 'fitra_yoast_initialized' ) ) {
        update_option( 'wpseo_titles', $titles );
        update_option( 'fitra_yoast_initialized', true );
    }

    // Ensure XML sitemaps are active
    $wpseo = get_option( 'wpseo', array() );
    if ( is_array( $wpseo ) && empty( $wpseo['enable_xml_sitemap'] ) ) {
        $wpseo['enable_xml_sitemap'] = true;
        update_option( 'wpseo', $wpseo );
    }
}
add_action( 'admin_init', 'fitra_configure_yoast_defaults' );
add_action( 'init', 'fitra_configure_yoast_defaults', 20 );

/**
 * Enhance Yoast Schema.org graph with rich Organization, Product, and Article data.
 */
function fitra_yoast_schema_graph_filter( $pieces, $context ) {
    if ( ! is_array( $pieces ) ) {
        return $pieces;
    }

    $site_url = home_url( '/' );
    $logo_url = get_template_directory_uri() . '/assets/images/logo.png';

    // 1. Enhance or Add Organization Schema
    $org_found = false;
    foreach ( $pieces as &$piece ) {
        if ( isset( $piece['@type'] ) && $piece['@type'] === 'Organization' ) {
            $piece['name']          = 'PT Fitra Perkasa Inti';
            $piece['alternateName'] = 'FPI';
            $piece['url']           = $site_url;
            $piece['email']         = 'contact@fitraperkasa.com';
            $piece['telephone']     = '+62 21 5566 2389';
            $piece['address']       = array(
                '@type'           => 'PostalAddress',
                'streetAddress'   => 'Industrial Park Blok L7 No. 12',
                'addressLocality' => 'Balikpapan',
                'addressRegion'   => 'Kalimantan Timur',
                'postalCode'      => '71233',
                'addressCountry'  => 'ID',
            );
            $piece['contactPoint']  = array(
                array(
                    '@type'             => 'ContactPoint',
                    'telephone'         => '+62 21 5566 2389',
                    'contactType'       => 'customer service',
                    'email'             => 'contact@fitraperkasa.com',
                    'availableLanguage' => array( 'Indonesian', 'English' ),
                ),
            );
            $org_found = true;
            break;
        }
    }
    unset( $piece );

    // 2. Add Product Schema for single fitra_product pages
    global $post;
    $req_uri = trim( parse_url( $_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH ), '/' );
    $parts   = array_values( array_filter( explode( '/', $req_uri ) ) );
    if ( ! empty( $parts[0] ) && in_array( strtolower( $parts[0] ), array( 'id', 'en' ), true ) ) {
        array_shift( $parts );
    }

    $is_product_page = ( ! empty( $post ) && $post->post_type === 'fitra_product' ) ||
                       ( ! empty( $parts[0] ) && in_array( $parts[0], array( 'products', 'produk' ), true ) && ! empty( $parts[1] ) );

    if ( $is_product_page ) {
        $product_slug = ! empty( $parts[1] ) ? sanitize_title( $parts[1] ) : ( $post ? $post->post_name : '' );
        $product_data = function_exists( 'fitra_get_product' ) ? fitra_get_product( $product_slug ) : null;

        if ( $product_data ) {
            $prod_title = $product_data['title'] ?? ( $post ? $post->post_title : 'Industrial Product' );
            $prod_desc  = $product_data['desc'] ?? ( $product_data['card_tag'] ?? '' );
            $prod_image = $product_data['image'] ?? $logo_url;
            $prod_brand = $product_data['brand'] ?? 'PT Fitra Perkasa Inti';
            $prod_cat   = $product_data['category_label'] ?? ( $product_data['category'] ?? 'Industrial Equipment' );
            $prod_url   = get_permalink( $post ? $post->ID : 0 ) ?: ( $site_url . 'products/' . $product_slug . '/' );

            $product_piece = array(
                '@context'    => 'https://schema.org',
                '@type'       => 'Product',
                '@id'         => esc_url( $prod_url ) . '#product',
                'name'        => esc_html( $prod_title ),
                'description' => esc_html( wp_strip_all_tags( $prod_desc ) ),
                'image'       => esc_url( $prod_image ),
                'category'    => esc_html( $prod_cat ),
                'brand'       => array(
                    '@type' => 'Brand',
                    'name'  => esc_html( $prod_brand ),
                ),
                'offers'      => array(
                    '@type'         => 'Offer',
                    'priceCurrency' => 'IDR',
                    'availability'  => 'https://schema.org/InStock',
                    'url'           => esc_url( $prod_url ),
                    'seller'        => array(
                        '@type' => 'Organization',
                        'name'  => 'PT Fitra Perkasa Inti',
                    ),
                ),
            );

            $pieces[] = $product_piece;
        }
    }

    return $pieces;
}
add_filter( 'wpseo_schema_graph', 'fitra_yoast_schema_graph_filter', 20, 2 );

/**
 * Filter Yoast SEO canonical URLs to guarantee pristine self-referencing canonicals.
 */
function fitra_yoast_canonical_filter( $canonical ) {
    $req_uri = trim( parse_url( $_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH ), '/' );
    $parts   = array_values( array_filter( explode( '/', $req_uri ) ) );

    // Handle duplicate contact-us -> canonical to /contact/
    if ( ! empty( $parts[0] ) && $parts[0] === 'contact-us' ) {
        return home_url( '/contact/' );
    }

    // Handle duplicate events-news -> canonical to /news/
    if ( ! empty( $parts[0] ) && $parts[0] === 'events-news' ) {
        return home_url( '/news/' );
    }

    return $canonical;
}
add_filter( 'wpseo_canonical', 'fitra_yoast_canonical_filter' );

/**
 * Filter Yoast Robots tag for duplicate and system pages.
 */
function fitra_yoast_robots_filter( $robots ) {
    $req_uri = trim( parse_url( $_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH ), '/' );

    // Noindex legacy duplicate slugs
    if ( in_array( $req_uri, array( 'contact-us', 'events-news', 'laman-contoh' ), true ) ) {
        return array( 'noindex' => 'noindex', 'follow' => 'follow' );
    }

    return $robots;
}
add_filter( 'wpseo_robots_array', 'fitra_yoast_robots_filter' );
