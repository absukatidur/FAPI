<?php
/**
 * Template Name: News & Event Detail Page
 * Template for viewing a single news article or event
 *
 * @package FitraPerkasa
 */

get_header();

// Determine slug from URL
$page_slug = get_post_field( 'post_name', get_post() );
if ( empty( $page_slug ) || in_array( $page_slug, array( 'news', 'events-news', 'berita' ), true ) ) {
    $request_uri = trim( parse_url( $_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH ), '/' );
    $parts = explode( '/', $request_uri );
    $news_indexes = array( 'news', 'events-news', 'event-news', 'berita', 'berita-acara' );
    foreach ( $parts as $idx => $part ) {
        if ( in_array( strtolower( $part ), $news_indexes, true ) && isset( $parts[ $idx + 1 ] ) && ! empty( $parts[ $idx + 1 ] ) ) {
            $page_slug = sanitize_title( $parts[ $idx + 1 ] );
            break;
        }
    }
    if ( empty( $page_slug ) && count( $parts ) >= 2 ) {
        $page_slug = sanitize_title( end( $parts ) );
    }
}

// Fallback to query parameter ?id= or ?slug=
if ( isset( $_GET['slug'] ) ) {
    $page_slug = sanitize_title( $_GET['slug'] );
}

$article = fitra_get_news_article( $page_slug );
$img = get_template_directory_uri() . '/assets/images/';
?>

<main class="news-detail-page" id="news-detail-page">
  <div class="news-container">

    <!-- Back to News Navigation Link -->
    <div class="nd-back">
      <a href="<?php echo esc_url( home_url( '/news/' ) ); ?>" class="nd-back__link">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
          <line x1="19" y1="12" x2="5" y2="12"></line>
          <polyline points="12 19 5 12 12 5"></polyline>
        </svg>
        <span><?php echo esc_html( fitra_t_val( 'Back to News', 'Kembali ke Berita' ) ); ?></span>
      </a>
    </div>

    <!-- Article Header -->
    <header class="nd-header">
      <div class="nd-header__meta">
        <span class="nd-header__category"><?php echo esc_html( $article['category'] ); ?></span>
        <span class="nd-header__sep">&bull;</span>
        <time class="nd-header__date"><?php echo esc_html( $article['date'] ); ?></time>
      </div>

      <h1 class="nd-header__title"><?php echo esc_html( $article['title'] ); ?></h1>

      <div class="nd-author">
        <div class="nd-author__avatar">
          <img src="<?php echo esc_url( $article['author']['avatar'] ); ?>" alt="<?php echo esc_attr( $article['author']['name'] ); ?>">
        </div>
        <div class="nd-author__info">
          <span class="nd-author__name"><?php echo esc_html( $article['author']['name'] ); ?></span>
          <span class="nd-author__role"><?php echo esc_html( $article['author']['role'] ); ?></span>
        </div>
      </div>
    </header>

    <!-- Large Hero Image Banner -->
    <div class="nd-hero-media">
      <img src="<?php echo esc_url( $article['image'] ); ?>" alt="<?php echo esc_attr( $article['title'] ); ?>">
    </div>

    <!-- Main Content & Sidebar Layout -->
    <div class="nd-layout">

      <!-- Left Column: Article Body -->
      <article class="nd-content">

        <!-- Pullquote Callout -->
        <blockquote class="nd-pullquote">
          <p><?php echo esc_html( $article['pullquote'] ); ?></p>
        </blockquote>

        <!-- Section 1 -->
        <h2 class="nd-heading-2"><?php echo esc_html( $article['section1_title'] ); ?></h2>
        <p class="nd-p"><?php echo esc_html( $article['section1_p1'] ); ?></p>
        <p class="nd-p"><?php echo esc_html( $article['section1_p2'] ); ?></p>

        <!-- Feature Points -->
        <h3 class="nd-heading-3"><?php echo esc_html( $article['features_title'] ); ?></h3>
        <div class="nd-features">
          <?php foreach ( $article['features'] as $feature ) : ?>
          <div class="nd-feature-item">
            <div class="nd-feature-item__icon">
              <?php if ( $feature['icon'] === 'check' ) : ?>
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                <polyline points="22 4 12 14.01 9 11.01"></polyline>
              </svg>
              <?php elseif ( $feature['icon'] === 'robot' ) : ?>
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect x="3" y="11" width="18" height="10" rx="2"></rect>
                <circle cx="12" cy="5" r="2"></circle>
                <path d="M12 7v4"></path>
                <line x1="8" y1="16" x2="8" y2="16"></line>
                <line x1="16" y1="16" x2="16" y2="16"></line>
              </svg>
              <?php else : ?>
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="18" y1="20" x2="18" y2="10"></line>
                <line x1="12" y1="20" x2="12" y2="4"></line>
                <line x1="6" y1="20" x2="6" y2="14"></line>
              </svg>
              <?php endif; ?>
            </div>
            <div class="nd-feature-item__text">
              <h4 class="nd-feature-item__title"><?php echo esc_html( $feature['title'] ); ?></h4>
              <p class="nd-feature-item__desc"><?php echo esc_html( $feature['desc'] ); ?></p>
            </div>
          </div>
          <?php endforeach; ?>
        </div>

        <!-- Section 2 -->
        <h2 class="nd-heading-2"><?php echo esc_html( $article['section2_title'] ); ?></h2>
        <p class="nd-p"><?php echo esc_html( $article['section2_p1'] ); ?></p>

        <!-- Executive Quote Box -->
        <div class="nd-quote-card">
          <p class="nd-quote-card__text">&ldquo;<?php echo esc_html( $article['quote'] ); ?>&rdquo;</p>
          <cite class="nd-quote-card__author">&mdash; <?php echo esc_html( $article['quote_author'] ); ?></cite>
        </div>

        <p class="nd-p"><?php echo esc_html( $article['section2_p2'] ); ?></p>

        <!-- Social Share Bar -->
        <div class="nd-share">
          <span class="nd-share__label"><?php echo esc_html( fitra_t_val( 'Share this article:', 'Bagikan artikel ini:' ) ); ?></span>
          <div class="nd-share__buttons">
            <button type="button" class="nd-share__btn" id="nd-share-btn" aria-label="<?php echo esc_attr( fitra_t_val( 'Share article', 'Bagikan artikel' ) ); ?>" title="<?php echo esc_attr( fitra_t_val( 'Share article', 'Bagikan artikel' ) ); ?>">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="18" cy="5" r="3"></circle>
                <circle cx="6" cy="12" r="3"></circle>
                <circle cx="18" cy="19" r="3"></circle>
                <line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line>
                <line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line>
              </svg>
            </button>
            <button type="button" class="nd-share__btn" id="nd-copy-btn" aria-label="<?php echo esc_attr( fitra_t_val( 'Copy article link', 'Salin tautan artikel' ) ); ?>" title="<?php echo esc_attr( fitra_t_val( 'Copy article link', 'Salin tautan artikel' ) ); ?>">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path>
                <path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path>
              </svg>
            </button>
            <span class="nd-share__copied" id="nd-share-copied" style="display: none;"><?php echo esc_html( fitra_t_val( 'Link copied!', 'Link disalin!' ) ); ?></span>
          </div>
        </div>

      </article>

      <!-- Right Column: Sidebar -->
      <aside class="nd-sidebar">

        <!-- Widget: Latest Updates -->
        <div class="nd-widget">
          <div class="nd-widget__header">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="nd-widget__icon">
              <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
            </svg>
            <h3 class="nd-widget__title"><?php echo esc_html( fitra_t_val( 'Latest Updates', 'Pembaruan Terkini' ) ); ?></h3>
          </div>

          <div class="nd-widget__list">
            <div class="nd-widget__item">
              <time class="nd-widget__item-date"><?php echo esc_html( fitra_t_val( 'Nov 28, 2024', '28 Nov 2024' ) ); ?></time>
              <h4 class="nd-widget__item-title">
                <a href="<?php echo esc_url( home_url( '/news/standar-baru-sertifikasi-kualitas/' ) ); ?>"><?php echo esc_html( fitra_t_val( 'Steel Plate Processing Facility Expansion in Surabaya', 'Ekspansi Fasilitas Pengolahan Plat Baja di Surabaya' ) ); ?></a>
              </h4>
            </div>

            <div class="nd-widget__item">
              <time class="nd-widget__item-date"><?php echo esc_html( fitra_t_val( 'Nov 15, 2024', '15 Nov 2024' ) ); ?></time>
              <h4 class="nd-widget__item-title">
                <a href="<?php echo esc_url( home_url( '/news/metal-steel-indonesia-2024/' ) ); ?>"><?php echo esc_html( fitra_t_val( 'ISO 9001:2024 Certification for International Logistics Standards', 'Sertifikasi ISO 9001:2024 untuk Standar Logistik Internasional' ) ); ?></a>
              </h4>
            </div>

            <div class="nd-widget__item">
              <time class="nd-widget__item-date"><?php echo esc_html( fitra_t_val( 'Oct 30, 2024', '30 Okt 2024' ) ); ?></time>
              <h4 class="nd-widget__item-title">
                <a href="<?php echo esc_url( home_url( '/news/ekspansi-jaringan-logistik-timur-tengah/' ) ); ?>"><?php echo esc_html( fitra_t_val( 'Market Analysis: Construction Material Demands for 2025', 'Analisis Pasar: Kebutuhan Material Konstruksi 2025' ) ); ?></a>
              </h4>
            </div>
          </div>

          <a href="<?php echo esc_url( home_url( '/news/' ) ); ?>" class="nd-widget__btn"><?php echo esc_html( fitra_t_val( 'View All News', 'Lihat Semua Berita' ) ); ?></a>
        </div>

        <!-- Widget: Request Technical Datasheet -->
        <div class="nd-datasheet-card">
          <h3 class="nd-datasheet-card__title"><?php echo esc_html( fitra_t_val( 'Request a Technical Datasheet?', 'Butuh Lembar Data Teknis?' ) ); ?></h3>
          <p class="nd-datasheet-card__desc"><?php echo esc_html( fitra_t_val( 'Get complete technical specifications for our latest distribution steel products directly to your email.', 'Dapatkan spesifikasi lengkap untuk produk baja distribusi terbaru kami langsung ke email Anda.' ) ); ?></p>

          <form class="nd-datasheet-card__form" id="nd-datasheet-form" onsubmit="return false;">
            <input type="email" class="nd-datasheet-card__input" placeholder="<?php echo esc_attr( fitra_t_val( 'Your work email', 'Email kantor Anda' ) ); ?>" required aria-label="<?php echo esc_attr( fitra_t_val( 'Your work email', 'Email kantor Anda' ) ); ?>">
            <button type="submit" class="nd-datasheet-card__btn"><?php echo esc_html( fitra_t_val( 'Download Datasheet', 'Unduh Lembar Data' ) ); ?></button>
          </form>
        </div>

      </aside>

    </div>

    <!-- Related News Section -->
    <section class="nd-related">
      <div class="nd-related__header">
        <div>
          <h2 class="nd-related__title"><?php echo esc_html( fitra_t_val( 'Related News', 'Berita Terkait' ) ); ?></h2>
          <p class="nd-related__subtitle"><?php echo esc_html( fitra_t_val( 'Explore more insights from our industrial expertise.', 'Pelajari wawasan lebih lanjut dari keahlian industri kami.' ) ); ?></p>
        </div>
        <a href="<?php echo esc_url( home_url( '/news/' ) ); ?>" class="nd-related__all-link">
          <span><?php echo esc_html( fitra_t_val( 'See All Articles', 'Lihat Semua Artikel' ) ); ?></span>
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
            <line x1="5" y1="12" x2="19" y2="12"></line>
            <polyline points="12 5 19 12 12 19"></polyline>
          </svg>
        </a>
      </div>

      <div class="nd-related__grid">

        <!-- Card 1 -->
        <article class="nd-related-card">
          <a href="<?php echo esc_url( home_url( '/news/standar-baru-sertifikasi-kualitas/' ) ); ?>" class="nd-related-card__media">
            <img src="<?php echo esc_url( $img . 'product-pipes.jpg' ); ?>" alt="<?php echo esc_attr( fitra_t_val( 'Composite Materials for Offshore Construction', 'Material Komposit untuk Konstruksi Lepas Pantai' ) ); ?>" loading="lazy">
          </a>
          <div class="nd-related-card__body">
            <span class="nd-related-card__tag"><?php echo esc_html( fitra_t_val( 'INNOVATION', 'INOVASI' ) ); ?></span>
            <h3 class="nd-related-card__title">
              <a href="<?php echo esc_url( home_url( '/news/standar-baru-sertifikasi-kualitas/' ) ); ?>"><?php echo esc_html( fitra_t_val( 'Composite Materials for Offshore Construction', 'Material Komposit untuk Konstruksi Lepas Pantai' ) ); ?></a>
            </h3>
            <p class="nd-related-card__desc"><?php echo esc_html( fitra_t_val( 'Examining the durability of our newest materials against extreme corrosion in marine environments...', 'Mempelajari daya tahan material terbaru kami menghadapi korosi ekstrim di...' ) ); ?></p>
            <a href="<?php echo esc_url( home_url( '/news/standar-baru-sertifikasi-kualitas/' ) ); ?>" class="nd-related-card__link"><?php echo esc_html( fitra_t_val( 'Read More', 'Baca Selengkapnya' ) ); ?> &nbsp;&rarr;</a>
          </div>
        </article>

        <!-- Card 2 -->
        <article class="nd-related-card">
          <a href="<?php echo esc_url( home_url( '/news/metal-steel-indonesia-2024/' ) ); ?>" class="nd-related-card__media">
            <img src="<?php echo esc_url( $img . 'svc-instrument.jpg' ); ?>" alt="<?php echo esc_attr( fitra_t_val( 'Structural Steel Product Safety Standardization', 'Standarisasi Keamanan Produk Baja Struktural' ) ); ?>" loading="lazy">
          </a>
          <div class="nd-related-card__body">
            <span class="nd-related-card__tag"><?php echo esc_html( fitra_t_val( 'QUALITY CONTROL', 'KONTROL KUALITAS' ) ); ?></span>
            <h3 class="nd-related-card__title">
              <a href="<?php echo esc_url( home_url( '/news/metal-steel-indonesia-2024/' ) ); ?>"><?php echo esc_html( fitra_t_val( 'Structural Steel Product Safety Standardization', 'Standarisasi Keamanan Produk Baja Struktural' ) ); ?></a>
            </h3>
            <p class="nd-related-card__desc"><?php echo esc_html( fitra_t_val( 'How PT Fitra Perkasa Inti applies international audit standards for structural integrity...', 'Bagaimana PT Fitra Perkasa Inti menerapkan standar audit internasional...' ) ); ?></p>
            <a href="<?php echo esc_url( home_url( '/news/metal-steel-indonesia-2024/' ) ); ?>" class="nd-related-card__link"><?php echo esc_html( fitra_t_val( 'Read More', 'Baca Selengkapnya' ) ); ?> &nbsp;&rarr;</a>
          </div>
        </article>

        <!-- Card 3 -->
        <article class="nd-related-card">
          <a href="<?php echo esc_url( home_url( '/news/ekspansi-jaringan-logistik-timur-tengah/' ) ); ?>" class="nd-related-card__media">
            <img src="<?php echo esc_url( $img . 'hero-port-crane.jpg' ); ?>" alt="<?php echo esc_attr( fitra_t_val( 'Asia-Europe Sea Route Optimization 2024', 'Optimalisasi Rute Laut Asia-Eropa 2024' ) ); ?>" loading="lazy">
          </a>
          <div class="nd-related-card__body">
            <span class="nd-related-card__tag"><?php echo esc_html( fitra_t_val( 'LOGISTICS', 'LOGISTIK' ) ); ?></span>
            <h3 class="nd-related-card__title">
              <a href="<?php echo esc_url( home_url( '/news/ekspansi-jaringan-logistik-timur-tengah/' ) ); ?>"><?php echo esc_html( fitra_t_val( 'Asia-Europe Sea Route Optimization 2024', 'Optimalisasi Rute Laut Asia-Eropa 2024' ) ); ?></a>
            </h3>
            <p class="nd-related-card__desc"><?php echo esc_html( fitra_t_val( 'Our strategic logistics solutions addressing geopolitical dynamics to ensure on-time delivery...', 'Strategi logistik kami dalam menghadapi dinamika geopolitik untuk menjamin...' ) ); ?></p>
            <a href="<?php echo esc_url( home_url( '/news/ekspansi-jaringan-logistik-timur-tengah/' ) ); ?>" class="nd-related-card__link"><?php echo esc_html( fitra_t_val( 'Read More', 'Baca Selengkapnya' ) ); ?> &nbsp;&rarr;</a>
          </div>
        </article>

      </div>
    </section>

  </div>
</main>

<?php
get_footer();
