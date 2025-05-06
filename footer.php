    </div><!-- #content -->

    <footer id="colophon" class="site-footer">
        <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
        <div class="footer-widgets">
            <div class="container">
                <?php dynamic_sidebar( 'footer-1' ); ?>
            </div>
        </div>
        <?php endif; ?>

        <div class="site-info">
            <div class="container">
                <?php if ( has_nav_menu( 'footer' ) ) : ?>
                <nav class="footer-navigation">
                    <?php
                    wp_nav_menu( array(
                        'theme_location' => 'footer',
                        'menu_id'        => 'footer-menu',
                        'depth'          => 1,
                        'container'      => false,
                    ) );
                    ?>
                </nav>
                <?php endif; ?>
                
                <div class="copyright">
                    <?php echo esc_html( get_theme_mod( 'footer_text', sprintf( __( '© %s. All rights reserved.', 'my-simple-theme' ), date( 'Y' ) . ' ' . get_bloginfo( 'name' ) ) ) ); ?>
                </div>
            </div>
        </div>
    </footer><!-- #colophon -->

    <?php wp_footer(); ?>
</body>
</html>