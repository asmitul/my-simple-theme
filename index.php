<?php get_header(); ?>

<div class="container">
    <div class="content-area">
        <main id="main" class="site-main">
            <?php if ( have_posts() ) : ?>
                <header class="page-header">
                    <?php if ( is_home() && ! is_front_page() ) : ?>
                        <h1 class="page-title"><?php single_post_title(); ?></h1>
                    <?php elseif ( is_archive() ) : ?>
                        <?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
                        <?php the_archive_description( '<div class="archive-description">', '</div>' ); ?>
                    <?php endif; ?>
                </header><!-- .page-header -->

                <?php while ( have_posts() ) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <header class="entry-header">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <div class="post-thumbnail">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail( 'medium' ); ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                            
                            <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            
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
                            </div>
                        </header>

                        <div class="entry-content">
                            <?php the_excerpt(); ?>
                        </div>
                    </article>
                <?php endwhile; ?>

                <nav class="pagination">
                    <?php 
                    the_posts_pagination( array(
                        'mid_size'  => 2,
                        'prev_text' => __( '&laquo; Previous', 'my-simple-theme' ),
                        'next_text' => __( 'Next &raquo;', 'my-simple-theme' ),
                    ) );
                    ?>
                </nav>

            <?php else : ?>
                <article class="no-results">
                    <header class="entry-header">
                        <h1 class="entry-title"><?php _e( 'Nothing Found', 'my-simple-theme' ); ?></h1>
                    </header>
                    <div class="entry-content">
                        <?php if ( is_search() ) : ?>
                            <p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'my-simple-theme' ); ?></p>
                            <?php get_search_form(); ?>
                        <?php else : ?>
                            <p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'my-simple-theme' ); ?></p>
                            <?php get_search_form(); ?>
                        <?php endif; ?>
                    </div>
                </article>
            <?php endif; ?>
        </main>
    </div><!-- .content-area -->

    <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
    <aside id="secondary" class="widget-area sidebar">
        <?php dynamic_sidebar( 'sidebar-1' ); ?>
    </aside><!-- #secondary -->
    <?php endif; ?>
</div><!-- .container -->

<?php get_footer(); ?>