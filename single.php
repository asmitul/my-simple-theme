<?php get_header(); ?>

<div class="container">
    <div class="content-area">
        <main id="main" class="site-main">
            <?php while ( have_posts() ) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="post-thumbnail">
                                <?php the_post_thumbnail( 'large' ); ?>
                            </div>
                        <?php endif; ?>
                        
                        <h1 class="entry-title"><?php the_title(); ?></h1>
                        
                        <div class="entry-meta">
                            <span class="posted-on">
                                <i class="fas fa-calendar-alt"></i>
                                <?php echo get_the_date(); ?>
                            </span>
                            <span class="byline">
                                <i class="fas fa-user"></i>
                                <?php the_author_posts_link(); ?>
                            </span>
                            <?php if ( has_category() ) : ?>
                            <span class="cat-links">
                                <i class="fas fa-folder-open"></i>
                                <?php the_category( ', ' ); ?>
                            </span>
                            <?php endif; ?>
                            <?php if ( has_tag() ) : ?>
                            <span class="tags-links">
                                <i class="fas fa-tags"></i>
                                <?php the_tags( '', ', ', '' ); ?>
                            </span>
                            <?php endif; ?>
                        </div>
                    </header>

                    <div class="entry-content">
                        <?php the_content(); ?>
                        
                        <?php
                        wp_link_pages( array(
                            'before' => '<div class="page-links">' . __( 'Pages:', 'my-simple-theme' ),
                            'after'  => '</div>',
                        ) );
                        ?>
                    </div>

                    <footer class="entry-footer">
                        <div class="post-navigation">
                            <div class="post-navigation-links">
                                <?php
                                previous_post_link( '<div class="nav-previous">%link</div>', '<i class="fas fa-chevron-left"></i> %title' );
                                next_post_link( '<div class="nav-next">%link</div>', '%title <i class="fas fa-chevron-right"></i>' );
                                ?>
                            </div>
                        </div>
                    </footer>
                </article>

                <?php
                // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;
                ?>
            <?php endwhile; ?>
        </main>
    </div><!-- .content-area -->

    <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
    <aside id="secondary" class="widget-area sidebar">
        <?php dynamic_sidebar( 'sidebar-1' ); ?>
    </aside><!-- #secondary -->
    <?php endif; ?>
</div><!-- .container -->

<?php get_footer(); ?>