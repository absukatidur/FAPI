<?php
/**
 * Internationalization (i18n) & Language Switcher Engine
 * Supports bilingual (English / Indonesian) website rendering.
 *
 * @package FitraPerkasa
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Get active language code ('en' or 'id').
 * Priority: 1. $_GET['lang'] -> 2. $_COOKIE['fitra_lang'] -> 3. default 'en'
 *
 * @return string 'en'|'id'
 */
function fitra_get_lang() {
    static $current_lang = null;
    if ( null !== $current_lang ) {
        return $current_lang;
    }

    // 1. Explicit query param (?lang=en or ?lang=id)
    if ( isset( $_GET['lang'] ) ) {
        $candidate = strtolower( sanitize_text_field( wp_unslash( $_GET['lang'] ) ) );
        if ( in_array( $candidate, array( 'en', 'id' ), true ) ) {
            $current_lang = $candidate;
            return $current_lang;
        }
    }
    if ( ! empty( $_SERVER['REQUEST_URI'] ) && strpos( $_SERVER['REQUEST_URI'], 'lang=' ) !== false ) {
        $query_str = parse_url( $_SERVER['REQUEST_URI'], PHP_URL_QUERY );
        if ( ! empty( $query_str ) ) {
            parse_str( $query_str, $query_vars );
            if ( ! empty( $query_vars['lang'] ) ) {
                $candidate = strtolower( sanitize_text_field( $query_vars['lang'] ) );
                if ( in_array( $candidate, array( 'en', 'id' ), true ) ) {
                    $current_lang = $candidate;
                    return $current_lang;
                }
            }
        }
    }

    // 2. URL path segment check (/id/... or /en/...)
    $uri_path = trim( parse_url( $_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH ), '/' );
    $segments = explode( '/', $uri_path );
    if ( ! empty( $segments[0] ) ) {
        $first = strtolower( $segments[0] );
        if ( in_array( $first, array( 'en', 'id' ), true ) ) {
            $current_lang = $first;
            return $current_lang;
        }
    }

    // 3. Persistent cookies (fitra_lang & pll_language)
    if ( isset( $_COOKIE['fitra_lang'] ) && in_array( strtolower( sanitize_text_field( wp_unslash( $_COOKIE['fitra_lang'] ) ) ), array( 'en', 'id' ), true ) ) {
        $current_lang = strtolower( sanitize_text_field( wp_unslash( $_COOKIE['fitra_lang'] ) ) );
        return $current_lang;
    }

    if ( isset( $_COOKIE['pll_language'] ) && in_array( strtolower( sanitize_text_field( wp_unslash( $_COOKIE['pll_language'] ) ) ), array( 'en', 'id' ), true ) ) {
        $current_lang = strtolower( sanitize_text_field( wp_unslash( $_COOKIE['pll_language'] ) ) );
        return $current_lang;
    }

    // 4. Polylang detection if available
    if ( function_exists( 'pll_current_language' ) ) {
        $pll = pll_current_language( 'slug' );
        if ( ! empty( $pll ) && in_array( $pll, array( 'en', 'id' ), true ) ) {
            $current_lang = $pll;
            return $current_lang;
        }
    }

    $current_lang = 'en';
    return $current_lang;
}

/**
 * Set persistent cookie when language is detected or chosen.
 */
function fitra_set_lang_cookie() {
    $lang = fitra_get_lang();
    if ( $lang ) {
        if ( ! isset( $_COOKIE['fitra_lang'] ) || $_COOKIE['fitra_lang'] !== $lang || ! isset( $_COOKIE['pll_language'] ) || $_COOKIE['pll_language'] !== $lang ) {
            setcookie( 'fitra_lang', $lang, time() + ( 365 * 24 * 60 * 60 ), '/', '', false, false );
            setcookie( 'pll_language', $lang, time() + ( 365 * 24 * 60 * 60 ), '/', '', false, false );
            $_COOKIE['fitra_lang']   = $lang;
            $_COOKIE['pll_language'] = $lang;
        }
    }
}
add_action( 'init', 'fitra_set_lang_cookie', 1 );

/**
 * Filter Polylang preferred language to match user cookie choice.
 */
add_filter( 'pll_preferred_language', function( $lang ) {
    return fitra_get_lang();
} );

/**
 * Return internal URL with language query arg preserved when in Indonesian.
 *
 * @param string $path URL path
 * @return string
 */
function fitra_url( $path = '/' ) {
    $url  = home_url( $path );
    $lang = fitra_get_lang();
    if ( $lang === 'id' ) {
        return add_query_arg( 'lang', 'id', $url );
    }
    return remove_query_arg( 'lang', $url );
}

/**
 * Helper to return value based on active language.
 *
 * @param mixed $en_val Value when language is English
 * @param mixed $id_val Value when language is Indonesian
 * @param string|null $lang Optional explicit language code
 * @return mixed
 */
function fitra_t_val( $en_val, $id_val, $lang = null ) {
    $active = $lang ? $lang : fitra_get_lang();
    return ( $active === 'id' ) ? $id_val : $en_val;
}

/**
 * Dictionary lookup for global and repetitive UI strings.
 *
 * @param string $key Translation key
 * @param string|null $lang Optional explicit language code
 * @return string
 */
function fitra_t( $key, $lang = null ) {
    $active = $lang ? $lang : fitra_get_lang();

    $dictionary = array(
        // Navigation
        'nav_home'          => array( 'en' => 'Home', 'id' => 'Beranda' ),
        'nav_profile'       => array( 'en' => 'Profile', 'id' => 'Profil' ),
        'nav_services'      => array( 'en' => 'Services', 'id' => 'Layanan' ),
        'nav_products'      => array( 'en' => 'Products', 'id' => 'Produk' ),
        'nav_news'          => array( 'en' => 'Events & News', 'id' => 'Berita & Acara' ),
        'nav_contact'       => array( 'en' => 'Contact Us', 'id' => 'Hubungi Kami' ),
        'nav_rfq'           => array( 'en' => 'RFQ PORTAL', 'id' => 'PORTAL RFQ' ),

        // Common Buttons & Actions
        'btn_read_more'     => array( 'en' => 'Read More', 'id' => 'Baca Selengkapnya' ),
        'btn_view_detail'   => array( 'en' => 'View Detail', 'id' => 'Lihat Detail' ),
        'btn_submit'        => array( 'en' => 'Submit', 'id' => 'Kirim Pesan' ),
        'btn_request_quote' => array( 'en' => 'Request Quotation', 'id' => 'Minta Penawaran' ),
        'btn_download'      => array( 'en' => 'Download', 'id' => 'Unduh' ),
        'btn_download_cp'   => array( 'en' => 'DOWNLOAD COMPANY PROFILE', 'id' => 'UNDUH PROFIL PERUSAHAAN' ),
        'btn_explore_prod'  => array( 'en' => 'Explore Products', 'id' => 'Jelajahi Produk' ),
        'btn_get_started'   => array( 'en' => 'Get Started', 'id' => 'Mulai Sekarang' ),

        // Footer
        'footer_brand_desc' => array(
            'en' => 'Leading industrial contractor specialising in precision engineering, manufacturing support, and large-scale infrastructure solutions.',
            'id' => 'Kontraktor industri terkemuka yang berspesialisasi dalam rekayasa presisi, dukungan manufaktur, dan solusi infrastruktur skala besar.',
        ),
        'footer_head_office'=> array( 'en' => 'HEAD OFFICE', 'id' => 'KANTOR PUSAT' ),
        'footer_workshop'   => array( 'en' => 'WORKSHOP', 'id' => 'WORKSHOP' ),
        'footer_quick_links'=> array( 'en' => 'QUICK LINKS', 'id' => 'NAVIGASI CEPAT' ),
        'footer_rights'     => array( 'en' => 'ALL RIGHTS RESERVED.', 'id' => 'HAK CIPTA DILINDUNGI.' ),
        'footer_about_us'   => array( 'en' => 'About Us', 'id' => 'Tentang Kami' ),
        'footer_projects'   => array( 'en' => 'Our Projects', 'id' => 'Proyek Kami' ),
        'footer_careers'    => array( 'en' => 'Careers', 'id' => 'Karir' ),
        'footer_privacy'    => array( 'en' => 'Privacy Policy', 'id' => 'Kebijakan Privasi' ),
    );

    if ( isset( $dictionary[ $key ][ $active ] ) ) {
        return $dictionary[ $key ][ $active ];
    }

    if ( isset( $dictionary[ $key ]['en'] ) ) {
        return $dictionary[ $key ]['en'];
    }

    return $key;
}

/**
 * Translate WordPress menu titles dynamically.
 *
 * @param string $title Original title from WP admin
 * @return string
 */
function fitra_translate_nav_title( $title ) {
    $lang = fitra_get_lang();
    $clean_title = trim( wp_strip_all_tags( $title ) );

    $mapping = array(
        'Home'            => array( 'en' => 'Home', 'id' => 'Beranda' ),
        'Beranda'         => array( 'en' => 'Home', 'id' => 'Beranda' ),
        'Profile'         => array( 'en' => 'Profile', 'id' => 'Profil' ),
        'Profil'          => array( 'en' => 'Profile', 'id' => 'Profil' ),
        'Services'        => array( 'en' => 'Services', 'id' => 'Layanan' ),
        'Layanan'         => array( 'en' => 'Services', 'id' => 'Layanan' ),
        'Products'        => array( 'en' => 'Products', 'id' => 'Produk' ),
        'Produk'          => array( 'en' => 'Products', 'id' => 'Produk' ),
        'Events & News'   => array( 'en' => 'Events & News', 'id' => 'Berita & Acara' ),
        'Berita & Acara'  => array( 'en' => 'Events & News', 'id' => 'Berita & Acara' ),
        'Berita'          => array( 'en' => 'News', 'id' => 'Berita' ),
        'Contact Us'      => array( 'en' => 'Contact Us', 'id' => 'Hubungi Kami' ),
        'Hubungi Kami'    => array( 'en' => 'Contact Us', 'id' => 'Hubungi Kami' ),
        'Contact'         => array( 'en' => 'Contact Us', 'id' => 'Hubungi Kami' ),
    );

    if ( isset( $mapping[ $clean_title ][ $lang ] ) ) {
        return $mapping[ $clean_title ][ $lang ];
    }

    return $title;
}

/**
 * Filter HTML language attribute according to active language.
 */
function fitra_filter_language_attributes( $output ) {
    $lang = fitra_get_lang();
    return 'lang="' . esc_attr( $lang ) . '"';
}
add_filter( 'language_attributes', 'fitra_filter_language_attributes' );
