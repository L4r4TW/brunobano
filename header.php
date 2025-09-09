<?php ?><!doctype html><html <?php language_attributes();?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
  <?php wp_head();?>
</head>
<body <?php body_class();?>>

<header class="site-header transparent">
  <div class="nav container">
    <!-- Logo -->
    <a class="brand" href="<?php echo esc_url(home_url('/'));?>">
      <?php 
        if (function_exists('the_custom_logo') && has_custom_logo()) {
          the_custom_logo(); // upload via WP Customizer
        } else {
          bloginfo('name'); // fallback text logo
        }
      ?>
    </a>

    <!-- Mobile toggle + Navigation -->
    <input id="nav-toggle" type="checkbox" hidden>
    <nav class="menu" aria-label="Primary">
      <?php
        wp_nav_menu([
          'theme_location' => 'primary',
          'container'      => false,
          'menu_class'     => 'menu-list'
        ]);
      ?>
    </nav>
    <label class="burger" for="nav-toggle" aria-label="Toggle menu">
      <span></span>
      <span></span>
      <span></span>
    </label>
  </div>
</header>

<main>
