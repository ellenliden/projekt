<?php
/*
Template Name: Historia
*/
get_header();
?>

<main id="main" class="site-main">
  <?php while ( have_posts() ) : the_post(); ?>
    <header class="page-header">
      <h1 class="page-title"><?php the_title(); ?></h1>
    </header>

    <div class="page-content history-content">
      <?php the_content(); ?>
    </div>
  <?php endwhile; ?>
</main>

<?php get_footer(); ?>