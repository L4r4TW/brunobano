<?php
add_action('after_setup_theme', function(){
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');     // featured images
  add_theme_support('html5', ['search-form','gallery','caption']);
  add_theme_support('automatic-feed-links');
  register_nav_menus(['primary' => 'Primary Menu']);
});

add_action('wp_enqueue_scripts', function(){
  // Google Fonts: Anton for hero heading
  wp_enqueue_style(
    'bruno-fonts',
    'https://fonts.googleapis.com/css2?family=Anton&display=swap',
    [],
    null
  );
  wp_enqueue_style('bruno-style', get_stylesheet_uri(), [], '1.0');
});
