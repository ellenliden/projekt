<?php
// Header med meny och logga
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php if ( function_exists( 'wp_body_open' ) ) { wp_body_open(); } ?>

<header class="site-header">
    <div class="header-top">
    <div class="site-branding">
    <?php if ( has_custom_logo() ) : ?>
        <?php the_custom_logo(); ?>
    <?php else : ?>
        <h1 class="site-title">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                <?php bloginfo( 'name' ); ?>
            </a>
        </h1>
    <?php endif; ?>
</div>

        <nav class="site-nav">
            <?php
            wp_nav_menu( array(
                'theme_location' => 'primary',
                'container'      => false,
                'menu_class'     => 'main-menu',
            ) );
            ?>
        </nav>
    </div>

    <?php
    // Visa header-bild om den finns (utvald bild eller inställd i header-bild)

    $header_img = '';
    
    if ( is_singular() && has_post_thumbnail() ) {
      $header_img = get_the_post_thumbnail_url( get_the_ID(), 'full' );
    } elseif ( get_header_image() ) {
      $header_img = get_header_image();
    }
    
    if ( $header_img ) : ?>
      <div class="header-hero" style="background-image: url('<?php echo esc_url( $header_img ); ?>');"></div>
    <?php endif; ?>
</header>

<main id="main" class="site-main">