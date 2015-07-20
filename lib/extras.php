<?php

namespace Roots\Sage\Extras;

use Roots\Sage\Config;

/**
 * Add <body> classes
 */
function body_class($classes) {
  // Add page slug if it doesn't exist
  if (is_single() || is_page() && !is_front_page()) {
    if (!in_array(basename(get_permalink()), $classes)) {
      $classes[] = basename(get_permalink());
    }
  }

  // Add class if sidebar is active
  if (Config\display_sidebar()) {
    $classes[] = 'sidebar-primary';
  }

  // Add browser classes
  global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;
  if($is_lynx) $classes[] = 'lynx';
  elseif($is_gecko) $classes[] = 'gecko';
  elseif($is_opera) $classes[] = 'opera';
  elseif($is_NS4) $classes[] = 'ns4';
  elseif($is_safari) $classes[] = 'safari';
  elseif($is_chrome) $classes[] = 'chrome';
  elseif($is_IE) {
          $classes[] = 'ie';
          if(preg_match('/MSIE ([0-9]+)([a-zA-Z0-9.]+)/', $_SERVER['HTTP_USER_AGENT'], $browser_version))
          $classes[] = 'ie'.$browser_version[1];
          if(preg_match('/(?i)msie [4-9]/',$_SERVER['HTTP_USER_AGENT'])) {
            $classes[] = 'oldie';
          }
  } else $classes[] = 'unknown';


  return $classes;
}
add_filter('body_class', __NAMESPACE__ . '\\body_class');

/**
 * Clean up the_excerpt()
 */
function excerpt_more() {
  return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
}
add_filter('excerpt_more', __NAMESPACE__ . '\\excerpt_more');



/**
 * Use the jQuery CDN code from Soil, but load jQuery in the header instead of the footer
 *
 */

function register_jquery() {
  if (!is_admin()) {
    $jquery_version = $GLOBALS['wp_scripts']->registered['jquery']->ver;

    wp_deregister_script('jquery');

    wp_register_script(
      'jquery',
      'https://ajax.googleapis.com/ajax/libs/jquery/' . $jquery_version . '/jquery.min.js',
      [],
      null,
      false
    );

    add_filter('script_loader_src', __NAMESPACE__ . '\\jquery_local_fallback', 10, 2);
  }
}
add_action('wp_enqueue_scripts', __NAMESPACE__ . '\\register_jquery', 100);

/**
 * Output the local fallback immediately after jQuery's <script>
 *
 * @link http://wordpress.stackexchange.com/a/12450
 */
function jquery_local_fallback($src, $handle = null) {
  static $add_jquery_fallback = false;

  if ($add_jquery_fallback) {
    echo '<script>window.jQuery || document.write(\'<script src="' . $add_jquery_fallback .'"><\/script>\')</script>' . "\n";
    $add_jquery_fallback = false;
  }

  if ($handle === 'jquery') {
    $add_jquery_fallback = apply_filters('script_loader_src', \includes_url('/js/jquery/jquery.js'), 'jquery-fallback');
  }

  return $src;
}
add_action('wp_head', __NAMESPACE__ . '\\jquery_local_fallback');
