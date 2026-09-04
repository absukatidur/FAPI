<?php
/**
 * Template Name: Product Detail Page
 * Template for individual product detail view
 *
 * @package FitraPerkasa
 */

get_header();

// Determine which product to display from the page slug
$page_slug = '';

// 1. Check URL path segments (e.g. /products/{slug} or /id/products/{slug} or /id/produk/{slug})
$request_uri = trim( parse_url( $_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH ), '/' );
$parts = array_values( array_filter( explode( '/', $request_uri ) ) );
if ( ! empty( $parts[0] ) && in_array( strtolower( $parts[0] ), array( 'id', 'en' ), true ) ) {
    array_shift( $parts );
}
if ( ! empty( $parts[0] ) && in_array( strtolower( $parts[0] ), array( 'products', 'produk' ), true ) ) {
    if ( ! empty( $parts[1] ) ) {
        $page_slug = sanitize_title( $parts[1] );
    }
}

// 2. Fallback to post_name
if ( empty( $page_slug ) || in_array( $page_slug, array( 'products', 'produk' ), true ) ) {
    $post_slug = get_post_field( 'post_name', get_post() );
    if ( ! empty( $post_slug ) && ! in_array( $post_slug, array( 'products', 'produk' ), true ) ) {
        $page_slug = $post_slug;
    }
}

// 3. Fallback to query param (?product=xxx or ?slug=xxx)
if ( empty( $page_slug ) && ! empty( $_GET['product'] ) ) {
    $page_slug = sanitize_title( $_GET['product'] );
}
if ( empty( $page_slug ) && ! empty( $_GET['slug'] ) ) {
    $page_slug = sanitize_title( $_GET['slug'] );
}

$product = fitra_get_product( $page_slug );

if ( ! $product ) {
    // Fallback: show a not-found message
    ?>
    <section class="products-hero" id="product-not-found">
      <div class="products-hero__inner">
        <h1 class="products-hero__title"><?php echo fitra_t_val( 'Product Not Found', 'Produk Tidak Ditemukan' ); ?></h1>
        <p class="products-hero__subtitle"><?php echo fitra_t_val( 'The requested product could not be found.', 'Produk yang Anda minta tidak dapat ditemukan.' ); ?> <a href="<?php echo esc_url( fitra_url( '/products/' ) ); ?>"><?php echo fitra_t_val( 'Return to catalog', 'Kembali ke katalog' ); ?></a>.</p>
      </div>
    </section>
    <?php
    get_footer();
    return;
}

$cat_key = $product['cat_key'] ?? ( function_exists( 'fitra_get_product_category_key' ) ? fitra_get_product_category_key( $product['category_en'] ?? $product['category'] ) : 'all' );
$cat_url = fitra_url( '/products/?filter=' . $cat_key . '#products-catalog' );
$products_url = fitra_url( '/products/#products-catalog' );
$current_product_slug = $product['slug'] ?? $page_slug;
$current_product_url = fitra_url( '/products/' . $current_product_slug . '/' );
?>

  <!-- ===== BREADCRUMB ===== -->
  <section class="pd-breadcrumb" id="pd-breadcrumb">
    <div class="pd-breadcrumb__inner">
      <a href="<?php echo esc_url( fitra_url( '/' ) ); ?>" class="pd-breadcrumb__link" title="<?php echo esc_attr( fitra_t_val( 'Return to Home', 'Kembali ke Beranda' ) ); ?>"><?php echo fitra_t_val( 'HOME', 'BERANDA' ); ?></a>
      <span class="pd-breadcrumb__sep">&rsaquo;</span>
      <a href="<?php echo esc_url( $products_url ); ?>" class="pd-breadcrumb__link" title="<?php echo esc_attr( fitra_t_val( 'All Products Catalog', 'Katalog Semua Produk' ) ); ?>"><?php echo fitra_t_val( 'PRODUCTS', 'PRODUK' ); ?></a>
      <span class="pd-breadcrumb__sep">&rsaquo;</span>
      <a href="<?php echo esc_url( $cat_url ); ?>" class="pd-breadcrumb__link pd-breadcrumb__link--type" title="<?php echo esc_attr( fitra_t_val( 'Filter Products by ' . $product['category'], 'Saring Produk Berdasarkan ' . $product['category'] ) ); ?>"><?php echo esc_html( strtoupper( $product['category'] ) ); ?></a>
      <span class="pd-breadcrumb__sep">&rsaquo;</span>
      <a href="<?php echo esc_url( $current_product_url ); ?>" class="pd-breadcrumb__link pd-breadcrumb__current" aria-current="page" title="<?php echo esc_attr( $product['title'] ); ?>"><?php echo esc_html( strtoupper( $product['title'] ) ); ?></a>
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
          <?php foreach ( $product['documents'] as $doc ) : 
              $doc_name = ( fitra_get_lang() === 'id' && ! empty( $doc['name_id'] ) ) ? $doc['name_id'] : $doc['name'];
          ?>
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
              <span class="pd-doc__name"><?php echo esc_html( $doc_name ); ?></span>
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
          <a href="<?php echo esc_url( fitra_url( '/#rfq' ) ); ?>" class="pd-hero__consult-btn" id="btn-request-consultation"><?php echo fitra_t_val( 'Request Quote &nbsp;&rarr;', 'Minta Penawaran &nbsp;&rarr;' ); ?></a>
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
            'MATERIAL GRADES'     => 'GRADE MATERIAL',
            'DIMENSIONAL STD'     => 'STANDAR DIMENSI',
            'FACING FINISH'       => 'FINISHING FACING',
            'BRANCH FITTINGS'     => 'FITTING OUTLET CABANG',
            'OUTSIDE DIAMETER'    => 'DIAMETER LUAR (OD)',
            'WALL THICKNESS'      => 'KETEBALAN DINDING',
            'DELIVERY STATE'      => 'KONDISI PENGIRIMAN',
            'TESTING'             => 'PENGUJIAN & INSPEKSI',
            'LENGTH'              => 'PANJANG PIPA',
            'STEEL GRADES'        => 'GRADE BAJA',
            'STAINLESS GRADES'    => 'GRADE STAINLESS STEEL',
            'PRODUCT FORMS'       => 'BENTUK PRODUK',
            'PLATE THICKNESS'     => 'KETEBALAN PELAT',
            'BEAM SIZES'          => 'UKURAN BALOK',
            'SURFACE FINISH'      => 'FINISHING PERMUKAAN',
            'WEAR PLATE'          => 'PELAT TAHAN AUS',
            'BOILER PLATE'        => 'PELAT BOILER',
            'THICKNESS RANGE'     => 'RENTANG KETEBALAN',
            'WIDTH & LENGTH'      => 'LEBAR & PANJANG',
            'CHARPY V-NOTCH'      => 'UJI IMPAK CHARPY V-NOTCH',
            'WELDABILITY'         => 'KEMAMPUAN LAS (WELDABILITY)',
            'BEAM TYPES'          => 'TIPE BALOK BAJA',
            'HOLLOW SECTIONS'     => 'PROFIL BERONGGA (HOLLOW)',
            'STEEL QUALITY'       => 'MUTU BAJA',
            'LENGTHS'             => 'PANJANG STANDAR',
            'SURFACE'             => 'PERMUKAAN',
            'GASKET TYPES'        => 'TIPE GASKET',
            'FILLER MATERIALS'    => 'MATERIAL PENGISI',
            'WINDING STRIP'       => 'STRIP LILITAN',
            'TEMPERATURE'         => 'TEMPERATUR KERJA',
            'PRESSURE'            => 'TEKANAN KERJA',
            'SIZES'               => 'UKURAN',
            'BEARING TYPES'       => 'TIPE BANTALAN (BEARING)',
            'BRANDS SUPPLIED'     => 'MEREK TERSEDIA',
            'BORE SIZES'          => 'UKURAN BORE (DIAMETER DALAM)',
            'SEAL TYPES'          => 'TIPE SEAL',
            'SEAL MATERIALS'      => 'MATERIAL SEAL',
            'CLEARANCE'           => 'CLEARANCE / KELONGGARAN',
            'SEAL CONFIG'         => 'KONFIGURASI SEAL',
            'FACE MATERIALS'      => 'MATERIAL SEAL FACE',
            'ELASTOMERS'          => 'ELASTOMER',
            'MAX TEMPERATURE'     => 'TEMPERATUR MAKSIMAL',
            'PRESSURE LIMIT'      => 'BATAS TEKANAN',
            'TORQUE RANGE'        => 'RENTANG TORSI',
            'GEAR RATIOS'         => 'RASIO GEARBOX',
            'HOUSING MATERIAL'    => 'MATERIAL RUMAH GEARBOX',
            'GEAR TYPE'           => 'TIPE GEAR',
            'MOUNTING'            => 'POSISI PEMASANGAN',
            'LUBRICATION'         => 'SISTEM PELUMASAN',
            'THERMAL RATING'      => 'KAPASITAS TERMAL',
            'POWER OUTPUT'        => 'DAYA OUTPUT MOTOR',
            'EFFICIENCY CLASS'    => 'KELAS EFISIENSI',
            'PROTECTION RATING'   => 'PROTEKSI INGRESS (IP)',
            'INSULATION'          => 'KELAS ISOLASI',
            'VOLTAGE RATINGS'     => 'TEGANGAN LISTRIK',
            'REDUCER RATIO'       => 'RASIO REDUKSI',
            'DUTY CYCLE'          => 'SIKLUS KERJA (DUTY)',
            'COUPLING TYPES'      => 'TIPE KOPLING',
            'TORQUE CAPACITY'     => 'KAPASITAS TORSI',
            'BORE CAPABILITY'     => 'KAPASITAS BORE POROS',
            'MISALIGNMENT'        => 'KOMPENSASI DEVIASI',
            'MATERIALS'           => 'MATERIAL',
            'SIZE RANGE'          => 'RENTANG UKURAN',
            'PRESSURE CLASSES'    => 'KELAS TEKANAN',
            'BODY MATERIALS'      => 'MATERIAL BODY',
            'TRIM DESIGN'         => 'DESAIN TRIM',
            'ACTUATORS'           => 'AKTUATOR',
            'PRESSURE RANGES'     => 'RENTANG TEKANAN',
            'ACCURACY CLASS'      => 'KELAS AKURASI',
            'DIAL SIZES'          => 'UKURAN DIAL',
            'WETTED PARTS'        => 'BAGIAN TERBASAHI (WETTED PARTS)',
            'MANIFOLD TYPES'      => 'TIPE MANIFOLD',
            'INGRESS'             => 'PROTEKSI CUACA (IP)',
            'ORIFICE SIZES'       => 'UKURAN ORIFICE',
            'SET PRESSURE'        => 'TEKANAN SETELAN (SET PRESSURE)',
            'BONNET TYPES'        => 'TIPE BONNET',
            'CHECK VALVE'         => 'TIPE CHECK VALVE',
            'FUEL TYPES'          => 'JENIS BAHAN BAKAR',
            'STORAGE CAPACITY'    => 'KAPASITAS TANGKI TIMBUN',
            'DISPENSING'          => 'SISTEM DISPENSING / ALIR',
            'CERTIFICATIONS'      => 'SERTIFIKASI',
            'LUBRICANTS'          => 'JENIS PELUMAS',
            'CLEANLINESS'         => 'TINGKAT KEBERSIHAN',
            'BOLTING'             => 'STUD BAUT & MUR',
            'COATINGS'            => 'LAPISAN PELINDUNG (COATING)',
            'INSULATION'          => 'ISOLASI TERMAL',
            'FILTER ELEMENTS'     => 'ELEMEN FILTER',
            'PACKING MATERIAL'    => 'MATERIAL PACKING',
            'FILTRATION RATING'   => 'RATING FILTRASI',
            'SEPARATION'          => 'EFISIENSI PEMISAHAN',
            'PRESSURE LOSS'       => 'PENURUNAN TEKANAN (PRESSURE LOSS)',
            'HOUSING DESIGN'      => 'DESAIN RUMAH FILTER',
            'TURBINE SPARES'      => 'SUKU CADANG TURBIN',
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
