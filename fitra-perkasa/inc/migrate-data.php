<?php
/**
 * One-Time Data Migration: Hardcoded Arrays → Custom Post Types
 *
 * Migrates all 18 products and 7 news articles from the static PHP arrays
 * in product-data.php and news-data.php into fitra_product and fitra_news CPTs,
 * populating ACF fields and creating Polylang EN/ID translation pairs.
 *
 * Runs once on 'init' and sets an option flag to prevent re-execution.
 *
 * @package FitraPerkasa
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Run the one-time migration.
 */
function fitra_migrate_data_to_cpt() {
    // Skip if already migrated
    if ( get_option( 'fitra_cpt_migrated_v1' ) ) {
        return;
    }

    // Only run in admin or on init with proper capabilities
    if ( ! is_admin() && ! defined( 'WP_CLI' ) ) {
        return;
    }

    // Ensure post types are registered before migrating
    if ( ! post_type_exists( 'fitra_product' ) || ! post_type_exists( 'fitra_news' ) ) {
        return;
    }

    // Migrate products
    fitra_migrate_products();

    // Migrate news
    fitra_migrate_news();

    // Mark as completed
    update_option( 'fitra_cpt_migrated_v1', true );
}
add_action( 'admin_init', 'fitra_migrate_data_to_cpt', 99 );

/**
 * Migrate all products from hardcoded array to fitra_product CPT.
 */
function fitra_migrate_products() {
    $img_base = get_template_directory_uri() . '/assets/images/';

    // Get products in English
    $products_en = fitra_get_products_static( 'en' );
    // Get products in Indonesian
    $products_id = fitra_get_products_static( 'id' );

    foreach ( $products_en as $slug => $product_en ) {
        // Skip if a post with this slug already exists
        $existing = get_posts( array(
            'name'           => $slug,
            'post_type'      => 'fitra_product',
            'post_status'    => 'any',
            'posts_per_page' => 1,
        ) );
        if ( ! empty( $existing ) ) {
            continue;
        }

        $product_id_data = isset( $products_id[ $slug ] ) ? $products_id[ $slug ] : $product_en;

        // ── Create English version ──
        $en_post_id = wp_insert_post( array(
            'post_title'  => $product_en['title_en'] ?? $product_en['title'] ?? $slug,
            'post_name'   => $slug,
            'post_type'   => 'fitra_product',
            'post_status' => 'publish',
        ) );

        if ( is_wp_error( $en_post_id ) ) {
            continue;
        }

        // Populate ACF fields for English
        fitra_set_product_acf_fields( $en_post_id, $product_en, 'en' );

        // Set Polylang language
        if ( function_exists( 'pll_set_post_language' ) ) {
            pll_set_post_language( $en_post_id, 'en' );
        }

        // ── Create Indonesian version ──
        $id_post_id = wp_insert_post( array(
            'post_title'  => $product_id_data['title_id'] ?? $product_id_data['title'] ?? $slug,
            'post_name'   => $slug . '-id',
            'post_type'   => 'fitra_product',
            'post_status' => 'publish',
        ) );

        if ( is_wp_error( $id_post_id ) ) {
            continue;
        }

        // Populate ACF fields for Indonesian
        fitra_set_product_acf_fields( $id_post_id, $product_id_data, 'id' );

        // Set Polylang language
        if ( function_exists( 'pll_set_post_language' ) ) {
            pll_set_post_language( $id_post_id, 'id' );
        }

        // Link translations
        if ( function_exists( 'pll_save_post_translations' ) ) {
            pll_save_post_translations( array(
                'en' => $en_post_id,
                'id' => $id_post_id,
            ) );
        }
    }
}

/**
 * Set ACF fields on a product post.
 *
 * @param int    $post_id  Post ID
 * @param array  $product  Product data array
 * @param string $lang     Language code ('en' or 'id')
 */
function fitra_set_product_acf_fields( $post_id, $product, $lang = 'en' ) {
    $cat_en = $product['category_en'] ?? $product['category'] ?? '';
    $cat_id = $product['category_id'] ?? $cat_en;

    // Category (internal key is always the EN value for filtering consistency)
    update_post_meta( $post_id, 'product_category', $cat_en );

    // Localized category label
    $cat_label = ( $lang === 'id' ) ? $cat_id : $cat_en;
    update_post_meta( $post_id, 'product_category_label', $cat_label );

    // Brand
    update_post_meta( $post_id, 'product_brand', $product['brand'] ?? '' );

    // Stock status
    update_post_meta( $post_id, 'product_stock_status', $product['stock'] ?? 'IN STOCK' );

    // Full title
    $full_title = ( $lang === 'id' )
        ? ( $product['full_title_id'] ?? $product['full_title_en'] ?? '' )
        : ( $product['full_title_en'] ?? '' );
    update_post_meta( $post_id, 'product_full_title', $full_title );

    // Description
    $desc = ( $lang === 'id' )
        ? ( $product['desc_id'] ?? $product['desc_en'] ?? '' )
        : ( $product['desc_en'] ?? '' );
    update_post_meta( $post_id, 'product_description', $desc );

    // Image URL (theme asset path)
    update_post_meta( $post_id, 'product_image', $product['image'] ?? '' );

    // Gallery (serialized array of URLs)
    $gallery = $product['gallery'] ?? array();
    update_post_meta( $post_id, 'product_gallery', $gallery );

    // Specs (serialize to "KEY = VALUE" lines)
    $specs_lines = array();
    if ( ! empty( $product['specs'] ) && is_array( $product['specs'] ) ) {
        foreach ( $product['specs'] as $key => $val ) {
            $specs_lines[] = $key . ' = ' . $val;
        }
    }
    update_post_meta( $post_id, 'product_specs', implode( "\n", $specs_lines ) );

    // Documents (serialize to "Name | Type | Size" lines)
    $doc_lines = array();
    if ( ! empty( $product['documents'] ) && is_array( $product['documents'] ) ) {
        foreach ( $product['documents'] as $doc ) {
            $doc_name = ( $lang === 'id' && ! empty( $doc['name_id'] ) ) ? $doc['name_id'] : $doc['name'];
            $doc_lines[] = $doc_name . ' | ' . ( $doc['type'] ?? 'PDF' ) . ' | ' . ( $doc['size'] ?? '' );
        }
    }
    update_post_meta( $post_id, 'product_documents', implode( "\n", $doc_lines ) );

    // Card tag and card specs are set from the catalog_config in page-products.php
    // We'll store a product_slug meta to use for lookup
    update_post_meta( $post_id, 'product_slug', $product['slug'] ?? '' );
}

/**
 * Migrate all news articles from hardcoded array to fitra_news CPT.
 */
function fitra_migrate_news() {
    // We need both language versions, so we temporarily override language
    $articles_data = fitra_get_news_static();

    foreach ( $articles_data as $slug => $article_pair ) {
        // Skip if a post with this slug already exists
        $existing = get_posts( array(
            'name'           => $slug,
            'post_type'      => 'fitra_news',
            'post_status'    => 'any',
            'posts_per_page' => 1,
        ) );
        if ( ! empty( $existing ) ) {
            continue;
        }

        $en = $article_pair['en'];
        $id = $article_pair['id'];

        // ── Create English version ──
        $en_post_id = wp_insert_post( array(
            'post_title'  => $en['title'],
            'post_name'   => $slug,
            'post_type'   => 'fitra_news',
            'post_status' => 'publish',
        ) );

        if ( is_wp_error( $en_post_id ) ) {
            continue;
        }

        fitra_set_news_acf_fields( $en_post_id, $en );
        fitra_set_news_type_term( $en_post_id, $en['type'] ?? 'berita' );
        if ( function_exists( 'pll_set_post_language' ) ) {
            pll_set_post_language( $en_post_id, 'en' );
        }

        // Set featured image from theme asset
        if ( ! empty( $en['image'] ) ) {
            update_post_meta( $en_post_id, '_news_image_url', $en['image'] );
        }

        // ── Create Indonesian version ──
        $id_post_id = wp_insert_post( array(
            'post_title'  => $id['title'],
            'post_name'   => $slug . '-id',
            'post_type'   => 'fitra_news',
            'post_status' => 'publish',
        ) );

        if ( is_wp_error( $id_post_id ) ) {
            continue;
        }

        fitra_set_news_acf_fields( $id_post_id, $id );
        fitra_set_news_type_term( $id_post_id, $id['type'] ?? 'berita' );
        if ( function_exists( 'pll_set_post_language' ) ) {
            pll_set_post_language( $id_post_id, 'id' );
        }

        if ( ! empty( $id['image'] ) ) {
            update_post_meta( $id_post_id, '_news_image_url', $id['image'] );
        }

        // Link translations
        if ( function_exists( 'pll_save_post_translations' ) ) {
            pll_save_post_translations( array(
                'en' => $en_post_id,
                'id' => $id_post_id,
            ) );
        }
    }
}

/**
 * Set ACF fields on a news post.
 *
 * @param int   $post_id Post ID
 * @param array $article Article data array
 */
function fitra_set_news_acf_fields( $post_id, $article ) {
    update_post_meta( $post_id, 'news_category_label', $article['category'] ?? '' );
    update_post_meta( $post_id, 'news_date_display', $article['date'] ?? '' );
    update_post_meta( $post_id, 'news_badge', $article['badge'] ?? '' );
    update_post_meta( $post_id, 'news_meta_left', $article['meta_left'] ?? $article['date'] ?? '' );
    update_post_meta( $post_id, 'news_featured_desc', $article['desc'] ?? $article['pullquote'] ?? '' );

    // Author
    $author = $article['author'] ?? array();
    update_post_meta( $post_id, 'news_author_name', $author['name'] ?? 'Tim Editorial' );
    update_post_meta( $post_id, 'news_author_role', $author['role'] ?? 'Corporate Communications' );

    // Article body
    update_post_meta( $post_id, 'news_pullquote', $article['pullquote'] ?? '' );
    update_post_meta( $post_id, 'news_section1_title', $article['section1_title'] ?? '' );
    update_post_meta( $post_id, 'news_section1_p1', $article['section1_p1'] ?? '' );
    update_post_meta( $post_id, 'news_section1_p2', $article['section1_p2'] ?? '' );
    update_post_meta( $post_id, 'news_features_title', $article['features_title'] ?? '' );

    // Features (serialize to "icon|title|description" lines)
    $feature_lines = array();
    if ( ! empty( $article['features'] ) && is_array( $article['features'] ) ) {
        foreach ( $article['features'] as $f ) {
            $feature_lines[] = ( $f['icon'] ?? 'check' ) . '|' . ( $f['title'] ?? '' ) . '|' . ( $f['desc'] ?? '' );
        }
    }
    update_post_meta( $post_id, 'news_features', implode( "\n", $feature_lines ) );

    // Section 2 & Quote
    update_post_meta( $post_id, 'news_section2_title', $article['section2_title'] ?? '' );
    update_post_meta( $post_id, 'news_section2_p1', $article['section2_p1'] ?? '' );
    update_post_meta( $post_id, 'news_quote', $article['quote'] ?? '' );
    update_post_meta( $post_id, 'news_quote_author', $article['quote_author'] ?? '' );
    update_post_meta( $post_id, 'news_section2_p2', $article['section2_p2'] ?? '' );

    // Event badge
    $event_badge = $article['event_badge'] ?? null;
    if ( is_array( $event_badge ) ) {
        update_post_meta( $post_id, 'news_event_day', $event_badge['day'] ?? '' );
        update_post_meta( $post_id, 'news_event_month', $event_badge['month'] ?? '' );
    }

    // Store the original slug for URL lookup
    update_post_meta( $post_id, '_news_original_slug', $article['slug'] ?? '' );
}

/**
 * Assign article type taxonomy term.
 */
function fitra_set_news_type_term( $post_id, $type ) {
    $term_slug = ( $type === 'acara' ) ? 'acara' : 'berita';
    wp_set_object_terms( $post_id, $term_slug, 'fitra_news_type' );
}

/**
 * Get static product data for migration.
 * Returns the raw bilingual data without applying fitra_get_lang().
 *
 * @param string $lang Language code
 * @return array
 */
function fitra_get_products_static( $lang = 'en' ) {
    // Temporarily call the original function with explicit language
    return fitra_get_products( $lang );
}

/**
 * Get static news data for migration.
 * Returns both EN and ID versions of every article.
 *
 * @return array Keyed by slug, each value has ['en'] and ['id'] sub-arrays
 */
function fitra_get_news_static() {
    $img = get_template_directory_uri() . '/assets/images/';

    // We'll build the bilingual data manually since fitra_get_news_articles()
    // uses fitra_t_val() which depends on fitra_get_lang().
    // Each entry has explicit EN and ID values.

    return array(
        'implementasi-teknologi-presisi-tinggi' => array(
            'en' => array(
                'slug'          => 'implementasi-teknologi-presisi-tinggi',
                'type'          => 'berita',
                'category'      => 'CORPORATE UPDATES',
                'date'          => 'DEC 12, 2024',
                'badge'         => 'MAIN HIGHLIGHT',
                'meta_left'     => 'DEC 12, 2024',
                'title'         => 'Implementation of High-Precision Technology in International Steel Distribution',
                'desc'          => 'PT Fitra Perkasa Inti officially integrates a real-time tracking system for all heavy construction material shipments to ensure global on-time delivery.',
                'author'        => array( 'name' => 'Darmawan Santoso', 'role' => 'Chief Operations Officer', 'avatar' => $img . 'hero-workers.jpg' ),
                'image'         => $img . 'factory-operations.jpg',
                'pullquote'     => 'As part of PT Fitra Perkasa Inti\'s commitment to global efficiency, we introduced an AI-based tracking and logistics management system to ensure world-class construction material distribution accuracy.',
                'section1_title'=> 'Digital Transformation in Heavy Industry',
                'section1_p1'   => 'Traditional steel and equipment industries often face challenges regarding supply chain transparency and delivery timeliness. In a fast-moving era, any delay can have systemic impacts on large infrastructure projects. PT Fitra Perkasa Inti sees this challenge as an opportunity to integrate high-precision technology into every distribution node.',
                'section1_p2'   => 'This step is not merely following trends, but a fundamental operational requirement. With significant international trade volume, manual systems are no longer sufficient to uphold the quality standards we promise our partners.',
                'features_title'=> 'Core Pillars of the New System',
                'features'      => array(
                    array( 'icon' => 'check', 'title' => 'Real-time Quality Monitoring', 'desc' => 'IoT sensors on containers monitor humidity and temperature to prevent steel corrosion during transit.' ),
                    array( 'icon' => 'robot', 'title' => 'Automated Loading Precision', 'desc' => 'Robotic cargo handling reduces risk of physical material damage by up to 98% compared to conventional methods.' ),
                    array( 'icon' => 'analytics', 'title' => 'Predictive Logistics', 'desc' => 'AI algorithms analyze shipping routes and global weather patterns to proactively predict and mitigate delays.' ),
                ),
                'section2_title'=> 'Impact on Stakeholders',
                'section2_p1'   => 'For our clients in the construction and industrial sectors, this precision delivers project schedule certainty. No more machine downtime due to delayed materials or supplies arriving below technical specifications.',
                'quote'         => 'Investing in technology is investing in customer trust. PT Fitra Perkasa Inti provides operational continuity guarantees for our partners worldwide.',
                'quote_author'  => 'MANAGEMENT BOARD, PT FITRA PERKASA INTI',
                'section2_p2'   => 'Moving forward, PT Fitra Perkasa Inti plans to expand blockchain implementation to ensure end-to-end material traceability, supporting transparent green industry initiatives.',
                'event_badge'   => null,
            ),
            'id' => array(
                'slug'          => 'implementasi-teknologi-presisi-tinggi',
                'type'          => 'berita',
                'category'      => 'PEMBARUAN KORPORAT',
                'date'          => '12 DES 2024',
                'badge'         => 'SOROTAN UTAMA',
                'meta_left'     => '12 DES 2024',
                'title'         => 'Implementasi Teknologi Presisi Tinggi pada Distribusi Baja Internasional',
                'desc'          => 'PT Fitra Perkasa Inti secara resmi mengintegrasikan sistem pelacakan berbasis real-time untuk seluruh pengiriman material konstruksi berat guna menjamin ketepatan waktu pengiriman global.',
                'author'        => array( 'name' => 'Darmawan Santoso', 'role' => 'Chief Operations Officer', 'avatar' => $img . 'hero-workers.jpg' ),
                'image'         => $img . 'factory-operations.jpg',
                'pullquote'     => 'Sebagai bagian dari komitmen PT Fitra Perkasa Inti terhadap efisiensi global, kami memperkenalkan sistem pelacakan dan manajemen logistik berbasis AI untuk memastikan akurasi distribusi material konstruksi kelas dunia.',
                'section1_title'=> 'Transformasi Digital di Sektor Heavy Industry',
                'section1_p1'   => 'Industri baja tradisional sering kali menghadapi tantangan dalam hal transparansi rantai pasok dan presisi waktu pengiriman. Dalam era globalisasi yang semakin cepat, keterlambatan sekecil apa pun dapat berdampak sistemik pada proyek infrastruktur skala besar. PT Fitra Perkasa Inti melihat tantangan ini sebagai peluang untuk mengintegrasikan teknologi presisi tinggi ke dalam setiap simpul distribusi kami.',
                'section1_p2'   => 'Langkah ini bukan sekadar mengikuti tren, melainkan kebutuhan operasional mendasar. Dengan volume perdagangan internasional yang mencapai ratusan ribu ton per tahun, sistem manual tidak lagi memadai untuk menjaga standar kualitas yang kami janjikan kepada mitra global.',
                'features_title'=> 'Pilar Utama Sistem Baru',
                'features'      => array(
                    array( 'icon' => 'check', 'title' => 'Pemantauan Kualitas Real-time', 'desc' => 'Sensor IoT yang terpasang pada setiap kontainer memantau kelembaban dan suhu untuk mencegah korosi pada baja selama perjalanan laut.' ),
                    array( 'icon' => 'robot', 'title' => 'Presisi Pemuatan Otomatis', 'desc' => 'Penggunaan robotik kargo yang mengurangi risiko kerusakan fisik pada material hingga 98% dibandingkan metode konvensional.' ),
                    array( 'icon' => 'analytics', 'title' => 'Logistik Prediktif', 'desc' => 'Algoritma AI menganalisis rute pengiriman dan kondisi cuaca global untuk memprediksi serta memitigasi potensi penundaan secara proaktif.' ),
                ),
                'section2_title'=> 'Dampak bagi Stakeholder',
                'section2_p1'   => 'Bagi klien kami di sektor konstruksi dan otomotif, presisi ini berarti kepastian jadwal proyek. Tidak ada lagi downtime mesin akibat material yang belum tiba atau material yang datang dalam kondisi di bawah standar spesifikasi teknis.',
                'quote'         => 'Investasi pada teknologi adalah investasi pada kepercayaan pelanggan. PT Fitra Perkasa Inti menyediakan jaminan keberlanjutan operasional bagi mitra-mitra kami di seluruh dunia.',
                'quote_author'  => 'DEWAN DIREKSI, PT FITRA PERKASA INTI',
                'section2_p2'   => 'Kedepannya, PT Fitra Perkasa Inti berencana untuk memperluas implementasi blockchain guna memastikan ketertelusuran (traceability) sumber material, mendukung inisiatif industri hijau yang lebih transparan dan bertanggung jawab secara lingkungan.',
                'event_badge'   => null,
            ),
        ),

        'standar-baru-sertifikasi-kualitas' => array(
            'en' => array( 'slug' => 'standar-baru-sertifikasi-kualitas', 'type' => 'berita', 'category' => 'QUALITY STANDARDS', 'date' => 'MAY 08, 2024', 'badge' => 'NEWS', 'meta_left' => '08 MAY 2024', 'title' => 'New Quality Certification Standards for Industrial Gas Pipes', 'desc' => 'We recently updated our technical inspection protocols to meet the latest ISO standards in energy infrastructure distribution.', 'author' => array( 'name' => 'Ir. Hendra Wijaya', 'role' => 'Head of Quality Assurance', 'avatar' => $img . 'hero-workers.jpg' ), 'image' => $img . 'product-pipes.jpg', 'pullquote' => 'We recently updated our technical inspection protocols to meet the latest ISO standards in energy infrastructure distribution.', 'section1_title' => 'Upgraded Pressure & Integrity Testing Protocols', 'section1_p1' => 'To meet the stringent reliability demands of the oil and gas industry, we have updated non-destructive testing (NDT), ultrasonic examination, and radiographic testing standards for all carbon steel and stainless steel industrial piping product lines.', 'section1_p2' => 'This new certification guarantees all pipe materials can withstand hydraulic loads up to Class 2500 rating without risk of micro-fissures or stress corrosion cracking.', 'features_title' => 'New Protocol Advantages', 'features' => array( array( 'icon' => 'check', 'title' => 'Automated Hydrostatic Testing', 'desc' => 'Digital pressure recording system calibrated by independent KAN-accredited testing laboratories.' ), array( 'icon' => 'robot', 'title' => '100% Batch Number Traceability', 'desc' => 'Each pipe segment includes barcode identification tied directly to verified digital mill certificates.' ), array( 'icon' => 'analytics', 'title' => 'NACE MR0175 Compliance', 'desc' => 'Meets strict sulfide stress cracking resistance requirements for sour gas production environments.' ) ), 'section2_title' => 'Commitment to Safety Standards', 'section2_p1' => 'These standards are implemented across all our warehouses and fabrication hubs to deliver engineering confidence for EPC contractors across Indonesia.', 'quote' => 'Piping safety and reliability are foundational to large-scale energy operations without downtime.', 'quote_author' => 'HEAD OF QA, PT FITRA PERKASA INTI', 'section2_p2' => 'All mill certificates will now feature enhanced digital verification accessible through our client portal.', 'event_badge' => null ),
            'id' => array( 'slug' => 'standar-baru-sertifikasi-kualitas', 'type' => 'berita', 'category' => 'STANDAR KUALITAS', 'date' => '08 MEI 2024', 'badge' => 'BERITA', 'meta_left' => '08 MEI 2024', 'title' => 'Standar Baru Sertifikasi Kualitas untuk Pipa Industri Gas', 'desc' => 'Kami baru saja memperbarui protokol inspeksi teknis kami untuk memenuhi standar ISO terbaru dalam distribusi infrastruktur energi.', 'author' => array( 'name' => 'Ir. Hendra Wijaya', 'role' => 'Kepala Penjaminan Mutu', 'avatar' => $img . 'hero-workers.jpg' ), 'image' => $img . 'product-pipes.jpg', 'pullquote' => 'Kami baru saja memperbarui protokol inspeksi teknis kami untuk memenuhi standar ISO terbaru dalam distribusi infrastruktur energi.', 'section1_title' => 'Peningkatan Protokol Pengujian Tekanan & Integritas', 'section1_p1' => 'Dalam rangka memenuhi kebutuhan industri minyak dan gas yang kian menuntut keandalan tinggi, kami telah memperbarui standar pengujian nondestructive testing (NDT), ultrasonic examination, dan pengujian radiografi untuk semua lini produk perpipaan baja karbon dan stainless steel.', 'section1_p2' => 'Sertifikasi baru ini menjamin seluruh material pipa mampu menahan beban hidrolik hingga rating Class 2500 tanpa risiko micro-fissure atau korosi tegangan.', 'features_title' => 'Keunggulan Protokol Baru', 'features' => array( array( 'icon' => 'check', 'title' => 'Hydrostatic Testing Otomatis', 'desc' => 'Pengujian tekanan dengan sistem pencatatan digital terkalibrasi laboratorium independen terakreditasi KAN.' ), array( 'icon' => 'robot', 'title' => 'Traceability Nomor Batch 100%', 'desc' => 'Tiap segmen pipa dilengkapi barcode identifikasi material mill certificate yang dapat diverifikasi secara online.' ), array( 'icon' => 'analytics', 'title' => 'Kepatuhan NACE MR0175', 'desc' => 'Memenuhi persyaratan ketat ketahanan sulfide stress cracking untuk lingkungan gas asam (sour gas).' ) ), 'section2_title' => 'Komitmen Terhadap Standar Keselamatan', 'section2_p1' => 'Standar ini diimplementasikan di seluruh warehouse dan pusat fabrikasi kami guna memberikan kepastian teknis bagi kontraktor EPC migas dan petrokimia di Indonesia.', 'quote' => 'Keamanan dan keandalan pipa adalah fondasi utama keberhasilan operasi energi skala besar tanpa downtime.', 'quote_author' => 'KEPALA QA, PT FITRA PERKASA INTI', 'section2_p2' => 'Seluruh mill certificate kini dilengkapi verifikasi digital yang dapat diakses melalui portal klien kami.', 'event_badge' => null ),
        ),

        'metal-steel-indonesia-2024' => array(
            'en' => array( 'slug' => 'metal-steel-indonesia-2024', 'type' => 'acara', 'category' => 'INDUSTRY EVENTS', 'date' => 'JUN 24, 2024', 'badge' => 'EVENT', 'meta_left' => 'JAKARTA EXPO CENTER', 'title' => 'Metal & Steel Indonesia 2024: Annual Industrial Exhibition', 'desc' => 'Join our team of experts at Booth A12 for in-depth discussions regarding material procurement solutions for construction projects.', 'author' => array( 'name' => 'Tim Editorial', 'role' => 'Corporate Communications', 'avatar' => $img . 'hero-workers.jpg' ), 'image' => $img . 'news-workshop.jpg', 'pullquote' => 'Join our team of experts at Booth A12 for in-depth discussions regarding material procurement solutions for construction projects.', 'section1_title' => 'Exhibition Overview', 'section1_p1' => 'Metal & Steel Indonesia 2024 brings together leading manufacturers, distributors, and industry professionals for Southeast Asia\'s premier metals and steel trade exhibition.', 'section1_p2' => 'PT Fitra Perkasa Inti proudly participates as a key exhibitor, showcasing our comprehensive range of industrial piping, structural steel, and mechanical drive solutions.', 'features_title' => 'What to Expect', 'features' => array( array( 'icon' => 'check', 'title' => 'Live Product Demonstrations', 'desc' => 'Hands-on demonstrations of our latest piping systems and mechanical drive solutions.' ), array( 'icon' => 'robot', 'title' => 'Technical Consultations', 'desc' => 'One-on-one sessions with our engineering specialists for your project requirements.' ), array( 'icon' => 'analytics', 'title' => 'Industry Networking', 'desc' => 'Connect with decision makers from energy, mining, and construction sectors.' ) ), 'section2_title' => 'Visit Our Booth', 'section2_p1' => 'Find us at Booth A12 in Hall 3. Our sales engineers are ready to discuss your specific procurement needs.', 'quote' => 'Industry exhibitions are where partnerships are forged and solutions are discovered.', 'quote_author' => 'BUSINESS DEVELOPMENT, PT FITRA PERKASA INTI', 'section2_p2' => 'Pre-register for exclusive meeting slots through our contact page.', 'event_badge' => array( 'day' => '24', 'month' => 'JUN' ) ),
            'id' => array( 'slug' => 'metal-steel-indonesia-2024', 'type' => 'acara', 'category' => 'ACARA INDUSTRI', 'date' => '24 JUN 2024', 'badge' => 'ACARA', 'meta_left' => 'JAKARTA EXPO CENTER', 'title' => 'Metal & Steel Indonesia 2024: Pameran Industri Tahunan', 'desc' => 'Bergabunglah dengan tim ahli kami di Booth A12 untuk diskusi mendalam mengenai solusi pengadaan material untuk proyek konstruksi.', 'author' => array( 'name' => 'Tim Editorial', 'role' => 'Corporate Communications', 'avatar' => $img . 'hero-workers.jpg' ), 'image' => $img . 'news-workshop.jpg', 'pullquote' => 'Bergabunglah dengan tim ahli kami di Booth A12 untuk diskusi mendalam mengenai solusi pengadaan material untuk proyek konstruksi.', 'section1_title' => 'Gambaran Pameran', 'section1_p1' => 'Metal & Steel Indonesia 2024 mempertemukan produsen, distributor, dan profesional industri terkemuka di Asia Tenggara dalam pameran perdagangan logam dan baja terbesar.', 'section1_p2' => 'PT Fitra Perkasa Inti turut berpartisipasi sebagai exhibitor utama, menampilkan rangkaian lengkap solusi perpipaan industri, baja struktural, dan penggerak mekanikal.', 'features_title' => 'Yang Akan Ditampilkan', 'features' => array( array( 'icon' => 'check', 'title' => 'Demonstrasi Produk Langsung', 'desc' => 'Demonstrasi langsung sistem perpipaan terbaru dan solusi penggerak mekanikal.' ), array( 'icon' => 'robot', 'title' => 'Konsultasi Teknis', 'desc' => 'Sesi satu-satu dengan spesialis teknik kami untuk kebutuhan proyek Anda.' ), array( 'icon' => 'analytics', 'title' => 'Jaringan Industri', 'desc' => 'Terhubung dengan pengambil keputusan dari sektor energi, pertambangan, dan konstruksi.' ) ), 'section2_title' => 'Kunjungi Booth Kami', 'section2_p1' => 'Temukan kami di Booth A12, Hall 3. Tim sales engineer kami siap mendiskusikan kebutuhan pengadaan spesifik Anda.', 'quote' => 'Pameran industri adalah tempat di mana kemitraan ditempa dan solusi ditemukan.', 'quote_author' => 'PENGEMBANGAN BISNIS, PT FITRA PERKASA INTI', 'section2_p2' => 'Pra-registrasi untuk slot pertemuan eksklusif melalui halaman kontak kami.', 'event_badge' => array( 'day' => '24', 'month' => 'JUN' ) ),
        ),

        'ekspansi-jaringan-logistik-timur-tengah' => array(
            'en' => array( 'slug' => 'ekspansi-jaringan-logistik-timur-tengah', 'type' => 'berita', 'category' => 'GLOBAL OPERATIONS', 'date' => 'MAY 02, 2024', 'badge' => 'NEWS', 'meta_left' => '02 MAY 2024', 'title' => 'Expansion of Logistics Network to the Middle East Region', 'desc' => 'PT Fitra Perkasa Inti strengthens strategic partnerships with major port operators to accelerate material transit times.', 'author' => array( 'name' => 'Tim Editorial', 'role' => 'Corporate Communications', 'avatar' => $img . 'hero-workers.jpg' ), 'image' => $img . 'hero-port-crane.jpg', 'pullquote' => 'PT Fitra Perkasa Inti strengthens strategic partnerships with major port operators to accelerate material transit times.', 'section1_title' => 'Strategic Expansion', 'section1_p1' => 'Our logistics network now extends to key ports in the Middle East, enabling faster delivery of structural steel and piping materials to major construction projects in the region.', 'section1_p2' => 'This expansion supports our growing client base in the energy and infrastructure sectors across the Gulf Cooperation Council (GCC) countries.', 'features_title' => 'Key Advantages', 'features' => array( array( 'icon' => 'check', 'title' => 'Reduced Transit Times', 'desc' => 'Direct shipping routes cut delivery times by up to 40% compared to previous transhipment routes.' ), array( 'icon' => 'robot', 'title' => 'Bonded Warehousing', 'desc' => 'Strategically located bonded warehouses for just-in-time material delivery.' ), array( 'icon' => 'analytics', 'title' => 'Real-time Tracking', 'desc' => 'Full container visibility from Indonesian ports to final destination.' ) ), 'section2_title' => 'Future Outlook', 'section2_p1' => 'This milestone strengthens our position as a trusted international supplier of industrial materials.', 'quote' => 'Global reach with local expertise — that is the Fitra Perkasa advantage.', 'quote_author' => 'LOGISTICS DIRECTOR, PT FITRA PERKASA INTI', 'section2_p2' => 'Additional routes to East Africa and Central Asia are planned for 2025.', 'event_badge' => null ),
            'id' => array( 'slug' => 'ekspansi-jaringan-logistik-timur-tengah', 'type' => 'berita', 'category' => 'OPERASI GLOBAL', 'date' => '02 MEI 2024', 'badge' => 'BERITA', 'meta_left' => '02 MEI 2024', 'title' => 'Ekspansi Jaringan Logistik ke Wilayah Timur Tengah', 'desc' => 'PT Fitra Perkasa Inti memperkuat kemitraan strategis dengan operator pelabuhan utama untuk mempercepat waktu transit material.', 'author' => array( 'name' => 'Tim Editorial', 'role' => 'Corporate Communications', 'avatar' => $img . 'hero-workers.jpg' ), 'image' => $img . 'hero-port-crane.jpg', 'pullquote' => 'PT Fitra Perkasa Inti memperkuat kemitraan strategis dengan operator pelabuhan utama untuk mempercepat waktu transit material.', 'section1_title' => 'Ekspansi Strategis', 'section1_p1' => 'Jaringan logistik kami kini mencakup pelabuhan utama di Timur Tengah, memungkinkan pengiriman baja struktural dan material perpipaan lebih cepat ke proyek konstruksi besar di kawasan tersebut.', 'section1_p2' => 'Ekspansi ini mendukung basis klien kami yang terus tumbuh di sektor energi dan infrastruktur di negara-negara GCC.', 'features_title' => 'Keunggulan Utama', 'features' => array( array( 'icon' => 'check', 'title' => 'Waktu Transit Lebih Cepat', 'desc' => 'Rute pengiriman langsung memangkas waktu pengiriman hingga 40% dibanding rute transhipment sebelumnya.' ), array( 'icon' => 'robot', 'title' => 'Pergudangan Berikat', 'desc' => 'Gudang berikat berlokasi strategis untuk pengiriman material tepat waktu.' ), array( 'icon' => 'analytics', 'title' => 'Pelacakan Real-time', 'desc' => 'Visibilitas kontainer penuh dari pelabuhan Indonesia hingga tujuan akhir.' ) ), 'section2_title' => 'Outlook Masa Depan', 'section2_p1' => 'Pencapaian ini memperkuat posisi kami sebagai pemasok material industri internasional yang terpercaya.', 'quote' => 'Jangkauan global dengan keahlian lokal — itulah keunggulan Fitra Perkasa.', 'quote_author' => 'DIREKTUR LOGISTIK, PT FITRA PERKASA INTI', 'section2_p2' => 'Rute tambahan ke Afrika Timur dan Asia Tengah direncanakan untuk 2025.', 'event_badge' => null ),
        ),

        'webinar-inovasi-material-infrastruktur' => array(
            'en' => array( 'slug' => 'webinar-inovasi-material-infrastruktur', 'type' => 'acara', 'category' => 'INDUSTRY EVENTS', 'date' => 'JUL 15, 2024', 'badge' => 'EVENT', 'meta_left' => 'VIRTUAL WEBINAR', 'title' => 'Webinar: Material Innovation for Sustainable Infrastructure', 'desc' => 'Panel discussion with civil engineering experts on the selection of corrosion-resistant steel types for coastal environments.', 'author' => array( 'name' => 'Tim Editorial', 'role' => 'Corporate Communications', 'avatar' => $img . 'hero-workers.jpg' ), 'image' => $img . 'news-training.jpg', 'pullquote' => 'Panel discussion with civil engineering experts on the selection of corrosion-resistant steel types for coastal environments.', 'section1_title' => 'Webinar Overview', 'section1_p1' => 'Join our industry experts for an in-depth webinar exploring the latest innovations in corrosion-resistant materials for coastal and marine infrastructure projects.', 'section1_p2' => 'Topics include advanced coating technologies, duplex stainless steel applications, and lifecycle cost analysis for coastal construction projects.', 'features_title' => 'Session Highlights', 'features' => array( array( 'icon' => 'check', 'title' => 'Expert Panel Discussion', 'desc' => 'Leading civil engineers discuss material selection best practices for harsh environments.' ), array( 'icon' => 'robot', 'title' => 'Case Study Presentations', 'desc' => 'Real-world examples of material performance in Indonesian coastal projects.' ), array( 'icon' => 'analytics', 'title' => 'Q&A Session', 'desc' => 'Interactive session for attendees to ask questions to our technical team.' ) ), 'section2_title' => 'Registration', 'section2_p1' => 'Register now to secure your spot. Limited to 500 participants.', 'quote' => 'Knowledge sharing drives industry innovation and safety standards forward.', 'quote_author' => 'ENGINEERING DIVISION, PT FITRA PERKASA INTI', 'section2_p2' => 'Recorded sessions will be available on our website after the event.', 'event_badge' => array( 'day' => '15', 'month' => 'JUL' ) ),
            'id' => array( 'slug' => 'webinar-inovasi-material-infrastruktur', 'type' => 'acara', 'category' => 'ACARA INDUSTRI', 'date' => '15 JUL 2024', 'badge' => 'ACARA', 'meta_left' => 'VIRTUAL WEBINAR', 'title' => 'Webinar: Inovasi Material untuk Infrastruktur Berkelanjutan', 'desc' => 'Diskusi panel dengan pakar teknik sipil mengenai pemilihan jenis baja yang tahan korosi untuk lingkungan pesisir dan proyek.', 'author' => array( 'name' => 'Tim Editorial', 'role' => 'Corporate Communications', 'avatar' => $img . 'hero-workers.jpg' ), 'image' => $img . 'news-training.jpg', 'pullquote' => 'Diskusi panel dengan pakar teknik sipil mengenai pemilihan jenis baja yang tahan korosi untuk lingkungan pesisir dan proyek.', 'section1_title' => 'Gambaran Webinar', 'section1_p1' => 'Bergabunglah dengan pakar industri kami dalam webinar mendalam yang mengeksplorasi inovasi terbaru dalam material tahan korosi untuk proyek infrastruktur pesisir dan laut.', 'section1_p2' => 'Topik meliputi teknologi coating canggih, aplikasi stainless steel duplex, dan analisis biaya siklus hidup untuk proyek konstruksi pesisir.', 'features_title' => 'Sorotan Sesi', 'features' => array( array( 'icon' => 'check', 'title' => 'Diskusi Panel Ahli', 'desc' => 'Insinyur sipil terkemuka membahas praktik terbaik pemilihan material untuk lingkungan keras.' ), array( 'icon' => 'robot', 'title' => 'Presentasi Studi Kasus', 'desc' => 'Contoh nyata kinerja material dalam proyek pesisir Indonesia.' ), array( 'icon' => 'analytics', 'title' => 'Sesi Tanya Jawab', 'desc' => 'Sesi interaktif bagi peserta untuk bertanya kepada tim teknis kami.' ) ), 'section2_title' => 'Pendaftaran', 'section2_p1' => 'Daftar sekarang untuk mengamankan tempat Anda. Terbatas untuk 500 peserta.', 'quote' => 'Berbagi pengetahuan mendorong inovasi industri dan standar keselamatan ke depan.', 'quote_author' => 'DIVISI TEKNIK, PT FITRA PERKASA INTI', 'section2_p2' => 'Rekaman sesi akan tersedia di website kami setelah acara.', 'event_badge' => array( 'day' => '15', 'month' => 'JUL' ) ),
        ),

        'laporan-keberlanjutan-2023-komitmen-net-zero' => array(
            'en' => array( 'slug' => 'laporan-keberlanjutan-2023-komitmen-net-zero', 'type' => 'berita', 'category' => 'SUSTAINABILITY', 'date' => 'APR 25, 2024', 'badge' => 'NEWS', 'meta_left' => '25 APR 2024', 'title' => 'Sustainability Report 2023: Fitra Perkasa Net Zero Commitment', 'desc' => 'Comprehensive review of company efforts to reduce carbon footprint throughout transportation and packaging processes.', 'author' => array( 'name' => 'Tim Editorial', 'role' => 'Corporate Communications', 'avatar' => $img . 'hero-workers.jpg' ), 'image' => $img . 'product-steels.jpg', 'pullquote' => 'Comprehensive review of company efforts to reduce carbon footprint throughout transportation and packaging processes.', 'section1_title' => 'Our Green Commitment', 'section1_p1' => 'PT Fitra Perkasa Inti has made significant strides in reducing our environmental footprint across all operational areas including material sourcing, transportation, and warehousing.', 'section1_p2' => 'Our 2023 Sustainability Report details a 22% reduction in carbon emissions compared to the previous year.', 'features_title' => 'Key Achievements', 'features' => array( array( 'icon' => 'check', 'title' => 'Carbon Reduction', 'desc' => '22% year-on-year reduction in carbon emissions across our supply chain.' ), array( 'icon' => 'robot', 'title' => 'Sustainable Packaging', 'desc' => 'Transition to 100% recyclable packaging materials for all product shipments.' ), array( 'icon' => 'analytics', 'title' => 'Energy Efficiency', 'desc' => 'Solar panel installation at our main warehouse covering 40% of energy needs.' ) ), 'section2_title' => 'Looking Ahead', 'section2_p1' => 'We are committed to achieving net-zero carbon emissions by 2040 through continued investment in green technologies.', 'quote' => 'Sustainability is not just a goal — it is a responsibility we owe to future generations.', 'quote_author' => 'CEO, PT FITRA PERKASA INTI', 'section2_p2' => 'Our next sustainability report will include Scope 3 emissions tracking across our entire supplier network.', 'event_badge' => null ),
            'id' => array( 'slug' => 'laporan-keberlanjutan-2023-komitmen-net-zero', 'type' => 'berita', 'category' => 'KEBERLANJUTAN', 'date' => '25 APR 2024', 'badge' => 'BERITA', 'meta_left' => '25 APR 2024', 'title' => 'Laporan Keberlanjutan 2023: Komitmen Net Zero Fitra Perkasa', 'desc' => 'Tinjauan komprehensif mengenai upaya perusahaan dalam mengurangi jejak karbon selama proses transportasi dan pengemasan.', 'author' => array( 'name' => 'Tim Editorial', 'role' => 'Corporate Communications', 'avatar' => $img . 'hero-workers.jpg' ), 'image' => $img . 'product-steels.jpg', 'pullquote' => 'Tinjauan komprehensif mengenai upaya perusahaan dalam mengurangi jejak karbon selama proses transportasi dan pengemasan.', 'section1_title' => 'Komitmen Hijau Kami', 'section1_p1' => 'PT Fitra Perkasa Inti telah membuat langkah signifikan dalam mengurangi jejak lingkungan di semua area operasional termasuk pengadaan material, transportasi, dan pergudangan.', 'section1_p2' => 'Laporan Keberlanjutan 2023 kami merinci pengurangan emisi karbon sebesar 22% dibandingkan tahun sebelumnya.', 'features_title' => 'Pencapaian Utama', 'features' => array( array( 'icon' => 'check', 'title' => 'Pengurangan Karbon', 'desc' => 'Pengurangan emisi karbon 22% year-on-year di seluruh rantai pasok kami.' ), array( 'icon' => 'robot', 'title' => 'Pengemasan Berkelanjutan', 'desc' => 'Transisi ke material pengemasan 100% dapat didaur ulang untuk semua pengiriman produk.' ), array( 'icon' => 'analytics', 'title' => 'Efisiensi Energi', 'desc' => 'Instalasi panel surya di gudang utama mencakup 40% kebutuhan energi.' ) ), 'section2_title' => 'Melihat ke Depan', 'section2_p1' => 'Kami berkomitmen mencapai emisi karbon net-zero pada 2040 melalui investasi berkelanjutan dalam teknologi hijau.', 'quote' => 'Keberlanjutan bukan sekadar tujuan — ini adalah tanggung jawab yang kita miliki terhadap generasi mendatang.', 'quote_author' => 'CEO, PT FITRA PERKASA INTI', 'section2_p2' => 'Laporan keberlanjutan kami berikutnya akan mencakup pelacakan emisi Scope 3 di seluruh jaringan pemasok.', 'event_badge' => null ),
        ),

        'forum-pemimpin-industri-logistik-asia-2024' => array(
            'en' => array( 'slug' => 'forum-pemimpin-industri-logistik-asia-2024', 'type' => 'acara', 'category' => 'INDUSTRY EVENTS', 'date' => 'MAR 18, 2024', 'badge' => 'EVENT', 'meta_left' => 'SINGAPORE TECH CENTER', 'title' => 'Asia Logistics Industry Leaders Forum 2024', 'desc' => 'Exclusive C-suite meeting discussing global supply chain resilience and the future of commodity trade in Asia.', 'author' => array( 'name' => 'Tim Editorial', 'role' => 'Corporate Communications', 'avatar' => $img . 'hero-workers.jpg' ), 'image' => $img . 'hero-workers.jpg', 'pullquote' => 'Exclusive C-suite meeting discussing global supply chain resilience and the future of commodity trade in Asia.', 'section1_title' => 'Forum Overview', 'section1_p1' => 'The Asia Logistics Industry Leaders Forum brings together C-level executives from across the region to discuss supply chain challenges and opportunities in the evolving global trade landscape.', 'section1_p2' => 'PT Fitra Perkasa Inti participated as a key delegate, sharing insights on Indonesian archipelago logistics management.', 'features_title' => 'Discussion Topics', 'features' => array( array( 'icon' => 'check', 'title' => 'Geopolitical Trade Impacts', 'desc' => 'Analysis of tariff shifts and subsidy structures on worldwide commodity procurement rates.' ), array( 'icon' => 'robot', 'title' => 'Autonomous Warehousing Tech', 'desc' => 'Inspection drones and robotic automated guided vehicles in major transshipment hub terminals.' ), array( 'icon' => 'analytics', 'title' => 'ASEAN Multilateral Partnerships', 'desc' => 'Forging regional coalitions to accelerate friction-free cross-border cargo transit across member states.' ) ), 'section2_title' => 'Conference Outcomes', 'section2_p1' => 'The PT Fitra Perkasa Inti delegation presented operational strategies from the Indonesian archipelago on maintaining remote-site logistics uninterrupted.', 'quote' => 'Connectivity and trust are the foundational pillars sustaining Asia\'s industrial supply network.', 'quote_author' => 'COMMUNITY LEAD, ASIA LOGISTICS COUNCIL', 'section2_p2' => 'The summit\'s advisory recommendations will feed directly into the 2025 Asian Manufacturing Logistics Roadmap.', 'event_badge' => array( 'day' => '18', 'month' => 'MAR' ) ),
            'id' => array( 'slug' => 'forum-pemimpin-industri-logistik-asia-2024', 'type' => 'acara', 'category' => 'ACARA INDUSTRI', 'date' => '18 MAR 2024', 'badge' => 'ACARA', 'meta_left' => 'SINGAPORE TECH CENTER', 'title' => 'Forum Pemimpin Industri Logistik Asia 2024', 'desc' => 'Pertemuan eksklusif tingkat C-suite untuk membahas ketahanan rantai pasok global dan masa depan perdagangan komoditas di Asia.', 'author' => array( 'name' => 'Tim Editorial', 'role' => 'Corporate Communications', 'avatar' => $img . 'hero-workers.jpg' ), 'image' => $img . 'hero-workers.jpg', 'pullquote' => 'Pertemuan eksklusif tingkat C-suite untuk membahas ketahanan rantai pasok global dan masa depan perdagangan komoditas di Asia.', 'section1_title' => 'Gambaran Forum', 'section1_p1' => 'Forum Pemimpin Industri Logistik Asia mempertemukan eksekutif C-level dari seluruh kawasan untuk membahas tantangan dan peluang rantai pasok dalam lanskap perdagangan global yang berevolusi.', 'section1_p2' => 'PT Fitra Perkasa Inti berpartisipasi sebagai delegasi utama, berbagi wawasan tentang manajemen logistik kepulauan Indonesia.', 'features_title' => 'Topik Diskusi', 'features' => array( array( 'icon' => 'check', 'title' => 'Dampak Perdagangan Geopolitik', 'desc' => 'Analisis dampak tarif impor dan kebijakan subsidi energi terhadap harga komoditas konstruksi internasional.' ), array( 'icon' => 'robot', 'title' => 'Otomasi Pergudangan Mandiri', 'desc' => 'Penerapan drone inspeksi inventori dan robotic pallet truck di pelabuhan transshipment modern.' ), array( 'icon' => 'analytics', 'title' => 'Kemitraan Multilateral ASEAN', 'desc' => 'Membangun konsorsium regional untuk percepatan arus barang bebas hambatan antar negara anggota ASEAN.' ) ), 'section2_title' => 'Partisipasi & Hasil Konferensi', 'section2_p1' => 'Delegasi PT Fitra Perkasa Inti aktif membagikan pengalaman operasional di kepulauan Indonesia dalam menjaga kelancaran distribusi proyek terpencil.', 'quote' => 'Konektivitas dan kepercayaan adalah dua pilar terpenting dalam menjaga rantai pasok industri Asia tetap tangguh.', 'quote_author' => 'KETUA KOMUNITAS, DEWAN LOGISTIK ASIA', 'section2_p2' => 'Hasil rekomendasi forum akan dituangkan dalam roadmap ketahanan logistik industri manufaktur Asia 2025.', 'event_badge' => array( 'day' => '18', 'month' => 'MAR' ) ),
        ),
    );
}
