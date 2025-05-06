<?php
// Theme setup
function my_simple_theme_setup() {
    // Add theme support
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

    // Register navigation menu
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'my-simple-theme' ),
    ) );

    // Load text domain for translations
    load_theme_textdomain( 'my-simple-theme', get_template_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'my_simple_theme_setup' );

// Enqueue styles and scripts
function my_simple_theme_scripts() {
    wp_enqueue_style( 'my-simple-theme-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'my_simple_theme_scripts' );
?>