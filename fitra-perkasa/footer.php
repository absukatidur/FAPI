<?php
/**
 * Footer template
 *
 * @package FitraPerkasa
 */
?>

  <!-- ===== FOOTER ===== -->
  <footer class="footer" id="footer">
    <div class="footer__inner">
      <div class="footer__grid">
        <!-- Brand column -->
        <div class="footer__col footer__col--brand">
          <div class="footer__brand-header">
            <span class="footer__logo-icon">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect width="24" height="24" rx="4" fill="#e8611a"/>
                <path d="M6 6H18V9.5H10.5V11.5H16.5V14.5H10.5V18H6V6Z" fill="#ffffff"/>
              </svg>
            </span>
            <span class="footer__brand-title">PT FITRA PERKASA INTI</span>
          </div>
          <p class="footer__brand-desc"><?php echo esc_html( fitra_t( 'footer_brand_desc' ) ); ?></p>
          <div class="footer__socials">
            <a href="#" class="footer__social-btn" aria-label="Website">
              <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="10"></circle>
                <line x1="2" y1="12" x2="22" y2="12"></line>
                <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
              </svg>
            </a>
            <a href="#" class="footer__social-btn" aria-label="Twitter / X">
              <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path>
              </svg>
            </a>
            <a href="#" class="footer__social-btn" aria-label="LinkedIn">
              <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path>
                <rect x="2" y="9" width="4" height="12"></rect>
                <circle cx="4" cy="4" r="2"></circle>
              </svg>
            </a>
          </div>
        </div>

        <!-- Head Office column -->
        <div class="footer__col">
          <h5 class="footer__col-title"><?php echo esc_html( fitra_t( 'footer_head_office' ) ); ?></h5>
          <div class="footer__contact-item">
            <svg class="footer__contact-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#e8611a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
              <circle cx="12" cy="10" r="3"></circle>
            </svg>
            <p class="footer__contact-text">Industrial Park Blok L7 No. 12, Balikpapan, Jawa Timur 71233 Indonesia</p>
          </div>
          <div class="footer__contact-item">
            <svg class="footer__contact-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#e8611a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
            </svg>
            <a href="tel:+622155662389" class="footer__contact-link">+62 21 5566 2389</a>
          </div>
        </div>

        <!-- Workshop column -->
        <div class="footer__col">
          <h5 class="footer__col-title"><?php echo esc_html( fitra_t( 'footer_workshop' ) ); ?></h5>
          <div class="footer__contact-item">
            <svg class="footer__contact-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#e8611a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
              <polyline points="9 22 9 12 15 12 15 22"></polyline>
            </svg>
            <p class="footer__contact-text">Kawasan Industri Loktuan 11, Guntung, Bontang 75313 Indonesia</p>
          </div>
          <div class="footer__contact-item">
            <svg class="footer__contact-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#e8611a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
              <polyline points="22,6 12,13 2,6"></polyline>
            </svg>
            <a href="mailto:contact@fitraperkasa.com" class="footer__contact-link">contact@fitraperkasa.com</a>
          </div>
        </div>

        <!-- Quick Links column -->
        <div class="footer__col">
          <h5 class="footer__col-title"><?php echo esc_html( fitra_t( 'footer_quick_links' ) ); ?></h5>
          <div class="footer__links-list">
            <a href="#projects" class="footer__nav-link"><?php echo esc_html( fitra_t( 'footer_projects' ) ); ?></a>
            <a href="<?php echo esc_url( home_url( '/profile/' ) ); ?>" class="footer__nav-link"><?php echo esc_html( fitra_t( 'footer_about_us' ) ); ?></a>
            <a href="#" class="footer__nav-link"><?php echo esc_html( fitra_t( 'footer_careers' ) ); ?></a>
            <?php if ( get_privacy_policy_url() ) : ?>
              <a href="<?php echo esc_url( get_privacy_policy_url() ); ?>" class="footer__nav-link"><?php echo esc_html( fitra_t( 'footer_privacy' ) ); ?></a>
            <?php else : ?>
              <a href="#" class="footer__nav-link"><?php echo esc_html( fitra_t( 'footer_privacy' ) ); ?></a>
            <?php endif; ?>
          </div>
        </div>
      </div>

      <div class="footer__bottom-bar">
        <p class="footer__copy">&copy; <?php echo date( 'Y' ); ?> PT FITRA PERKASA INTI. <?php echo esc_html( fitra_t( 'footer_rights' ) ); ?></p>
        <p class="footer__location">BALIKPAPAN &bull; BONTANG</p>
      </div>
    </div>
  </footer>

  <?php wp_footer(); ?>
</body>
</html>
