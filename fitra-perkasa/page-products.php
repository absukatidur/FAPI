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
        <?php
        $prod_cat_terms = get_terms( array(
            'taxonomy'   => 'fitra_product_cat',
            'hide_empty' => false,
            'orderby'    => 'term_order',
            'order'      => 'ASC',
        ) );
        if ( ! empty( $prod_cat_terms ) && ! is_wp_error( $prod_cat_terms ) ) :
            foreach ( $prod_cat_terms as $prod_cat_term ) :
        ?>
        <button type="button" class="products-filter-btn" role="tab" aria-selected="false"
                data-filter="<?php echo esc_attr( $prod_cat_term->slug ); ?>"
                id="tab-prod-<?php echo esc_attr( $prod_cat_term->slug ); ?>">
          <?php echo esc_html( strtoupper( fitra_get_product_cat_name( $prod_cat_term ) ) ); ?>
        </button>
        <?php
            endforeach;
        endif;
        ?>
      </div>
    </div>
  </nav>

  <!-- ===== 3. PRODUCT CATALOG GRID ===== -->
  <main class="products-catalog-v2" id="products-catalog">
    <div class="products-catalog-v2__inner">

      <div class="products-grid-v2" id="products-grid">
        <?php
        /*
         * Dynamic product grid — queries all published fitra_product CPT posts.
         * Each card's data-category attribute is the first taxonomy term slug
         * assigned to the product, which matches the filter button data-filter value.
         * Falls back to fitra_get_product_category_key() for legacy products that
         * still rely on the ACF product_category meta instead of taxonomy terms.
         */
        $img_base = get_template_directory_uri() . '/assets/images/';

        $prod_query_args = array(
            'post_type'      => 'fitra_product',
            'post_status'    => 'publish',
            'posts_per_page' => -1,
            'orderby'        => 'menu_order date',
            'order'          => 'ASC',
        );

        // Polylang: limit to current language
        if ( function_exists( 'pll_current_language' ) ) {
            $prod_query_args['lang'] = fitra_get_lang();
        }

        $prod_query = new WP_Query( $prod_query_args );

        if ( $prod_query->have_posts() ) :
            while ( $prod_query->have_posts() ) : $prod_query->the_post();
                $post_id   = get_the_ID();
                $post_slug = get_post_meta( $post_id, 'product_slug', true ) ?: get_post_field( 'post_name', $post_id );
                $post_slug = preg_replace( '/-id$/', '', $post_slug );

                // ── Category (taxonomy → legacy meta fallback) ──────────────────
                $prod_terms    = get_the_terms( $post_id, 'fitra_product_cat' );
                $cat_slug      = '';
                $cat_label     = '';

                if ( ! empty( $prod_terms ) && ! is_wp_error( $prod_terms ) ) {
                    $first_term = reset( $prod_terms );
                    $cat_slug   = $first_term->slug;
                    // Use bilingual helper: shows ID name when lang=id
                    $cat_label  = function_exists( 'fitra_get_product_cat_name' )
                        ? fitra_get_product_cat_name( $first_term )
                        : html_entity_decode( $first_term->name, ENT_QUOTES, 'UTF-8' );
                } else {
                    // Legacy ACF meta
                    $meta_cat  = get_post_meta( $post_id, 'product_category', true );
                    $cat_label = get_post_meta( $post_id, 'product_category_label', true ) ?: $meta_cat;
                    $cat_slug  = function_exists( 'fitra_get_product_category_key' )
                        ? fitra_get_product_category_key( $meta_cat )
                        : 'all';
                }

                // ── Card fields ─────────────────────────────────────────────────
                $p_title   = get_the_title();
                $p_desc    = get_post_meta( $post_id, 'product_description', true );
                $p_tag     = get_post_meta( $post_id, 'product_card_tag', true );
                $p_specs_r = get_post_meta( $post_id, 'product_card_specs', true );
                $p_specs   = ! empty( $p_specs_r )
                    ? array_filter( array_map( 'trim', explode( "\n", $p_specs_r ) ) )
                    : array();

                // Image: ACF field > featured image > fallback
                $p_image = get_post_meta( $post_id, 'product_image', true );
                if ( empty( $p_image ) && has_post_thumbnail() ) {
                    $p_image = get_the_post_thumbnail_url( $post_id, 'full' );
                }
                if ( empty( $p_image ) ) {
                    $p_image = $img_base . 'product-pipes.jpg';
                }

                $prod_url = fitra_url( '/products/' . $post_slug . '/' );
                $aria_lbl = fitra_t_val( 'View details for ' . $p_title, 'Lihat detail ' . $p_title );
                $btn_lbl  = fitra_t_val( 'VIEW DETAIL &rarr;', 'LIHAT DETAIL &rarr;' );
                $rfq_lbl  = fitra_t_val( 'Request Quotation (RFQ)', 'Minta Penawaran (RFQ)' );
        ?>
        <article class="products-card-v2" data-category="<?php echo esc_attr( $cat_slug ); ?>" id="prod-card-<?php echo esc_attr( $post_slug ); ?>" data-url="<?php echo esc_url( $prod_url ); ?>">
          <a href="<?php echo esc_url( $prod_url ); ?>" class="products-card-v2__image-link" aria-label="<?php echo esc_attr( $aria_lbl ); ?>">
            <div class="products-card-v2__image-wrap">
              <img src="<?php echo esc_url( $p_image ); ?>" alt="<?php echo esc_attr( $p_title ); ?>" loading="lazy">
              <?php if ( ! empty( $p_tag ) ) : ?>
              <span class="products-card-v2__tag"><?php echo wp_kses_post( $p_tag ); ?></span>
              <?php endif; ?>
            </div>
          </a>
          <div class="products-card-v2__body">
            <span class="products-card-v2__category"><?php echo esc_html( strtoupper( $cat_label ) ); ?></span>
            <h3 class="products-card-v2__title">
              <a href="<?php echo esc_url( $prod_url ); ?>"><?php echo esc_html( $p_title ); ?></a>
            </h3>
            <p class="products-card-v2__desc"><?php echo esc_html( $p_desc ); ?></p>
            <?php if ( ! empty( $p_specs ) ) : ?>
            <div class="products-card-v2__specs">
              <?php foreach ( $p_specs as $spec_pill ) : ?>
                <span class="spec-pill"><?php echo esc_html( $spec_pill ); ?></span>
              <?php endforeach; ?>
            </div>
            <?php endif; ?>
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
        <?php
            endwhile;
            wp_reset_postdata();
        else :
        ?>
        <!-- No CPT products yet — grid will populate as products are added -->
        <?php
        endif;
        ?>
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
            <a href="<?php echo esc_url( fitra_url( '/#rfq' ) ); ?>" class="btn cta-banner-card__btn-secondary">
              <?php echo fitra_t_val( 'Request a demo', 'Minta Penawaran (RFQ)' ); ?>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php
get_footer();
