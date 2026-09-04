<?php
/**
 * Template Name: Services Page
 * Template for the Services page (matches corporate industrial design mockup)
 * Fully bilingual (EN / ID)
 *
 * @package FitraPerkasa
 */

get_header();
?>

  <!-- ===== 1. SERVICES HERO ===== -->
  <section class="services-hero-v2" id="services-hero">
    <div class="services-hero-v2__overlay"></div>
    <img src="<?php echo fitra_img( 'hero-bg.jpg' ); ?>" alt="Industrial engineering operations" class="services-hero-v2__bg" fetchpriority="high">

    <div class="services-hero-v2__content">
      <div class="services-hero-v2__meta-tag">
        <span class="meta-dash">&mdash;&mdash;</span> <?php echo fitra_t_val( 'INTEGRATED INDUSTRIAL SOLUTIONS', 'SOLUSI INDUSTRI TERPADU' ); ?>
      </div>
      <h1 class="services-hero-v2__title"><?php echo fitra_t_val( 'Professional Technical &amp;<br>Engineering Services', 'Layanan Teknis &amp; Engineering<br>Profesional' ); ?></h1>
      <p class="services-hero-v2__subtitle"><?php echo fitra_t_val( 'World-class operational expertise supporting industrial infrastructure, manufacturing plants, and energy facilities with high precision.', 'Keahlian operasional kelas dunia untuk mendukung infrastruktur industri, manufaktur, dan sektor energi global dengan presisi tinggi.' ); ?></p>
    </div>
  </section>

  <!-- ===== 2. INTERACTIVE FILTER TABS BAR ===== -->
  <nav class="services-filter-bar" id="services-filter-bar" aria-label="<?php echo esc_attr( fitra_t_val( 'Service Divisions', 'Divisi Layanan' ) ); ?>">
    <div class="services-filter-bar__inner">
      <div class="services-filter-bar__list" role="tablist">
        <button type="button" class="services-filter-btn services-filter-btn--active" role="tab" aria-selected="true" aria-controls="division-mechanical" data-division="mechanical" id="tab-mechanical">
          MECHANICAL
        </button>
        <button type="button" class="services-filter-btn" role="tab" aria-selected="false" aria-controls="division-civils" data-division="civils" id="tab-civils">
          CIVILS
        </button>
        <button type="button" class="services-filter-btn" role="tab" aria-selected="false" aria-controls="division-electrical" data-division="electrical" id="tab-electrical">
          ELECTRICAL
        </button>
        <button type="button" class="services-filter-btn" role="tab" aria-selected="false" aria-controls="division-instrument" data-division="instrument" id="tab-instrument">
          INSTRUMENT
        </button>
        <button type="button" class="services-filter-btn" role="tab" aria-selected="false" aria-controls="division-inspection" data-division="inspection" id="tab-inspection">
          INSPECTION
        </button>
      </div>
    </div>
  </nav>

  <!-- ===== 3. SERVICE DIVISION CONTENT PANELS ===== -->
  <main class="services-content-area" id="services-content">
    <div class="services-content-area__inner">

      <!-- ===== PANEL 1: MECHANICAL ===== -->
      <article class="services-division-panel services-division-panel--active" id="division-mechanical" role="tabpanel" aria-labelledby="tab-mechanical" data-panel="mechanical">
        <div class="services-division-panel__grid">
          <!-- Left: Summary -->
          <div class="services-division-panel__left">
            <span class="section-tag"><?php echo fitra_t_val( '01 &mdash;&mdash; DIVISION', '01 &mdash;&mdash; DIVISI' ); ?></span>
            <h2 class="services-division-panel__title"><?php echo fitra_t_val( 'Mechanical Services', 'Layanan Mechanical' ); ?></h2>
            <p class="services-division-panel__desc"><?php echo fitra_t_val( 'Comprehensive mechanical fabrication and maintenance solutions, prioritizing structural integrity and plant operational uptime.', 'Solusi fabrikasi dan pemeliharaan mekanikal yang komprehensif, mengutamakan integritas struktural dan efisiensi operasional pabrik.' ); ?></p>
          </div>

          <!-- Right: 2-Column Capability Cards Grid -->
          <div class="services-division-panel__right">
            <div class="services-cards-grid">
              <!-- Card 1 -->
              <div class="services-capability-card">
                <div class="services-capability-card__icon">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#e8611a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                    <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                    <line x1="12" y1="22.08" x2="12" y2="12"></line>
                  </svg>
                </div>
                <div class="services-capability-card__body">
                  <h3 class="services-capability-card__title">Steel &amp; Pipe Fabrication</h3>
                  <p class="services-capability-card__desc"><?php echo fitra_t_val( 'Custom structural steel and piping spool fabrication conforming to ASME/API standards.', 'Fabrikasi baja dan sistem perpipaan kustom sesuai standar internasional ASME/API.' ); ?></p>
                </div>
              </div>

              <!-- Card 2 -->
              <div class="services-capability-card">
                <div class="services-capability-card__icon">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#e8611a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 19l7-7 3 3-7 7-3-3z"></path>
                    <path d="M18 13l-1.5-7.5L2 2l3.5 14.5L13 18l5-5z"></path>
                    <path d="M2 2l7.586 7.586"></path>
                    <circle cx="11" cy="11" r="2"></circle>
                  </svg>
                </div>
                <div class="services-capability-card__body">
                  <h3 class="services-capability-card__title">Painting &amp; Coating</h3>
                  <p class="services-capability-card__desc"><?php echo fitra_t_val( 'Heavy-duty anti-corrosion coating and blasting systems for harsh coastal and petrochemical environments.', 'Proteksi korosi tingkat tinggi untuk lingkungan industri ekstrem dan pesisir pantai.' ); ?></p>
                </div>
              </div>

              <!-- Card 3 -->
              <div class="services-capability-card">
                <div class="services-capability-card__icon">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#e8611a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                    <polyline points="2 17 12 22 22 17"></polyline>
                    <polyline points="2 12 12 17 22 12"></polyline>
                  </svg>
                </div>
                <div class="services-capability-card__body">
                  <h3 class="services-capability-card__title">Insulation &amp; Sealing</h3>
                  <p class="services-capability-card__desc"><?php echo fitra_t_val( 'High-temperature thermal insulation and acoustic cladding for maximum energy efficiency.', 'Sistem isolasi termal dan akustik untuk efisiensi energi serta keamanan operasional.' ); ?></p>
                </div>
              </div>

              <!-- Card 4 -->
              <div class="services-capability-card">
                <div class="services-capability-card__icon">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#e8611a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path>
                  </svg>
                </div>
                <div class="services-capability-card__body">
                  <h3 class="services-capability-card__title">Plant Maintenance</h3>
                  <p class="services-capability-card__desc"><?php echo fitra_t_val( 'Preventive maintenance, rotating equipment overhauls, and turnaround shutdown services.', 'Pemeliharaan preventif, perbaikan mesin rotasi, dan penanganan turnaround shutdown pabrik.' ); ?></p>
                </div>
              </div>

              <!-- Card 5 -->
              <div class="services-capability-card services-capability-card--full">
                <div class="services-capability-card__icon">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#e8611a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="1" y="3" width="15" height="13"></rect>
                    <polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon>
                    <circle cx="5.5" cy="18.5" r="2.5"></circle>
                    <circle cx="18.5" cy="18.5" r="2.5"></circle>
                  </svg>
                </div>
                <div class="services-capability-card__body">
                  <h3 class="services-capability-card__title">Heavy Equipment Rental</h3>
                  <p class="services-capability-card__desc"><?php echo fitra_t_val( 'Certified mobile crane, forklift, and aerial work platform rental with certified field operators.', 'Penyewaan alat berat berkualitas tinggi dengan operator tersertifikasi K3.' ); ?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </article>

      <!-- ===== PANEL 2: CIVILS ===== -->
      <article class="services-division-panel" id="division-civils" role="tabpanel" aria-labelledby="tab-civils" data-panel="civils" hidden>
        <div class="services-division-panel__grid">
          <!-- Left: Summary -->
          <div class="services-division-panel__left">
            <span class="section-tag"><?php echo fitra_t_val( '02 &mdash;&mdash; DIVISION', '02 &mdash;&mdash; DIVISI' ); ?></span>
            <h2 class="services-division-panel__title"><?php echo fitra_t_val( 'Civil Construction Services', 'Layanan Civils &amp; Konstruksi' ); ?></h2>
            <p class="services-division-panel__desc"><?php echo fitra_t_val( 'Industrial civil engineering and infrastructure development meeting stringent safety standards and structural load tolerances.', 'Konstruksi sipil industri berdaya tahan tinggi dengan standar keselamatan kerja dan rekayasa struktural terbaik.' ); ?></p>
          </div>

          <!-- Right: 2-Column Capability Cards Grid -->
          <div class="services-division-panel__right">
            <div class="services-cards-grid">
              <!-- Card 1 -->
              <div class="services-capability-card">
                <div class="services-capability-card__icon">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#e8611a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polygon points="12 2 19 21 12 17 5 21 12 2"></polygon>
                  </svg>
                </div>
                <div class="services-capability-card__body">
                  <h3 class="services-capability-card__title">Engineering Work &amp; Design</h3>
                  <p class="services-capability-card__desc"><?php echo fitra_t_val( 'Topographic survey, heavy equipment foundation calculations, and CAD structural planning.', 'Perencanaan desain struktural, pemetaan topografi, dan perhitungan pondasi beban berat.' ); ?></p>
                </div>
              </div>

              <!-- Card 2 -->
              <div class="services-capability-card">
                <div class="services-capability-card__icon">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#e8611a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                    <line x1="3" y1="9" x2="21" y2="9"></line>
                    <line x1="9" y1="21" x2="9" y2="9"></line>
                  </svg>
                </div>
                <div class="services-capability-card__body">
                  <h3 class="services-capability-card__title">Civil Construction &amp; Concrete</h3>
                  <p class="services-capability-card__desc"><?php echo fitra_t_val( 'Reinforced concrete structures, weighbridge foundations, and plant access corridor pavements.', 'Pembangunan struktur beton bertulang, jembatan timbang, dan jalan akses pabrik.' ); ?></p>
                </div>
              </div>

              <!-- Card 3 -->
              <div class="services-capability-card">
                <div class="services-capability-card__icon">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#e8611a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="2" y="7" width="20" height="15" rx="2" ry="2"></rect>
                    <polyline points="17 2 12 7 7 2"></polyline>
                  </svg>
                </div>
                <div class="services-capability-card__body">
                  <h3 class="services-capability-card__title">Scaffolding Work</h3>
                  <p class="services-capability-card__desc"><?php echo fitra_t_val( 'Certified tube & coupler and modular ringlock scaffolding for elevated refinery works.', 'Pemasangan perancah bersertifikasi K3 untuk pekerjaan elevasi tinggi kilang dan pabrik.' ); ?></p>
                </div>
              </div>

              <!-- Card 4 -->
              <div class="services-capability-card">
                <div class="services-capability-card__icon">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#e8611a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 21h18"></path>
                    <path d="M5 21V7l8-4v18"></path>
                    <path d="M19 21V11l-6-4"></path>
                  </svg>
                </div>
                <div class="services-capability-card__body">
                  <h3 class="services-capability-card__title">Site Grading &amp; Earthwork</h3>
                  <p class="services-capability-card__desc"><?php echo fitra_t_val( 'Land clearing, cut and fill earthmoving, and geotechnical slope stabilization.', 'Pematangan lahan, cut and fill, drainase primer, dan perkuatan lereng geoteknik.' ); ?></p>
                </div>
              </div>

              <!-- Card 5 -->
              <div class="services-capability-card services-capability-card--full">
                <div class="services-capability-card__icon">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#e8611a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z"></path>
                  </svg>
                </div>
                <div class="services-capability-card__body">
                  <h3 class="services-capability-card__title">Industrial Drainage Systems</h3>
                  <p class="services-capability-card__desc"><?php echo fitra_t_val( 'Culvert construction, containment retaining basins, and runoff drainage channels.', 'Sistem saluran limbah tertutup dan pengelolaan limpasan air permukaan terintegrasi.' ); ?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </article>

      <!-- ===== PANEL 3: ELECTRICAL ===== -->
      <article class="services-division-panel" id="division-electrical" role="tabpanel" aria-labelledby="tab-electrical" data-panel="electrical" hidden>
        <div class="services-division-panel__grid">
          <!-- Left: Summary -->
          <div class="services-division-panel__left">
            <span class="section-tag"><?php echo fitra_t_val( '03 &mdash;&mdash; DIVISION', '03 &mdash;&mdash; DIVISI' ); ?></span>
            <h2 class="services-division-panel__title"><?php echo fitra_t_val( 'Electrical &amp; HVAC Services', 'Layanan Electrical &amp; HVAC' ); ?></h2>
            <p class="services-division-panel__desc"><?php echo fitra_t_val( 'High-reliability low and medium voltage electrical installations and industrial climate control systems.', 'Infrastruktur kelistrikan tegangan menengah dan rendah serta sistem pendingin industri berkeandalan tinggi.' ); ?></p>
          </div>

          <!-- Right: 2-Column Capability Cards Grid -->
          <div class="services-division-panel__right">
            <div class="services-cards-grid">
              <!-- Card 1 -->
              <div class="services-capability-card">
                <div class="services-capability-card__icon">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#e8611a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon>
                  </svg>
                </div>
                <div class="services-capability-card__body">
                  <h3 class="services-capability-card__title">General Electrical Work</h3>
                  <p class="services-capability-card__desc"><?php echo fitra_t_val( 'Power cabling, distribution transformers, switchgears, and motor control centers (MCC).', 'Pemasangan kabel daya, trafo distribusi, cubicle, dan panel kontrol utama (MCC).' ); ?></p>
                </div>
              </div>

              <!-- Card 2 -->
              <div class="services-capability-card">
                <div class="services-capability-card__icon">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#e8611a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M9.59 4.59A2 2 0 1 1 11 8H2m10.59 11.41A2 2 0 1 0 14 16H2m15.73-8.27A2.5 2.5 0 1 1 19.5 12H2"></path>
                  </svg>
                </div>
                <div class="services-capability-card__body">
                  <h3 class="services-capability-card__title">Air Conditioning &amp; HVAC</h3>
                  <p class="services-capability-card__desc"><?php echo fitra_t_val( 'Industrial chillers, ducting fabrication, cleanroom ventilation, and humidity control.', 'Sistem pendingin terpusat (chiller), tata udara ruang bersih (cleanroom), dan ventilasi.' ); ?></p>
                </div>
              </div>

              <!-- Card 3 -->
              <div class="services-capability-card">
                <div class="services-capability-card__icon">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#e8611a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect>
                    <line x1="9" y1="9" x2="15" y2="15"></line>
                    <line x1="15" y1="9" x2="9" y2="15"></line>
                  </svg>
                </div>
                <div class="services-capability-card__body">
                  <h3 class="services-capability-card__title">Substation &amp; Transformer</h3>
                  <p class="services-capability-card__desc"><?php echo fitra_t_val( 'Substation construction, oil/dry transformer maintenance, and generator synchronization.', 'Instalasi dan peremajaan gardu induk, trafo oli/kering, serta sinkronisasi generator.' ); ?></p>
                </div>
              </div>

              <!-- Card 4 -->
              <div class="services-capability-card">
                <div class="services-capability-card__icon">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#e8611a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="12" y1="1" x2="12" y2="3"></line>
                    <line x1="12" y1="21" x2="12" y2="23"></line>
                    <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
                    <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
                    <line x1="1" y1="12" x2="3" y2="12"></line>
                    <line x1="21" y1="12" x2="23" y2="12"></line>
                    <circle cx="12" cy="12" r="5"></circle>
                  </svg>
                </div>
                <div class="services-capability-card__body">
                  <h3 class="services-capability-card__title">Industrial Lighting &amp; Grounding</h3>
                  <p class="services-capability-card__desc"><?php echo fitra_t_val( 'Explosion-proof LED fixtures, lightning protection mesh, and low-impedance grounding grids.', 'Sistem penerangan hemat energi explosion-proof dan penangkal petir terpadu.' ); ?></p>
                </div>
              </div>

              <!-- Card 5 -->
              <div class="services-capability-card services-capability-card--full">
                <div class="services-capability-card__icon">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#e8611a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                  </svg>
                </div>
                <div class="services-capability-card__body">
                  <h3 class="services-capability-card__title">Power Quality &amp; Efficiency Audit</h3>
                  <p class="services-capability-card__desc"><?php echo fitra_t_val( 'Harmonic analysis, capacitor bank power factor correction, and facility energy efficiency audits.', 'Analisis harmonisa, koreksi faktor daya (kapasitor bank), dan audit efisiensi listrik.' ); ?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </article>

      <!-- ===== PANEL 4: INSTRUMENT ===== -->
      <article class="services-division-panel" id="division-instrument" role="tabpanel" aria-labelledby="tab-instrument" data-panel="instrument" hidden>
        <div class="services-division-panel__grid">
          <!-- Left: Summary -->
          <div class="services-division-panel__left">
            <span class="section-tag"><?php echo fitra_t_val( '04 &mdash;&mdash; DIVISION', '04 &mdash;&mdash; DIVISI' ); ?></span>
            <h2 class="services-division-panel__title"><?php echo fitra_t_val( 'Instrumentation &amp; Control Services', 'Layanan Instrument &amp; Kontrol' ); ?></h2>
            <p class="services-division-panel__desc"><?php echo fitra_t_val( 'Process automation, high-accuracy instrument calibration, and complete emergency shutdown (ESD) systems.', 'Otomasi proses, kalibrasi instrumen presisi tinggi, dan instalasi sistem kendali terintegrasi.' ); ?></p>
          </div>

          <!-- Right: 2-Column Capability Cards Grid -->
          <div class="services-division-panel__right">
            <div class="services-cards-grid">
              <!-- Card 1 -->
              <div class="services-capability-card">
                <div class="services-capability-card__icon">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#e8611a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect>
                    <rect x="9" y="9" width="6" height="6"></rect>
                    <line x1="9" y1="1" x2="9" y2="4"></line>
                    <line x1="15" y1="1" x2="15" y2="4"></line>
                    <line x1="9" y1="20" x2="9" y2="23"></line>
                    <line x1="15" y1="20" x2="15" y2="23"></line>
                    <line x1="20" y1="9" x2="23" y2="9"></line>
                    <line x1="20" y1="14" x2="23" y2="14"></line>
                    <line x1="1" y1="9" x2="4" y2="9"></line>
                    <line x1="1" y1="14" x2="4" y2="14"></line>
                  </svg>
                </div>
                <div class="services-capability-card__body">
                  <h3 class="services-capability-card__title">Control Systems &amp; PLC/SCADA</h3>
                  <p class="services-capability-card__desc"><?php echo fitra_t_val( 'PLC programming, DCS configuration, and human-machine interface (SCADA) development.', 'Pemrograman dan integrasi sistem DCS, PLC, serta antarmuka kontrol SCADA industri.' ); ?></p>
                </div>
              </div>

              <!-- Card 2 -->
              <div class="services-capability-card">
                <div class="services-capability-card__icon">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#e8611a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"></circle>
                    <polyline points="12 6 12 12 16 14"></polyline>
                  </svg>
                </div>
                <div class="services-capability-card__body">
                  <h3 class="services-capability-card__title">Calibration &amp; Testing</h3>
                  <p class="services-capability-card__desc"><?php echo fitra_t_val( 'Certified calibration for pressure transmitters, thermocouples, RTDs, flowmeters, and level sensors.', 'Kalibrasi berkala sensor tekanan, temperatur, aliran (flow), dan level bersertifikat.' ); ?></p>
                </div>
              </div>

              <!-- Card 3 -->
              <div class="services-capability-card">
                <div class="services-capability-card__icon">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#e8611a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M8.5 14.5A2.5 2.5 0 0 0 11 12c0-1.38-.5-2-1-3-1.072-2.143-.224-4.054 2-6 .5 2.5 2 4.9 4 6.5 2 1.6 3 3.5 3 5.5a7 7 0 1 1-14 0c0-1.153.433-2.294 1-3a2.5 2.5 0 0 0 2.5 2.5z"></path>
                  </svg>
                </div>
                <div class="services-capability-card__body">
                  <h3 class="services-capability-card__title">Fire &amp; Gas Detection System</h3>
                  <p class="services-capability-card__desc"><?php echo fitra_t_val( 'Toxic gas detectors, optical flame sensors, and automated emergency shutdown (ESD) loops.', 'Instalasi sensor gas beracun, detektor api infrared, dan sistem interlock darurat (ESD).' ); ?></p>
                </div>
              </div>

              <!-- Card 4 -->
              <div class="services-capability-card">
                <div class="services-capability-card__icon">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#e8611a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="3"></circle>
                    <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
                  </svg>
                </div>
                <div class="services-capability-card__body">
                  <h3 class="services-capability-card__title">Control Valve Overhaul</h3>
                  <p class="services-capability-card__desc"><?php echo fitra_t_val( 'Disassembly, seat grinding, smart digital positioner calibration, and hydrostatic pressure testing.', 'Rekondisi, penggantian trim, dan kalibrasi positioner katup kontrol otomatis.' ); ?></p>
                </div>
              </div>

              <!-- Card 5 -->
              <div class="services-capability-card services-capability-card--full">
                <div class="services-capability-card__icon">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#e8611a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="2" y1="12" x2="22" y2="12"></line>
                    <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                  </svg>
                </div>
                <div class="services-capability-card__body">
                  <h3 class="services-capability-card__title">Analytical Instrumentation</h3>
                  <p class="services-capability-card__desc"><?php echo fitra_t_val( 'Online gas chromatographs, continuous emission monitors (CEMS), and liquid analyzers.', 'Pemasangan gas analyzer, pH meter, konduktivitas, dan moisture detector online.' ); ?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </article>

      <!-- ===== PANEL 5: INSPECTION ===== -->
      <article class="services-division-panel" id="division-inspection" role="tabpanel" aria-labelledby="tab-inspection" data-panel="inspection" hidden>
        <div class="services-division-panel__grid">
          <!-- Left: Summary -->
          <div class="services-division-panel__left">
            <span class="section-tag"><?php echo fitra_t_val( '05 &mdash;&mdash; DIVISION', '05 &mdash;&mdash; DIVISI' ); ?></span>
            <h2 class="services-division-panel__title"><?php echo fitra_t_val( 'Inspection &amp; NDT Services', 'Layanan Inspection &amp; NDT' ); ?></h2>
            <p class="services-division-panel__desc"><?php echo fitra_t_val( 'Advanced Non-Destructive Testing (NDT) and metallurgical inspection ensuring total safety and regulatory asset compliance.', 'Pengujian tak rusak (NDT) dan inspeksi kualitas komprehensif untuk menjamin keselamatan dan kepatuhan standar industri.' ); ?></p>
          </div>

          <!-- Right: 2-Column Capability Cards Grid -->
          <div class="services-division-panel__right">
            <div class="services-cards-grid">
              <!-- Card 1 -->
              <div class="services-capability-card">
                <div class="services-capability-card__icon">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#e8611a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                    <polyline points="9 12 11 14 15 10"></polyline>
                  </svg>
                </div>
                <div class="services-capability-card__body">
                  <h3 class="services-capability-card__title">Ultrasonic Testing (UT &amp; PAUT)</h3>
                  <p class="services-capability-card__desc"><?php echo fitra_t_val( 'Phased array ultrasonic testing and thickness mapping for pipeline and boiler inspection.', 'Pemeriksaan ketebalan dinding dan deteksi cacat internal sambungan las berteknologi phased array.' ); ?></p>
                </div>
              </div>

              <!-- Card 2 -->
              <div class="services-capability-card">
                <div class="services-capability-card__icon">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#e8611a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                  </svg>
                </div>
                <div class="services-capability-card__body">
                  <h3 class="services-capability-card__title">Magnetic &amp; Penetrant (MPI / DPT)</h3>
                  <p class="services-capability-card__desc"><?php echo fitra_t_val( 'Surface micro-crack detection on welds, turbine blades, and pressure vessel nozzles.', 'Deteksi retak mikro permukaan pada material feromagnetik dan komponen kritis mesin.' ); ?></p>
                </div>
              </div>

              <!-- Card 3 -->
              <div class="services-capability-card">
                <div class="services-capability-card__icon">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#e8611a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="2" y="2" width="20" height="20" rx="2.18" ry="2.18"></rect>
                    <line x1="7" y1="2" x2="7" y2="22"></line>
                    <line x1="17" y1="2" x2="17" y2="22"></line>
                    <line x1="2" y1="12" x2="22" y2="12"></line>
                    <line x1="2" y1="7" x2="7" y2="7"></line>
                    <line x1="2" y1="17" x2="7" y2="17"></line>
                    <line x1="17" y1="17" x2="22" y2="17"></line>
                    <line x1="17" y1="7" x2="22" y2="7"></line>
                  </svg>
                </div>
                <div class="services-capability-card__body">
                  <h3 class="services-capability-card__title">Radiography Testing (RT)</h3>
                  <p class="services-capability-card__desc"><?php echo fitra_t_val( 'Volumetric radiographic inspection using X-ray and gamma-ray isotopes for critical welds.', 'Inspeksi visual interior pipa dan bejana tekan menggunakan sinar X-ray dan gamma.' ); ?></p>
                </div>
              </div>

              <!-- Card 4 -->
              <div class="services-capability-card">
                <div class="services-capability-card__icon">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#e8611a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"></circle>
                    <path d="M16.24 7.76a6 6 0 0 1 0 8.49m-8.48-.01a6 6 0 0 1 0-8.49m11.31-2.82a10 10 0 0 1 0 14.14m-14.14 0a10 10 0 0 1 0-14.14"></path>
                  </svg>
                </div>
                <div class="services-capability-card__body">
                  <h3 class="services-capability-card__title">Eddy Current &amp; Borescope</h3>
                  <p class="services-capability-card__desc"><?php echo fitra_t_val( 'Heat exchanger tube internal inspection and remote video borescope endoscopy.', 'Inspeksi internal tube heat exchanger dan turbin tanpa pembongkaran struktural.' ); ?></p>
                </div>
              </div>

              <!-- Card 5 -->
              <div class="services-capability-card services-capability-card--full">
                <div class="services-capability-card__icon">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#e8611a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                  </svg>
                </div>
                <div class="services-capability-card__body">
                  <h3 class="services-capability-card__title">Hardness &amp; Positive Material ID (PMI)</h3>
                  <p class="services-capability-card__desc"><?php echo fitra_t_val( 'On-site portable XRF alloy chemistry verification and Leeb/Equotip hardness testing.', 'Verifikasi komposisi paduan logam dan uji kekerasan material di lapangan secara real-time.' ); ?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </article>

    </div>
  </main>

  <!-- ===== 4. CONSULTATION CTA SECTION ===== -->
  <section class="services-cta-v2" id="services-cta">
    <div class="services-cta-v2__inner">
      <span class="services-cta-v2__tag"><?php echo fitra_t_val( 'TECHNICAL CONSULTATION', 'KONSULTASI TEKNIS' ); ?></span>
      <h2 class="services-cta-v2__title"><?php echo fitra_t_val( 'Ready to Start Your Project?', 'Siap Untuk Memulai Proyek Anda?' ); ?></h2>
      <p class="services-cta-v2__subtitle"><?php echo fitra_t_val( 'Discuss your project specifications with our engineering team for optimized cost and high-quality execution.', 'Konsultasikan kebutuhan teknis Anda dengan tim ahli kami untuk solusi yang efisien dan berkualitas tinggi.' ); ?></p>
      <div class="services-cta-v2__actions">
        <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn--orange services-cta-v2__btn-primary">
          <?php echo fitra_t_val( 'CONTACT US NOW', 'HUBUNGI KAMI SEKARANG' ); ?>
        </a>
        <a href="<?php echo esc_url( home_url( '/profile/' ) ); ?>" class="btn btn--outline-dark services-cta-v2__btn-secondary">
          <?php echo fitra_t_val( 'DOWNLOAD COMPANY PROFILE', 'UNDUH PROFIL PERUSAHAAN' ); ?>
        </a>
      </div>
    </div>
  </section>

<?php
get_footer();
