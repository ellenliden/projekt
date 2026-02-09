
<?php
get_header();
?>

<div class="content-area">
<?php
$intro_title = get_field('intro-title');
$intro_text  = get_field('intro_text');
?>

<?php if ( $intro_title || $intro_text ) : ?>
  <section class="intro-block">
    <?php if ( $intro_title ) : ?>
      <h2><?php echo esc_html( $intro_title ); ?></h2>
    <?php endif; ?>
    <?php if ( $intro_text ) : ?>
      <p><?php echo wp_kses_post( $intro_text ); ?></p>
    <?php endif; ?>
  </section>
<?php endif; ?>

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

</div>

<?php
get_footer();