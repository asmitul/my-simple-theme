<?php get_header(); ?>

<div class="container">
    <h1>
        <?php
        if ( is_category() ) {
            single_cat_title();
        } elseif ( is_tag() ) {
            single_tag_title();
        } elseif ( is_day() ) {
            printf( __( 'Daily Archives: %s', 'my-simple-theme' ), get_the_date() );
        } elseif ( is_month() ) {
            printf( __( 'Monthly Archives: %s', 'my-simple-theme' ), get_the_date( 'F Y' ) );
        } elseif ( is_year() ) {
            printf( __( 'Yearly Archives: %s', 'my-simple-theme' ), get_the_date( 'Y' ) );
        } else {
            _e( 'Archives', 'my-simple-theme' );
        }
        ?>
    </h1>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <div class="entry-content">
                <?php the_excerpt(); ?>
            </div>
        </article>
    <?php endwhile; else : ?>
        <p><?php _e( 'No posts found.', 'my-simple-theme' ); ?></p>
    <?php endif; ?>
</div>

<?php get_footer(); ?>