<?php
/* Write your awesome functions below */

function disable_search( $query, $error = true ) {
  if ( is_search() ) {
    $query->is_search = false;
    $query->query_vars[s] = false;
    $query->query[s] = false;
    // to error
    if ( $error == true )
    $query->is_404 = true;
  }
}

add_action('parse_query', 'disable_search');
add_filter( 'get_search_form', function() { return null;} );

function image_cdn_sitemap_fix($uri) {
    return str_replace( 'https://s.wpinter.com', 'https://cdn.staticaly.com/img/farrelf.wpinter.com', $uri );
}
add_filter('wpseo_xml_sitemap_img_src', 'image_cdn_sitemap_fix');
