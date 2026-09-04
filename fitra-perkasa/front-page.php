<?php
/**
 * Front Page template — Homepage
 * Matches exact design mockup for PT Fitra Perkasa Inti
 * Fully bilingual (EN / ID)
 *
 * @package FitraPerkasa
 */

get_header();
?>

  <!-- ===== 1. HERO SECTION ===== -->
  <section class="hero hero--home" id="hero">
    <div class="hero__overlay"></div>
    <img src="<?php echo fitra_img( 'hero-port-crane.jpg' ); ?>" alt="Industrial logistics port and container crane operations" class="hero__bg" fetchpriority="high">
    
    <div class="hero__content">
      <div class="hero__meta-tag">
        <span class="hero__dash">&mdash;&mdash;</span> EST. 2018 <span class="hero__dash">&mdash;&mdash;</span> SURABAYA, EAST KALIMANTAN
      </div>
      <h1 class="hero__title"><?php echo fitra_t_val( 'Whole Supplier And Service<br>(Contractor)', 'Pemasok dan Kontraktor Jasa Terpadu<br>(General Contractor)' ); ?></h1>
      <p class="hero__subtitle"><?php echo fitra_t_val( 'A general contractor and supplier serving refineries, fertiliser plants and mining operations across Kalimantan since 2018. Customers is our priority.', 'Kontraktor umum dan pemasok terpercaya yang melayani kilang minyak, pabrik pupuk, dan industri pertambangan di seluruh Kalimantan sejak 2018. Kepuasan pelanggan adalah prioritas utama kami.' ); ?></p>
      
      <div class="hero__actions">
        <a href="#rfq" class="btn btn--orange" id="btn-hero-rfq"><?php echo fitra_t_val( 'REQUEST QUOTATION', 'MINTA PENAWARAN' ); ?></a>
        <a href="<?php echo esc_url( home_url( '/profile/' ) ); ?>" class="btn btn--glass" id="btn-hero-download">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
            <polyline points="7 10 12 15 17 10"></polyline>
            <line x1="12" y1="15" x2="12" y2="3"></line>
          </svg>
          <?php echo fitra_t_val( 'DOWNLOAD COMPANY PROFILE', 'UNDUH PROFIL PERUSAHAAN' ); ?>
        </a>
      </div>
    </div>
  </section>

  <!-- ===== 2. STATS BAR ===== -->
  <section class="stats-bar" id="stats">
    <div class="stats-bar__inner">
      <div class="stats-bar__grid">
        <div class="stat-item">
          <span class="stat-item__number">2018</span>
          <span class="stat-item__label"><?php echo fitra_t_val( 'ESTABLISHED', 'TAHUN BERDIRI' ); ?></span>
        </div>
        <div class="stat-item">
          <span class="stat-item__number">05</span>
          <span class="stat-item__label"><?php echo fitra_t_val( 'SERVICE DIVISIONS', 'DIVISI LAYANAN' ); ?></span>
        </div>
        <div class="stat-item">
          <span class="stat-item__number">18</span>
          <span class="stat-item__label"><?php echo fitra_t_val( 'SUPPLY CATEGORIES', 'KATEGORI SUPLAI' ); ?></span>
        </div>
        <div class="stat-item">
          <span class="stat-item__number">HSE</span>
          <span class="stat-item__label"><?php echo fitra_t_val( 'MS CERTIFIED CREW', 'TIM TERSERTIFIKASI K3' ); ?></span>
        </div>
      </div>
    </div>
  </section>

  <!-- ===== 3. VISION & MISSION SECTION ===== -->
  <section class="home-vision" id="vision">
    <div class="home-vision__inner">
      <div class="home-vision__grid">
        <!-- Left: Vision -->
        <div class="home-vision__left">
          <span class="section-tag"><?php echo fitra_t_val( '01 &mdash;&mdash; OUR VISION', '01 &mdash;&mdash; VISI KAMI' ); ?></span>
          <h2 class="home-vision__heading"><?php echo fitra_t_val( 'Become a leading contractor and supplier company in Kalimantan.', 'Menjadi perusahaan kontraktor dan pemasok terkemuka di Kalimantan.' ); ?></h2>
        </div>

        <!-- Right: Mission -->
        <div class="home-vision__right">
          <h3 class="home-vision__subhead"><?php echo fitra_t_val( 'MISSION', 'MISI' ); ?></h3>
          <ul class="home-vision__list">
            <li>
              <span class="home-vision__bullet">
                <svg width="10" height="10" viewBox="0 0 24 24" fill="#e8611a">
                  <polygon points="5 3 19 12 5 21 5 3"></polygon>
                </svg>
              </span>
              <span><?php echo fitra_t_val( 'Become a good partner &mdash; responsible and trusted for business partners.', 'Menjadi mitra terbaik &mdash; bertanggung jawab dan terpercaya bagi seluruh mitra bisnis.' ); ?></span>
            </li>
            <li>
              <span class="home-vision__bullet">
                <svg width="10" height="10" viewBox="0 0 24 24" fill="#e8611a">
                  <polygon points="5 3 19 12 5 21 5 3"></polygon>
                </svg>
              </span>
              <span><?php echo fitra_t_val( 'Provider of superior and best materials and services for business partners.', 'Penyedia material dan layanan jasa unggul serta berkualitas terbaik untuk mitra bisnis.' ); ?></span>
            </li>
          </ul>
          <a href="<?php echo esc_url( home_url( '/profile/' ) ); ?>" class="link-arrow">
            <?php echo fitra_t_val( 'READ THE COMPANY PROFILE &rarr;', 'BACA PROFIL PERUSAHAAN &rarr;' ); ?>
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- ===== 4. SERVICES SECTION (FIVE DIVISIONS) ===== -->
  <section class="home-services" id="services">
    <div class="home-services__inner">
      <div class="services-header">
        <div class="services-header__left">
          <span class="section-tag"><?php echo fitra_t_val( '02 &mdash;&mdash; SERVICES', '02 &mdash;&mdash; LAYANAN' ); ?></span>
          <h2 class="services-header__title"><?php echo fitra_t_val( 'Five divisions,<br>one contract.', 'Lima divisi,<br>satu kontrak terpadu.' ); ?></h2>
        </div>
        <div class="services-header__center">
          <p class="services-header__desc"><?php echo fitra_t_val( 'Fitra Perkasa Inti provides integrated engineering and technical services across five core divisions. We deliver quality, safety, and efficiency in every project we undertake.', 'Fitra Perkasa Inti menyediakan layanan teknis dan rekayasa terintegrasi di lima divisi inti. Kami menghadirkan kualitas tinggi, keselamatan kerja K3, dan efisiensi dalam setiap proyek.' ); ?></p>
        </div>
        <div class="services-header__right">
          <a href="<?php echo esc_url( home_url( '/services/' ) ); ?>" class="services-view-all">
            <?php echo fitra_t_val( 'VIEW ALL SERVICES &rarr;', 'LIHAT SEMUA LAYANAN &rarr;' ); ?>
          </a>
        </div>
      </div>

      <div class="services-cards">
        <!-- Card 01: Mechanical -->
        <article class="service-division-card" id="svc-card-mechanical">
          <div class="service-division-card__image-box">
            <img src="<?php echo fitra_img( 'svc-mechanical.jpg' ); ?>" alt="Mechanical Engineering &amp; Fabrication" loading="lazy">
            <div class="service-division-card__overlay"></div>
            <div class="service-division-card__num-badge">
              <span class="num-text">01</span>
              <span class="num-line"></span>
            </div>
            <div class="service-division-card__icon-badge">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="3"></circle>
                <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
              </svg>
            </div>
          </div>
          <div class="service-division-card__body">
            <h3 class="service-division-card__title">MECHANICAL</h3>
            <div class="service-division-card__accent-bar"></div>
            <ul class="service-division-card__list">
              <li><?php echo fitra_t_val( 'Steel &amp; Pipe Fabrication and Installation', 'Fabrikasi &amp; Instalasi Baja dan Pipa' ); ?></li>
              <li><?php echo fitra_t_val( 'Painting and Coating', 'Pengecatan &amp; Pelapisan Industri' ); ?></li>
              <li><?php echo fitra_t_val( 'Insulation and Sealing', 'Isolasi Panas &amp; Penyegelan' ); ?></li>
              <li><?php echo fitra_t_val( 'Maintenance and Engineering', 'Pemeliharaan Mesin &amp; Rekayasa' ); ?></li>
            </ul>
            <a href="<?php echo esc_url( home_url( '/services/' ) ); ?>" class="service-division-card__link">
              <?php echo fitra_t_val( 'EXPLORE &rarr;', 'JELAJAHI &rarr;' ); ?>
            </a>
          </div>
        </article>

        <!-- Card 02: Civils -->
        <article class="service-division-card" id="svc-card-civils">
          <div class="service-division-card__image-box">
            <img src="<?php echo fitra_img( 'svc-civils.jpg' ); ?>" alt="Civil Construction &amp; Engineering" loading="lazy">
            <div class="service-division-card__overlay"></div>
            <div class="service-division-card__num-badge">
              <span class="num-text">02</span>
              <span class="num-line"></span>
            </div>
            <div class="service-division-card__icon-badge">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                <rect x="4" y="2" width="16" height="20" rx="2" ry="2"></rect>
                <path d="M9 22v-4h6v4"></path>
                <path d="M8 6h.01"></path>
                <path d="M16 6h.01"></path>
                <path d="M12 6h.01"></path>
                <path d="M12 10h.01"></path>
                <path d="M12 14h.01"></path>
                <path d="M16 10h.01"></path>
                <path d="M16 14h.01"></path>
                <path d="M8 10h.01"></path>
                <path d="M8 14h.01"></path>
              </svg>
            </div>
          </div>
          <div class="service-division-card__body">
            <h3 class="service-division-card__title">CIVILS</h3>
            <div class="service-division-card__accent-bar"></div>
            <ul class="service-division-card__list">
              <li><?php echo fitra_t_val( 'Engineering Work', 'Pekerjaan Rekayasa Sipil' ); ?></li>
              <li><?php echo fitra_t_val( 'Civil Construction', 'Konstruksi Sipil &amp; Bangunan' ); ?></li>
              <li><?php echo fitra_t_val( 'Other Mechanical Work', 'Pekerjaan Mekanikal Terkait' ); ?></li>
              <li><?php echo fitra_t_val( 'Scaffolding Work', 'Pekerjaan Perancah (Scaffolding)' ); ?></li>
            </ul>
            <a href="<?php echo esc_url( home_url( '/services/' ) ); ?>" class="service-division-card__link">
              <?php echo fitra_t_val( 'EXPLORE &rarr;', 'JELAJAHI &rarr;' ); ?>
            </a>
          </div>
        </article>

        <!-- Card 03: Electrical -->
        <article class="service-division-card" id="svc-card-electrical">
          <div class="service-division-card__image-box">
            <img src="<?php echo fitra_img( 'svc-electrical.jpg' ); ?>" alt="Electrical and HVAC Solutions" loading="lazy">
            <div class="service-division-card__overlay"></div>
            <div class="service-division-card__num-badge">
              <span class="num-text">03</span>
              <span class="num-line"></span>
            </div>
            <div class="service-division-card__icon-badge">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                <path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"></path>
              </svg>
            </div>
          </div>
          <div class="service-division-card__body">
            <h3 class="service-division-card__title">ELECTRICAL</h3>
            <div class="service-division-card__accent-bar"></div>
            <ul class="service-division-card__list">
              <li><?php echo fitra_t_val( 'General Electrical Work', 'Pekerjaan Listrik Umum &amp; Panel' ); ?></li>
              <li><?php echo fitra_t_val( 'Air Conditioning Services', 'Layanan Pendingin Udara (AC)' ); ?></li>
              <li><?php echo fitra_t_val( 'HVAC Systems', 'Sistem Ventilasi &amp; HVAC Industri' ); ?></li>
            </ul>
            <a href="<?php echo esc_url( home_url( '/services/' ) ); ?>" class="service-division-card__link">
              <?php echo fitra_t_val( 'EXPLORE &rarr;', 'JELAJAHI &rarr;' ); ?>
            </a>
          </div>
        </article>

        <!-- Card 04: Instrument -->
        <article class="service-division-card" id="svc-card-instrument">
          <div class="service-division-card__image-box">
            <img src="<?php echo fitra_img( 'svc-instrument.jpg' ); ?>" alt="Instrumentation and Calibration" loading="lazy">
            <div class="service-division-card__overlay"></div>
            <div class="service-division-card__num-badge">
              <span class="num-text">04</span>
              <span class="num-line"></span>
            </div>
            <div class="service-division-card__icon-badge">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="10"></circle>
                <polyline points="12 6 12 12 16 14"></polyline>
              </svg>
            </div>
          </div>
          <div class="service-division-card__body">
            <h3 class="service-division-card__title">INSTRUMENT</h3>
            <div class="service-division-card__accent-bar"></div>
            <ul class="service-division-card__list">
              <li><?php echo fitra_t_val( 'Fire / Water System', 'Sistem Pemadam Kebakaran &amp; Air' ); ?></li>
              <li><?php echo fitra_t_val( 'General Instrument Work', 'Pekerjaan Instrumentasi Umum' ); ?></li>
              <li><?php echo fitra_t_val( 'Calibration Services', 'Layanan Kalibrasi Presisi' ); ?></li>
            </ul>
            <a href="<?php echo esc_url( home_url( '/services/' ) ); ?>" class="service-division-card__link">
              <?php echo fitra_t_val( 'EXPLORE &rarr;', 'JELAJAHI &rarr;' ); ?>
            </a>
          </div>
        </article>

        <!-- Card 05: Inspection -->
        <article class="service-division-card" id="svc-card-inspection">
          <div class="service-division-card__image-box">
            <img src="<?php echo fitra_img( 'svc-inspection.jpg' ); ?>" alt="Non-Destructive Testing &amp; Inspection" loading="lazy">
            <div class="service-division-card__overlay"></div>
            <div class="service-division-card__num-badge">
              <span class="num-text">05</span>
              <span class="num-line"></span>
            </div>
            <div class="service-division-card__icon-badge">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="11" cy="11" r="8"></circle>
                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
              </svg>
            </div>
          </div>
          <div class="service-division-card__body">
            <h3 class="service-division-card__title">INSPECTION</h3>
            <div class="service-division-card__accent-bar"></div>
            <ul class="service-division-card__list">
              <li>UT Hardness Testing</li>
              <li>MNPT PMI Chemical Analysis</li>
              <li>UT Phased Array (PAUT)</li>
              <li>Eddy Current &amp; Borescope</li>
            </ul>
            <a href="<?php echo esc_url( home_url( '/services/' ) ); ?>" class="service-division-card__link">
              <?php echo fitra_t_val( 'EXPLORE &rarr;', 'JELAJAHI &rarr;' ); ?>
            </a>
          </div>
        </article>
      </div>
    </div>

    <!-- Integrated Dark Metric Banner Below Services -->
    <div class="services-metrics-banner">
      <div class="services-metrics-banner__inner">
        <div class="metric-block">
          <div class="metric-block__icon">
            <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#e8611a" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
              <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
              <polyline points="9 12 11 14 15 10"></polyline>
            </svg>
          </div>
          <div class="metric-block__text">
            <span class="metric-block__number">100+</span>
            <span class="metric-block__label"><?php echo fitra_t_val( 'PROJECTS COMPLETED', 'PROYEK SELESAI' ); ?></span>
          </div>
        </div>

        <div class="metric-block">
          <div class="metric-block__icon">
            <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#e8611a" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
              <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
              <circle cx="9" cy="7" r="4"></circle>
              <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
              <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
            </svg>
          </div>
          <div class="metric-block__text">
            <span class="metric-block__number">50+</span>
            <span class="metric-block__label"><?php echo fitra_t_val( 'SKILLED PROFESSIONALS', 'TENAGA AHLI PROFESIONAL' ); ?></span>
          </div>
        </div>

        <div class="metric-block">
          <div class="metric-block__icon">
            <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#e8611a" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
              <circle cx="12" cy="8" r="7"></circle>
              <polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline>
            </svg>
          </div>
          <div class="metric-block__text">
            <span class="metric-block__number">10+</span>
            <span class="metric-block__label"><?php echo fitra_t_val( 'YEARS OF EXPERIENCE', 'TAHUN PENGALAMAN' ); ?></span>
          </div>
        </div>

        <div class="metric-block">
          <div class="metric-block__icon">
            <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#e8611a" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
              <path d="M2 18h20"></path>
              <path d="M4 18v-2a8 8 0 0 1 16 0v2"></path>
              <path d="M12 4v4"></path>
            </svg>
          </div>
          <div class="metric-block__text">
            <span class="metric-block__number">100%</span>
            <span class="metric-block__label"><?php echo fitra_t_val( 'COMMITMENT TO SAFETY', 'KOMITMEN KESELAMATAN K3' ); ?></span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ===== 5. PRODUCTS SECTION ===== -->
  <section class="home-products" id="products">
    <div class="home-products__inner">
      <div class="section-header">
        <div class="section-header__left">
          <span class="section-tag"><?php echo fitra_t_val( '03 &mdash;&mdash; PRODUCTS', '03 &mdash;&mdash; PRODUK' ); ?></span>
          <h2 class="section-title"><?php echo fitra_t_val( 'Pipe, steel, plate and everything around them.', 'Pipa, baja, pelat, dan seluruh perlengkapannya.' ); ?></h2>
        </div>
        <a href="<?php echo esc_url( home_url( '/products/' ) ); ?>" class="link-arrow link-arrow--top">
          <?php echo fitra_t_val( 'ALL 18 CATEGORIES &rarr;', 'SELURUH 18 KATEGORI &rarr;' ); ?>
        </a>
      </div>

      <div class="home-products__grid">
        <!-- Product 1 -->
        <article class="featured-prod-card" id="card-prod-pipes">
          <a href="<?php echo esc_url( home_url( '/products/tube-pipe-fitting-valve/' ) ); ?>" class="featured-prod-card__image-link">
            <div class="featured-prod-card__image-wrap">
              <img src="<?php echo fitra_img( 'product-pipes.jpg' ); ?>" alt="Industrial Tube, Pipe, Fitting & Valve" loading="lazy">
              <span class="featured-prod-card__tag">
                <span class="tag-bold">[ PIPES ]</span> PIPE &amp; FITTING
              </span>
            </div>
          </a>
          <div class="featured-prod-card__body">
            <h3 class="featured-prod-card__title">
              <a href="<?php echo esc_url( home_url( '/products/tube-pipe-fitting-valve/' ) ); ?>"><?php echo fitra_t_val( 'Tube, Pipe, Fitting and Valve', 'Tabung, Pipa, Sambungan &amp; Katup' ); ?></a>
            </h3>
            <p class="featured-prod-card__desc"><?php echo fitra_t_val( 'Carbon steel, stainless and alloy piping material for industrial service.', 'Material perpipaan baja karbon, stainless steel, dan paduan untuk berbagai kebutuhan industri.' ); ?></p>
          </div>
        </article>

        <!-- Product 2 -->
        <article class="featured-prod-card" id="card-prod-steels">
          <a href="<?php echo esc_url( home_url( '/products/steels/' ) ); ?>" class="featured-prod-card__image-link">
            <div class="featured-prod-card__image-wrap">
              <img src="<?php echo fitra_img( 'product-steels.jpg' ); ?>" alt="Steels for Industrial and Construction" loading="lazy">
              <span class="featured-prod-card__tag">
                <span class="tag-bold">[ STEEL ]</span> PLATE &amp; PROFILE
              </span>
            </div>
          </a>
          <div class="featured-prod-card__body">
            <h3 class="featured-prod-card__title">
              <a href="<?php echo esc_url( home_url( '/products/steels/' ) ); ?>"><?php echo fitra_t_val( 'Steels for Industrial and Construction', 'Baja Konstruksi &amp; Pelat Industri' ); ?></a>
            </h3>
            <p class="featured-prod-card__desc"><?php echo fitra_t_val( 'Plate, beam, channel, angle and reinforcement bar.', 'Pelat baja, profil H-Beam/WF, kanal UNP, besi siku, dan besi beton berkualitas tinggi.' ); ?></p>
          </div>
        </article>

        <!-- Product 3 -->
        <article class="featured-prod-card" id="card-prod-gaskets">
          <a href="<?php echo esc_url( home_url( '/products/gasket-packing/' ) ); ?>" class="featured-prod-card__image-link">
            <div class="featured-prod-card__image-wrap">
              <img src="<?php echo fitra_img( 'product-gasket-bearing.jpg' ); ?>" alt="Gasket and Packing / Custom Material" loading="lazy">
              <span class="featured-prod-card__tag">
                <span class="tag-bold">[ PARTS ]</span> GASKET &amp; BEARING
              </span>
            </div>
          </a>
          <div class="featured-prod-card__body">
            <h3 class="featured-prod-card__title">
              <a href="<?php echo esc_url( home_url( '/products/gasket-packing/' ) ); ?>"><?php echo fitra_t_val( 'Gasket and Packing / Custom Material', 'Gasket, Packing &amp; Komponen Kustom' ); ?></a>
            </h3>
            <p class="featured-prod-card__desc"><?php echo fitra_t_val( 'Standard and custom-cut gasket and packing material for industrial sealing.', 'Gasket standar serta pemotongan kustom material packing untuk penyegelan industri optimal.' ); ?></p>
          </div>
        </article>
      </div>
    </div>
  </section>

  <!-- ===== 6. REQUEST QUOTATION (DARK NAVY SECTION) ===== -->
  <section class="home-rfq" id="rfq">
    <div class="home-rfq__inner">
      <div class="home-rfq__grid">
        <!-- Left Column -->
        <div class="home-rfq__left">
          <span class="section-tag section-tag--orange"><?php echo fitra_t_val( '04 &mdash;&mdash; REQUEST QUOTATION', '04 &mdash;&mdash; PERMINTAAN PENAWARAN' ); ?></span>
          <h2 class="home-rfq__title"><?php echo fitra_t_val( 'Send us a specification. We reply within two working days.', 'Kirimkan spesifikasi proyek Anda. Kami merespons dalam 2 hari kerja.' ); ?></h2>
          <p class="home-rfq__desc"><?php echo fitra_t_val( 'Attach a BoQ or drawing and we will return a priced offer, delivery lead and Country of origin for every line item.', 'Lampirkan BoQ atau gambar teknis, dan tim engineering kami akan menyiapkan penawaran harga, estimasi pengiriman, serta sertifikasi asal material.' ); ?></p>

          <div class="home-rfq__badges">
            <a href="<?php echo esc_url( home_url( '/profile/' ) ); ?>" class="rfq-pill-btn">
              <span><?php echo fitra_t_val( 'Download Company Profile', 'Unduh Profil Perusahaan' ); ?></span>
              <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                <polyline points="7 10 12 15 17 10"></polyline>
                <line x1="12" y1="15" x2="12" y2="3"></line>
              </svg>
            </a>
            <a href="<?php echo esc_url( home_url( '/products/' ) ); ?>" class="rfq-pill-btn">
              <span><?php echo fitra_t_val( 'View Product Catalogue', 'Lihat Katalog Produk' ); ?></span>
              <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="10"></circle>
                <polyline points="12 6 12 12 14 14"></polyline>
              </svg>
            </a>
          </div>
        </div>

        <!-- Right Column: Interactive Form -->
        <div class="home-rfq__right">
          <form class="rfq-form" id="rfq-form" onsubmit="event.preventDefault(); alert('<?php echo esc_js( fitra_t_val( 'Thank you! Your quotation request has been submitted. Our commercial engineering team will respond within 2 working days.', 'Terima kasih! Permintaan penawaran Anda telah kami terima. Tim engineering kami akan merespons dalam 2 hari kerja.' ) ); ?>');">
            <div class="rfq-form__row">
              <div class="rfq-form__group">
                <label for="rfq-name"><?php echo fitra_t_val( 'NAME &amp; COMPANY', 'NAMA &amp; PERUSAHAAN' ); ?></label>
                <input type="text" id="rfq-name" name="name" placeholder="<?php echo fitra_t_val( 'John Doe, ACME Corp.', 'Budi Santoso, PT Industri Mandiri' ); ?>" required>
              </div>
              <div class="rfq-form__group">
                <label for="rfq-country"><?php echo fitra_t_val( 'COUNTRY', 'NEGARA' ); ?></label>
                <input type="text" id="rfq-country" name="country" value="Indonesia" required>
              </div>
            </div>

            <div class="rfq-form__row">
              <div class="rfq-form__group">
                <label for="rfq-email"><?php echo fitra_t_val( 'EMAIL', 'EMAIL' ); ?></label>
                <input type="email" id="rfq-email" name="email" placeholder="name@company.com" required>
              </div>
              <div class="rfq-form__group">
                <label for="rfq-phone"><?php echo fitra_t_val( 'PHONE / WHATSAPP', 'TELEPON / WHATSAPP' ); ?></label>
                <input type="tel" id="rfq-phone" name="phone" placeholder="+62..." required>
              </div>
            </div>

            <div class="rfq-form__group rfq-form__group--full">
              <label for="rfq-specs"><?php echo fitra_t_val( 'SPECIFICATIONS &amp; QUANTITY', 'SPESIFIKASI &amp; JUMLAH KEBUTUHAN' ); ?></label>
              <textarea id="rfq-specs" name="specs" rows="3" placeholder="<?php echo fitra_t_val( 'Describe your requirements, dimensions, grades, standards...', 'Jelaskan kebutuhan material, dimensi, grade, standar teknis...' ); ?>"></textarea>
            </div>

            <div class="rfq-form__footer">
              <label class="rfq-attach-btn" for="rfq-file">
                <input type="file" id="rfq-file" name="attachment" style="display: none;" onchange="document.getElementById('file-chosen').textContent = this.files[0] ? this.files[0].name : '<?php echo esc_js( fitra_t_val( '+ ATTACH BOQ / DRAWING', '+ LAMPIRKAN BOQ / GAMBAR' ) ); ?>'">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M21.44 11.05l-9.19 9.19a6 6 0 0 1-8.49-8.49l9.19-9.19a4 4 0 0 1 5.66 5.66l-9.2 9.19a2 2 0 0 1-2.83-2.83l8.49-8.48"></path>
                </svg>
                <span id="file-chosen"><?php echo fitra_t_val( '+ ATTACH BOQ / DRAWING', '+ LAMPIRKAN BOQ / GAMBAR' ); ?></span>
              </label>

              <button type="submit" class="btn btn--orange btn--rfq-submit" id="btn-submit-rfq">
                <?php echo fitra_t_val( 'SEND ENQUIRY', 'KIRIM PERMINTAAN' ); ?>
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- ===== 7. EVENT & NEWS SECTION ===== -->
  <section class="home-news" id="news">
    <div class="home-news__inner">
      <div class="section-header">
        <div class="section-header__left">
          <span class="section-tag"><?php echo fitra_t_val( '05 &mdash;&mdash; EVENT &amp; NEWS', '05 &mdash;&mdash; BERITA &amp; ACARA' ); ?></span>
          <h2 class="section-title"><?php echo fitra_t_val( 'Latest from the workshop.', 'Kabar terbaru dari lapangan &amp; workshop.' ); ?></h2>
        </div>
        <a href="<?php echo esc_url( home_url( '/news/' ) ); ?>" class="link-arrow link-arrow--top">
          <?php echo fitra_t_val( 'ALL NEWS &rarr;', 'SEMUA BERITA &rarr;' ); ?>
        </a>
      </div>

      <div class="home-news__grid">
        <!-- News Card 1 -->
        <article class="news-card" id="news-card-1">
          <div class="news-card__image-wrap">
            <img src="<?php echo fitra_img( 'news-construction.jpg' ); ?>" alt="Turnaround support completed at a Bontang fertiliser plant" loading="lazy">
            <span class="news-card__badge">[ SITE &mdash;&mdash; BONTANG SITE ]</span>
          </div>
          <div class="news-card__body">
            <div class="news-card__meta"><?php echo fitra_t_val( '21 MAY 2025 &bull; PROJECT', '21 MEI 2025 &bull; PROYEK' ); ?></div>
            <h3 class="news-card__title">
              <a href="<?php echo esc_url( home_url( '/news/turnaround-support-bontang/' ) ); ?>"><?php echo fitra_t_val( 'Turnaround support completed at a Bontang fertiliser plant', 'Dukungan pekerjaan turnaround sukses diselesaikan di pabrik pupuk Bontang' ); ?></a>
            </h3>
            <p class="news-card__desc"><?php echo fitra_t_val( 'Mechanical maintenance and critical piping overhauls safely delivered on schedule during major plant shutdown.', 'Pemeliharaan mekanikal dan perombakan sistem perpipaan kritis diselesaikan tepat waktu selama shutdown pabrik.' ); ?></p>
            <a href="<?php echo esc_url( home_url( '/news/turnaround-support-bontang/' ) ); ?>" class="news-card__link"><?php echo fitra_t_val( 'READ ARTICLE &rarr;', 'BACA ARTIKEL &rarr;' ); ?></a>
          </div>
        </article>

        <!-- News Card 2 -->
        <article class="news-card" id="news-card-2">
          <div class="news-card__image-wrap">
            <img src="<?php echo fitra_img( 'news-workshop.jpg' ); ?>" alt="Fabrication workshop on Jalan Poros Bontang – Sangatta expanded" loading="lazy">
            <span class="news-card__badge">[ SITE &mdash;&mdash; WORKSHOP ]</span>
          </div>
          <div class="news-card__body">
            <div class="news-card__meta"><?php echo fitra_t_val( '18 APR 2025 &bull; FACILITY', '18 APR 2025 &bull; FASILITAS' ); ?></div>
            <h3 class="news-card__title">
              <a href="<?php echo esc_url( home_url( '/news/metal-steel-indonesia-2024/' ) ); ?>"><?php echo fitra_t_val( 'Fabrication workshop on Jalan Poros Bontang &ndash; Sangatta expanded', 'Kapasitas workshop fabrikasi di Jalan Poros Bontang &ndash; Sangatta resmi diperluas' ); ?></a>
            </h3>
            <p class="news-card__desc"><?php echo fitra_t_val( 'Increased capacity for structural steel fabrication, automated spool welding, and blasting-painting bays.', 'Peningkatan kapasitas fabrikasi baja struktural, pengelasan spool pipa otomatis, dan area blasting-painting modern.' ); ?></p>
            <a href="<?php echo esc_url( home_url( '/news/metal-steel-indonesia-2024/' ) ); ?>" class="news-card__link"><?php echo fitra_t_val( 'READ ARTICLE &rarr;', 'BACA ARTIKEL &rarr;' ); ?></a>
          </div>
        </article>

        <!-- News Card 3 -->
        <article class="news-card" id="news-card-3">
          <div class="news-card__image-wrap">
            <img src="<?php echo fitra_img( 'news-training.jpg' ); ?>" alt="K3 refresher training for field crew and scaffolders" loading="lazy">
            <span class="news-card__badge">[ SITE &mdash;&mdash; HSE BRIEFING ]</span>
          </div>
          <div class="news-card__body">
            <div class="news-card__meta"><?php echo fitra_t_val( '02 APR 2025 &bull; HSE', '02 APR 2025 &bull; K3 HSE' ); ?></div>
            <h3 class="news-card__title">
              <a href="<?php echo esc_url( home_url( '/news/webinar-inovasi-material-infrastruktur/' ) ); ?>"><?php echo fitra_t_val( 'K3 refresher training for field crew and scaffolders', 'Pelatihan penyegaran standar K3 untuk seluruh teknisi lapangan dan scaffolder' ); ?></a>
            </h3>
            <p class="news-card__desc"><?php echo fitra_t_val( 'Reinforcing zero-accident culture, high-elevation scaffolding safety standards, and confined space protocols.', 'Memperkuat budaya zero accident, standar keselamatan perancah ketinggian, serta protokol ruang terbatas.' ); ?></p>
            <a href="<?php echo esc_url( home_url( '/news/webinar-inovasi-material-infrastruktur/' ) ); ?>" class="news-card__link"><?php echo fitra_t_val( 'READ ARTICLE &rarr;', 'BACA ARTIKEL &rarr;' ); ?></a>
          </div>
        </article>
      </div>
    </div>
  </section>

<?php
get_footer();
