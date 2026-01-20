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
            <h1 class="site-title">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <?php bloginfo( 'name' ); ?>
                </a>
            </h1>
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
    // Visa header-bild om den finns
    if ( get_header_image() ) : ?>
        <div class="header-hero" style="background-image: url('<?php header_image(); ?>');">
        </div>
    <?php endif; ?>
</header>

<main id="main" class="site-main">