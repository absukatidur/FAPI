<?php
/**
 * Template Name: Product Detail Page
 * Template for individual product detail view
 *
 * @package FitraPerkasa
 */

get_header();

// Determine which product to display from the page slug
$page_slug = get_post_field( 'post_name', get_post() );
if ( empty( $page_slug ) || $page_slug === 'products' ) {
    $request_uri = trim( parse_url( $_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH ), '/' );
    $parts = explode( '/', $request_uri );
    if ( count( $parts ) >= 2 && $parts[0] === 'products' ) {
        $page_slug = sanitize_title( $parts[1] );
    }
}
$product = fitra_get_product( $page_slug );

if ( ! $product ) {
    // Fallback: show a not-found message
    ?>
    <section class="products-hero" id="product-not-found">
      <div class="products-hero__inner">
        <h1 class="products-hero__title">Product Not Found</h1>
        <p class="products-hero__subtitle">The requested product could not be found. <a href="<?php echo esc_url( home_url( '/products/' ) ); ?>">Return to catalog</a>.</p>
      </div>
    </section>
    <?php
    get_footer();
    return;
}
?>

  <!-- ===== BREADCRUMB ===== -->
  <section class="pd-breadcrumb" id="pd-breadcrumb">
    <div class="pd-breadcrumb__inner">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="pd-breadcrumb__link"><?php echo fitra_t_val( 'HOME', 'BERANDA' ); ?></a>
      <span class="pd-breadcrumb__sep">&rsaquo;</span>
      <a href="<?php echo esc_url( home_url( '/products/' ) ); ?>" class="pd-breadcrumb__link"><?php echo fitra_t_val( 'PRODUCTS', 'PRODUK' ); ?></a>
      <span class="pd-breadcrumb__sep">&rsaquo;</span>
      <span class="pd-breadcrumb__link"><?php echo esc_html( strtoupper( $product['category'] ) ); ?></span>
      <span class="pd-breadcrumb__sep">&rsaquo;</span>
      <span class="pd-breadcrumb__current"><?php echo esc_html( strtoupper( $product['title'] ) ); ?></span>
    </div>
  </section>

  <!-- ===== PRODUCT DETAIL HERO ===== -->
  <section class="pd-hero" id="pd-hero">
    <div class="pd-hero__inner">

      <!-- Left: Images (Fixed Main Image & Sliding Thumbnails) -->
      <div class="pd-hero__gallery">
        <div class="pd-hero__main-image">
          <img src="<?php echo esc_url( $product['image'] ); ?>" alt="<?php echo esc_attr( $product['full_title'] ); ?>" id="pd-main-img">
        </div>

        <?php 
        // Maximum 5 pictures for the detail product gallery
        $gallery_items = ! empty( $product['gallery'] ) ? array_slice( $product['gallery'], 0, 5 ) : array();
        $has_slider    = count( $gallery_items ) >= 4;
        if ( ! empty( $gallery_items ) ) : 
        ?>
        <div class="pd-hero__thumbs-wrapper<?php echo $has_slider ? ' has-slider' : ''; ?>" id="pd-thumbs-wrapper">
          <?php if ( $has_slider ) : ?>
          <button type="button" class="pd-hero__thumb-arrow pd-hero__thumb-arrow--prev" id="pd-thumb-prev" aria-label="Slide thumbnails left">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
              <polyline points="15 18 9 12 15 6"></polyline>
            </svg>
          </button>
          <?php endif; ?>

          <div class="pd-hero__thumbs<?php echo $has_slider ? ' pd-hero__thumbs--scrollable' : ''; ?>" id="pd-thumbs-track">
            <?php foreach ( $gallery_items as $i => $gallery_img ) : ?>
            <button type="button" class="pd-hero__thumb<?php echo ( $i === 0 ) ? ' pd-hero__thumb--active' : ''; ?>" data-index="<?php echo $i; ?>" aria-label="<?php echo esc_attr( $product['title'] . ' thumbnail ' . ( $i + 1 ) ); ?>">
              <img src="<?php echo esc_url( $gallery_img ); ?>" alt="<?php echo esc_attr( $product['title'] . ' gallery ' . ( $i + 1 ) ); ?>">
            </button>
            <?php endforeach; ?>
          </div>

          <?php if ( $has_slider ) : ?>
          <button type="button" class="pd-hero__thumb-arrow pd-hero__thumb-arrow--next" id="pd-thumb-next" aria-label="Slide thumbnails right">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
              <polyline points="9 18 15 12 9 6"></polyline>
            </svg>
          </button>
          <?php endif; ?>
        </div>
        <?php endif; ?>
      </div>

      <!-- Right: Product Info -->
      <div class="pd-hero__info">
        <div class="pd-hero__tags">
          <span class="pd-hero__brand"><?php echo esc_html( $product['brand'] ); ?></span>
          <?php if ( ! empty( $product['stock'] ) ) : ?>
          <span class="pd-hero__stock"><?php echo esc_html( fitra_t_val( 'IN STOCK', 'READY STOCK' ) ); ?></span>
          <?php endif; ?>
        </div>

        <h1 class="pd-hero__title"><?php echo esc_html( $product['full_title'] ); ?></h1>
        <p class="pd-hero__desc"><?php echo esc_html( $product['desc'] ); ?></p>

        <!-- Documents -->
        <?php if ( ! empty( $product['documents'] ) ) : ?>
        <div class="pd-hero__docs">
          <?php foreach ( $product['documents'] as $doc ) : ?>
          <a href="#" class="pd-doc">
            <div class="pd-doc__icon">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                <polyline points="14 2 14 8 20 8"/>
                <line x1="16" y1="13" x2="8" y2="13"/>
                <line x1="16" y1="17" x2="8" y2="17"/>
              </svg>
            </div>
            <div class="pd-doc__info">
              <span class="pd-doc__name"><?php echo esc_html( $doc['name'] ); ?></span>
              <span class="pd-doc__meta"><?php echo esc_html( $doc['type'] . ' • ' . $doc['size'] ); ?></span>
            </div>
            <div class="pd-doc__download">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                <polyline points="7 10 12 15 17 10"/>
                <line x1="12" y1="15" x2="12" y2="3"/>
              </svg>
            </div>
          </a>
          <?php endforeach; ?>
        </div>
        <?php endif; ?>

        <!-- Request Consultation -->
        <div class="pd-hero__consult">
          <h3 class="pd-hero__consult-title"><?php echo fitra_t_val( 'Request a Consultation', 'Konsultasi Teknis &amp; Penawaran' ); ?></h3>
          <p class="pd-hero__consult-desc"><?php echo fitra_t_val( 'Connect with our engineering team for sizing, pricing, and integration support.', 'Hubungi tim engineering kami untuk spesifikasi teknis, harga terbaik, dan ketersediaan stok.' ); ?></p>
          <a href="<?php echo esc_url( home_url( '/#rfq' ) ); ?>" class="pd-hero__consult-btn" id="btn-request-consultation"><?php echo fitra_t_val( 'Request Quote &nbsp;&rarr;', 'Minta Penawaran &nbsp;&rarr;' ); ?></a>
        </div>
      </div>

    </div>
  </section>

  <!-- ===== TECHNICAL SPECIFICATIONS ===== -->
  <?php if ( ! empty( $product['specs'] ) ) : ?>
  <section class="pd-specs" id="pd-specs">
    <div class="pd-specs__inner">
      <h2 class="pd-specs__title"><?php echo fitra_t_val( 'Technical Specifications', 'Spesifikasi Teknis' ); ?></h2>
      <div class="pd-specs__grid">
        <?php 
        $spec_labels_id = array(
            'PIPE SIZES'          => 'UKURAN PIPA',
            'MATERIALS'           => 'MATERIAL / BAHAN',
            'PRESSURE RATING'     => 'RATING TEKANAN',
            'STANDARDS'           => 'STANDAR SERTIFIKASI',
            'FITTING TYPES'       => 'TIPE SAMBUNGAN',
            'VALVE TYPES'         => 'TIPE KATUP',
            'CONNECTIONS'         => 'KONEKSI / SAMBUNGAN',
            'APPLICATIONS'        => 'APLIKASI INDUSTRI',
            'FLANGE TYPES'        => 'TIPE FLANGE',
            'PRESSURE CLASS'      => 'KELAS TEKANAN',
            'FACING'              => 'TIPE FACING',
            'GASKET TYPES'        => 'TIPE GASKET',
            'TEMPERATURE RANGE'   => 'RENTANG TEMPERATUR',
            'POWER RATING'        => 'DAYA / KAPASITAS',
            'RATIO'               => 'RASIO GEARBOX',
            'TORQUE'              => 'TORSI OUTPUT',
            'OUTPUT TORQUE'       => 'TORSI OUTPUT',
            'CALIBRATION RANGE'   => 'RENTANG KALIBRASI',
            'ACCURACY'            => 'AKURASI',
            'CERTIFICATION'       => 'SERTIFIKASI',
        );
        foreach ( $product['specs'] as $label => $value ) : 
            $display_label = ( fitra_get_lang() === 'id' && isset( $spec_labels_id[ $label ] ) ) ? $spec_labels_id[ $label ] : $label;
        ?>
        <div class="pd-specs__row">
          <span class="pd-specs__label"><?php echo esc_html( $display_label ); ?></span>
          <span class="pd-specs__value"><?php echo esc_html( $value ); ?></span>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
  <?php endif; ?>

<?php
get_footer();
