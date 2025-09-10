<?php
add_action('after_setup_theme', function(){
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');     // featured images
  add_theme_support('html5', ['search-form','gallery','caption']);
  add_theme_support('automatic-feed-links');
  register_nav_menus(['primary' => 'Primary Menu']);
});

add_action('wp_enqueue_scripts', function(){
  // Google Fonts: Anton (hero) + DM Sans (titles/text)
  wp_enqueue_style(
    'bruno-fonts',
    'https://fonts.googleapis.com/css2?family=Anton&family=DM+Sans:wght@400;700;800&display=swap',
    [],
    null
  );
  wp_enqueue_style('bruno-style', get_stylesheet_uri(), [], '1.0');
});

// Handle contact form submissions securely
function bruno_handle_contact_submit() {
  // Basic nonce and method check
  if (!isset($_POST['bruno_contact_nonce']) || !wp_verify_nonce($_POST['bruno_contact_nonce'], 'bruno_contact')) {
    wp_safe_redirect( add_query_arg('contact','error', wp_get_referer() ?: home_url('/')) );
    exit;
  }

  // Honeypot (spam trap)
  if (!empty($_POST['website'])) {
    wp_safe_redirect( add_query_arg('contact','sent', wp_get_referer() ?: home_url('/')) );
    exit;
  }

  $name    = isset($_POST['name'])   ? sanitize_text_field($_POST['name'])   : '';
  $email   = isset($_POST['email'])  ? sanitize_email($_POST['email'])       : '';
  $message = isset($_POST['message'])? wp_kses_post($_POST['message'])        : '';

  if (!$name || !$email || !is_email($email) || !$message) {
    wp_safe_redirect( add_query_arg('contact','error', wp_get_referer() ?: home_url('/')) );
    exit;
  }

  $to       = get_option('admin_email');
  $subject  = sprintf('New message from %s — %s', get_bloginfo('name'), $name);
  $headers  = [ 'Content-Type: text/plain; charset=UTF-8', 'Reply-To: '. $name .' <'. $email .'>' ];
  $body     = sprintf("Name: %s\nEmail: %s\n\nMessage:\n%s", $name, $email, trim(wp_strip_all_tags($message)));

  // Try to send the email
  $sent = wp_mail($to, $subject, $body, $headers);

  $redirect = add_query_arg('contact', $sent ? 'sent' : 'error', wp_get_referer() ?: home_url('/'));
  wp_safe_redirect($redirect);
  exit;
}
add_action('admin_post_nopriv_bruno_contact_submit', 'bruno_handle_contact_submit');
add_action('admin_post_bruno_contact_submit', 'bruno_handle_contact_submit');
