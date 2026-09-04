<?php
/**
 * Page template — Generic pages
 *
 * @package FitraPerkasa
 */

get_header();
?>

  <main class="site-main" style="margin-top: var(--header-h); padding: 48px 24px; max-width: var(--container-max); margin-inline: auto;">

    <?php while ( have_posts() ) : the_post(); ?>
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <h1 style="font-size: var(--fs-2xl); font-weight: var(--fw-bold); color: var(--clr-dark); margin-block-end: 24px;">
          <?php the_title(); ?>
        </h1>
        <div style="font-size: var(--fs-base); color: var(--clr-text); line-height: 1.7;">
          <?php the_content(); ?>
        </div>
      </article>
    <?php endwhile; ?>

  </main>

<?php
get_footer();
