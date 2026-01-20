<?php

// tema setup 
function yoga_theme_setup() {

    // WordPress hanterar <title>-taggen
    add_theme_support( 'title-tag' );

    // Stöd för "utvald bild" (featured image)
    add_theme_support( 'post-thumbnails' );
    
    // Stöd för header-bild (Utseende > Anpassa > Header Media)
    add_theme_support( 'custom-header', array(
        'flex-width'  => true,
        'flex-height' => true,
    ) );

    // Lägg till huvudmeny
    register_nav_menus( array(
        'primary' => 'Huvudmeny',
    ) );
}
add_action( 'after_setup_theme', 'yoga_theme_setup' );

// Lägg till widget i footer
function yoga_footer_widget_init() {
    register_sidebar( array(
        'name'          => 'Footer-widget',
        'id'            => 'footer-1',
        'before_widget' => '<div class="footer-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="footer-widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'yoga_footer_widget_init' );

// Läs in CSS-filer
function yoga_theme_enqueue_styles() {
    wp_enqueue_style(
        'yoga-theme-style',
        get_stylesheet_uri()
    );
    
    wp_enqueue_style(
        'yoga-main-style',
        get_template_directory_uri() . '/assets/css/style.css',
        array( 'yoga-theme-style' )
    );
}
add_action( 'wp_enqueue_scripts', 'yoga_theme_enqueue_styles' );
