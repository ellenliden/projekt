<?php
/*
Template Name: Kurser
*/
get_header();
?>

<main id="main" class="site-main">
  <?php while ( have_posts() ) : the_post(); ?>
    <header class="page-header">
      <h1 class="page-title"><?php the_title(); ?></h1>
    </header>

    <div class="page-content">
      <?php the_content(); ?>
    </div>

    <?php
      $courses_query = new WP_Query( array(
        'post_type'      => 'post',
        'posts_per_page' => -1,
        'category_name'  => 'kurser',
      ) );
    ?>

    <?php if ( $courses_query->have_posts() ) : ?>
      <section class="courses-list" aria-label="Kurser">
        <?php while ( $courses_query->have_posts() ) : $courses_query->the_post(); ?>
          <article <?php post_class( 'course' ); ?>>
            <?php if ( has_post_thumbnail() ) : ?>
              <div class="course__img">
                <?php the_post_thumbnail( 'medium' ); ?>
              </div>
            <?php endif; ?>

            <div class="course__text">
              <h2><?php the_title(); ?></h2>

              <?php
                $price    = get_post_meta( get_the_ID(), 'price', true );
                $level    = get_post_meta( get_the_ID(), 'level', true );
                $duration = get_post_meta( get_the_ID(), 'duration', true );
                $schedule = get_post_meta( get_the_ID(), 'schedule', true );
                $teacher  = get_post_meta( get_the_ID(), 'teacher', true );
              ?>

              <?php if ( $price || $level || $duration || $schedule || $teacher ) : ?>
                <ul class="course__meta">
                  <?php if ( $price ) : ?><li><strong>Pris:</strong> <?php echo esc_html( $price ); ?></li><?php endif; ?>
                  <?php if ( $level ) : ?><li><strong>Nivå:</strong> <?php echo esc_html( $level ); ?></li><?php endif; ?>
                  <?php if ( $duration ) : ?><li><strong>Längd:</strong> <?php echo esc_html( $duration ); ?></li><?php endif; ?>
                  <?php if ( $schedule ) : ?><li><strong>Tid:</strong> <?php echo esc_html( $schedule ); ?></li><?php endif; ?>
                  <?php if ( $teacher ) : ?><li><strong>Instruktör:</strong> <?php echo esc_html( $teacher ); ?></li><?php endif; ?>
                </ul>
              <?php endif; ?>

              <p class="course__excerpt">
                <?php echo wp_kses_post( wp_trim_words( get_the_excerpt(), 26 ) ); ?>
              </p>
              <a href="<?php the_permalink(); ?>">Läs mer</a>
            </div>
          </article>
        <?php endwhile; ?>
      </section>
    <?php else : ?>
      <p>Inga kurser hittades.</p>
    <?php endif; ?>

    <?php wp_reset_postdata(); ?>
  <?php endwhile; ?>
</main>

<?php get_footer(); ?>