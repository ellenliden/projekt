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
            <input type="checkbox" id="menu-toggle" class="menu-toggle" />
            <label for="menu-toggle" class="menu-toggle-label" aria-label="Toggle menu">
                <span></span>
                <span></span>
                <span></span>
            </label>

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
    // Visa header-bild om den finns (utvald bild eller inställd i header-bild), men inte på produktsidor eller blogginlägg som redan har utvald bild till produkt/inlägg.

    $header_img = '';
    $is_product_page = function_exists( 'is_product' ) && is_product();
    $is_blog_post = is_singular( 'post' );

    if ( is_singular() && has_post_thumbnail() && ! $is_product_page && ! $is_blog_post ) {
      $header_img = get_the_post_thumbnail_url( get_the_ID(), 'full' );
    } elseif ( get_header_image() ) {
      $header_img = get_header_image();
    }
    
    if ( $header_img ) : ?>
      <div class="header-hero" style="background-image: url('<?php echo esc_url( $header_img ); ?>');"></div>
    <?php endif; ?>
</header>

<main id="main" class="site-main">