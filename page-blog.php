<?php
/*
Template Name: Blogg 
*/
get_header();
?>

<main id="main" class="site-main">
  <section class="content-area">
    <h1 class="blogg-title"><?php the_title(); ?></h1>

    <?php
$blogg_query = new WP_Query( array(
    'post_type'      => 'post',
    'posts_per_page' => 12,
    'category_name'  => 'blogg',
    'orderby'        => 'date',
    'order'          => 'DESC',
  ) );
    ?>

<?php if ( $blogg_query->have_posts() ) : ?>
  <?php while ( $blogg_query->have_posts() ) : $blogg_query->the_post(); ?>
    <article <?php post_class('single-article'); ?>>
      <header class="single-header">
        <h2 class="single-title"><?php the_title(); ?></h2>
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

      <hr style="border:0;border-top:1px solid #E0E6DC;margin:2rem 0;">
    </article>
  <?php endwhile; ?>
  <?php wp_reset_postdata(); ?>
<?php else : ?>
  <p>Inga blogginlägg hittades.</p>
<?php endif; ?>
  </section>
</main>

<?php
get_footer();