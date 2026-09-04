<?php
/**
 * Index template — Fallback / Front-page safeguard
 *
 * @package FitraPerkasa
 */

// If front page, home, or empty posts query, gracefully render front-page
if ( is_front_page() || is_home() || ! have_posts() ) {
    include locate_template( 'front-page.php' );
    return;
}

get_header();
?>

  <main class="site-main" style="margin-top: var(--header-h); padding: 48px 24px; max-width: var(--container-max); margin-inline: auto;">

    <?php if ( have_posts() ) : ?>
      <?php while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="margin-block-end: 48px;">
          <h2 style="font-size: var(--fs-xl); font-weight: var(--fw-bold); color: var(--clr-dark); margin-block-end: 12px;">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
          </h2>
          <div style="font-size: var(--fs-sm); color: var(--clr-muted); line-height: 1.65;">
            <?php the_excerpt(); ?>
          </div>
        </article>
      <?php endwhile; ?>

      <div class="pagination">
        <?php the_posts_pagination(); ?>
      </div>

    <?php else : ?>
      <p><?php echo esc_html( fitra_t_val( 'No posts found.', 'Tidak ada postingan ditemukan.' ) ); ?></p>
    <?php endif; ?>

  </main>

<?php
get_footer();
