<?php
/**
 * Template Name: Profile Page
 * Template for the Company Profile page (matches corporate design mockup)
 * Fully bilingual (EN / ID)
 *
 * @package FitraPerkasa
 */

get_header();
?>

  <!-- ===== 1. PROFILE HERO SECTION ===== -->
  <section class="profile-hero-v2" id="profile-hero">
    <div class="profile-hero-v2__overlay"></div>
    <img src="<?php echo fitra_img( 'hero-port-crane.jpg' ); ?>" alt="Industrial logistics operations" class="profile-hero-v2__bg" fetchpriority="high">

    <div class="profile-hero-v2__content">
      <div class="profile-hero-v2__meta-tag">
        <span class="meta-dash">&mdash;&mdash;</span> <?php echo fitra_t_val( 'ABOUT US', 'TENTANG KAMI' ); ?> <span class="meta-dash">&mdash;&mdash;</span> <?php echo fitra_t_val( 'CORPORATE PROFILE', 'PROFIL KORPORASI' ); ?>
      </div>
      <h1 class="profile-hero-v2__title"><?php echo fitra_t_val( 'Company Profile', 'Profil Perusahaan' ); ?></h1>
      <p class="profile-hero-v2__subtitle"><?php echo fitra_t_val( 'Uncompromising dedication to quality and precision in industrial supply and engineering solutions across Kalimantan since 2018.', 'Dedikasi tanpa kompromi pada kualitas dan presisi dalam pengadaan material industri dan jasa rekayasa di Kalimantan sejak tahun 2018.' ); ?></p>
    </div>
  </section>

  <!-- ===== 2. VISI & MISI SECTION ===== -->
  <section class="profile-vm-v2" id="visi-misi">
    <div class="profile-vm-v2__inner">
      <div class="profile-vm-v2__grid">
        <!-- Left: Visi -->
        <div class="profile-visi">
          <span class="section-tag"><?php echo fitra_t_val( '01 &mdash;&mdash; OUR VISION', '01 &mdash;&mdash; VISI KAMI' ); ?></span>
          <h2 class="profile-vm-v2__heading"><?php echo fitra_t_val( 'Vision', 'Visi' ); ?></h2>

          <div class="profile-visi__quote-box">
            <blockquote class="profile-visi__quote">
              &ldquo;<?php echo fitra_t_val( 'Become a leading contractor and supplier company in Kalimantan, fostering sustainable innovation and trusted partnerships.', 'Menjadi pemimpin terkemuka dalam industri kontraktor dan pasokan material yang mengedepankan inovasi berkelanjutan dan integritas tanpa batas.' ); ?>&rdquo;
            </blockquote>
          </div>

          <div class="profile-visi__stats">
            <div class="profile-stat-box">
              <span class="profile-stat-box__number">10+</span>
              <span class="profile-stat-box__label"><?php echo fitra_t_val( 'YEARS EXPERIENCE', 'TAHUN PENGALAMAN' ); ?></span>
            </div>
            <div class="profile-stat-box">
              <span class="profile-stat-box__number">100+</span>
              <span class="profile-stat-box__label"><?php echo fitra_t_val( 'COMPLETED PROJECTS', 'PROYEK SELESAI' ); ?></span>
            </div>
          </div>
        </div>

        <!-- Right: Misi -->
        <div class="profile-misi">
          <span class="section-tag"><?php echo fitra_t_val( '02 &mdash;&mdash; COMPANY MISSION', '02 &mdash;&mdash; MISI PERUSAHAAN' ); ?></span>
          <h2 class="profile-vm-v2__heading"><?php echo fitra_t_val( 'Mission', 'Misi' ); ?></h2>

          <div class="profile-misi__cards">
            <!-- Misi 1 -->
            <div class="profile-misi-card">
              <div class="profile-misi-card__icon">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#e8611a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                  <circle cx="12" cy="11" r="3"></circle>
                </svg>
              </div>
              <div class="profile-misi-card__text">
                <h3 class="profile-misi-card__title"><?php echo fitra_t_val( 'Highest Quality Standards', 'Standar Kualitas Tertinggi' ); ?></h3>
                <p class="profile-misi-card__desc"><?php echo fitra_t_val( 'Ensuring material and execution reliability through rigorous international certifications (ISO, ASME, API).', 'Menjamin keandalan material dan eksekusi proyek dengan standar sertifikasi internasional (ISO, ASME, API).' ); ?></p>
              </div>
            </div>

            <!-- Misi 2 -->
            <div class="profile-misi-card">
              <div class="profile-misi-card__icon">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#e8611a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                  <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                </svg>
              </div>
              <div class="profile-misi-card__text">
                <h3 class="profile-misi-card__title"><?php echo fitra_t_val( 'Integrated Logistics Network', 'Rantai Pasok Terintegrasi' ); ?></h3>
                <p class="profile-misi-card__desc"><?php echo fitra_t_val( 'Building rapid local logistics and inventory hubs in Balikpapan and Bontang for zero downtime delivery.', 'Membangun konektivitas logistik cepat serta gudang inventori di Balikpapan dan Bontang untuk ketepatan waktu pengiriman.' ); ?></p>
              </div>
            </div>

            <!-- Misi 3 -->
            <div class="profile-misi-card">
              <div class="profile-misi-card__icon">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#e8611a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M6 3h12l4 6-10 12L2 9l4-6z"></path>
                  <path d="M11 3L8 9l4 12 4-12-3-6"></path>
                  <path d="M2 9h20"></path>
                </svg>
              </div>
              <div class="profile-misi-card__text">
                <h3 class="profile-misi-card__title"><?php echo fitra_t_val( 'Strategic Partnerships', 'Kemitraan Strategis' ); ?></h3>
                <p class="profile-misi-card__desc"><?php echo fitra_t_val( 'Creating sustainable value for enterprise clients through honest pricing, transparency, and tailored technical support.', 'Menciptakan nilai tambah bagi mitra melalui transparansi data, penawaran kompetitif, dan solusi teknis yang akurat.' ); ?></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ===== 3. STRUKTUR ORGANISASI SECTION ===== -->
  <section class="profile-org-v2" id="struktur-organisasi">
    <div class="profile-org-v2__inner">
      <div class="profile-org-v2__header">
        <span class="section-tag section-tag--center"><?php echo fitra_t_val( '03 &mdash;&mdash; CORPORATE GOVERNANCE', '03 &mdash;&mdash; TATA KELOLA KORPORASI' ); ?></span>
        <h2 class="profile-org-v2__title"><?php echo fitra_t_val( 'Organizational Structure', 'Struktur Organisasi' ); ?></h2>
        <p class="profile-org-v2__subtitle"><?php echo fitra_t_val( 'Led by certified industrial engineers and executives with extensive cross-sector experience in energy, mining, and manufacturing.', 'Dipimpin oleh tenaga ahli profesional dan manajemen berpengalaman di industri energi, pertambangan, dan manufaktur.' ); ?></p>
      </div>

      <div class="org-tree-v2">
        <!-- Level 1: Direktur Utama (Dark Card with Orange Top Border) -->
        <div class="org-tree-v2__root">
          <div class="org-box-v2 org-box-v2--root">
            <span class="org-box-v2__role org-box-v2__role--orange"><?php echo fitra_t_val( 'PRESIDENT DIRECTOR', 'DIREKTUR UTAMA' ); ?></span>
            <h3 class="org-box-v2__name org-box-v2__name--light">Haris Wijaya</h3>
          </div>
        </div>

        <!-- Trunk Line -->
        <div class="org-tree-v2__stem"></div>

        <!-- Branch Line (Horizontal Connector) -->
        <div class="org-tree-v2__branches">
          <div class="org-branch-line"></div>
        </div>

        <!-- Level 2: Direktur Departemen (3 Cards) -->
        <div class="org-tree-v2__level2">
          <!-- Director 1 -->
          <div class="org-tree-v2__col">
            <div class="org-branch-drop"></div>
            <div class="org-box-v2">
              <span class="org-box-v2__role"><?php echo fitra_t_val( 'OPERATIONS DIRECTOR', 'DIREKTUR OPERASIONAL' ); ?></span>
              <h3 class="org-box-v2__name">Siti Rahmawati</h3>
            </div>
          </div>

          <!-- Director 2 -->
          <div class="org-tree-v2__col">
            <div class="org-branch-drop"></div>
            <div class="org-box-v2">
              <span class="org-box-v2__role"><?php echo fitra_t_val( 'FINANCE DIRECTOR', 'DIREKTUR KEUANGAN' ); ?></span>
              <h3 class="org-box-v2__name">Andi Pratama</h3>
            </div>
          </div>

          <!-- Director 3 -->
          <div class="org-tree-v2__col">
            <div class="org-branch-drop"></div>
            <div class="org-box-v2">
              <span class="org-box-v2__role"><?php echo fitra_t_val( 'COMMERCIAL DIRECTOR', 'DIREKTUR KOMERSIAL' ); ?></span>
              <h3 class="org-box-v2__name">Budi Santoso</h3>
            </div>
          </div>
        </div>

        <!-- Level 3: Department Divisions (Row of Badges) -->
        <div class="org-tree-v2__level3">
          <div class="org-badge-v2"><?php echo fitra_t_val( 'LOGISTICS DIVISION', 'DIVISI LOGISTIK' ); ?></div>
          <div class="org-badge-v2"><?php echo fitra_t_val( 'QC &amp; INSPECTION DIVISION', 'DIVISI QC &amp; INSPEKSI' ); ?></div>
          <div class="org-badge-v2"><?php echo fitra_t_val( 'HSE DIVISION', 'DIVISI HSE &amp; K3' ); ?></div>
          <div class="org-badge-v2"><?php echo fitra_t_val( 'COMMERCIAL SALES DIVISION', 'DIVISI SALES &amp; PEMASARAN' ); ?></div>
        </div>
      </div>
    </div>
  </section>

  <!-- ===== 4. LEGALITAS & SERTIFIKASI SECTION ===== -->
  <section class="profile-legal-v2" id="legalitas">
    <div class="profile-legal-v2__inner">
      <div class="profile-legal-v2__grid">
        <!-- Left: Intro & TKDN Badge -->
        <div class="profile-legal-v2__left">
          <span class="section-tag"><?php echo fitra_t_val( '04 &mdash;&mdash; COMPLIANCE &amp; QUALITY', '04 &mdash;&mdash; KEPATUHAN &amp; KUALITAS' ); ?></span>
          <h2 class="profile-legal-v2__title"><?php echo fitra_t_val( 'Legality &amp; Certifications', 'Legalitas &amp; Sertifikasi' ); ?></h2>
          <p class="profile-legal-v2__desc"><?php echo fitra_t_val( 'We operate our businesses with strict compliance to Indonesian regulatory statutes and globally recognized industrial standards. Your enterprise integrity is fully protected.', 'Kami mengoperasikan bisnis kami dengan kepatuhan penuh terhadap regulasi nasional dan standar industri global. Keamanan transaksi Anda adalah prioritas kami.' ); ?></p>

          <!-- TKDN Card -->
          <div class="tkdn-badge-card">
            <div class="tkdn-badge-card__icon">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#e8611a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                <path d="M9 12l2 2 4-4"></path>
              </svg>
            </div>
            <div class="tkdn-badge-card__content">
              <h3 class="tkdn-badge-card__title"><?php echo fitra_t_val( 'TKDN VERIFIED', 'TERVERIFIKASI TKDN' ); ?></h3>
              <p class="tkdn-badge-card__desc"><?php echo fitra_t_val( 'Meeting domestic local content standard requirements.', 'Memenuhi standar regulasi tingkat kandungan dalam negeri nasional.' ); ?></p>
            </div>
          </div>
        </div>

        <!-- Right: 2x2 Document Grid -->
        <div class="profile-legal-v2__right">
          <div class="legal-docs-grid">
            <!-- Doc 1: SIUP & TDP -->
            <div class="legal-doc-card">
              <span class="legal-doc-card__badge">PDF</span>
              <div class="legal-doc-card__icon">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#e8611a" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                  <polyline points="14 2 14 8 20 8"></polyline>
                  <line x1="16" y1="13" x2="8" y2="13"></line>
                  <line x1="16" y1="17" x2="8" y2="17"></line>
                  <polyline points="10 9 9 9 8 9"></polyline>
                </svg>
              </div>
              <h3 class="legal-doc-card__title">SIUP &amp; TDP</h3>
              <p class="legal-doc-card__desc"><?php echo fitra_t_val( 'Trading Business License &amp; Company Registration Certificate.', 'Surat Izin Usaha Perdagangan &amp; Tanda Daftar Perusahaan resmi.' ); ?></p>
              <a href="#" class="legal-doc-card__link">
                <span><?php echo fitra_t_val( 'DOWNLOAD LEGALITY (PDF)', 'UNDUH LEGALITAS (PDF)' ); ?></span>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                  <polyline points="7 10 12 15 17 10"></polyline>
                  <line x1="12" y1="15" x2="12" y2="3"></line>
                </svg>
              </a>
            </div>

            <!-- Doc 2: ISO 9001:2015 -->
            <div class="legal-doc-card">
              <span class="legal-doc-card__badge">PDF</span>
              <div class="legal-doc-card__icon">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#e8611a" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                  <circle cx="12" cy="8" r="7"></circle>
                  <polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline>
                </svg>
              </div>
              <h3 class="legal-doc-card__title">ISO 9001:2015</h3>
              <p class="legal-doc-card__desc"><?php echo fitra_t_val( 'International Quality Management System certification.', 'Sertifikasi Sistem Manajemen Mutu bertaraf Internasional.' ); ?></p>
              <a href="#" class="legal-doc-card__link">
                <span><?php echo fitra_t_val( 'DOWNLOAD CERTIFICATE (PDF)', 'UNDUH SERTIFIKAT (PDF)' ); ?></span>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                  <polyline points="7 10 12 15 17 10"></polyline>
                  <line x1="12" y1="15" x2="12" y2="3"></line>
                </svg>
              </a>
            </div>

            <!-- Doc 3: NIB & NPWP -->
            <div class="legal-doc-card">
              <span class="legal-doc-card__badge">PDF</span>
              <div class="legal-doc-card__icon">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#e8611a" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                  <rect x="3" y="4" width="18" height="16" rx="2"></rect>
                  <line x1="7" y1="8" x2="17" y2="8"></line>
                  <line x1="7" y1="12" x2="17" y2="12"></line>
                  <line x1="7" y1="16" x2="13" y2="16"></line>
                </svg>
              </div>
              <h3 class="legal-doc-card__title">NIB &amp; NPWP</h3>
              <p class="legal-doc-card__desc"><?php echo fitra_t_val( 'Business Identification Number and corporate tax identification.', 'Nomor Induk Berusaha dan kelengkapan dokumen perpajakan korporasi.' ); ?></p>
              <a href="#" class="legal-doc-card__link">
                <span><?php echo fitra_t_val( 'DOWNLOAD LEGALITY (PDF)', 'UNDUH LEGALITAS (PDF)' ); ?></span>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                  <polyline points="7 10 12 15 17 10"></polyline>
                  <line x1="12" y1="15" x2="12" y2="3"></line>
                </svg>
              </a>
            </div>

            <!-- Doc 4: Company Profile Full -->
            <div class="legal-doc-card">
              <span class="legal-doc-card__badge">PDF</span>
              <div class="legal-doc-card__icon">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#e8611a" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                  <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                  <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                </svg>
              </div>
              <h3 class="legal-doc-card__title"><?php echo fitra_t_val( 'Complete Company Profile', 'Profil Perusahaan Lengkap' ); ?></h3>
              <p class="legal-doc-card__desc"><?php echo fitra_t_val( 'Full corporate dossier with complete project portfolio and technical specs.', 'Dokumen profil komprehensif beserta portofolio proyek dan spesifikasi teknis.' ); ?></p>
              <a href="#" class="legal-doc-card__link">
                <span><?php echo fitra_t_val( 'DOWNLOAD COMPANY PROFILE (PDF)', 'UNDUH PROFIL PERUSAHAAN (PDF)' ); ?></span>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                  <polyline points="7 10 12 15 17 10"></polyline>
                  <line x1="12" y1="15" x2="12" y2="3"></line>
                </svg>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php
get_footer();
