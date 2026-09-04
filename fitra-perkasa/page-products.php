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

        <!-- Product 1: Tube, Pipe, Fitting & Valve (Pipes) -->
        <article class="products-card-v2" data-category="pipes" id="prod-card-pipes" data-url="<?php echo esc_url( home_url( '/products/tube-pipe-fitting-valve/' ) ); ?>">
          <a href="<?php echo esc_url( home_url( '/products/tube-pipe-fitting-valve/' ) ); ?>" class="products-card-v2__image-link" aria-label="Lihat detail Tube, Pipe, Fitting & Valve">
            <div class="products-card-v2__image-wrap">
              <img src="<?php echo fitra_img( 'product-pipes.jpg' ); ?>" alt="Industrial Tube, Pipe, Fitting &amp; Valve" loading="lazy">
              <span class="products-card-v2__tag">
                <span class="tag-bold">[ PIPES ]</span> PIPE &amp; FITTING
              </span>
            </div>
          </a>
          <div class="products-card-v2__body">
            <span class="products-card-v2__category">PIPES &amp; FITTINGS</span>
            <h3 class="products-card-v2__title">
              <a href="<?php echo esc_url( home_url( '/products/tube-pipe-fitting-valve/' ) ); ?>">Tube, Pipe, Fitting and Valve</a>
            </h3>
            <p class="products-card-v2__desc">Carbon steel, stainless steel (SS304/SS316), dan alloy piping material berstandar ASTM/ASME untuk industri migas dan petrokimia.</p>
            <div class="products-card-v2__specs">
              <span class="spec-pill">ASTM A106 / A53</span>
              <span class="spec-pill">SCH 40 / 80 / 160</span>
            </div>
            <div class="products-card-v2__footer">
              <a href="<?php echo esc_url( home_url( '/products/tube-pipe-fitting-valve/' ) ); ?>" class="products-card-v2__btn">
                LIHAT DETAIL &rarr;
              </a>
              <a href="<?php echo esc_url( home_url( '/#rfq' ) ); ?>" class="products-card-v2__btn-rfq" title="Minta Penawaran (RFQ)">
                RFQ &rarr;
              </a>
            </div>
          </div>
        </article>

        <!-- Product 2: High Pressure Flanges & Forged Fittings (Pipes) -->
        <article class="products-card-v2" data-category="pipes" id="prod-card-flanges" data-url="<?php echo esc_url( home_url( '/products/flanges-forged-fittings/' ) ); ?>">
          <a href="<?php echo esc_url( home_url( '/products/flanges-forged-fittings/' ) ); ?>" class="products-card-v2__image-link" aria-label="Lihat detail High Pressure Flanges & Weldolets">
            <div class="products-card-v2__image-wrap">
              <img src="<?php echo fitra_img( 'product-pipes.jpg' ); ?>" alt="High Pressure Flanges and Forged Fittings" loading="lazy">
              <span class="products-card-v2__tag">
                <span class="tag-bold">[ PIPES ]</span> FLANGES &amp; FORGED
              </span>
            </div>
          </a>
          <div class="products-card-v2__body">
            <span class="products-card-v2__category">PIPES &amp; FITTINGS</span>
            <h3 class="products-card-v2__title">
              <a href="<?php echo esc_url( home_url( '/products/flanges-forged-fittings/' ) ); ?>">High Pressure Flanges &amp; Weldolets</a>
            </h3>
            <p class="products-card-v2__desc">Flens leher las (WNRF), blind flange, slip-on, dan fitting tempa kelas 150# hingga 2500# berpresisi tinggi dengan sertifikasi lengkap.</p>
            <div class="products-card-v2__specs">
              <span class="spec-pill">ASME B16.5</span>
              <span class="spec-pill">Class 150# - 2500#</span>
            </div>
            <div class="products-card-v2__footer">
              <a href="<?php echo esc_url( home_url( '/products/flanges-forged-fittings/' ) ); ?>" class="products-card-v2__btn">
                LIHAT DETAIL &rarr;
              </a>
              <a href="<?php echo esc_url( home_url( '/#rfq' ) ); ?>" class="products-card-v2__btn-rfq" title="Minta Penawaran (RFQ)">
                RFQ &rarr;
              </a>
            </div>
          </div>
        </article>

        <!-- Product 3: Seamless Heat Exchanger Tubing (Pipes) -->
        <article class="products-card-v2" data-category="pipes" id="prod-card-tubing" data-url="<?php echo esc_url( home_url( '/products/seamless-heat-exchanger-tubing/' ) ); ?>">
          <a href="<?php echo esc_url( home_url( '/products/seamless-heat-exchanger-tubing/' ) ); ?>" class="products-card-v2__image-link" aria-label="Lihat detail Seamless Heat Exchanger Tubing">
            <div class="products-card-v2__image-wrap">
              <img src="<?php echo fitra_img( 'product-pipes.jpg' ); ?>" alt="Seamless Precision Heat Exchanger Tubing" loading="lazy">
              <span class="products-card-v2__tag">
                <span class="tag-bold">[ PIPES ]</span> SEAMLESS TUBING
              </span>
            </div>
          </a>
          <div class="products-card-v2__body">
            <span class="products-card-v2__category">PIPES &amp; FITTINGS</span>
            <h3 class="products-card-v2__title">
              <a href="<?php echo esc_url( home_url( '/products/seamless-heat-exchanger-tubing/' ) ); ?>">Seamless Precision Heat Exchanger Tubing</a>
            </h3>
            <p class="products-card-v2__desc">Pipa tubing presisi seamless cold drawn untuk boiler, heat exchanger, hydraulic line, dan instrumentasi grade tahan tekanan fluida ekstrim.</p>
            <div class="products-card-v2__specs">
              <span class="spec-pill">ASTM A179 / A213</span>
              <span class="spec-pill">OD 1/4" - 2"</span>
            </div>
            <div class="products-card-v2__footer">
              <a href="<?php echo esc_url( home_url( '/products/seamless-heat-exchanger-tubing/' ) ); ?>" class="products-card-v2__btn">
                LIHAT DETAIL &rarr;
              </a>
              <a href="<?php echo esc_url( home_url( '/#rfq' ) ); ?>" class="products-card-v2__btn-rfq" title="Minta Penawaran (RFQ)">
                RFQ &rarr;
              </a>
            </div>
          </div>
        </article>

        <!-- Product 4: Steels for Industrial & Construction (Steels) -->
        <article class="products-card-v2" data-category="steels" id="prod-card-steels" data-url="<?php echo esc_url( home_url( '/products/steels/' ) ); ?>">
          <a href="<?php echo esc_url( home_url( '/products/steels/' ) ); ?>" class="products-card-v2__image-link" aria-label="Lihat detail Steels for Industrial & Construction">
            <div class="products-card-v2__image-wrap">
              <img src="<?php echo fitra_img( 'product-steels.jpg' ); ?>" alt="Steels for Industrial and Construction" loading="lazy">
              <span class="products-card-v2__tag">
                <span class="tag-bold">[ STEEL ]</span> PLATE &amp; PROFILE
              </span>
            </div>
          </a>
          <div class="products-card-v2__body">
            <span class="products-card-v2__category">STEEL &amp; PLATES</span>
            <h3 class="products-card-v2__title">
              <a href="<?php echo esc_url( home_url( '/products/steels/' ) ); ?>">Steels for Industrial &amp; Construction</a>
            </h3>
            <p class="products-card-v2__desc">Plat baja kapal (marine plate), WF beam, H-beam, UNP channel, dan profil konstruksi bersertifikat pabrik untuk rancang bangun berat.</p>
            <div class="products-card-v2__specs">
              <span class="spec-pill">ASTM A36 / SS400</span>
              <span class="spec-pill">SNI Certified</span>
            </div>
            <div class="products-card-v2__footer">
              <a href="<?php echo esc_url( home_url( '/products/steels/' ) ); ?>" class="products-card-v2__btn">
                LIHAT DETAIL &rarr;
              </a>
              <a href="<?php echo esc_url( home_url( '/#rfq' ) ); ?>" class="products-card-v2__btn-rfq" title="Minta Penawaran (RFQ)">
                RFQ &rarr;
              </a>
            </div>
          </div>
        </article>

        <!-- Product 5: Wear Resistant & Boiler Plate (Steels) -->
        <article class="products-card-v2" data-category="steels" id="prod-card-boiler" data-url="<?php echo esc_url( home_url( '/products/wear-resistant-boiler-plate/' ) ); ?>">
          <a href="<?php echo esc_url( home_url( '/products/wear-resistant-boiler-plate/' ) ); ?>" class="products-card-v2__image-link" aria-label="Lihat detail Wear Resistant & Pressure Vessel Plate">
            <div class="products-card-v2__image-wrap">
              <img src="<?php echo fitra_img( 'product-steels.jpg' ); ?>" alt="Wear Resistant and Pressure Vessel Boiler Plate" loading="lazy">
              <span class="products-card-v2__tag">
                <span class="tag-bold">[ STEEL ]</span> HARDNESS &amp; BOILER
              </span>
            </div>
          </a>
          <div class="products-card-v2__body">
            <span class="products-card-v2__category">STEEL &amp; PLATES</span>
            <h3 class="products-card-v2__title">
              <a href="<?php echo esc_url( home_url( '/products/wear-resistant-boiler-plate/' ) ); ?>">Wear Resistant &amp; Pressure Vessel Plate</a>
            </h3>
            <p class="products-card-v2__desc">Plat baja tahan gesek (abrasion resistant) dan boiler plate ASTM A516 Gr. 70 untuk bejana tekan, tangki timbun, dan alat berat tambang.</p>
            <div class="products-card-v2__specs">
              <span class="spec-pill">ASTM A516 Gr. 70</span>
              <span class="spec-pill">Hardox Equivalent</span>
            </div>
            <div class="products-card-v2__footer">
              <a href="<?php echo esc_url( home_url( '/products/wear-resistant-boiler-plate/' ) ); ?>" class="products-card-v2__btn">
                LIHAT DETAIL &rarr;
              </a>
              <a href="<?php echo esc_url( home_url( '/#rfq' ) ); ?>" class="products-card-v2__btn-rfq" title="Minta Penawaran (RFQ)">
                RFQ &rarr;
              </a>
            </div>
          </div>
        </article>

        <!-- Product 6: Heavy Structural Beams & Channels (Steels) -->
        <article class="products-card-v2" data-category="steels" id="prod-card-beams" data-url="<?php echo esc_url( home_url( '/products/heavy-structural-beams-channels/' ) ); ?>">
          <a href="<?php echo esc_url( home_url( '/products/heavy-structural-beams-channels/' ) ); ?>" class="products-card-v2__image-link" aria-label="Lihat detail Heavy Structural Beams & Channels">
            <div class="products-card-v2__image-wrap">
              <img src="<?php echo fitra_img( 'product-steels.jpg' ); ?>" alt="Heavy Structural Beams and Hollow Sections" loading="lazy">
              <span class="products-card-v2__tag">
                <span class="tag-bold">[ STEEL ]</span> BEAMS &amp; CHANNELS
              </span>
            </div>
          </a>
          <div class="products-card-v2__body">
            <span class="products-card-v2__category">STEEL &amp; PLATES</span>
            <h3 class="products-card-v2__title">
              <a href="<?php echo esc_url( home_url( '/products/heavy-structural-beams-channels/' ) ); ?>">Heavy Structural Beams &amp; Hollow Sections</a>
            </h3>
            <p class="products-card-v2__desc">Balok baja struktural profil Wide Flange (WF), H-Beam, pipa hollow kotak, dan siku (angle bar) berstandar JIS/ASTM untuk pilar gedung dan conveyor truss.</p>
            <div class="products-card-v2__specs">
              <span class="spec-pill">JIS G3101 SS400</span>
              <span class="spec-pill">Mill Certificate ISO</span>
            </div>
            <div class="products-card-v2__footer">
              <a href="<?php echo esc_url( home_url( '/products/heavy-structural-beams-channels/' ) ); ?>" class="products-card-v2__btn">
                LIHAT DETAIL &rarr;
              </a>
              <a href="<?php echo esc_url( home_url( '/#rfq' ) ); ?>" class="products-card-v2__btn-rfq" title="Minta Penawaran (RFQ)">
                RFQ &rarr;
              </a>
            </div>
          </div>
        </article>

        <!-- Product 7: Gasket and Packing Material (Gaskets) -->
        <article class="products-card-v2" data-category="gaskets" id="prod-card-gasket" data-url="<?php echo esc_url( home_url( '/products/gasket-packing/' ) ); ?>">
          <a href="<?php echo esc_url( home_url( '/products/gasket-packing/' ) ); ?>" class="products-card-v2__image-link" aria-label="Lihat detail Gasket & Packing">
            <div class="products-card-v2__image-wrap">
              <img src="<?php echo fitra_img( 'product-gasket-bearing.jpg' ); ?>" alt="Gasket and Packing Industrial Sealing" loading="lazy">
              <span class="products-card-v2__tag">
                <span class="tag-bold">[ PARTS ]</span> GASKET &amp; PACKING
              </span>
            </div>
          </a>
          <div class="products-card-v2__body">
            <span class="products-card-v2__category">GASKET &amp; SEALS</span>
            <h3 class="products-card-v2__title">
              <a href="<?php echo esc_url( home_url( '/products/gasket-packing/' ) ); ?>">Gasket &amp; Packing (Custom Material)</a>
            </h3>
            <p class="products-card-v2__desc">Spiral wound gasket (SWG), ring joint gasket (RTJ), non-asbestos sheet, dan gland packing tahan kimia serta suhu tinggi.</p>
            <div class="products-card-v2__specs">
              <span class="spec-pill">ASME B16.20</span>
              <span class="spec-pill">PTFE / Graphite Fill</span>
            </div>
            <div class="products-card-v2__footer">
              <a href="<?php echo esc_url( home_url( '/products/gasket-packing/' ) ); ?>" class="products-card-v2__btn">
                LIHAT DETAIL &rarr;
              </a>
              <a href="<?php echo esc_url( home_url( '/#rfq' ) ); ?>" class="products-card-v2__btn-rfq" title="Minta Penawaran (RFQ)">
                RFQ &rarr;
              </a>
            </div>
          </div>
        </article>

        <!-- Product 8: Precision Bearings & Rotary Seals (Gaskets) -->
        <article class="products-card-v2" data-category="gaskets" id="prod-card-bearing" data-url="<?php echo esc_url( home_url( '/products/bearing-sealing/' ) ); ?>">
          <a href="<?php echo esc_url( home_url( '/products/bearing-sealing/' ) ); ?>" class="products-card-v2__image-link" aria-label="Lihat detail Precision Bearings & Rotary Seals">
            <div class="products-card-v2__image-wrap">
              <img src="<?php echo fitra_img( 'product-gasket-bearing.jpg' ); ?>" alt="Precision Bearings and Rotary Mechanical Seals" loading="lazy">
              <span class="products-card-v2__tag">
                <span class="tag-bold">[ PARTS ]</span> BEARING &amp; ROTARY
              </span>
            </div>
          </a>
          <div class="products-card-v2__body">
            <span class="products-card-v2__category">GASKET &amp; SEALS</span>
            <h3 class="products-card-v2__title">
              <a href="<?php echo esc_url( home_url( '/products/bearing-sealing/' ) ); ?>">Precision Bearings &amp; Rotary Seals</a>
            </h3>
            <p class="products-card-v2__desc">Deep groove ball bearing, spherical roller bearing, cartridge mechanical seal, dan oil seal tahan abrasi untuk pompa serta turbin industri.</p>
            <div class="products-card-v2__specs">
              <span class="spec-pill">ISO 9001 Tested</span>
              <span class="spec-pill">Heavy Duty Roller</span>
            </div>
            <div class="products-card-v2__footer">
              <a href="<?php echo esc_url( home_url( '/products/bearing-sealing/' ) ); ?>" class="products-card-v2__btn">
                LIHAT DETAIL &rarr;
              </a>
              <a href="<?php echo esc_url( home_url( '/#rfq' ) ); ?>" class="products-card-v2__btn-rfq" title="Minta Penawaran (RFQ)">
                RFQ &rarr;
              </a>
            </div>
          </div>
        </article>

        <!-- Product 9: High-Temperature Mechanical Cartridge Seals (Gaskets) -->
        <article class="products-card-v2" data-category="gaskets" id="prod-card-seals" data-url="<?php echo esc_url( home_url( '/products/high-temp-mechanical-cartridge-seals/' ) ); ?>">
          <a href="<?php echo esc_url( home_url( '/products/high-temp-mechanical-cartridge-seals/' ) ); ?>" class="products-card-v2__image-link" aria-label="Lihat detail High-Temperature Cartridge Seals">
            <div class="products-card-v2__image-wrap">
              <img src="<?php echo fitra_img( 'product-gasket-bearing.jpg' ); ?>" alt="High-Temperature Mechanical Cartridge Seals" loading="lazy">
              <span class="products-card-v2__tag">
                <span class="tag-bold">[ PARTS ]</span> SEALING SOLUTIONS
              </span>
            </div>
          </a>
          <div class="products-card-v2__body">
            <span class="products-card-v2__category">GASKET &amp; SEALS</span>
            <h3 class="products-card-v2__title">
              <a href="<?php echo esc_url( home_url( '/products/high-temp-mechanical-cartridge-seals/' ) ); ?>">High-Temperature Cartridge Seals</a>
            </h3>
            <p class="products-card-v2__desc">Solusi mechanical seal cartridge tunggal dan ganda tahan korosi fluida kimia agresif, slurry pertambangan, dan temperatur tinggi hingga 400°C.</p>
            <div class="products-card-v2__specs">
              <span class="spec-pill">API 682 Standard</span>
              <span class="spec-pill">Silicon Carbide Face</span>
            </div>
            <div class="products-card-v2__footer">
              <a href="<?php echo esc_url( home_url( '/products/high-temp-mechanical-cartridge-seals/' ) ); ?>" class="products-card-v2__btn">
                LIHAT DETAIL &rarr;
              </a>
              <a href="<?php echo esc_url( home_url( '/#rfq' ) ); ?>" class="products-card-v2__btn-rfq" title="Minta Penawaran (RFQ)">
                RFQ &rarr;
              </a>
            </div>
          </div>
        </article>

        <!-- Product 10: Gear Box Sumitomo Paramax (Drives) -->
        <article class="products-card-v2" data-category="drives" id="prod-card-gearbox" data-url="<?php echo esc_url( home_url( '/products/gear-box-sumitomo/' ) ); ?>">
          <a href="<?php echo esc_url( home_url( '/products/gear-box-sumitomo/' ) ); ?>" class="products-card-v2__image-link" aria-label="Lihat detail Gear Box Sumitomo">
            <div class="products-card-v2__image-wrap">
              <img src="<?php echo fitra_img( 'product-gearbox.jpg' ); ?>" alt="Gear Box Sumitomo Paramax and Cyclo" loading="lazy">
              <span class="products-card-v2__tag">
                <span class="tag-bold">[ DRIVES ]</span> HEAVY GEARBOX
              </span>
            </div>
          </a>
          <div class="products-card-v2__body">
            <span class="products-card-v2__category">MECHANICAL DRIVES</span>
            <h3 class="products-card-v2__title">
              <a href="<?php echo esc_url( home_url( '/products/gear-box-sumitomo/' ) ); ?>">Gear Box (Sumitomo Paramax &amp; Cyclo)</a>
            </h3>
            <p class="products-card-v2__desc">Solusi transmisi daya dan reduksi putaran berkeandalan tinggi untuk conveyor pertambangan, ball mill, mixer, dan pabrik pupuk.</p>
            <div class="products-card-v2__specs">
              <span class="spec-pill">Sumitomo Paramax</span>
              <span class="spec-pill">High Torque Ratio</span>
            </div>
            <div class="products-card-v2__footer">
              <a href="<?php echo esc_url( home_url( '/products/gear-box-sumitomo/' ) ); ?>" class="products-card-v2__btn">
                LIHAT DETAIL &rarr;
              </a>
              <a href="<?php echo esc_url( home_url( '/#rfq' ) ); ?>" class="products-card-v2__btn-rfq" title="Minta Penawaran (RFQ)">
                RFQ &rarr;
              </a>
            </div>
          </div>
        </article>

        <!-- Product 11: Electric Motors & Speed Reducers (Drives) -->
        <article class="products-card-v2" data-category="drives" id="prod-card-motors" data-url="<?php echo esc_url( home_url( '/products/electric-motors-speed-reducers/' ) ); ?>">
          <a href="<?php echo esc_url( home_url( '/products/electric-motors-speed-reducers/' ) ); ?>" class="products-card-v2__image-link" aria-label="Lihat detail Electric Motors & Speed Reducers">
            <div class="products-card-v2__image-wrap">
              <img src="<?php echo fitra_img( 'gearbox-gallery-1.jpg' ); ?>" alt="Industrial Electric Motors and Speed Reducers" loading="lazy">
              <span class="products-card-v2__tag">
                <span class="tag-bold">[ DRIVES ]</span> MOTOR &amp; REDUCER
              </span>
            </div>
          </a>
          <div class="products-card-v2__body">
            <span class="products-card-v2__category">MECHANICAL DRIVES</span>
            <h3 class="products-card-v2__title">
              <a href="<?php echo esc_url( home_url( '/products/electric-motors-speed-reducers/' ) ); ?>">Electric Motors &amp; Speed Reducers</a>
            </h3>
            <p class="products-card-v2__desc">Motor induksi 3-fasa efisiensi tinggi (standar IE3), worm gear reducer, dan planetary gear untuk penggerak konstan 24/7 di lini produksi.</p>
            <div class="products-card-v2__specs">
              <span class="spec-pill">IE3 High Efficiency</span>
              <span class="spec-pill">IP55 / IP66 Rated</span>
            </div>
            <div class="products-card-v2__footer">
              <a href="<?php echo esc_url( home_url( '/products/electric-motors-speed-reducers/' ) ); ?>" class="products-card-v2__btn">
                LIHAT DETAIL &rarr;
              </a>
              <a href="<?php echo esc_url( home_url( '/#rfq' ) ); ?>" class="products-card-v2__btn-rfq" title="Minta Penawaran (RFQ)">
                RFQ &rarr;
              </a>
            </div>
          </div>
        </article>

        <!-- Product 12: Industrial Flexible Couplings (Drives) -->
        <article class="products-card-v2" data-category="drives" id="prod-card-couplings" data-url="<?php echo esc_url( home_url( '/products/industrial-flexible-couplings/' ) ); ?>">
          <a href="<?php echo esc_url( home_url( '/products/industrial-flexible-couplings/' ) ); ?>" class="products-card-v2__image-link" aria-label="Lihat detail Flexible Couplings & Drive Shafts">
            <div class="products-card-v2__image-wrap">
              <img src="<?php echo fitra_img( 'gearbox-gallery-2.jpg' ); ?>" alt="Industrial Flexible Couplings and Drive Shafts" loading="lazy">
              <span class="products-card-v2__tag">
                <span class="tag-bold">[ DRIVES ]</span> COUPLING &amp; SHAFT
              </span>
            </div>
          </a>
          <div class="products-card-v2__body">
            <span class="products-card-v2__category">MECHANICAL DRIVES</span>
            <h3 class="products-card-v2__title">
              <a href="<?php echo esc_url( home_url( '/products/industrial-flexible-couplings/' ) ); ?>">Flexible Couplings &amp; Drive Shafts</a>
            </h3>
            <p class="products-card-v2__desc">Coupling gear fleksibel, grid coupling, tyre coupling, dan poros transmisi baja tempa tahan torsi kejut tinggi untuk koneksi motor ke gearbox.</p>
            <div class="products-card-v2__specs">
              <span class="spec-pill">API 671 / ISO 10441</span>
              <span class="spec-pill">Torsionally Resilient</span>
            </div>
            <div class="products-card-v2__footer">
              <a href="<?php echo esc_url( home_url( '/products/industrial-flexible-couplings/' ) ); ?>" class="products-card-v2__btn">
                LIHAT DETAIL &rarr;
              </a>
              <a href="<?php echo esc_url( home_url( '/#rfq' ) ); ?>" class="products-card-v2__btn-rfq" title="Minta Penawaran (RFQ)">
                RFQ &rarr;
              </a>
            </div>
          </div>
        </article>

        <!-- Product 13: Industrial Control & Isolation Valves (Valves) -->
        <article class="products-card-v2" data-category="valves" id="prod-card-valves" data-url="<?php echo esc_url( home_url( '/products/industrial-control-isolation-valves/' ) ); ?>">
          <a href="<?php echo esc_url( home_url( '/products/industrial-control-isolation-valves/' ) ); ?>" class="products-card-v2__image-link" aria-label="Lihat detail Industrial Control & Isolation Valves">
            <div class="products-card-v2__image-wrap">
              <img src="<?php echo fitra_img( 'svc-instrument.jpg' ); ?>" alt="Industrial Control and Isolation Valves" loading="lazy">
              <span class="products-card-v2__tag">
                <span class="tag-bold">[ VALVES ]</span> CONTROL &amp; BALL
              </span>
            </div>
          </a>
          <div class="products-card-v2__body">
            <span class="products-card-v2__category">VALVES &amp; GAUGES</span>
            <h3 class="products-card-v2__title">
              <a href="<?php echo esc_url( home_url( '/products/industrial-control-isolation-valves/' ) ); ?>">Industrial Control &amp; Isolation Valves</a>
            </h3>
            <p class="products-card-v2__desc">Gate valve, globe valve, check valve, butterfly valve, dan ball valve 2-way/3-way class 150# hingga 1500# dengan aktuator pneumatik/elektrik.</p>
            <div class="products-card-v2__specs">
              <span class="spec-pill">API 6D / API 600</span>
              <span class="spec-pill">Pneumatic Actuated</span>
            </div>
            <div class="products-card-v2__footer">
              <a href="<?php echo esc_url( home_url( '/products/industrial-control-isolation-valves/' ) ); ?>" class="products-card-v2__btn">
                LIHAT DETAIL &rarr;
              </a>
              <a href="<?php echo esc_url( home_url( '/#rfq' ) ); ?>" class="products-card-v2__btn-rfq" title="Minta Penawaran (RFQ)">
                RFQ &rarr;
              </a>
            </div>
          </div>
        </article>

        <!-- Product 14: Instrumentation Gauges & Manifolds (Valves) -->
        <article class="products-card-v2" data-category="valves" id="prod-card-gauges" data-url="<?php echo esc_url( home_url( '/products/instrumentation-gauges-manifolds/' ) ); ?>">
          <a href="<?php echo esc_url( home_url( '/products/instrumentation-gauges-manifolds/' ) ); ?>" class="products-card-v2__image-link" aria-label="Lihat detail Instrumentation Gauges & Manifolds">
            <div class="products-card-v2__image-wrap">
              <img src="<?php echo fitra_img( 'svc-instrument.jpg' ); ?>" alt="Instrumentation Pressure Gauges and Manifolds" loading="lazy">
              <span class="products-card-v2__tag">
                <span class="tag-bold">[ VALVES ]</span> PRESSURE &amp; SENSOR
              </span>
            </div>
          </a>
          <div class="products-card-v2__body">
            <span class="products-card-v2__category">VALVES &amp; GAUGES</span>
            <h3 class="products-card-v2__title">
              <a href="<?php echo esc_url( home_url( '/products/instrumentation-gauges-manifolds/' ) ); ?>">Instrumentation Gauges &amp; Manifolds</a>
            </h3>
            <p class="products-card-v2__desc">Pressure gauge stainless steel dial glycerin-filled, differential pressure transmitter, thermowell, dan valve manifold 3-way/5-way berpresisi tinggi.</p>
            <div class="products-card-v2__specs">
              <span class="spec-pill">Accuracy 0.5% - 1.0%</span>
              <span class="spec-pill">SS316 Wetted Parts</span>
            </div>
            <div class="products-card-v2__footer">
              <a href="<?php echo esc_url( home_url( '/products/instrumentation-gauges-manifolds/' ) ); ?>" class="products-card-v2__btn">
                LIHAT DETAIL &rarr;
              </a>
              <a href="<?php echo esc_url( home_url( '/#rfq' ) ); ?>" class="products-card-v2__btn-rfq" title="Minta Penawaran (RFQ)">
                RFQ &rarr;
              </a>
            </div>
          </div>
        </article>

        <!-- Product 15: Pressure Safety Relief Valves (Valves) -->
        <article class="products-card-v2" data-category="valves" id="prod-card-safetyvalves" data-url="<?php echo esc_url( home_url( '/products/pressure-safety-relief-valves/' ) ); ?>">
          <a href="<?php echo esc_url( home_url( '/products/pressure-safety-relief-valves/' ) ); ?>" class="products-card-v2__image-link" aria-label="Lihat detail Pressure Safety Relief & Check Valves">
            <div class="products-card-v2__image-wrap">
              <img src="<?php echo fitra_img( 'svc-instrument.jpg' ); ?>" alt="Pressure Safety Relief and Check Valves" loading="lazy">
              <span class="products-card-v2__tag">
                <span class="tag-bold">[ VALVES ]</span> SAFETY &amp; CHECK
              </span>
            </div>
          </a>
          <div class="products-card-v2__body">
            <span class="products-card-v2__category">VALVES &amp; GAUGES</span>
            <h3 class="products-card-v2__title">
              <a href="<?php echo esc_url( home_url( '/products/pressure-safety-relief-valves/' ) ); ?>">Pressure Safety Relief &amp; Check Valves</a>
            </h3>
            <p class="products-card-v2__desc">Safety relief valve pegas berstandar ASME Section VIII untuk proteksi lonjakan tekanan boiler, steam line, bejana tekan kimia, dan pipa transmisi gas.</p>
            <div class="products-card-v2__specs">
              <span class="spec-pill">ASME Sec VIII / API 526</span>
              <span class="spec-pill">Set Pressure Certified</span>
            </div>
            <div class="products-card-v2__footer">
              <a href="<?php echo esc_url( home_url( '/products/pressure-safety-relief-valves/' ) ); ?>" class="products-card-v2__btn">
                LIHAT DETAIL &rarr;
              </a>
              <a href="<?php echo esc_url( home_url( '/#rfq' ) ); ?>" class="products-card-v2__btn-rfq" title="Minta Penawaran (RFQ)">
                RFQ &rarr;
              </a>
            </div>
          </div>
        </article>

        <!-- Product 16: Fuel & Industrial Lubricants (Energy) -->
        <article class="products-card-v2" data-category="energy" id="prod-card-fuel" data-url="<?php echo esc_url( home_url( '/products/fuel-migas-standard/' ) ); ?>">
          <a href="<?php echo esc_url( home_url( '/products/fuel-migas-standard/' ) ); ?>" class="products-card-v2__image-link" aria-label="Lihat detail Fuel & Industrial Lubricants">
            <div class="products-card-v2__image-wrap">
              <img src="<?php echo fitra_img( 'product-fuel-migas.jpg' ); ?>" alt="Industrial Fuel and Lubricants Distribution" loading="lazy">
              <span class="products-card-v2__tag">
                <span class="tag-bold">[ ENERGY ]</span> FUEL &amp; LUBRICANT
              </span>
            </div>
          </a>
          <div class="products-card-v2__body">
            <span class="products-card-v2__category">ENERGY &amp; FUEL</span>
            <h3 class="products-card-v2__title">
              <a href="<?php echo esc_url( home_url( '/products/fuel-migas-standard/' ) ); ?>">Fuel &amp; Industrial Lubricants</a>
            </h3>
            <p class="products-card-v2__desc">Distribusi bahan bakar solar industri (B35/B40), oli hidrolik, gear oil sintetis, dan grease tahan beban berat untuk operasi mesin non-stop.</p>
            <div class="products-card-v2__specs">
              <span class="spec-pill">Biodiesel B35/B40</span>
              <span class="spec-pill">Bulk &amp; Drum Supply</span>
            </div>
            <div class="products-card-v2__footer">
              <a href="<?php echo esc_url( home_url( '/products/fuel-migas-standard/' ) ); ?>" class="products-card-v2__btn">
                LIHAT DETAIL &rarr;
              </a>
              <a href="<?php echo esc_url( home_url( '/#rfq' ) ); ?>" class="products-card-v2__btn-rfq" title="Minta Penawaran (RFQ)">
                RFQ &rarr;
              </a>
            </div>
          </div>
        </article>

        <!-- Product 17: Refinery Spares & Consumables (Energy) -->
        <article class="products-card-v2" data-category="energy" id="prod-card-spares" data-url="<?php echo esc_url( home_url( '/products/refinery-spares-consumables/' ) ); ?>">
          <a href="<?php echo esc_url( home_url( '/products/refinery-spares-consumables/' ) ); ?>" class="products-card-v2__image-link" aria-label="Lihat detail Refinery Spares & Consumables">
            <div class="products-card-v2__image-wrap">
              <img src="<?php echo fitra_img( 'factory-operations.jpg' ); ?>" alt="Refinery Spares and Industrial Consumables" loading="lazy">
              <span class="products-card-v2__tag">
                <span class="tag-bold">[ ENERGY ]</span> REFINERY SPARES
              </span>
            </div>
          </a>
          <div class="products-card-v2__body">
            <span class="products-card-v2__category">ENERGY &amp; FUEL</span>
            <h3 class="products-card-v2__title">
              <a href="<?php echo esc_url( home_url( '/products/refinery-spares-consumables/' ) ); ?>">Refinery Spares &amp; Consumables</a>
            </h3>
            <p class="products-card-v2__desc">Suku cadang operasional kilang migas, filter cartridge hidrolik, thermocouple sensor, insulation blanket, dan perlengkapan perbaikan berkala.</p>
            <div class="products-card-v2__specs">
              <span class="spec-pill">OEM Certified</span>
              <span class="spec-pill">Fast Lead Time</span>
            </div>
            <div class="products-card-v2__footer">
              <a href="<?php echo esc_url( home_url( '/products/refinery-spares-consumables/' ) ); ?>" class="products-card-v2__btn">
                LIHAT DETAIL &rarr;
              </a>
              <a href="<?php echo esc_url( home_url( '/#rfq' ) ); ?>" class="products-card-v2__btn-rfq" title="Minta Penawaran (RFQ)">
                RFQ &rarr;
              </a>
            </div>
          </div>
        </article>

        <!-- Product 18: Heavy Fuel Filtration & Turbine Spares (Energy) -->
        <article class="products-card-v2" data-category="energy" id="prod-card-powerfilters" data-url="<?php echo esc_url( home_url( '/products/heavy-fuel-filtration-turbine-spares/' ) ); ?>">
          <a href="<?php echo esc_url( home_url( '/products/heavy-fuel-filtration-turbine-spares/' ) ); ?>" class="products-card-v2__image-link" aria-label="Lihat detail Heavy Fuel Filtration & Turbine Spares">
            <div class="products-card-v2__image-wrap">
              <img src="<?php echo fitra_img( 'project-management-bg.jpg' ); ?>" alt="Heavy Fuel Filtration and Turbine Spares" loading="lazy">
              <span class="products-card-v2__tag">
                <span class="tag-bold">[ ENERGY ]</span> POWER &amp; FILTERS
              </span>
            </div>
          </a>
          <div class="products-card-v2__body">
            <span class="products-card-v2__category">ENERGY &amp; FUEL</span>
            <h3 class="products-card-v2__title">
              <a href="<?php echo esc_url( home_url( '/products/heavy-fuel-filtration-turbine-spares/' ) ); ?>">Heavy Fuel Filtration &amp; Turbine Spares</a>
            </h3>
            <p class="products-card-v2__desc">Sistem filtrasi bahan bakar sentrifugal, elemen separator air-solar, burner nozzle suku cadang gas turbine, dan consumables pembangkit listrik industri.</p>
            <div class="products-card-v2__specs">
              <span class="spec-pill">ISO 4406 Cleanliness</span>
              <span class="spec-pill">Micro-Glass Media</span>
            </div>
            <div class="products-card-v2__footer">
              <a href="<?php echo esc_url( home_url( '/products/heavy-fuel-filtration-turbine-spares/' ) ); ?>" class="products-card-v2__btn">
                LIHAT DETAIL &rarr;
              </a>
              <a href="<?php echo esc_url( home_url( '/#rfq' ) ); ?>" class="products-card-v2__btn-rfq" title="Minta Penawaran (RFQ)">
                RFQ &rarr;
              </a>
            </div>
          </div>
        </article>

      </div>

      <!-- No Products Found State -->
      <div class="products-empty-state" id="products-empty-state" hidden>
        <p class="products-empty-state__text">Tidak ada produk yang ditemukan untuk kategori yang dipilih.</p>
        <button type="button" class="btn btn--orange" id="btn-reset-filters">LIHAT SEMUA PRODUK</button>
      </div>

      <!-- ===== 3B. PRODUCTS PAGINATION BAR ===== -->
      <nav class="products-pagination" id="products-pagination" aria-label="Navigasi Halaman Produk">
        <div class="products-pagination__inner">
          <button type="button" class="products-pagination__btn products-pagination__btn--prev" id="prod-page-prev" aria-label="Halaman Sebelumnya" disabled>
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
              <polyline points="15 18 9 12 15 6"></polyline>
            </svg>
            <span>PREV</span>
          </button>
          <div class="products-pagination__pages" id="prod-pagination-numbers">
            <!-- Populated dynamically via JS -->
          </div>
          <button type="button" class="products-pagination__btn products-pagination__btn--next" id="prod-page-next" aria-label="Halaman Berikutnya">
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
