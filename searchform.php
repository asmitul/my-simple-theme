<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label class="screen-reader-text" for="s"><?php _e( 'Search for:', 'my-simple-theme' ); ?></label>
	<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'my-simple-theme' ); ?>" value="<?php echo get_search_query(); ?>" name="s" id="s" />
	<button type="submit" class="search-submit"><i class="fas fa-search"></i><span class="screen-reader-text"><?php _e( 'Search', 'my-simple-theme' ); ?></span></button>
</form> 