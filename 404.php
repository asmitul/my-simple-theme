<?php get_header(); ?>

<div class="container">
    <div class="content-area error-404 not-found">
        <main id="main" class="site-main">
            <header class="page-header">
                <h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'my-simple-theme' ); ?></h1>
            </header>

            <div class="page-content">
                <p><?php _e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'my-simple-theme' ); ?></p>

                <?php get_search_form(); ?>

                <div class="error-widgets">
                    <div class="widget-area">
                        <div class="widget widget_recent_entries">
                            <h2 class="widget-title"><?php _e( 'Recent Posts', 'my-simple-theme' ); ?></h2>
                            <ul>
                                <?php
                                wp_get_archives( array(
                                    'type'    => 'postbypost',
                                    'limit'   => 5,
                                ) );
                                ?>
                            </ul>
                        </div>

                        <div class="widget widget_categories">
                            <h2 class="widget-title"><?php _e( 'Most Used Categories', 'my-simple-theme' ); ?></h2>
                            <ul>
                                <?php
                                wp_list_categories( array(
                                    'orderby'    => 'count',
                                    'order'      => 'DESC',
                                    'show_count' => 1,
                                    'title_li'   => '',
                                    'number'     => 5,
                                ) );
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<?php get_footer(); ?> 