<?php
/**
 * Template Name: Events & News Page
 * Template for News & Events (Berita & Acara Terkini)
 *
 * @package FitraPerkasa
 */

get_header();

$img = get_template_directory_uri() . '/assets/images/';

// News & Events Data with bilingual support
$featured_item = array(
    'slug'        => 'implementasi-teknologi-presisi-tinggi',
    'category'    => 'berita',
    'badge'       => fitra_t_val( 'MAIN HIGHLIGHT', 'SOROTAN UTAMA' ),
    'date'        => fitra_t_val( 'MAY 12, 2024', '12 MEI 2024' ),
    'title'       => fitra_t_val( 'Implementation of High-Precision Technology in International Steel Distribution', 'Implementasi Teknologi Presisi Tinggi pada Distribusi Baja Internasional' ),
    'desc'        => fitra_t_val( 'PT Fitra Perkasa Inti officially integrates a real-time tracking system for all heavy construction material shipments to ensure global on-time delivery.', 'PT Fitra Perkasa Inti secara resmi mengintegrasikan sistem pelacakan berbasis real-time untuk seluruh pengiriman material konstruksi berat guna menjamin ketepatan waktu pengiriman global.' ),
    'image'       => $img . 'factory-operations.jpg',
    'link'        => home_url( '/news/implementasi-teknologi-presisi-tinggi/' ),
    'link_text'   => fitra_t_val( 'READ MORE', 'BACA SELENGKAPNYA' ),
);

$articles = array(
    array(
        'id'          => 1,
        'slug'        => 'standar-baru-sertifikasi-kualitas',
        'type'        => 'berita',
        'badge'       => fitra_t_val( 'NEWS', 'BERITA' ),
        'meta_left'   => fitra_t_val( '08 MAY 2024', '08 MEI 2024' ),
        'title'       => fitra_t_val( 'New Quality Certification Standards for Industrial Gas Pipes', 'Standar Baru Sertifikasi Kualitas untuk Pipa Industri Gas' ),
        'desc'        => fitra_t_val( 'We recently updated our technical inspection protocols to meet the latest ISO standards in energy infrastructure distribution.', 'Kami baru saja memperbarui protokol inspeksi teknis kami untuk memenuhi standar ISO terbaru dalam distribusi infrastruktur energi.' ),
        'image'       => $img . 'product-pipes.jpg',
        'link'        => home_url( '/news/standar-baru-sertifikasi-kualitas/' ),
        'link_text'   => fitra_t_val( 'Read More', 'Baca Selengkapnya' ),
        'event_badge' => null,
    ),
    array(
        'id'          => 2,
        'slug'        => 'metal-steel-indonesia-2024',
        'type'        => 'acara',
        'badge'       => fitra_t_val( 'EVENT', 'ACARA' ),
        'meta_left'   => 'JAKARTA EXPO CENTER',
        'title'       => fitra_t_val( 'Metal & Steel Indonesia 2024: Annual Industrial Exhibition', 'Metal & Steel Indonesia 2024: Pameran Industri Tahunan' ),
        'desc'        => fitra_t_val( 'Join our team of experts at Booth A12 for in-depth discussions regarding material procurement solutions for construction projects.', 'Bergabunglah dengan tim ahli kami di Booth A12 untuk diskusi mendalam mengenai solusi pengadaan material untuk proyek konstruksi.' ),
        'image'       => $img . 'news-workshop.jpg',
        'link'        => home_url( '/news/metal-steel-indonesia-2024/' ),
        'link_text'   => fitra_t_val( 'Read More', 'Baca Selengkapnya' ),
        'event_badge' => array( 'day' => '24', 'month' => 'JUN' ),
    ),
    array(
        'id'          => 3,
        'slug'        => 'ekspansi-jaringan-logistik-timur-tengah',
        'type'        => 'berita',
        'badge'       => fitra_t_val( 'NEWS', 'BERITA' ),
        'meta_left'   => fitra_t_val( '02 MAY 2024', '02 MEI 2024' ),
        'title'       => fitra_t_val( 'Expansion of Logistics Network to the Middle East Region', 'Ekspansi Jaringan Logistik ke Wilayah Timur Tengah' ),
        'desc'        => fitra_t_val( 'PT Fitra Perkasa Inti strengthens strategic partnerships with major port operators to accelerate material transit times.', 'PT Fitra Perkasa Inti memperkuat kemitraan strategis dengan operator pelabuhan utama untuk mempercepat waktu transit material.' ),
        'image'       => $img . 'hero-port-crane.jpg',
        'link'        => home_url( '/news/ekspansi-jaringan-logistik-timur-tengah/' ),
        'link_text'   => fitra_t_val( 'Read More', 'Baca Selengkapnya' ),
        'event_badge' => null,
    ),
    array(
        'id'          => 4,
        'slug'        => 'webinar-inovasi-material-infrastruktur',
        'type'        => 'acara',
        'badge'       => fitra_t_val( 'EVENT', 'ACARA' ),
        'meta_left'   => 'VIRTUAL WEBINAR',
        'title'       => fitra_t_val( 'Webinar: Material Innovation for Sustainable Infrastructure', 'Webinar: Inovasi Material untuk Infrastruktur Berkelanjutan' ),
        'desc'        => fitra_t_val( 'Panel discussion with civil engineering experts on the selection of corrosion-resistant steel types for coastal environments.', 'Diskusi panel dengan pakar teknik sipil mengenai pemilihan jenis baja yang tahan korosi untuk lingkungan pesisir dan proyek.' ),
        'image'       => $img . 'news-training.jpg',
        'link'        => home_url( '/news/webinar-inovasi-material-infrastruktur/' ),
        'link_text'   => fitra_t_val( 'Read More', 'Baca Selengkapnya' ),
        'event_badge' => array( 'day' => '15', 'month' => 'JUL' ),
    ),
    array(
        'id'          => 5,
        'slug'        => 'laporan-keberlanjutan-2023-komitmen-net-zero',
        'type'        => 'berita',
        'badge'       => fitra_t_val( 'NEWS', 'BERITA' ),
        'meta_left'   => fitra_t_val( '25 APR 2024', '25 APR 2024' ),
        'title'       => fitra_t_val( 'Sustainability Report 2023: Fitra Perkasa Net Zero Commitment', 'Laporan Keberlanjutan 2023: Komitmen Net Zero Fitra Perkasa' ),
        'desc'        => fitra_t_val( 'Comprehensive review of company efforts to reduce carbon footprint throughout transportation and packaging processes.', 'Tinjauan komprehensif mengenai upaya perusahaan dalam mengurangi jejak karbon selama proses transportasi dan pengemasan.' ),
        'image'       => $img . 'product-steels.jpg',
        'link'        => home_url( '/news/laporan-keberlanjutan-2023-komitmen-net-zero/' ),
        'link_text'   => fitra_t_val( 'Read More', 'Baca Selengkapnya' ),
        'event_badge' => null,
    ),
    array(
        'id'          => 6,
        'slug'        => 'forum-pemimpin-industri-logistik-asia-2024',
        'type'        => 'acara',
        'badge'       => fitra_t_val( 'EVENT', 'ACARA' ),
        'meta_left'   => 'SINGAPORE TECH CENTER',
        'title'       => fitra_t_val( 'Asia Logistics Industry Leaders Forum 2024', 'Forum Pemimpin Industri Logistik Asia 2024' ),
        'desc'        => fitra_t_val( 'Exclusive C-suite meeting discussing global supply chain resilience and the future of commodity trade in Asia.', 'Pertemuan eksklusif tingkat C-suite untuk membahas ketahanan rantai pasok global dan masa depan perdagangan komoditas di Asia.' ),
        'image'       => $img . 'hero-workers.jpg',
        'link'        => home_url( '/news/forum-pemimpin-industri-logistik-asia-2024/' ),
        'link_text'   => fitra_t_val( 'Read More', 'Baca Selengkapnya' ),
        'event_badge' => array( 'day' => '05', 'month' => fitra_t_val( 'AUG', 'AGT' ) ),
    ),
    array(
        'id'          => 7,
        'slug'        => 'modernisasi-kalibrasi-katup-pengaman',
        'type'        => 'berita',
        'badge'       => fitra_t_val( 'NEWS', 'BERITA' ),
        'meta_left'   => fitra_t_val( '18 APR 2024', '18 APR 2024' ),
        'title'       => fitra_t_val( 'Modernization of High-Pressure Safety Valve Calibration System', 'Modernisasi Sistem Kalibrasi Katup Pengaman Tekanan Tinggi' ),
        'desc'        => fitra_t_val( 'Application of ASME Section VIII standards for periodic testing certification of relief valves across oil & gas client facilities.', 'Penerapan standar ASME Section VIII untuk sertifikasi berkala pengujian relief valve di seluruh fasilitas klien migas.' ),
        'image'       => $img . 'svc-instrument.jpg',
        'link'        => home_url( '/news/modernisasi-kalibrasi-katup-pengaman/' ),
        'link_text'   => fitra_t_val( 'Read More', 'Baca Selengkapnya' ),
        'event_badge' => null,
    ),
    array(
        'id'          => 8,
        'slug'        => 'workshop-pemeliharaan-gearbox',
        'type'        => 'acara',
        'badge'       => fitra_t_val( 'EVENT', 'ACARA' ),
        'meta_left'   => 'BALIKPAPAN WORKSHOP',
        'title'       => fitra_t_val( 'Gearbox & Drive Transmission Maintenance Engineering Workshop', 'Workshop Teknik Pemeliharaan Gearbox & Drive Transmission' ),
        'desc'        => fitra_t_val( 'Intensive 2-day training session on laser alignment techniques, vibration analysis, and precision industrial gearbox lubrication.', 'Sesi pelatihan intensif 2 hari mengenai teknik alignment laser, analisis getaran getaran, dan pelumasan presisi gearbox industri.' ),
        'image'       => $img . 'gearbox-gallery-1.jpg',
        'link'        => home_url( '/news/workshop-pemeliharaan-gearbox/' ),
        'link_text'   => fitra_t_val( 'Read More', 'Baca Selengkapnya' ),
        'event_badge' => array( 'day' => '12', 'month' => 'SEP' ),
    ),
    array(
        'id'          => 9,
        'slug'        => 'penghargaan-k3-zero-accident',
        'type'        => 'berita',
        'badge'       => fitra_t_val( 'NEWS', 'BERITA' ),
        'meta_left'   => fitra_t_val( '04 APR 2024', '04 APR 2024' ),
        'title'       => fitra_t_val( 'Zero Accident Occupational Health & Safety (K3) Award 2023', 'Penghargaan Kinerja Keselamatan Kerja Zero Accident K3 2023' ),
        'desc'        => fitra_t_val( 'PT Fitra Perkasa Inti once again achieves zero work accidents recognition for strict OHSMS implementation across all project sites.', 'PT Fitra Perkasa Inti kembali meraih predikat nihil kecelakaan kerja atas komitmen implementasi SMK3 ketat di seluruh site proyek.' ),
        'image'       => $img . 'news-construction.jpg',
        'link'        => home_url( '/news/penghargaan-k3-zero-accident/' ),
        'link_text'   => fitra_t_val( 'Read More', 'Baca Selengkapnya' ),
        'event_badge' => null,
    ),
    array(
        'id'          => 10,
        'slug'        => 'simposium-ketahanan-energi-nasional',
        'type'        => 'acara',
        'badge'       => fitra_t_val( 'EVENT', 'ACARA' ),
        'meta_left'   => 'SURABAYA CONVENTION HALL',
        'title'       => fitra_t_val( 'National Energy Resilience Symposium 2024', 'Simposium Ketahanan Energi Nasional 2024' ),
        'desc'        => fitra_t_val( 'Bringing together policy makers and EPC contractors to formulate piping supply chain and machinery integration in oil & gas.', 'Menghadirkan pemangku kebijakan dan kontraktor EPC untuk merumuskan integrasi rantai pasok pipa dan permesinan sektor migas.' ),
        'image'       => $img . 'hero-bg.jpg',
        'link'        => home_url( '/news/simposium-ketahanan-energi-nasional/' ),
        'link_text'   => fitra_t_val( 'Read More', 'Baca Selengkapnya' ),
        'event_badge' => array( 'day' => '28', 'month' => fitra_t_val( 'OCT', 'OKT' ) ),
    ),
    array(
        'id'          => 11,
        'slug'        => 'penguatan-pasokan-bahan-bakar-industri',
        'type'        => 'berita',
        'badge'       => fitra_t_val( 'NEWS', 'BERITA' ),
        'meta_left'   => fitra_t_val( '22 MAR 2024', '22 MAR 2024' ),
        'title'       => fitra_t_val( 'Strengthening Oil & Gas Standard Industrial Fuel Supply in Kalimantan', 'Penguatan Pasokan Bahan Bakar Industri Standar MIGAS di Kalimantan' ),
        'desc'        => fitra_t_val( 'New distribution fleet equipped with certified digital flowmeters to serve heavy mining equipment fueling needs.', 'Armada distribusi baru difasilitasi flowmeter digital tersertifikasi untuk melayani kebutuhan armada alat berat pertambangan.' ),
        'image'       => $img . 'product-fuel-migas.jpg',
        'link'        => home_url( '/news/penguatan-pasokan-bahan-bakar-industri/' ),
        'link_text'   => fitra_t_val( 'Read More', 'Baca Selengkapnya' ),
        'event_badge' => null,
    ),
    array(
        'id'          => 12,
        'slug'        => 'webinar-sizing-seleksi-gasket',
        'type'        => 'acara',
        'badge'       => fitra_t_val( 'EVENT', 'ACARA' ),
        'meta_left'   => 'VIRTUAL SEMINAR',
        'title'       => fitra_t_val( 'Webinar: Gasket Sizing & Selection for Extreme Environments', 'Webinar Sizing & Seleksi Gasket untuk Lingkungan Ekstrim' ),
        'desc'        => fitra_t_val( 'Practical guide for engineers selecting spiral wound vs ring joint gaskets based on ASME B16.20 ratings and operating temperatures.', 'Panduan praktis engineers memilih spiral wound vs ring joint gasket berdasarkan rating ASME B16.20 dan temperatur operasi.' ),
        'image'       => $img . 'product-gasket-bearing.jpg',
        'link'        => home_url( '/news/webinar-sizing-seleksi-gasket/' ),
        'link_text'   => fitra_t_val( 'Read More', 'Baca Selengkapnya' ),
        'event_badge' => array( 'day' => '14', 'month' => 'NOV' ),
    ),
);

// Fetch real posts from WordPress database (supports Polylang active language)
$current_lang = fitra_get_lang();
$wp_posts_query = new WP_Query( array(
    'post_type'      => 'post',
    'post_status'    => 'publish',
    'posts_per_page' => 12,
    'lang'           => $current_lang,
) );

$db_articles = array();
if ( $wp_posts_query->have_posts() ) {
    while ( $wp_posts_query->have_posts() ) {
        $wp_posts_query->the_post();
        $pid       = get_the_ID();
        $thumb_url = get_the_post_thumbnail_url( $pid, 'large' ) ?: ( $img . 'news-workshop.jpg' );
        $cats      = get_the_category( $pid );
        $cat_name  = ! empty( $cats ) ? $cats[0]->name : fitra_t_val( 'NEWS', 'BERITA' );
        $is_event  = ( stripos( $cat_name, 'event' ) !== false || stripos( $cat_name, 'acara' ) !== false );

        $db_articles[] = array(
            'id'          => $pid,
            'slug'        => get_post_field( 'post_name', $pid ),
            'type'        => $is_event ? 'acara' : 'berita',
            'badge'       => strtoupper( $cat_name ),
            'meta_left'   => get_the_date( 'd M Y' ),
            'title'       => get_the_title(),
            'desc'        => get_the_excerpt() ?: wp_trim_words( wp_strip_all_tags( get_the_content() ), 20 ),
            'image'       => $thumb_url,
            'link'        => get_permalink(),
            'link_text'   => fitra_t_val( 'Read More', 'Baca Selengkapnya' ),
            'event_badge' => $is_event ? array( 'day' => get_the_date( 'd' ), 'month' => strtoupper( get_the_date( 'M' ) ) ) : null,
        );
    }
    wp_reset_postdata();
}

if ( ! empty( $db_articles ) ) {
    $articles = array_merge( $db_articles, $articles );
}
?>

<main class="news-page" id="news-page">

  <!-- ===== NEWS HEADER / TITLE SECTION ===== -->
  <section class="news-hero">
    <div class="news-container">
      <div class="news-hero__kicker"><?php echo esc_html( fitra_t_val( 'INFORMATION CENTER', 'PUSAT INFORMASI' ) ); ?></div>
      <h1 class="news-hero__title"><?php echo esc_html( fitra_t_val( 'Latest News & Events', 'Berita & Acara Terkini' ) ); ?></h1>

      <div class="news-hero__sub-bar">
        <p class="news-hero__desc">
          <?php echo esc_html( fitra_t_val( 'Follow the latest developments in the global metal industry, technical innovations, and international trade show agendas with PT Fitra Perkasa Inti.', 'Ikuti perkembangan terbaru di industri logam global, inovasi teknis, dan agenda pameran industri internasional bersama PT Fitra Perkasa Inti.' ) ); ?>
        </p>

        <!-- Category Filter Tabs -->
        <div class="news-tabs" id="news-tabs">
          <button type="button" class="news-tab news-tab--active" data-filter="all"><?php echo esc_html( fitra_t_val( 'All', 'Semua' ) ); ?></button>
          <button type="button" class="news-tab" data-filter="berita"><?php echo esc_html( fitra_t_val( 'News', 'Berita' ) ); ?></button>
          <button type="button" class="news-tab" data-filter="acara"><?php echo esc_html( fitra_t_val( 'Events', 'Acara' ) ); ?></button>
        </div>
      </div>

      <!-- Search Bar -->
      <div class="news-search">
        <form class="news-search__form" id="news-search-form" onsubmit="return false;">
          <div class="news-search__icon">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <circle cx="11" cy="11" r="8"></circle>
              <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
            </svg>
          </div>
          <input type="text" class="news-search__input" id="news-search-input" placeholder="<?php echo esc_attr( fitra_t_val( 'Search news...', 'Cari berita...' ) ); ?>" autocomplete="off" aria-label="<?php echo esc_attr( fitra_t_val( 'Search news or events', 'Cari berita atau acara' ) ); ?>">
          <button type="submit" class="news-search__btn" id="news-search-btn"><?php echo esc_html( fitra_t_val( 'Search', 'Cari' ) ); ?></button>
        </form>
      </div>
    </div>
  </section>

  <!-- ===== FEATURED ARTICLE (SOROTAN UTAMA) ===== -->
  <section class="news-featured-section" id="news-featured-section">
    <div class="news-container">
      <article class="news-featured" data-type="<?php echo esc_attr( $featured_item['category'] ); ?>" data-title="<?php echo esc_attr( strtolower( $featured_item['title'] ) ); ?>" data-desc="<?php echo esc_attr( strtolower( $featured_item['desc'] ) ); ?>">
        <div class="news-featured__media">
          <a href="<?php echo esc_url( $featured_item['link'] ); ?>">
            <img src="<?php echo esc_url( $featured_item['image'] ); ?>" alt="<?php echo esc_attr( $featured_item['title'] ); ?>" loading="lazy">
          </a>
        </div>
        <div class="news-featured__content">
          <div class="news-featured__meta">
            <span class="news-badge-primary"><?php echo esc_html( $featured_item['badge'] ); ?></span>
            <time class="news-featured__date"><?php echo esc_html( $featured_item['date'] ); ?></time>
          </div>
          <h2 class="news-featured__title">
            <a href="<?php echo esc_url( $featured_item['link'] ); ?>"><?php echo esc_html( $featured_item['title'] ); ?></a>
          </h2>
          <p class="news-featured__desc"><?php echo esc_html( $featured_item['desc'] ); ?></p>
          <a href="<?php echo esc_url( $featured_item['link'] ); ?>" class="news-featured__link">
            <?php echo esc_html( $featured_item['link_text'] ); ?> &nbsp;&rarr;
          </a>
        </div>
      </article>
    </div>
  </section>

  <!-- ===== ARTICLES & EVENTS GRID ===== -->
  <section class="news-grid-section">
    <div class="news-container">
      <div class="news-grid" id="news-grid">
        <?php foreach ( $articles as $article ) : ?>
        <article class="news-card" data-id="<?php echo esc_attr( $article['id'] ); ?>" data-type="<?php echo esc_attr( $article['type'] ); ?>" data-title="<?php echo esc_attr( strtolower( $article['title'] ) ); ?>" data-desc="<?php echo esc_attr( strtolower( $article['desc'] ) ); ?>" data-meta="<?php echo esc_attr( strtolower( $article['meta_left'] ) ); ?>">
          
          <div class="news-card__media">
            <a href="<?php echo esc_url( $article['link'] ); ?>">
              <img src="<?php echo esc_url( $article['image'] ); ?>" alt="<?php echo esc_attr( $article['title'] ); ?>" loading="lazy">
            </a>
            
            <?php if ( ! empty( $article['event_badge'] ) ) : ?>
            <div class="news-card__event-badge">
              <span class="news-card__event-day"><?php echo esc_html( $article['event_badge']['day'] ); ?></span>
              <span class="news-card__event-month"><?php echo esc_html( $article['event_badge']['month'] ); ?></span>
            </div>
            <?php endif; ?>
          </div>

          <div class="news-card__body">
            <div class="news-card__meta">
              <span class="news-card__location"><?php echo esc_html( $article['meta_left'] ); ?></span>
              <span class="news-card__type-tag"><?php echo esc_html( $article['badge'] ); ?></span>
            </div>

            <h3 class="news-card__title">
              <a href="<?php echo esc_url( $article['link'] ); ?>"><?php echo esc_html( $article['title'] ); ?></a>
            </h3>

            <p class="news-card__desc"><?php echo esc_html( $article['desc'] ); ?></p>

            <div class="news-card__action">
              <a href="<?php echo esc_url( $article['link'] ); ?>" class="news-card__link"><?php echo esc_html( $article['link_text'] ); ?> &nbsp;&rarr;</a>
            </div>
          </div>

        </article>
        <?php endforeach; ?>
      </div>

      <!-- No results state (hidden by default) -->
      <div class="news-empty" id="news-empty" style="display: none;">
        <div class="news-empty__icon">
          <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="11" cy="11" r="8"></circle>
            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
            <line x1="8" y1="11" x2="14" y2="11"></line>
          </svg>
        </div>
        <h3 class="news-empty__title"><?php echo esc_html( fitra_t_val( 'No Results Found', 'Tidak Ada Hasil Ditemukan' ) ); ?></h3>
        <p class="news-empty__desc"><?php echo esc_html( fitra_t_val( 'Try another search keyword or select the All category.', 'Coba kata kunci pencarian lain atau pilih kategori Semua.' ) ); ?></p>
        <button type="button" class="news-empty__btn" id="news-reset-btn"><?php echo esc_html( fitra_t_val( 'Reset Filter', 'Reset Filter' ) ); ?></button>
      </div>

      <!-- ===== NEWS & EVENTS PAGINATION BAR ===== -->
      <nav class="news-pagination products-pagination" id="news-pagination" aria-label="<?php echo esc_attr( fitra_t_val( 'News & Events Pagination', 'Navigasi Halaman Berita & Acara' ) ); ?>">
        <div class="products-pagination__inner news-pagination__inner">
          <button type="button" class="products-pagination__btn products-pagination__btn--prev news-page-btn--nav news-page-btn--prev" id="news-prev-btn" aria-label="<?php echo esc_attr( fitra_t_val( 'Previous Page', 'Halaman Sebelumnya' ) ); ?>" disabled>
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
              <polyline points="15 18 9 12 15 6"></polyline>
            </svg>
            <span><?php echo fitra_t_val( 'PREV', 'SEBELUMNYA' ); ?></span>
          </button>
          <div class="products-pagination__pages news-page-numbers" id="news-page-numbers">
            <button type="button" class="products-pagination__page products-pagination__page--active news-page-btn news-page-btn--active" data-page="1">1</button>
            <button type="button" class="products-pagination__page news-page-btn" data-page="2">2</button>
          </div>
          <button type="button" class="products-pagination__btn products-pagination__btn--next news-page-btn--nav news-page-btn--next" id="news-next-btn" aria-label="<?php echo esc_attr( fitra_t_val( 'Next Page', 'Halaman Berikutnya' ) ); ?>">
            <span><?php echo fitra_t_val( 'NEXT', 'SELANJUTNYA' ); ?></span>
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
              <polyline points="9 18 15 12 9 6"></polyline>
            </svg>
          </button>
        </div>
        <div class="products-pagination__info news-pagination__info" id="news-pagination-info">
          <?php echo fitra_t_val( 'Showing <span id="news-showing-count">1-6</span> of <span id="news-total-count">' . count( $articles ) . '</span> articles', 'Menampilkan <span id="news-showing-count">1-6</span> dari <span id="news-total-count">' . count( $articles ) . '</span> artikel' ); ?>
        </div>
      </nav>
    </div>
  </section>

</main>

<?php
get_footer();
