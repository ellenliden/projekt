<?php
/*
Template Name: Kontakt
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
      $team_query = new WP_Query( array(
        'post_type'      => 'post',
        'posts_per_page' => -1,
        'category_name'  => 'team',
      ) );
    ?>

    <?php if ( $team_query->have_posts() ) : ?>
      <section class="team-grid" aria-label="Team">
        <?php while ( $team_query->have_posts() ) : $team_query->the_post(); ?>
          <?php
            $role  = get_post_meta( get_the_ID(), 'role', true );
            $phone = get_post_meta( get_the_ID(), 'phone', true );
            $email = get_post_meta( get_the_ID(), 'email', true );
          ?>
          <article <?php post_class( 'team-card' ); ?>>
            <?php if ( has_post_thumbnail() ) : ?>
              <div class="team-card__image">
                <?php the_post_thumbnail( 'medium' ); ?>
              </div>
            <?php endif; ?>

            <h2 class="team-card__name"><?php the_title(); ?></h2>

            <?php if ( $role ) : ?>
              <p class="team-card__role"><?php echo esc_html( $role ); ?></p>
            <?php endif; ?>

            <div class="team-card__contact">
              <?php if ( $phone ) : ?>
                <p><a href="tel:<?php echo esc_attr( $phone ); ?>"><?php echo esc_html( $phone ); ?></a></p>
              <?php endif; ?>
              <?php if ( $email ) : ?>
                <p><a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a></p>
              <?php endif; ?>
            </div>
          </article>
        <?php endwhile; ?>
      </section>
    <?php else : ?>
      <p>Inga medarbetare hittades.</p>
    <?php endif; ?>

    <?php wp_reset_postdata(); ?>
  <?php endwhile; ?>
</main>

<?php get_footer(); ?>