<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'my-simple-theme' ); ?></a>
    
    <header id="masthead" class="site-header">
        <div class="container">
            <div class="site-branding">
                <?php
                if ( has_custom_logo() ) :
                    the_custom_logo();
                else : ?>
                    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
                    <?php
                    $description = get_bloginfo( 'description', 'display' );
                    if ( $description || is_customize_preview() ) : ?>
                        <p class="site-description"><?php echo $description; ?></p>
                    <?php endif;
                endif; ?>
            </div><!-- .site-branding -->

            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                <span class="menu-icon"><i class="fas fa-bars"></i></span>
                <span class="screen-reader-text"><?php _e( 'Menu', 'my-simple-theme' ); ?></span>
            </button>

            <nav id="site-navigation" class="main-navigation">
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'menu_id'        => 'primary-menu',
                    'container'      => false,
                    'fallback_cb'    => false,
                ) );
                ?>
            </nav><!-- #site-navigation -->
        </div><!-- .container -->
    </header><!-- #masthead -->

    <div id="content" class="site-content">