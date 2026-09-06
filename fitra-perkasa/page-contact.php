<?php
/**
 * Template Name: Contact Us Page
 * Template for the Contact page
 *
 * @package FitraPerkasa
 */

get_header();
?>

<main class="contact-page" id="contact-page">

  <!-- =========================================================
       SECTION 1: HERO & "GET IN TOUCH" FORM CARD
       ========================================================= -->
  <section class="contact-hero">
    <div class="contact-container">
      <div class="contact-hero__grid">

        <!-- Left Column: Contact Introduction & 3 Pillars -->
        <div class="contact-hero__content">
          <span class="contact-kicker"><?php echo esc_html( fitra_t_val( 'SERVICE & SUPPORT CENTER', 'PUSAT LAYANAN & DUKUNGAN' ) ); ?></span>
          <h1 class="contact-hero__title"><?php echo esc_html( fitra_t_val( 'Contact Us', 'Hubungi Kami' ) ); ?></h1>
          <p class="contact-hero__desc">
            <?php echo esc_html( fitra_t_val( 'Email, call, or complete the form to learn how PT Fitra Perkasa Inti can solve your industrial procurement and mechanical engineering challenges.', 'Kirimkan email, hubungi kami, atau isi formulir untuk mengetahui bagaimana PT Fitra Perkasa Inti dapat menjawab kebutuhan pengadaan industri dan rekayasa mekanikal Anda.' ) ); ?>
          </p>

          <!-- Direct Contact Information -->
          <div class="contact-direct">
            <div class="contact-direct__item">
              <a href="mailto:contact@fitraperkasa.com" class="contact-direct__link">contact@fitraperkasa.com</a>
            </div>
            <div class="contact-direct__item">
              <a href="tel:+622155662389" class="contact-direct__link">+62 21 5566 2389</a>
            </div>
            <div class="contact-direct__item">
              <a href="#contact-faq" class="contact-direct__link contact-direct__link--underlined"><?php echo esc_html( fitra_t_val( 'Customer Support', 'Dukungan Pelanggan' ) ); ?></a>
            </div>
          </div>

          <!-- 3 Columns Below Direct Contacts -->
          <div class="contact-pillars">
            <div class="contact-pillar">
              <div class="contact-pillar__icon">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                </svg>
              </div>
              <h3 class="contact-pillar__title"><?php echo esc_html( fitra_t_val( 'Customer Support', 'Dukungan Pelanggan' ) ); ?></h3>
              <p class="contact-pillar__desc">
                <?php echo esc_html( fitra_t_val( 'Our support engineering team is available round the clock to address any technical specifications or urgent project queries you may have.', 'Tim teknisi pendukung kami siap membantu setiap kebutuhan spesifikasi teknis dan pertanyaan mendesak proyek Anda.' ) ); ?>
              </p>
            </div>

            <div class="contact-pillar">
              <div class="contact-pillar__icon">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                </svg>
              </div>
              <h3 class="contact-pillar__title"><?php echo esc_html( fitra_t_val( 'Feedback and Suggestions', 'Umpan Balik & Saran' ) ); ?></h3>
              <p class="contact-pillar__desc">
                <?php echo esc_html( fitra_t_val( 'We value your feedback and are continuously working to improve our precision logistics and on-site distribution capabilities.', 'Kami sangat menghargai masukan Anda dan terus berinovasi meningkatkan kapabilitas logistik presisi serta distribusi on-site kami.' ) ); ?>
              </p>
            </div>

            <div class="contact-pillar">
              <div class="contact-pillar__icon">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <circle cx="12" cy="12" r="10"></circle>
                  <line x1="21" y1="12" x2="22" y2="12"></line>
                  <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                </svg>
              </div>
              <h3 class="contact-pillar__title"><?php echo esc_html( fitra_t_val( 'Media Inquiries', 'Pertanyaan Media & Kemitraan' ) ); ?></h3>
              <p class="contact-pillar__desc">
                <?php echo esc_html( fitra_t_val( 'For commercial partnerships, vendor certifications, or press inquiries, please contact our corporate desk at media@fitraperkasa.com.', 'Untuk kemitraan komersial, sertifikasi vendor, atau pertanyaan media pers, silakan hubungi meja korporat kami di media@fitraperkasa.com.' ) ); ?>
              </p>
            </div>
          </div>
        </div>

        <!-- Right Column: "Get in Touch" Floating Form Card -->
        <div class="contact-hero__form-wrap">
          <div class="contact-form-card" id="contact-form-card">
            <h2 class="contact-form-card__title"><?php echo esc_html( fitra_t_val( 'Get in Touch', 'Hubungi Kami' ) ); ?></h2>
            <p class="contact-form-card__subtitle"><?php echo esc_html( fitra_t_val( 'You can reach us anytime', 'Anda dapat menghubungi kami kapan saja' ) ); ?></p>

            <form class="contact-form" id="contact-form" onsubmit="return false;">
              <!-- Row 1: Name & Company, Country -->
              <div class="contact-form__row contact-form__row--two-col">
                <div class="contact-form__field">
                  <label for="cf-name" class="contact-form__label"><?php echo fitra_t_val( 'NAME &amp; COMPANY', 'NAMA &amp; PERUSAHAAN' ); ?></label>
                  <input type="text" id="cf-name" name="name" class="contact-form__input" placeholder="<?php echo esc_attr( fitra_t_val( 'John Doe, ACME Corp.', 'Budi Santoso, PT Industri Mandiri' ) ); ?>" required>
                </div>
                <div class="contact-form__field">
                  <label for="cf-country" class="contact-form__label"><?php echo fitra_t_val( 'COUNTRY', 'NEGARA' ); ?></label>
                  <input type="text" id="cf-country" name="country" class="contact-form__input" value="Indonesia" required>
                </div>
              </div>

              <!-- Row 2: Email, Phone / WhatsApp -->
              <div class="contact-form__row contact-form__row--two-col">
                <div class="contact-form__field">
                  <label for="cf-email" class="contact-form__label"><?php echo fitra_t_val( 'EMAIL', 'EMAIL' ); ?></label>
                  <input type="email" id="cf-email" name="email" class="contact-form__input" placeholder="name@company.com" required autocomplete="email">
                </div>
                <div class="contact-form__field">
                  <label for="cf-phone" class="contact-form__label"><?php echo fitra_t_val( 'PHONE / WHATSAPP', 'TELEPON / WHATSAPP' ); ?></label>
                  <input type="tel" id="cf-phone" name="phone" class="contact-form__input" placeholder="+62..." required autocomplete="tel">
                </div>
              </div>

              <!-- Row 3: Specifications & Quantity -->
              <div class="contact-form__field">
                <label for="cf-specs" class="contact-form__label"><?php echo fitra_t_val( 'SPECIFICATIONS &amp; QUANTITY', 'SPESIFIKASI &amp; JUMLAH KEBUTUHAN' ); ?></label>
                <textarea id="cf-specs" name="specs" class="contact-form__textarea" rows="3" placeholder="<?php echo esc_attr( fitra_t_val( 'Describe your requirements, dimensions, grades, standards...', 'Jelaskan kebutuhan material, dimensi, grade, standar teknis...' ) ); ?>" required></textarea>
              </div>

              <!-- Row 4: Submit Button -->
              <div class="contact-form__footer">
                <button type="submit" class="contact-form__submit btn btn--orange btn--rfq-submit" id="cf-submit-btn">
                  <span><?php echo fitra_t_val( 'SEND ENQUIRY', 'KIRIM PERMINTAAN' ); ?></span>
                </button>
              </div>

              <!-- Agreement Notice -->
              <p class="contact-form__terms">
                <?php
                $terms_url   = esc_url( home_url( '/profile/' ) );
                $privacy_url = esc_url( get_privacy_policy_url() ?: home_url( '/' ) );
                printf(
                    fitra_t_val(
                        'By contacting us, you agree to our <a href="%s">Terms of service</a> and <a href="%s">Privacy Policy</a>.',
                        'Dengan menghubungi kami, Anda menyetujui <a href="%s">Ketentuan Layanan</a> dan <a href="%s">Kebijakan Privasi</a> kami.'
                    ),
                    $terms_url,
                    $privacy_url
                );
                ?>
              </p>

              <!-- Success Feedback Box -->
              <div class="contact-form__success" id="cf-success-msg" style="display: none;">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                  <polyline points="20 6 9 17 4 12"></polyline>
                </svg>
                <span><?php echo esc_html( fitra_t_val( 'Thank you! Your quotation request has been submitted. Our commercial engineering team will respond within 2 working days.', 'Terima kasih! Permintaan penawaran Anda telah kami terima. Tim engineering kami akan merespons dalam 2 hari kerja.' ) ); ?></span>
              </div>
            </form>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- =========================================================
       SECTION 2: LOCATION & MAP ("CONNECTING NEAR AND FAR")
       ========================================================= -->
  <section class="contact-location-section">
    <div class="contact-container">
      <div class="contact-location__grid">

        <!-- Left Column: Map Card with Popover Marker -->
        <div class="contact-map-card">
          <!-- Stylized Map Canvas / Illustration -->
          <div class="contact-map-graphic">
            <svg class="contact-map-svg" viewBox="0 0 600 450" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" aria-label="Location Map">
              <!-- Background Surface -->
              <rect width="600" height="450" fill="#f1f5f9"/>
              
              <!-- Land Polygons -->
              <path d="M-20 60 Q120 180 260 90 T540 180 T620 60 L620 -20 L-20 -20 Z" fill="#e2e8f0" opacity="0.6"/>
              <path d="M-20 380 Q160 280 320 360 T620 300 L620 480 L-20 480 Z" fill="#e2e8f0" opacity="0.6"/>

              <!-- Water Body / Bay -->
              <path d="M-20 220 C100 240 220 190 320 250 C420 310 520 220 620 260 L620 290 C520 250 420 340 320 280 C220 220 100 270 -20 250 Z" fill="#dbeafe" opacity="0.75"/>

              <!-- Major Highways & Grid Roads -->
              <path d="M40 0 L180 450" stroke="#cbd5e1" stroke-width="4" stroke-linecap="round"/>
              <path d="M280 0 L360 450" stroke="#cbd5e1" stroke-width="5" stroke-linecap="round"/>
              <path d="M520 0 L460 450" stroke="#cbd5e1" stroke-width="3" stroke-linecap="round"/>
              <path d="M0 120 L600 160" stroke="#cbd5e1" stroke-width="3" stroke-linecap="round"/>
              <path d="M0 290 L600 240" stroke="#cbd5e1" stroke-width="5" stroke-linecap="round"/>
              <path d="M0 380 L600 390" stroke="#cbd5e1" stroke-width="3" stroke-linecap="round"/>
              
              <!-- Accent Highway Route (Golden Orange) -->
              <path d="M-20 190 C150 190 220 240 330 240 C440 240 510 170 620 170" stroke="#fed7aa" stroke-width="6" stroke-linecap="round"/>
              <path d="M-20 190 C150 190 220 240 330 240 C440 240 510 170 620 170" stroke="#e8611a" stroke-width="2.5" stroke-dasharray="8 6" stroke-linecap="round"/>
              
              <!-- Minor Streets -->
              <path d="M80 120 L240 120 M140 40 L340 240 M260 240 L380 160 M340 240 L500 290 M180 290 L260 420" stroke="#e2e8f0" stroke-width="2"/>

              <!-- Focal Pin Marker (Balikpapan Hub) -->
              <circle cx="280" cy="240" r="28" fill="#e8611a" fill-opacity="0.15" class="contact-pin-pulse"/>
              <circle cx="280" cy="240" r="14" fill="#e8611a" fill-opacity="0.3"/>
              <circle cx="280" cy="240" r="7" fill="#e8611a"/>
              <circle cx="280" cy="240" r="3" fill="#ffffff"/>
            </svg>

            <!-- Popover Card Overlay Matching Mockup -->
            <div class="contact-map-popover">
              <div class="contact-map-popover__brand">
                <div class="contact-map-popover__icon">
                  <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="24" height="24" rx="4" fill="#e8611a"/>
                    <path d="M6 6H18V9.5H10.5V11.5H16.5V14.5H10.5V18H6V6Z" fill="#ffffff"/>
                  </svg>
                </div>
                <div class="contact-map-popover__brand-text">
                  <span class="contact-map-popover__name">PT Fitra Perkasa Inti</span>
                  <span class="contact-map-popover__tag"><?php echo esc_html( fitra_t_val( 'Industrial & Mechanical Hub', 'Pusat Industri & Mekanikal' ) ); ?></span>
                </div>
              </div>

              <div class="contact-map-popover__address">
                <p class="contact-map-popover__city">Balikpapan, Indonesia</p>
                <p class="contact-map-popover__detail">Industrial Park Blok L7 No. 12, Jawa Timur 71233</p>
              </div>

              <a href="https://maps.google.com/?q=Balikpapan+Indonesia" target="_blank" rel="noopener noreferrer" class="contact-map-popover__link">
                <span><?php echo esc_html( fitra_t_val( 'Open Google Maps', 'Buka Google Maps' ) ); ?></span>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                  <line x1="5" y1="12" x2="19" y2="12"></line>
                  <polyline points="12 5 19 12 12 19"></polyline>
                </svg>
              </a>
            </div>
          </div>
        </div>

        <!-- Right Column: Headquarters Address & Operating Details -->
        <div class="contact-hq-col">
          <span class="contact-kicker"><?php echo esc_html( fitra_t_val( 'OUR LOCATION', 'LOKASI KAMI' ) ); ?></span>
          <h2 class="contact-hq__title"><?php echo esc_html( fitra_t_val( 'Connecting Near and Far', 'Menjangkau dari Dekat Hingga Jauh' ) ); ?></h2>

          <div class="contact-hq__card">
            <h3 class="contact-hq__heading"><?php echo esc_html( fitra_t_val( 'Headquarters', 'Kantor Pusat' ) ); ?></h3>
            <div class="contact-hq__info">
              <p class="contact-hq__name">PT Fitra Perkasa Inti</p>
              <p class="contact-hq__addr">Industrial Park Blok L7 No. 12</p>
              <p class="contact-hq__addr">Balikpapan, Jawa Timur 71233</p>
              <p class="contact-hq__addr">Indonesia</p>
            </div>

            <div class="contact-hq__secondary">
              <h4 class="contact-hq__subheading"><?php echo esc_html( fitra_t_val( 'Workshop Site', 'Area Workshop' ) ); ?></h4>
              <p class="contact-hq__addr">Kawasan Industri Loktuan 11, Guntung, Bontang 75313 Indonesia</p>
            </div>

            <div class="contact-hq__hours">
              <div class="contact-hq__hour-row">
                <span class="contact-hq__hour-label"><?php echo esc_html( fitra_t_val( 'Operating Hours:', 'Jam Operasional:' ) ); ?></span>
                <span class="contact-hq__hour-value"><?php echo esc_html( fitra_t_val( 'Monday – Friday, 08:00 – 17:00 WITA', 'Senin – Jumat, 08:00 – 17:00 WITA' ) ); ?></span>
              </div>
              <div class="contact-hq__hour-row">
                <span class="contact-hq__hour-label"><?php echo esc_html( fitra_t_val( 'Direct Phone:', 'Telepon Langsung:' ) ); ?></span>
                <span class="contact-hq__hour-value"><a href="tel:+622155662389">+62 21 5566 2389</a></span>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- =========================================================
       SECTION 3: FAQ ACCORDION (CENTERED)
       ========================================================= -->
  <section class="contact-faq-section" id="contact-faq">
    <div class="contact-container">
      <div class="contact-faq__wrap">

        <!-- Centered Section Header -->
        <div class="contact-faq__header">
          <span class="contact-kicker"><?php echo esc_html( fitra_t_val( 'FAQ', 'TANYA JAWAB' ) ); ?></span>
          <h2 class="contact-faq__title"><?php echo esc_html( fitra_t_val( 'Frequently Asked Questions', 'Pertanyaan yang Sering Diajukan' ) ); ?></h2>
          <p class="contact-faq__desc">
            <?php echo esc_html( fitra_t_val( 'If there are questions you want to ask, our technical engineering specialists will provide comprehensive answers to support your project.', 'Jika ada pertanyaan yang ingin Anda ajukan, tim spesialis rekayasa teknis kami siap memberikan jawaban komprehensif untuk mendukung proyek Anda.' ) ); ?>
          </p>
        </div>

        <!-- Centered Accordion List -->
        <div class="contact-faq__accordion" id="contact-accordion">

          <!-- FAQ Item 1 -->
          <div class="faq-item faq-item--open">
            <button type="button" class="faq-item__trigger" aria-expanded="true">
              <span class="faq-item__question"><?php echo esc_html( fitra_t_val( 'What makes PT Fitra Perkasa Inti different from other industrial suppliers?', 'Apa yang membedakan PT Fitra Perkasa Inti dari pemasok industri lainnya?' ) ); ?></span>
              <span class="faq-item__icon">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                  <polyline points="6 9 12 15 18 9"></polyline>
                </svg>
              </span>
            </button>
            <div class="faq-item__content">
              <p class="faq-item__answer">
                <?php echo esc_html( fitra_t_val( 'We combine a global precision material supply chain with international certification standards (ISO 9001, ASME, NACE), accredited laboratory testing facilities, and professional on-site field engineers for direct project installation.', 'Kami menggabungkan rantai pasok material presisi global dengan sertifikasi standar internasional (ISO 9001, ASME, NACE), fasilitas pengujian laboratorium terakreditasi, serta dukungan teknisi lapangan profesional untuk instalasi langsung di lokasi proyek.' ) ); ?>
              </p>
            </div>
          </div>

          <!-- FAQ Item 2 -->
          <div class="faq-item">
            <button type="button" class="faq-item__trigger" aria-expanded="false">
              <span class="faq-item__question"><?php echo esc_html( fitra_t_val( 'How fast is the quotation (RFQ) and delivery lead time?', 'Berapa cepat waktu penawaran harga (RFQ) dan estimasi pengiriman?' ) ); ?></span>
              <span class="faq-item__icon">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                  <polyline points="6 9 12 15 18 9"></polyline>
                </svg>
              </span>
            </button>
            <div class="faq-item__content">
              <p class="faq-item__answer">
                <?php echo esc_html( fitra_t_val( 'Standard Request for Quotation (RFQ) inquiries are processed within 24 working hours. For ready stock items in our Balikpapan and Bontang warehouse network, deliveries can be scheduled immediately according to your site logistics schedule.', 'Permintaan penawaran harga (RFQ) standar diproses dalam waktu 1x24 jam kerja. Untuk material ready stock pada jaringan gudang kami di Balikpapan dan Bontang, pengiriman dapat dijadwalkan secara instan sesuai jadwal site logistik Anda.' ) ); ?>
              </p>
            </div>
          </div>

          <!-- FAQ Item 3 -->
          <div class="faq-item">
            <button type="button" class="faq-item__trigger" aria-expanded="false">
              <span class="faq-item__question"><?php echo esc_html( fitra_t_val( 'Do you provide on-site technical inspection and custom machining?', 'Apakah Anda menyediakan inspeksi teknis on-site dan permesinan kustom?' ) ); ?></span>
              <span class="faq-item__icon">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                  <polyline points="6 9 12 15 18 9"></polyline>
                </svg>
              </span>
            </button>
            <div class="faq-item__content">
              <p class="faq-item__answer">
                <?php echo esc_html( fitra_t_val( 'Yes, our engineering services team is equipped with laser alignment tools, vibration analyzers, hydrostatic test benches, and on-site valve calibration facilities to ensure peak performance before and after commissioning.', 'Ya, tim divisi jasa rekayasa kami dilengkapi alat alignment laser, penganalisis getaran getaran, hydrostatic test bench, dan fasilitas kalibrasi valve on-site guna memastikan performa maksimal sebelum dan sesudah instalasi.' ) ); ?>
              </p>
            </div>
          </div>

          <!-- FAQ Item 4 -->
          <div class="faq-item">
            <button type="button" class="faq-item__trigger" aria-expanded="false">
              <span class="faq-item__question"><?php echo esc_html( fitra_t_val( 'Are all valves, pipes, and transmission gearboxes covered under warranty?', 'Apakah seluruh produk valve, perpipaan, dan gearbox bergaransi resmi?' ) ); ?></span>
              <span class="faq-item__icon">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                  <polyline points="6 9 12 15 18 9"></polyline>
                </svg>
              </span>
            </button>
            <div class="faq-item__content">
              <p class="faq-item__answer">
                <?php echo esc_html( fitra_t_val( 'All our products come with official manufacturer warranties, original mill test certificates (MTC), comprehensive after-sales guarantees, and genuine spare parts availability.', 'Seluruh produk kami disertai garansi resmi pabrikan, sertifikat mill certificate asli (MTC), serta jaminan purna jual menyeluruh dan ketersediaan suku cadang original.' ) ); ?>
              </p>
            </div>
          </div>

        </div>

      </div>
    </div>
  </section>

  <!-- ===== 4. CONSULTATION CTA SECTION ===== -->
  <section class="contact-cta-v2" id="contact-cta">
    <div class="cta-banner-wrapper">
      <div class="cta-banner-card">
        <!-- Technical Vector Globe Motif -->
        <div class="cta-banner-card__bg" aria-hidden="true">
          <svg viewBox="0 0 1000 500" fill="none" xmlns="http://www.w3.org/2000/svg" class="cta-banner-card__globe">
            <defs>
              <radialGradient id="cta-globe-glow-contact" cx="50%" cy="50%" r="50%">
                <stop offset="0%" stop-color="#e8611a" stop-opacity="0.22"/>
                <stop offset="60%" stop-color="#0e1726" stop-opacity="0.06"/>
                <stop offset="100%" stop-color="#060b13" stop-opacity="0"/>
              </radialGradient>
              <pattern id="cta-dot-grid-contact" x="0" y="0" width="24" height="24" patternUnits="userSpaceOnUse">
                <circle cx="2" cy="2" r="1.2" fill="rgba(255,255,255,0.08)"/>
              </pattern>
            </defs>
            <rect width="100%" height="100%" fill="url(#cta-dot-grid-contact)"/>
            <circle cx="500" cy="250" r="230" fill="url(#cta-globe-glow-contact)"/>
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
            <span class="meta-dash">&mdash;&mdash;</span> <?php echo fitra_t_val( 'START YOUR PARTNERSHIP', 'MULAI KERJASAMA ANDA' ); ?> <span class="meta-dash">&mdash;&mdash;</span>
          </span>
          <h2 class="cta-banner-card__title">
            <?php echo fitra_t_val( 'Ready to experience the speed and reliability of Fitra Perkasa Inti?', 'Siap merasakan kecepatan dan keandalan Fitra Perkasa Inti?' ); ?>
          </h2>
          <p class="cta-banner-card__desc">
            <?php echo fitra_t_val( 'Contact our technical consultants today for material specification advice and large-scale industrial procurement solutions.', 'Hubungi konsultan teknis kami hari ini untuk konsultasi spesifikasi material dan solusi pengadaan industri skala besar.' ); ?>
          </p>
          <div class="cta-banner-card__actions">
            <a href="#contact-form-card" class="btn cta-banner-card__btn-primary">
              <?php echo fitra_t_val( 'Talk to sales', 'Hubungi Sales' ); ?>
            </a>
            <a href="<?php echo esc_url( fitra_url( '/#rfq' ) ); ?>" class="btn cta-banner-card__btn-secondary">
              <?php echo fitra_t_val( 'Request a demo', 'Minta Penawaran (RFQ)' ); ?>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

</main>

<?php
get_footer();
