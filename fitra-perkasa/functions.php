<?php
/**
 * Fitra Perkasa Inti — Theme Functions
 *
 * @package FitraPerkasa
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

require_once get_template_directory() . '/inc/i18n.php';
require_once get_template_directory() . '/inc/polylang-integration.php';

/* --------------------------------------------------
   1. Theme Setup
   -------------------------------------------------- */
function fitra_perkasa_setup() {
    // Let WordPress manage the document title
    add_theme_support( 'title-tag' );

    // Featured images
    add_theme_support( 'post-thumbnails' );

    // Custom logo
    add_theme_support( 'custom-logo', array(
        'height'      => 60,
        'width'       => 250,
        'flex-height' => true,
        'flex-width'  => true,
    ) );

    // HTML5 markup
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ) );

    // Register navigation menu
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'fitra-perkasa' ),
    ) );
}
add_action( 'after_setup_theme', 'fitra_perkasa_setup' );

/* --------------------------------------------------
   2. Enqueue Styles & Scripts
   -------------------------------------------------- */
function fitra_perkasa_enqueue_assets() {
    $theme_uri = get_template_directory_uri();
    $style_path = get_stylesheet_directory() . '/style.css';
    $style_ver  = file_exists( $style_path ) ? filemtime( $style_path ) : wp_get_theme()->get( 'Version' );
    $js_path    = get_template_directory() . '/assets/js/main.js';
    $js_ver     = file_exists( $js_path ) ? filemtime( $js_path ) : wp_get_theme()->get( 'Version' );

    // Google Fonts — Inter
    wp_enqueue_style(
        'fitra-google-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap',
        array(),
        null
    );

    // Theme stylesheet (style.css)
    wp_enqueue_style(
        'fitra-perkasa-style',
        get_stylesheet_uri(),
        array( 'fitra-google-fonts' ),
        $style_ver
    );

    // Main JavaScript
    wp_enqueue_script(
        'fitra-perkasa-main',
        $theme_uri . '/assets/js/main.js',
        array(),
        $js_ver,
        true // load in footer
    );
}
add_action( 'wp_enqueue_scripts', 'fitra_perkasa_enqueue_assets' );

/* --------------------------------------------------
   3. Custom Walker — Flat nav (no sub-menus wrapper)
   -------------------------------------------------- */
class Fitra_Nav_Walker extends Walker_Nav_Menu {
    public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;

        $req_uri    = $_SERVER['REQUEST_URI'] ?? '';
        $clean_path = trim( parse_url( $req_uri, PHP_URL_PATH ), '/' );
        $parts      = array_values( array_filter( explode( '/', $clean_path ) ) );
        if ( ! empty( $parts[0] ) && in_array( strtolower( $parts[0] ), array( 'id', 'en' ), true ) ) {
            array_shift( $parts );
        }
        $first_seg    = ! empty( $parts[0] ) ? strtolower( $parts[0] ) : '';
        $is_home_page = empty( $parts ) || in_array( $first_seg, array( 'home', 'beranda' ), true ) || is_front_page();

        $item_path    = trim( parse_url( $item->url, PHP_URL_PATH ), '/' );
        $is_home_item = ( empty( $item_path ) || in_array( strtolower( $item_path ), array( 'home', 'beranda' ), true ) || stripos( $item->title, 'home' ) !== false || stripos( $item->title, 'beranda' ) !== false );

        // 1. Home / Beranda
        if ( $is_home_item ) {
            if ( $is_home_page ) {
                $classes[] = 'current-menu-item';
                $classes[] = 'current_page_item';
                $classes[] = 'current-home-item';
            } else {
                $classes = array_diff( $classes, array( 'current-menu-item', 'current_page_item', 'current-home-item' ) );
            }
        }

        // 2. Profile
        $is_profile_page = in_array( $first_seg, array( 'profile', 'profil' ), true );
        $is_profile_item = ( strpos( $item->url, 'profile' ) !== false || stripos( $item->title, 'profile' ) !== false || stripos( $item->title, 'profil' ) !== false || stripos( $item->title, 'about' ) !== false );
        if ( $is_profile_item ) {
            if ( $is_profile_page ) {
                $classes[] = 'current-menu-item';
                $classes[] = 'current_page_item';
            } else {
                $classes = array_diff( $classes, array( 'current-menu-item', 'current_page_item' ) );
            }
        }

        // 3. Services
        $is_services_page = in_array( $first_seg, array( 'services', 'layanan' ), true );
        $is_services_item = ( strpos( $item->url, 'services' ) !== false || stripos( $item->title, 'service' ) !== false || stripos( $item->title, 'layanan' ) !== false );
        if ( $is_services_item ) {
            if ( $is_services_page ) {
                $classes[] = 'current-menu-item';
                $classes[] = 'current_page_item';
            } else {
                $classes = array_diff( $classes, array( 'current-menu-item', 'current_page_item' ) );
            }
        }

        // 4. Products
        $is_products_page = in_array( $first_seg, array( 'products', 'produk' ), true );
        $is_products_item = ( strpos( $item->url, 'product' ) !== false || stripos( $item->title, 'product' ) !== false || stripos( $item->title, 'produk' ) !== false );
        if ( $is_products_item ) {
            if ( $is_products_page ) {
                $classes[] = 'current-menu-item';
                $classes[] = 'current_page_item';
            } else {
                $classes = array_diff( $classes, array( 'current-menu-item', 'current_page_item' ) );
            }
        }

        // 5. News
        $is_news_page = in_array( $first_seg, array( 'news', 'events-news', 'event-news', 'berita', 'berita-acara' ), true ) || is_page_template( 'page-news.php' ) || is_page_template( 'page-news-detail.php' );
        $is_news_item = ( strpos( $item->url, 'news' ) !== false || strpos( $item->url, 'event' ) !== false || strpos( $item->url, 'berita' ) !== false );
        if ( $is_news_item ) {
            if ( $is_news_page ) {
                $classes[] = 'current-menu-item';
                $classes[] = 'current_page_item';
            } else {
                $classes = array_diff( $classes, array( 'current-menu-item', 'current_page_item' ) );
            }
        }

        // 6. Contact
        $is_contact_page = in_array( $first_seg, array( 'contact', 'contact-us', 'hubungi-kami', 'hubungi' ), true ) || is_page_template( 'page-contact.php' );
        $is_contact_item = ( strpos( $item->url, 'contact' ) !== false || stripos( $item->title, 'contact' ) !== false || stripos( $item->title, 'hubungi' ) !== false );
        if ( $is_contact_item ) {
            if ( $is_contact_page ) {
                $classes[] = 'current-menu-item';
                $classes[] = 'current_page_item';
            } else {
                $classes = array_diff( $classes, array( 'current-menu-item', 'current_page_item' ) );
            }
        }

        $class_names = join( ' ', array_filter( array_unique( $classes ) ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

        $output .= '<li' . $class_names . '>';

        $nav_url = ! empty( $item->url ) ? $item->url : '';
        if ( strpos( $nav_url, 'http' ) !== false && strpos( $nav_url, '#' ) === false ) {
            if ( fitra_get_lang() === 'id' ) {
                $nav_url = add_query_arg( 'lang', 'id', $nav_url );
            } else {
                $nav_url = remove_query_arg( 'lang', $nav_url );
            }
        }

        $atts = array(
            'href'  => $nav_url,
            'title' => ! empty( $item->attr_title ) ? $item->attr_title : '',
        );

        $attributes = '';
        foreach ( $atts as $attr => $value ) {
            if ( ! empty( $value ) ) {
                $attributes .= ' ' . $attr . '="' . esc_attr( $value ) . '"';
            }
        }

        $title_text = fitra_translate_nav_title( $item->title );

        $output .= '<a' . $attributes . '>';
        $output .= esc_html( $title_text );
        $output .= '</a>';
    }
}

/**
 * Filter wp_nav_menu_items to ensure Events & News and Contact Us are in the primary navbar with active translations.
 */
function fitra_add_news_to_nav_menu( $items, $args ) {
    if ( ! empty( $args->theme_location ) && $args->theme_location === 'primary' ) {
        $news_title    = fitra_t( 'nav_news' );
        $contact_title = fitra_t( 'nav_contact' );

        if ( strpos( $items, '/news' ) === false && strpos( $items, '/events-news' ) === false && stripos( $items, 'Events & News' ) === false && stripos( $items, 'Berita & Acara' ) === false ) {
            $req_uri = $_SERVER['REQUEST_URI'] ?? '';
            $is_current = is_page_template( 'page-news.php' ) || is_page_template( 'page-news-detail.php' ) || is_page( 'news' ) || is_page( 'events-news' ) || strpos( $req_uri, '/news' ) !== false || strpos( $req_uri, '/events-news' ) !== false || strpos( $req_uri, '/berita' ) !== false;
            $active_class = $is_current ? ' current-menu-item current_page_item' : '';
            $items .= '<li class="menu-item' . $active_class . '"><a href="' . esc_url( fitra_url( '/news/' ) ) . '">' . esc_html( $news_title ) . '</a></li>';
        }

        // Also ensure Contact Us is in the primary navbar
        if ( strpos( $items, '/contact' ) === false && stripos( $items, 'Contact Us' ) === false && stripos( $items, 'Contact' ) === false && stripos( $items, 'Hubungi Kami' ) === false ) {
            $req_uri = $_SERVER['REQUEST_URI'] ?? '';
            $is_current = is_page_template( 'page-contact.php' ) || is_page( 'contact' ) || is_page( 'contact-us' ) || strpos( $req_uri, '/contact' ) !== false || strpos( $req_uri, '/hubungi-kami' ) !== false;
            $active_class = $is_current ? ' current-menu-item current_page_item' : '';
            $items .= '<li class="menu-item' . $active_class . '"><a href="' . esc_url( fitra_url( '/contact/' ) ) . '">' . esc_html( $contact_title ) . '</a></li>';
        }
    }
    return $items;
}
add_filter( 'wp_nav_menu_items', 'fitra_add_news_to_nav_menu', 10, 2 );

/**
 * Sync menu item in WP Database
 */
function fitra_sync_news_menu_item() {
    $menu_locations = get_nav_menu_locations();
    if ( ! empty( $menu_locations['primary'] ) ) {
        $menu_id = $menu_locations['primary'];
        $menu_items = wp_get_nav_menu_items( $menu_id );
        $has_news = false;
        $has_contact = false;
        if ( ! empty( $menu_items ) ) {
            foreach ( $menu_items as $m_item ) {
                if ( strpos( $m_item->url, 'news' ) !== false || stripos( $m_item->title, 'news' ) !== false || stripos( $m_item->title, 'event' ) !== false ) {
                    $has_news = true;
                }
                if ( strpos( $m_item->url, 'contact' ) !== false || stripos( $m_item->title, 'contact' ) !== false || stripos( $m_item->title, 'hubungi' ) !== false ) {
                    $has_contact = true;
                }
            }
        }
        if ( ! $has_news ) {
            $news_page = get_page_by_path( 'news' );
            wp_update_nav_menu_item( $menu_id, 0, array(
                'menu-item-title'     => 'Events & News',
                'menu-item-object'    => 'page',
                'menu-item-object-id' => $news_page ? $news_page->ID : 0,
                'menu-item-type'      => $news_page ? 'post_type' : 'custom',
                'menu-item-url'       => home_url( '/news/' ),
                'menu-item-status'    => 'publish',
            ) );
        }
        if ( ! $has_contact ) {
            $contact_page = get_page_by_path( 'contact' );
            wp_update_nav_menu_item( $menu_id, 0, array(
                'menu-item-title'     => 'Contact Us',
                'menu-item-object'    => 'page',
                'menu-item-object-id' => $contact_page ? $contact_page->ID : 0,
                'menu-item-type'      => $contact_page ? 'post_type' : 'custom',
                'menu-item-url'       => home_url( '/contact/' ),
                'menu-item-status'    => 'publish',
            ) );
        }
    }
}
add_action( 'init', 'fitra_sync_news_menu_item', 25 );

/* --------------------------------------------------
   4. Theme image helper
   -------------------------------------------------- */
function fitra_img( $filename ) {
    return esc_url( get_template_directory_uri() . '/assets/images/' . $filename );
}

/* --------------------------------------------------
   4b. Product & News data includes
   -------------------------------------------------- */
require_once get_template_directory() . '/inc/product-data.php';
require_once get_template_directory() . '/inc/news-data.php';

/* --------------------------------------------------
   5. Auto-create pages on theme activation
   -------------------------------------------------- */
function fitra_perkasa_create_pages() {
    // Pages to auto-create: slug => [ title, template file ]
    $pages = array(
        'products' => array(
            'title'    => 'Products',
            'template' => 'page-products.php',
        ),
        'services' => array(
            'title'    => 'Services',
            'template' => 'page-services.php',
        ),
        'news'        => array(
            'title'    => 'Events & News',
            'template' => 'page-news.php',
        ),
        'events-news' => array(
            'title'    => 'Events & News',
            'template' => 'page-news.php',
        ),
        'berita'      => array(
            'title'    => 'Berita & Acara',
            'template' => 'page-news.php',
        ),
        'contact'     => array(
            'title'    => 'Contact Us',
            'template' => 'page-contact.php',
        ),
        'contact-us'  => array(
            'title'    => 'Contact Us',
            'template' => 'page-contact.php',
        ),
    );

    foreach ( $pages as $slug => $page_data ) {
        $existing = get_page_by_path( $slug );
        if ( $existing ) {
            update_post_meta( $existing->ID, '_wp_page_template', $page_data['template'] );
            continue;
        }

        $page_id = wp_insert_post( array(
            'post_title'   => $page_data['title'],
            'post_name'    => $slug,
            'post_status'  => 'publish',
            'post_type'    => 'page',
            'post_content' => '',
        ) );

        if ( ! is_wp_error( $page_id ) ) {
            update_post_meta( $page_id, '_wp_page_template', $page_data['template'] );
        }
    }

    // Create product detail child pages under Products
    fitra_perkasa_create_product_pages();
}
add_action( 'after_switch_theme', 'fitra_perkasa_create_pages' );

/**
 * Create individual product detail pages as children of the Products page.
 */
function fitra_perkasa_create_product_pages() {
    $products_page = get_page_by_path( 'products' );
    if ( ! $products_page ) {
        return;
    }

    $parent_id = $products_page->ID;
    $products  = fitra_get_products();

    foreach ( $products as $slug => $product ) {
        // Check if the child page already exists
        $full_path = 'products/' . $slug;
        $existing  = get_page_by_path( $full_path );

        if ( $existing ) {
            update_post_meta( $existing->ID, '_wp_page_template', 'page-product-detail.php' );
            continue;
        }

        $page_id = wp_insert_post( array(
            'post_title'   => $product['title'],
            'post_name'    => $slug,
            'post_status'  => 'publish',
            'post_type'    => 'page',
            'post_parent'  => $parent_id,
            'post_content' => '',
        ) );

        if ( ! is_wp_error( $page_id ) ) {
            update_post_meta( $page_id, '_wp_page_template', 'page-product-detail.php' );
        }
    }
}

/**
 * Create individual news detail pages as children of the News page.
 */
function fitra_perkasa_create_news_pages() {
    $news_page = get_page_by_path( 'news' );
    if ( ! $news_page ) {
        return;
    }

    $parent_id = $news_page->ID;
    $articles  = fitra_get_news_articles();

    foreach ( $articles as $slug => $article ) {
        $full_path = 'news/' . $slug;
        $existing  = get_page_by_path( $full_path );

        if ( $existing ) {
            update_post_meta( $existing->ID, '_wp_page_template', 'page-news-detail.php' );
            continue;
        }

        $page_id = wp_insert_post( array(
            'post_title'   => $article['title'],
            'post_name'    => $slug,
            'post_status'  => 'publish',
            'post_type'    => 'page',
            'post_parent'  => $parent_id,
            'post_content' => '',
        ) );

        if ( ! is_wp_error( $page_id ) ) {
            update_post_meta( $page_id, '_wp_page_template', 'page-news-detail.php' );
        }
    }
}

/**
 * Also run page creation on init (once) so it works
 * without re-activating the theme.
 */
function fitra_perkasa_ensure_pages() {
    if ( ! get_option( 'fitra_pages_created_v7' ) ) {
        fitra_perkasa_create_pages();
        fitra_perkasa_create_product_pages();
        fitra_perkasa_create_news_pages();
        update_option( 'fitra_pages_created_v7', true );
    }
}
add_action( 'init', 'fitra_perkasa_ensure_pages' );

/**
 * Route custom URLs directly to specific templates:
 * - / (or /id/, /en/)                -> front-page.php
 * - /profile (or /id/profile)         -> page-profile.php
 * - /services (or /id/services)       -> page-services.php
 * - /products/{slug}                  -> page-product-detail.php
 * - /products (or /id/products)       -> page-products.php
 * - /news/{slug}                      -> page-news-detail.php
 * - /news, /events-news, /berita      -> page-news.php
 * - /contact, /contact-us, /hubungi   -> page-contact.php
 */
function fitra_perkasa_custom_template_routing( $template ) {
    if ( is_admin() ) {
        return $template;
    }

    $request_uri = trim( parse_url( $_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH ), '/' );
    $parts = array_values( array_filter( explode( '/', $request_uri ) ) );

    // Strip leading language slug if present ('id' or 'en')
    if ( ! empty( $parts[0] ) && in_array( strtolower( $parts[0] ), array( 'id', 'en' ), true ) ) {
        array_shift( $parts );
    }

    // 1. Front page: / or /id/ or /en/ or /home or /beranda
    if ( empty( $parts ) || ( count( $parts ) === 1 && in_array( strtolower( $parts[0] ), array( 'home', 'beranda' ), true ) ) ) {
        global $wp_query;
        if ( $wp_query ) {
            $wp_query->is_404 = false;
            $wp_query->is_front_page = true;
            $wp_query->is_home = false;
            status_header( 200 );
        }
        $front_template = locate_template( array( 'front-page.php' ) );
        if ( $front_template ) {
            return $front_template;
        }
    }

    $first_seg = strtolower( $parts[0] );

    // 2. Profile page: /profile or /profil
    if ( in_array( $first_seg, array( 'profile', 'profil' ), true ) ) {
        global $wp_query;
        if ( $wp_query ) {
            $wp_query->is_404 = false;
            status_header( 200 );
        }
        $profile_template = locate_template( array( 'page-profile.php' ) );
        if ( $profile_template ) {
            return $profile_template;
        }
    }

    // 3. Services page: /services or /layanan
    if ( in_array( $first_seg, array( 'services', 'layanan' ), true ) ) {
        global $wp_query;
        if ( $wp_query ) {
            $wp_query->is_404 = false;
            status_header( 200 );
        }
        $services_template = locate_template( array( 'page-services.php' ) );
        if ( $services_template ) {
            return $services_template;
        }
    }

    // 4. Products: /products/{slug} or /products
    if ( in_array( $first_seg, array( 'products', 'produk' ), true ) ) {
        global $wp_query;
        if ( $wp_query ) {
            $wp_query->is_404 = false;
            status_header( 200 );
        }
        if ( ! empty( $parts[1] ) ) {
            $detail_template = locate_template( array( 'page-product-detail.php' ) );
            if ( $detail_template ) {
                return $detail_template;
            }
        }
        $products_template = locate_template( array( 'page-products.php' ) );
        if ( $products_template ) {
            return $products_template;
        }
    }

    // 5. News: /news/{slug} or /news, /berita, /events-news
    $news_slugs = array( 'news', 'events-news', 'event-news', 'berita', 'berita-acara' );
    if ( in_array( $first_seg, $news_slugs, true ) ) {
        global $wp_query;
        if ( $wp_query ) {
            $wp_query->is_404 = false;
            status_header( 200 );
        }
        if ( ! empty( $parts[1] ) ) {
            $detail_template = locate_template( array( 'page-news-detail.php' ) );
            if ( $detail_template ) {
                return $detail_template;
            }
        }
        $news_template = locate_template( array( 'page-news.php' ) );
        if ( $news_template ) {
            return $news_template;
        }
    }

    // 6. Contact: /contact, /contact-us, /hubungi-kami, /hubungi
    $contact_slugs = array( 'contact', 'contact-us', 'hubungi-kami', 'hubungi' );
    if ( in_array( $first_seg, $contact_slugs, true ) ) {
        global $wp_query;
        if ( $wp_query ) {
            $wp_query->is_404 = false;
            status_header( 200 );
        }
        $contact_template = locate_template( array( 'page-contact.php' ) );
        if ( $contact_template ) {
            return $contact_template;
        }
    }

    // 7. Fallback: if is_front_page() or is_home(), guarantee front-page.php
    if ( is_front_page() || is_home() ) {
        $front_template = locate_template( array( 'front-page.php' ) );
        if ( $front_template ) {
            return $front_template;
        }
    }

    return $template;
}
add_filter( 'template_include', 'fitra_perkasa_custom_template_routing', 99 );

/**
 * Filter body_class to guarantee consistent page styling in both EN and ID modes.
 * Ensures body.home is always present on the homepage regardless of Polylang query rewrites.
 */
function fitra_filter_body_classes( $classes ) {
    $req_uri = trim( parse_url( $_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH ), '/' );
    $parts   = array_values( array_filter( explode( '/', $req_uri ) ) );

    // Strip language prefix ('id' or 'en')
    if ( ! empty( $parts[0] ) && in_array( strtolower( $parts[0] ), array( 'id', 'en' ), true ) ) {
        array_shift( $parts );
    }

    $first = ! empty( $parts[0] ) ? strtolower( $parts[0] ) : '';

    // If Front Page / Home
    if ( empty( $parts ) || in_array( $first, array( 'home', 'beranda' ), true ) || is_front_page() ) {
        if ( ! in_array( 'home', $classes, true ) ) {
            $classes[] = 'home';
        }
        if ( ! in_array( 'front-page', $classes, true ) ) {
            $classes[] = 'front-page';
        }
        $classes = array_diff( $classes, array( 'blog' ) );
    } elseif ( in_array( $first, array( 'profile', 'profil' ), true ) ) {
        $classes[] = 'page-template-page-profile';
        $classes[] = 'page-template-page-profile-php';
        $classes = array_diff( $classes, array( 'blog' ) );
    } elseif ( in_array( $first, array( 'services', 'layanan' ), true ) ) {
        $classes[] = 'page-template-page-services';
        $classes[] = 'page-template-page-services-php';
        $classes = array_diff( $classes, array( 'blog' ) );
    } elseif ( in_array( $first, array( 'products', 'produk' ), true ) ) {
        if ( ! empty( $parts[1] ) ) {
            $classes[] = 'page-template-page-product-detail';
            $classes[] = 'page-template-page-product-detail-php';
        } else {
            $classes[] = 'page-template-page-products';
            $classes[] = 'page-template-page-products-php';
            $classes[] = 'page-products';
        }
        $classes = array_diff( $classes, array( 'blog' ) );
    } elseif ( in_array( $first, array( 'news', 'events-news', 'berita', 'berita-acara' ), true ) ) {
        if ( ! empty( $parts[1] ) ) {
            $classes[] = 'page-template-page-news-detail';
            $classes[] = 'page-template-page-news-detail-php';
            $classes[] = 'page-news-detail';
        } else {
            $classes[] = 'page-template-page-news';
            $classes[] = 'page-template-page-news-php';
            $classes[] = 'page-news';
        }
        $classes = array_diff( $classes, array( 'blog' ) );
    } elseif ( in_array( $first, array( 'contact', 'contact-us', 'hubungi-kami', 'hubungi' ), true ) ) {
        $classes[] = 'page-template-page-contact';
        $classes[] = 'page-template-page-contact-php';
        $classes[] = 'page-contact';
        $classes = array_diff( $classes, array( 'blog' ) );
    }

    $classes[] = 'lang-' . fitra_get_lang();

    return array_values( array_unique( $classes ) );
}
add_filter( 'body_class', 'fitra_filter_body_classes', 99 );

