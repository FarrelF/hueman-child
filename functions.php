<?php
/* Write your awesome functions below */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function disable_search( $query, $error = true )
{
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

function image_cdn_sitemap_fix($uri)
{
    return str_replace( 'https://s.wpinter.com', 'https://cdn.staticaly.com/img/farrelf.wpinter.com', $uri );
}
add_filter('wpseo_xml_sitemap_img_src', 'image_cdn_sitemap_fix');

function emoji_svg_cdn_url()
{
  return $default_url = "https://cdn.staticaly.com/gh/twitter/twemoji/v11.2.0/2/svg/";
}
add_filter('emoji_svg_url', 'emoji_svg_cdn_url');

function emoji_png_cdn_url()
{
  return $default_url = "https://cdn.staticaly.com/gh/twitter/twemoji/v11.2.0/2/72x72/";
}
add_filter('emoji_url', 'emoji_png_cdn_url');
