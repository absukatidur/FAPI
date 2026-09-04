<?php
/**
 * Header template
 *
 * @package FitraPerkasa
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="<?php echo esc_attr( fitra_t_val( 'PT Fitra Perkasa Inti — Premier contractor and supplier providing robust industrial solutions and structural integrity for large-scale B2B commercial and government projects.', 'PT Fitra Perkasa Inti — Kontraktor dan pemasok terkemuka yang menyediakan solusi industri tangguh dan integritas struktural untuk proyek komersial B2B dan pemerintah skala besar.' ) ); ?>">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

  <!-- ===== HEADER / NAVBAR ===== -->
  <header class="header" id="header">
    <div class="header__inner">
      <a href="<?php echo esc_url( fitra_url( '/' ) ); ?>" class="header__brand" id="logo">
        <span class="header__logo-icon">
          <svg width="26" height="26" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect width="24" height="24" rx="4" fill="#e8611a"/>
            <path d="M6 6H18V9.5H10.5V11.5H16.5V14.5H10.5V18H6V6Z" fill="#ffffff"/>
          </svg>
        </span>
        <div class="header__logo-text">
          <span class="header__logo-name">FITRA PERKASA INTI</span>
          <span class="header__logo-sub">INDUSTRIAL CONTRACTOR</span>
        </div>
      </a>

      <nav class="header__nav" id="nav-menu">
        <?php
        if ( has_nav_menu( 'primary' ) ) {
            wp_nav_menu( array(
                'theme_location' => 'primary',
                'container'      => false,
                'items_wrap'     => '<ul>%3$s</ul>',
                'walker'         => new Fitra_Nav_Walker(),
                'depth'          => 1,
            ) );
        } else {
            // Fallback nav matching design mockup
            $req_uri    = $_SERVER['REQUEST_URI'] ?? '';
            $clean_path = trim( parse_url( $req_uri, PHP_URL_PATH ), '/' );
            $parts      = array_values( array_filter( explode( '/', $clean_path ) ) );
            if ( ! empty( $parts[0] ) && in_array( strtolower( $parts[0] ), array( 'id', 'en' ), true ) ) {
                array_shift( $parts );
            }
            $first_seg    = ! empty( $parts[0] ) ? strtolower( $parts[0] ) : '';
            $is_home      = empty( $parts ) || in_array( $first_seg, array( 'home', 'beranda' ), true ) || is_front_page();
            $is_profile   = in_array( $first_seg, array( 'profile', 'profil' ), true );
            $is_services  = in_array( $first_seg, array( 'services', 'layanan' ), true );
            $is_products  = in_array( $first_seg, array( 'products', 'produk' ), true );
            $is_news      = in_array( $first_seg, array( 'news', 'events-news', 'event-news', 'berita', 'berita-acara' ), true );
            $is_contact   = in_array( $first_seg, array( 'contact', 'contact-us', 'hubungi-kami', 'hubungi' ), true );
            ?>
            <a href="<?php echo esc_url( fitra_url( '/' ) ); ?>" class="header__link <?php echo $is_home ? 'header__link--active header__link--home' : ''; ?>"><?php echo esc_html( fitra_t( 'nav_home' ) ); ?></a>
            <a href="<?php echo esc_url( fitra_url( '/profile/' ) ); ?>" class="header__link <?php echo $is_profile ? 'header__link--active' : ''; ?>"><?php echo esc_html( fitra_t( 'nav_profile' ) ); ?></a>
            <a href="<?php echo esc_url( fitra_url( '/services/' ) ); ?>" class="header__link <?php echo $is_services ? 'header__link--active' : ''; ?>"><?php echo esc_html( fitra_t( 'nav_services' ) ); ?></a>
            <a href="<?php echo esc_url( fitra_url( '/products/' ) ); ?>" class="header__link <?php echo $is_products ? 'header__link--active' : ''; ?>"><?php echo esc_html( fitra_t( 'nav_products' ) ); ?></a>
            <a href="<?php echo esc_url( fitra_url( '/news/' ) ); ?>" class="header__link <?php echo $is_news ? 'header__link--active' : ''; ?>"><?php echo esc_html( fitra_t( 'nav_news' ) ); ?></a>
            <a href="<?php echo esc_url( fitra_url( '/contact/' ) ); ?>" class="header__link <?php echo $is_contact ? 'header__link--active' : ''; ?>"><?php echo esc_html( fitra_t( 'nav_contact' ) ); ?></a>
            <?php
        }
        ?>
      </nav>

      <div class="header__actions">
        <?php
        $current_lang = fitra_get_lang();

        // Build base URL for the current request
        $req_uri    = $_SERVER['REQUEST_URI'] ?? '/';
        $path_only  = parse_url( $req_uri, PHP_URL_PATH ) ?? '/';
        $query_str  = parse_url( $req_uri, PHP_URL_QUERY ) ?? '';

        // Strip leading /id/ or /en/ from path if present
        $clean_path = preg_replace( '#^/(id|en)(/|$)#i', '/', $path_only );
        $base_url   = home_url( $clean_path );

        // Retain existing query parameters (except 'lang')
        $query_params = array();
        if ( ! empty( $query_str ) ) {
            parse_str( $query_str, $query_params );
            unset( $query_params['lang'] );
        }

        $lang_urls = array(
            'en' => add_query_arg( array_merge( $query_params, array( 'lang' => 'en' ) ), $base_url ),
            'id' => add_query_arg( array_merge( $query_params, array( 'lang' => 'id' ) ), $base_url ),
        );

        // If on a single post and Polylang post translation exists, link directly
        if ( is_singular( 'post' ) && function_exists( 'pll_get_post' ) ) {
            $post_id  = get_the_ID();
            $trans_en = pll_get_post( $post_id, 'en' );
            if ( $trans_en && $trans_en !== $post_id ) {
                $lang_urls['en'] = get_permalink( $trans_en );
            }
            $trans_id = pll_get_post( $post_id, 'id' );
            if ( $trans_id && $trans_id !== $post_id ) {
                $lang_urls['id'] = get_permalink( $trans_id );
            }
        }
        ?>
        <div class="header__lang">
          <button type="button" class="header__lang-btn <?php echo ( 'en' === $current_lang ) ? 'header__lang-btn--active' : ''; ?>" data-lang="en" data-url="<?php echo esc_url( $lang_urls['en'] ); ?>" aria-label="Switch to English">EN</button>
          <span class="header__lang-sep">|</span>
          <button type="button" class="header__lang-btn <?php echo ( 'id' === $current_lang ) ? 'header__lang-btn--active' : ''; ?>" data-lang="id" data-url="<?php echo esc_url( $lang_urls['id'] ); ?>" aria-label="Ganti ke Bahasa Indonesia">ID</button>
        </div>

        <a href="#rfq" class="header__rfq-btn" id="cta-rfq"><?php echo esc_html( fitra_t( 'nav_rfq' ) ); ?></a>

        <button class="header__hamburger" id="hamburger" aria-label="Toggle navigation menu" aria-expanded="false">
          <span></span>
          <span></span>
          <span></span>
        </button>
      </div>
    </div>
  </header>
