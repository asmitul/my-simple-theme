<?php
// Theme setup
function my_simple_theme_setup() {
    // Add theme support
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
    add_theme_support( 'custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ) );
    add_theme_support( 'customize-selective-refresh-widgets' );
    add_theme_support( 'responsive-embeds' );
    add_theme_support( 'automatic-feed-links' );

    // Register navigation menu
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'my-simple-theme' ),
        'footer'  => __( 'Footer Menu', 'my-simple-theme' ),
    ) );

    // Load text domain for translations
    load_theme_textdomain( 'my-simple-theme', get_template_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'my_simple_theme_setup' );

// Enqueue styles and scripts
function my_simple_theme_scripts() {
    wp_enqueue_style( 'my-simple-theme-style', get_stylesheet_uri(), array(), filemtime(get_stylesheet_directory() . '/style.css') );
    wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css' );
    
    // Add responsive menu script
    wp_enqueue_script( 'my-simple-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'my_simple_theme_scripts' );

// Register widget areas
function my_simple_theme_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Sidebar', 'my-simple-theme' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Add widgets here to appear in your sidebar.', 'my-simple-theme' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer Widget Area', 'my-simple-theme' ),
        'id'            => 'footer-1',
        'description'   => __( 'Add widgets here to appear in your footer.', 'my-simple-theme' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );
}
add_action( 'widgets_init', 'my_simple_theme_widgets_init' );

// Customizer additions
function my_simple_theme_customize_register( $wp_customize ) {
    // Add section for theme colors
    $wp_customize->add_section( 'my_simple_theme_colors', array(
        'title'       => __( 'Theme Colors', 'my-simple-theme' ),
        'priority'    => 30,
    ) );

    // Primary Color
    $wp_customize->add_setting( 'primary_color', array(
        'default'     => '#3498db',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_color', array(
        'label'       => __( 'Primary Color', 'my-simple-theme' ),
        'section'     => 'my_simple_theme_colors',
    ) ) );

    // Secondary Color
    $wp_customize->add_setting( 'secondary_color', array(
        'default'     => '#2c3e50',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'secondary_color', array(
        'label'       => __( 'Secondary Color', 'my-simple-theme' ),
        'section'     => 'my_simple_theme_colors',
    ) ) );

    // Accent Color
    $wp_customize->add_setting( 'accent_color', array(
        'default'     => '#e74c3c',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'accent_color', array(
        'label'       => __( 'Accent Color', 'my-simple-theme' ),
        'section'     => 'my_simple_theme_colors',
    ) ) );

    // Footer text
    $wp_customize->add_section( 'my_simple_theme_footer', array(
        'title'       => __( 'Footer Settings', 'my-simple-theme' ),
        'priority'    => 90,
    ) );

    $wp_customize->add_setting( 'footer_text', array(
        'default'     => sprintf( __( '© %s. All rights reserved.', 'my-simple-theme' ), get_bloginfo( 'name' ) ),
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'footer_text', array(
        'label'       => __( 'Footer Text', 'my-simple-theme' ),
        'section'     => 'my_simple_theme_footer',
        'type'        => 'text',
    ) );
}
add_action( 'customize_register', 'my_simple_theme_customize_register' );

// Output customizer CSS
function my_simple_theme_customizer_css() {
    ?>
    <style type="text/css">
        :root {
            --primary-color: <?php echo esc_attr( get_theme_mod( 'primary_color', '#3498db' ) ); ?>;
            --secondary-color: <?php echo esc_attr( get_theme_mod( 'secondary_color', '#2c3e50' ) ); ?>;
            --accent-color: <?php echo esc_attr( get_theme_mod( 'accent_color', '#e74c3c' ) ); ?>;
        }
    </style>
    <?php
}
add_action( 'wp_head', 'my_simple_theme_customizer_css' );

// Limit excerpt length
function my_simple_theme_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'my_simple_theme_excerpt_length' );

// Change excerpt more string
function my_simple_theme_excerpt_more( $more ) {
    return '... <a class="read-more button" href="' . esc_url( get_permalink() ) . '">' . __( 'Read More', 'my-simple-theme' ) . '</a>';
}
add_filter( 'excerpt_more', 'my_simple_theme_excerpt_more' );
?>