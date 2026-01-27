<?php
// Standardtemplate för tema

get_header();
?>

<!-- visar nyheter på startsidan annars visar det senaste inlägget -->
<div class="content-area">
<?php if ( is_front_page() ) : ?>

<section class="news-grid">
  <?php
    $news_query = new WP_Query(array(
      'post_type'      => 'post',
      'posts_per_page' => 3,
      'category_name'  => 'nyheter-start',
    ));
  ?>

  <?php if ( $news_query->have_posts() ) : ?>
    <?php while ( $news_query->have_posts() ) : $news_query->the_post(); ?>
      <article class="news-card">
      <?php if ( has_post_thumbnail() ) : ?>
  <div class="news-card__thumb">
    <?php the_post_thumbnail( 'medium' ); ?>
  </div>
<?php endif; ?>
        <h3 class="news-card__title"><?php the_title(); ?></h3>
        <p class="news-card__excerpt"><?php echo get_the_excerpt(); ?></p>
        <a class="news-card__link" href="<?php the_permalink(); ?>">Läs mer</a>
      </article>
    <?php endwhile; ?>
  <?php endif; ?>

  <?php wp_reset_postdata(); ?>
</section>

<?php else : ?>

<?php if ( have_posts() ) : ?>
  <?php while ( have_posts() ) : the_post(); ?>
    <article <?php post_class(); ?>>
      <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
      <?php if ( has_post_thumbnail() ) : ?>
        <div class="post-thumbnail"><?php the_post_thumbnail( 'medium' ); ?></div>
      <?php endif; ?>
      <div class="entry-excerpt"><?php the_excerpt(); ?></div>
    </article>
  <?php endwhile; ?>
<?php else : ?>
  <p>Inga inlägg hittades.</p>
<?php endif; ?>

<?php endif; ?>


<?php
get_footer();