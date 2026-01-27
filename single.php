<?php
get_header();
?>

<main id="main" class="site-main single-post">
  <?php while ( have_posts() ) : the_post(); ?>

    <article <?php post_class('single-article'); ?>>
      <header class="single-header">
        <h1 class="single-title"><?php the_title(); ?></h1>
        <p class="single-meta"><?php echo get_the_date(); ?></p>
      </header>

      <?php if ( has_post_thumbnail() ) : ?>
        <div class="single-thumb">
          <?php the_post_thumbnail( 'large' ); ?>
        </div>
      <?php endif; ?>

      <div class="single-content">
        <?php the_content(); ?>
      </div>
    </article>
    <nav class="post-nav">
  <div class="post-nav__prev">
    <?php previous_post_link( '%link', '< Föregående inlägg' ); ?>
  </div>
  <div class="post-nav__next">
    <?php next_post_link( '%link', 'Nästa inlägg >' ); ?>
  </div>
</nav>

  <?php endwhile; ?>
</main>

<?php
get_footer();