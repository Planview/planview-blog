<?php

namespace Roots\Sage\Assets;

/**
 * Scripts and stylesheets
 *
 * Enqueue stylesheets in the following order:
 * 1. /theme/dist/styles/main.css
 *
 * Enqueue scripts in the following order:
 * 1. /theme/dist/scripts/modernizr.js
 * 2. /theme/dist/scripts/main.js
 */

class JsonManifest {
  private $manifest;

  public function __construct($manifest_path) {
    if (file_exists($manifest_path)) {
      $this->manifest = json_decode(file_get_contents($manifest_path), true);
    } else {
      $this->manifest = [];
    }
  }

  public function get() {
    return $this->manifest;
  }

  public function getPath($key = '', $default = null) {
    $collection = $this->manifest;
    if (is_null($key)) {
      return $collection;
    }
    if (isset($collection[$key])) {
      return $collection[$key];
    }
    foreach (explode('.', $key) as $segment) {
      if (!isset($collection[$segment])) {
        return $default;
      } else {
        $collection = $collection[$segment];
      }
    }
    return $collection;
  }
}

function asset_path($filename) {
  $dist_path = get_template_directory_uri() . DIST_DIR;
  $directory = dirname($filename) . '/';
  $file = basename($filename);
  static $manifest;

  if (empty($manifest)) {
    $manifest_path = get_template_directory() . DIST_DIR . 'assets.json';
    $manifest = new JsonManifest($manifest_path);
  }

  if (array_key_exists($file, $manifest->get())) {
    return $dist_path . $directory . $manifest->get()[$file];
  } else {
    return $dist_path . $directory . $file;
  }
}

function assets() {
  
  wp_enqueue_style( 'avenir_font', '//fast.fonts.net/cssapi/09ff86dc-664a-4b55-b9ac-75e9cac7d8aa.css' );
  wp_enqueue_style('sage_css', asset_path('styles/main.css'), false, null);

  if (is_single() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }

  // add html5 shiv and respond.js for ie8 and below
  if(preg_match('/(?i)msie [4-8]/',$_SERVER['HTTP_USER_AGENT']))
  {
      // if IE<=8
      wp_enqueue_script('html5shiv', asset_path('scripts/html5shiv.min.js'), [], null, false);
      wp_enqueue_script('respond', asset_path('scripts/respond.min.js'), [], null, false);
  }

  // add font awesome support for ie7 and below
  if(preg_match('/(?i)msie [4-7]/',$_SERVER['HTTP_USER_AGENT']))
  {
      // if IE<=7
      wp_enqueue_script('fontawesome-ie7', asset_path('scripts/fontawesome-ie7.js'), [], null, true);
  }

  wp_enqueue_script('modernizr', asset_path('scripts/modernizr.js'), [], null, true);
  wp_enqueue_script('sage_js', asset_path('scripts/main.js'), ['jquery'], null, true);
  
}
add_action('wp_enqueue_scripts', __NAMESPACE__ . '\\assets', 100);
