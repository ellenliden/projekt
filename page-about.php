<?php
/*
Template Name: Om oss (ACF två kort)
*/
get_header();
?>

<main id="main" class="site-main">
  <?php while ( have_posts() ) : the_post(); ?>

    <?php
      $b1_img = get_field('block_1_image');
      $b1_title = get_field('block_1_title');
      $b1_text = get_field('block_1_text');
      $b1_btn_text = get_field('block_1_button_text');
      $b1_btn_url = get_field('block_1_button_url');

      $b2_img = get_field('block_2_image');
      $b2_title = get_field('block_2_title');
      $b2_text = get_field('block_2_text');
      $b2_btn_text = get_field('block_2_button_text');
      $b2_btn_url = get_field('block_2_button_url');
    ?>

    <section class="about-card">
      <div class="about-card__image">
        <?php if ( $b1_img ) : ?>
          <img class="about-card__img" src="<?php echo esc_url( $b1_img['url'] ); ?>" alt="<?php echo esc_attr( $b1_img['alt'] ); ?>">
        <?php endif; ?>
      </div>
      <div class="about-card__content">
        <?php if ( $b1_title ) : ?><h2><?php echo esc_html( $b1_title ); ?></h2><?php endif; ?>
        <?php if ( $b1_text ) : ?><?php echo wp_kses_post( $b1_text ); ?><?php endif; ?>
        <?php if ( $b1_btn_text && $b1_btn_url ) : ?>
          <a class="btn" href="<?php echo esc_url( $b1_btn_url ); ?>">
            <?php echo esc_html( $b1_btn_text ); ?>
          </a>
        <?php endif; ?>
      </div>
    </section>

    <section class="about-card about-card--reverse">
      <div class="about-card__image">
        <?php if ( $b2_img ) : ?>
          <img class="about-card__img" src="<?php echo esc_url( $b2_img['url'] ); ?>" alt="<?php echo esc_attr( $b2_img['alt'] ); ?>">
        <?php endif; ?>
      </div>
      <div class="about-card__content">
        <?php if ( $b2_title ) : ?><h2><?php echo esc_html( $b2_title ); ?></h2><?php endif; ?>
        <?php if ( $b2_text ) : ?><?php echo wp_kses_post( $b2_text ); ?><?php endif; ?>
        <?php if ( $b2_btn_text && $b2_btn_url ) : ?>
          <a class="btn" href="<?php echo esc_url( $b2_btn_url ); ?>">
            <?php echo esc_html( $b2_btn_text ); ?>
          </a>
        <?php endif; ?>
      </div>
    </section>

  <?php endwhile; ?>
</main>

<?php get_footer(); ?>