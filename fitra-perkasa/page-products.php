<?php
/**
 * Template Name: Products Page
 * Template for the Products / Industrial Catalog page (matches corporate industrial design mockup)
 *
 * @package FitraPerkasa
 */

get_header();
?>

  <!-- ===== 1. PRODUCTS HERO ===== -->
  <section class="products-hero-v2" id="products-hero">
    <div class="products-hero-v2__overlay"></div>
    <img src="<?php echo fitra_img( 'product-steels.jpg' ); ?>" alt="Industrial materials and steel supply" class="products-hero-v2__bg" fetchpriority="high">

    <div class="products-hero-v2__content">
      <div class="products-hero-v2__meta-tag">
        <span class="meta-dash">&mdash;&mdash;</span> <?php echo fitra_t_val( 'INDUSTRIAL MATERIAL CATALOG', 'KATALOG MATERIAL INDUSTRI' ); ?> <span class="meta-dash">&mdash;&mdash;</span> <?php echo fitra_t_val( 'AUTHORIZED SUPPLIER', 'SUPLIER RESMI' ); ?>
      </div>
      <h1 class="products-hero-v2__title"><?php echo fitra_t_val( 'Industrial Products &amp;<br>Materials Catalog', 'Katalog Produk &amp; Material<br>Industri' ); ?></h1>
      <p class="products-hero-v2__subtitle"><?php echo fitra_t_val( 'Supplying piping materials, structural steels, gaskets, industrial valves, and mechanical components conforming to international standards for major energy and infrastructure projects.', 'Penyediaan material pipa, baja struktural, gasket, katup, dan komponen mekanikal berstandar internasional untuk proyek industri dan manufaktur.' ); ?></p>
    </div>
  </section>

  <!-- ===== 2. INTERACTIVE CATEGORY FILTER TABS BAR ===== -->
  <nav class="products-filter-bar" id="products-filter-bar" aria-label="<?php echo esc_attr( fitra_t_val( 'Product Categories', 'Kategori Produk' ) ); ?>">
    <div class="products-filter-bar__inner">
      <div class="products-filter-bar__list" role="tablist">
        <button type="button" class="products-filter-btn products-filter-btn--active" role="tab" aria-selected="true" data-filter="all" id="tab-prod-all">
          <?php echo fitra_t_val( 'ALL PRODUCTS', 'SEMUA PRODUK' ); ?>
        </button>
        <button type="button" class="products-filter-btn" role="tab" aria-selected="false" data-filter="pipes" id="tab-prod-pipes">
          <?php echo fitra_t_val( 'PIPES &amp; FITTINGS', 'PIPA &amp; SAMBUNGAN' ); ?>
        </button>
        <button type="button" class="products-filter-btn" role="tab" aria-selected="false" data-filter="steels" id="tab-prod-steels">
          <?php echo fitra_t_val( 'STEEL &amp; PLATES', 'BAJA &amp; PELAT' ); ?>
        </button>
        <button type="button" class="products-filter-btn" role="tab" aria-selected="false" data-filter="gaskets" id="tab-prod-gaskets">
          <?php echo fitra_t_val( 'GASKET &amp; SEALS', 'GASKET &amp; SEAL' ); ?>
        </button>
        <button type="button" class="products-filter-btn" role="tab" aria-selected="false" data-filter="drives" id="tab-prod-drives">
          <?php echo fitra_t_val( 'MECHANICAL DRIVES', 'PENGGERAK MEKANIKAL' ); ?>
        </button>
        <button type="button" class="products-filter-btn" role="tab" aria-selected="false" data-filter="valves" id="tab-prod-valves">
          <?php echo fitra_t_val( 'VALVES &amp; GAUGES', 'KATUP &amp; INSTRUMEN' ); ?>
        </button>
        <button type="button" class="products-filter-btn" role="tab" aria-selected="false" data-filter="energy" id="tab-prod-energy">
          <?php echo fitra_t_val( 'ENERGY &amp; FUEL', 'ENERGI &amp; BAHAN BAKAR' ); ?>
        </button>
      </div>
    </div>
  </nav>

  <!-- ===== 3. PRODUCT CATALOG GRID ===== -->
  <main class="products-catalog-v2" id="products-catalog">
    <div class="products-catalog-v2__inner">

      <div class="products-grid-v2" id="products-grid">
        <?php
        $catalog_config = array(
            'tube-pipe-fitting-valve' => array(
                'cat_key' => 'pipes',
                'card_id' => 'prod-card-pipes',
                'tag'     => fitra_t_val( '<span class="tag-bold">[ PIPES ]</span> PIPE &amp; FITTING', '<span class="tag-bold">[ PIPA ]</span> PIPA &amp; SAMBUNGAN' ),
                'specs'   => array( 'ASTM A106 / A53', 'SCH 40 / 80 / 160' ),
            ),
            'flanges-forged-fittings' => array(
                'cat_key' => 'pipes',
                'card_id' => 'prod-card-flanges',
                'tag'     => fitra_t_val( '<span class="tag-bold">[ PIPES ]</span> FLANGES &amp; FORGED', '<span class="tag-bold">[ PIPA ]</span> FLENS &amp; TEMPA' ),
                'specs'   => array( 'ASME B16.5', 'Class 150# - 2500#' ),
            ),
            'seamless-heat-exchanger-tubing' => array(
                'cat_key' => 'pipes',
                'card_id' => 'prod-card-tubing',
                'tag'     => fitra_t_val( '<span class="tag-bold">[ PIPES ]</span> SEAMLESS TUBING', '<span class="tag-bold">[ PIPA ]</span> TUBING SEAMLESS' ),
                'specs'   => array( 'ASTM A179 / A213', 'OD 1/4" - 2"' ),
            ),
            'steels' => array(
                'cat_key' => 'steels',
                'card_id' => 'prod-card-steels',
                'tag'     => fitra_t_val( '<span class="tag-bold">[ STEEL ]</span> PLATE &amp; PROFILE', '<span class="tag-bold">[ BAJA ]</span> PELAT &amp; PROFIL' ),
                'specs'   => array( 'ASTM A36 / SS400', 'SNI Certified' ),
            ),
            'wear-resistant-boiler-plate' => array(
                'cat_key' => 'steels',
                'card_id' => 'prod-card-boiler',
                'tag'     => fitra_t_val( '<span class="tag-bold">[ STEEL ]</span> HARDNESS &amp; BOILER', '<span class="tag-bold">[ BAJA ]</span> TAHAN GESEK &amp; BOILER' ),
                'specs'   => array( 'ASTM A516 Gr. 70', 'Hardox Equivalent' ),
            ),
            'heavy-structural-beams-channels' => array(
                'cat_key' => 'steels',
                'card_id' => 'prod-card-beams',
                'tag'     => fitra_t_val( '<span class="tag-bold">[ STEEL ]</span> BEAMS &amp; CHANNELS', '<span class="tag-bold">[ BAJA ]</span> BALOK &amp; KANAL' ),
                'specs'   => array( 'JIS G3101 SS400', 'Mill Certificate ISO' ),
            ),
            'gasket-packing' => array(
                'cat_key' => 'gaskets',
                'card_id' => 'prod-card-gasket',
                'tag'     => fitra_t_val( '<span class="tag-bold">[ PARTS ]</span> GASKET &amp; PACKING', '<span class="tag-bold">[ SUKU CADANG ]</span> GASKET &amp; PACKING' ),
                'specs'   => array( 'ASME B16.20', 'PTFE / Graphite Fill' ),
            ),
            'bearing-sealing' => array(
                'cat_key' => 'gaskets',
                'card_id' => 'prod-card-bearing',
                'tag'     => fitra_t_val( '<span class="tag-bold">[ PARTS ]</span> BEARING &amp; ROTARY', '<span class="tag-bold">[ SUKU CADANG ]</span> BANTALAN &amp; ROTARY' ),
                'specs'   => array( 'ISO 9001 Tested', 'Heavy Duty Roller' ),
            ),
            'high-temp-mechanical-cartridge-seals' => array(
                'cat_key' => 'gaskets',
                'card_id' => 'prod-card-seals',
                'tag'     => fitra_t_val( '<span class="tag-bold">[ PARTS ]</span> SEALING SOLUTIONS', '<span class="tag-bold">[ SUKU CADANG ]</span> SEALING SOLUSI' ),
                'specs'   => array( 'API 682 Standard', 'Silicon Carbide Face' ),
            ),
            'gear-box-sumitomo' => array(
                'cat_key' => 'drives',
                'card_id' => 'prod-card-gearbox',
                'tag'     => fitra_t_val( '<span class="tag-bold">[ DRIVES ]</span> HEAVY GEARBOX', '<span class="tag-bold">[ PENGGERAK ]</span> GEARBOX BERAT' ),
                'specs'   => array( 'Sumitomo Paramax', 'High Torque Ratio' ),
            ),
            'electric-motors-speed-reducers' => array(
                'cat_key' => 'drives',
                'card_id' => 'prod-card-motors',
                'tag'     => fitra_t_val( '<span class="tag-bold">[ DRIVES ]</span> MOTOR &amp; REDUCER', '<span class="tag-bold">[ PENGGERAK ]</span> MOTOR &amp; REDUSER' ),
                'specs'   => array( 'IE3 High Efficiency', 'IP55 / IP66 Rated' ),
            ),
            'industrial-flexible-couplings' => array(
                'cat_key' => 'drives',
                'card_id' => 'prod-card-couplings',
                'tag'     => fitra_t_val( '<span class="tag-bold">[ DRIVES ]</span> COUPLING &amp; SHAFT', '<span class="tag-bold">[ PENGGERAK ]</span> KOPLING &amp; POROS' ),
                'specs'   => array( 'API 671 / ISO 10441', 'Torsionally Resilient' ),
            ),
            'industrial-control-isolation-valves' => array(
                'cat_key' => 'valves',
                'card_id' => 'prod-card-valves',
                'tag'     => fitra_t_val( '<span class="tag-bold">[ VALVES ]</span> CONTROL &amp; BALL', '<span class="tag-bold">[ KATUP ]</span> KONTROL &amp; BOLA' ),
                'specs'   => array( 'API 6D / API 600', 'Pneumatic Actuated' ),
            ),
            'instrumentation-gauges-manifolds' => array(
                'cat_key' => 'valves',
                'card_id' => 'prod-card-gauges',
                'tag'     => fitra_t_val( '<span class="tag-bold">[ VALVES ]</span> PRESSURE &amp; SENSOR', '<span class="tag-bold">[ INSTRUMEN ]</span> TEKANAN &amp; SENSOR' ),
                'specs'   => array( 'Accuracy 0.5% - 1.0%', 'SS316 Wetted Parts' ),
            ),
            'pressure-safety-relief-valves' => array(
                'cat_key' => 'valves',
                'card_id' => 'prod-card-safetyvalves',
                'tag'     => fitra_t_val( '<span class="tag-bold">[ VALVES ]</span> SAFETY &amp; CHECK', '<span class="tag-bold">[ KATUP ]</span> PENGAMAN &amp; CHECK' ),
                'specs'   => array( 'ASME Sec VIII / API 526', 'Set Pressure Certified' ),
            ),
            'fuel-migas-standard' => array(
                'cat_key' => 'energy',
                'card_id' => 'prod-card-fuel',
                'tag'     => fitra_t_val( '<span class="tag-bold">[ ENERGY ]</span> FUEL &amp; LUBRICANT', '<span class="tag-bold">[ ENERGI ]</span> BAHAN BAKAR &amp; PELUMAS' ),
                'specs'   => array( 'Biodiesel B35/B40', 'Bulk &amp; Drum Supply' ),
            ),
            'refinery-spares-consumables' => array(
                'cat_key' => 'energy',
                'card_id' => 'prod-card-spares',
                'tag'     => fitra_t_val( '<span class="tag-bold">[ ENERGY ]</span> REFINERY SPARES', '<span class="tag-bold">[ ENERGI ]</span> SUKU CADANG KILANG' ),
                'specs'   => array( 'OEM Certified', 'Fast Lead Time' ),
            ),
            'heavy-fuel-filtration-turbine-spares' => array(
                'cat_key' => 'energy',
                'card_id' => 'prod-card-powerfilters',
                'tag'     => fitra_t_val( '<span class="tag-bold">[ ENERGY ]</span> POWER &amp; FILTERS', '<span class="tag-bold">[ ENERGI ]</span> PEMBANGKIT &amp; FILTER' ),
                'specs'   => array( 'ISO 4406 Cleanliness', 'Micro-Glass Media' ),
            ),
        );

        $all_products = fitra_get_products();
        foreach ( $catalog_config as $slug => $cfg ) :
            $p = $all_products[ $slug ] ?? null;
            if ( ! $p ) continue;
            $prod_url = fitra_url( '/products/' . $slug . '/' );
            $aria_lbl = fitra_t_val( 'View details for ' . $p['title'], 'Lihat detail ' . $p['title'] );
            $btn_lbl  = fitra_t_val( 'VIEW DETAIL &rarr;', 'LIHAT DETAIL &rarr;' );
            $rfq_lbl  = fitra_t_val( 'Request Quotation (RFQ)', 'Minta Penawaran (RFQ)' );
        ?>
        <article class="products-card-v2" data-category="<?php echo esc_attr( $cfg['cat_key'] ); ?>" id="<?php echo esc_attr( $cfg['card_id'] ); ?>" data-url="<?php echo esc_url( $prod_url ); ?>">
          <a href="<?php echo esc_url( $prod_url ); ?>" class="products-card-v2__image-link" aria-label="<?php echo esc_attr( $aria_lbl ); ?>">
            <div class="products-card-v2__image-wrap">
              <img src="<?php echo esc_url( $p['image'] ); ?>" alt="<?php echo esc_attr( $p['title'] ); ?>" loading="lazy">
              <span class="products-card-v2__tag">
                <?php echo $cfg['tag']; ?>
              </span>
            </div>
          </a>
          <div class="products-card-v2__body">
            <span class="products-card-v2__category"><?php echo esc_html( strtoupper( $p['category'] ) ); ?></span>
            <h3 class="products-card-v2__title">
              <a href="<?php echo esc_url( $prod_url ); ?>"><?php echo esc_html( $p['title'] ); ?></a>
            </h3>
            <p class="products-card-v2__desc"><?php echo esc_html( $p['desc'] ); ?></p>
            <div class="products-card-v2__specs">
              <?php foreach ( $cfg['specs'] as $spec_pill ) : ?>
                <span class="spec-pill"><?php echo esc_html( $spec_pill ); ?></span>
              <?php endforeach; ?>
            </div>
            <div class="products-card-v2__footer">
              <a href="<?php echo esc_url( $prod_url ); ?>" class="products-card-v2__btn">
                <?php echo $btn_lbl; ?>
              </a>
              <a href="<?php echo esc_url( fitra_url( '/#rfq' ) ); ?>" class="products-card-v2__btn-rfq" title="<?php echo esc_attr( $rfq_lbl ); ?>">
                RFQ &rarr;
              </a>
            </div>
          </div>
        </article>
        <?php endforeach; ?>
      </div>

      <!-- No Products Found State -->
      <div class="products-empty-state" id="products-empty-state" hidden>
        <p class="products-empty-state__text"><?php echo fitra_t_val( 'No products found for the selected category.', 'Tidak ada produk yang ditemukan untuk kategori yang dipilih.' ); ?></p>
        <button type="button" class="btn btn--orange" id="btn-reset-filters"><?php echo fitra_t_val( 'VIEW ALL PRODUCTS', 'LIHAT SEMUA PRODUK' ); ?></button>
      </div>

      <!-- ===== 3B. PRODUCTS PAGINATION BAR ===== -->
      <nav class="products-pagination" id="products-pagination" aria-label="<?php echo esc_attr( fitra_t_val( 'Product Pagination Navigation', 'Navigasi Halaman Produk' ) ); ?>">
        <div class="products-pagination__inner">
          <button type="button" class="products-pagination__btn products-pagination__btn--prev" id="prod-page-prev" aria-label="<?php echo esc_attr( fitra_t_val( 'Previous Page', 'Halaman Sebelumnya' ) ); ?>" disabled>
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
              <polyline points="15 18 9 12 15 6"></polyline>
            </svg>
            <span>PREV</span>
          </button>
          <div class="products-pagination__pages" id="prod-pagination-numbers">
            <!-- Populated dynamically via JS -->
          </div>
          <button type="button" class="products-pagination__btn products-pagination__btn--next" id="prod-page-next" aria-label="<?php echo esc_attr( fitra_t_val( 'Next Page', 'Halaman Berikutnya' ) ); ?>">
            <span>NEXT</span>
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
              <polyline points="9 18 15 12 9 6"></polyline>
            </svg>
          </button>
        </div>
        <div class="products-pagination__info" id="prod-pagination-info">
          <?php echo fitra_t_val( 'Showing <span id="prod-showing-count">1-9</span> of <span id="prod-total-count">18</span> products', 'Menampilkan <span id="prod-showing-count">1-9</span> dari <span id="prod-total-count">18</span> produk' ); ?>
        </div>
      </nav>

    </div>
  </main>

  <!-- ===== 4. CONSULTATION CTA SECTION ===== -->
  <section class="products-cta-v2" id="products-cta">
    <div class="cta-banner-wrapper">
      <div class="cta-banner-card">
        <!-- Technical Vector Globe Motif -->
        <div class="cta-banner-card__bg" aria-hidden="true">
          <svg viewBox="0 0 1000 500" fill="none" xmlns="http://www.w3.org/2000/svg" class="cta-banner-card__globe">
            <defs>
              <radialGradient id="cta-globe-glow-prod" cx="50%" cy="50%" r="50%">
                <stop offset="0%" stop-color="#e8611a" stop-opacity="0.22"/>
                <stop offset="60%" stop-color="#0e1726" stop-opacity="0.06"/>
                <stop offset="100%" stop-color="#060b13" stop-opacity="0"/>
              </radialGradient>
              <pattern id="cta-dot-grid-prod" x="0" y="0" width="24" height="24" patternUnits="userSpaceOnUse">
                <circle cx="2" cy="2" r="1.2" fill="rgba(255,255,255,0.08)"/>
              </pattern>
            </defs>
            <rect width="100%" height="100%" fill="url(#cta-dot-grid-prod)"/>
            <circle cx="500" cy="250" r="230" fill="url(#cta-globe-glow-prod)"/>
            <!-- Wireframe Globe Meridians & Parallels -->
            <circle cx="500" cy="250" r="210" stroke="rgba(255,255,255,0.12)" stroke-width="1.5" stroke-dasharray="4 4"/>
            <ellipse cx="500" cy="250" rx="140" ry="210" stroke="rgba(255,255,255,0.09)" stroke-width="1.2"/>
            <ellipse cx="500" cy="250" rx="70" ry="210" stroke="rgba(255,255,255,0.07)" stroke-width="1"/>
            <line x1="500" y1="40" x2="500" y2="460" stroke="rgba(255,255,255,0.1)" stroke-width="1.2"/>
            <line x1="290" y1="250" x2="710" y2="250" stroke="rgba(255,255,255,0.1)" stroke-width="1.2"/>
            <ellipse cx="500" cy="170" rx="190" ry="45" stroke="rgba(255,255,255,0.07)" stroke-width="1"/>
            <ellipse cx="500" cy="330" rx="190" ry="45" stroke="rgba(255,255,255,0.07)" stroke-width="1"/>
          </svg>
        </div>

        <div class="cta-banner-card__content">
          <span class="cta-banner-card__tag">
            <span class="meta-dash">&mdash;&mdash;</span> <?php echo fitra_t_val( 'PROCUREMENT &amp; SUPPLY', 'PENGADAAN &amp; PASOKAN' ); ?> <span class="meta-dash">&mdash;&mdash;</span>
          </span>
          <h2 class="cta-banner-card__title">
            <?php echo fitra_t_val( 'Let’s make your supply chain work smarter', 'Mari jadikan rantai pasok industri Anda bekerja lebih optimal' ); ?>
          </h2>
          <p class="cta-banner-card__desc">
            <?php echo fitra_t_val( 'Trusted by leading energy, mining, and industrial operators across Kalimantan from sourcing to delivery. Talk to our sales specialists or request a quote today.', 'Dipercaya oleh pelaku industri energi, pertambangan, dan pabrik pupuk terkemuka di Kalimantan untuk pengadaan terpadu. Hubungi tim sales kami atau ajukan permintaan penawaran sekarang.' ); ?>
          </p>
          <div class="cta-banner-card__actions">
            <a href="<?php echo esc_url( fitra_url( '/contact/' ) ); ?>" class="btn cta-banner-card__btn-primary">
              <?php echo fitra_t_val( 'Talk to sales', 'Hubungi Sales' ); ?>
            </a>
            <a href="<?php echo esc_url( home_url( '/#rfq' ) ); ?>" class="btn cta-banner-card__btn-secondary">
              <?php echo fitra_t_val( 'Request a demo', 'Minta Penawaran (RFQ)' ); ?>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php
get_footer();
