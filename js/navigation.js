/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens.
 */
( function() {
    const siteNavigation = document.getElementById( 'site-navigation' );
    const button = document.querySelector( '.menu-toggle' );

    // Return early if the navigation doesn't exist.
    if ( ! siteNavigation || ! button ) {
        return;
    }

    // Toggle navigation on button click.
    button.addEventListener( 'click', function() {
        siteNavigation.classList.toggle( 'toggled' );
        
        if ( button.getAttribute( 'aria-expanded' ) === 'true' ) {
            button.setAttribute( 'aria-expanded', 'false' );
        } else {
            button.setAttribute( 'aria-expanded', 'true' );
        }
    });

    // Close the navigation when clicking outside
    document.addEventListener( 'click', function(event) {
        const isClickInside = siteNavigation.contains(event.target) || button.contains(event.target);
        
        if ( ! isClickInside && siteNavigation.classList.contains('toggled') ) {
            siteNavigation.classList.remove('toggled');
            button.setAttribute( 'aria-expanded', 'false' );
        }
    });

    // Close the navigation on ESC key press
    document.addEventListener( 'keyup', function(event) {
        if ( event.key === 'Escape' && siteNavigation.classList.contains('toggled') ) {
            siteNavigation.classList.remove('toggled');
            button.setAttribute( 'aria-expanded', 'false' );
        }
    });

    // Add class to sub-menu items for accessibility
    const subMenuItems = siteNavigation.querySelectorAll( '.menu-item-has-children > a, .page_item_has_children > a' );
    
    if ( subMenuItems.length > 0 ) {
        subMenuItems.forEach(function(item) {
            const btn = document.createElement('button');
            btn.classList.add('sub-menu-toggle');
            btn.setAttribute('aria-expanded', 'false');
            btn.innerHTML = '<span class="screen-reader-text">Expand</span><i class="fas fa-chevron-down"></i>';
            
            item.parentNode.insertBefore(btn, item.nextSibling);
            
            btn.addEventListener('click', function() {
                const expanded = btn.getAttribute('aria-expanded') === 'true';
                btn.setAttribute('aria-expanded', !expanded);
                btn.parentNode.classList.toggle('toggled-on');
            });
        });
    }
})(); 