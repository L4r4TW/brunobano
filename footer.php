</main>
<footer class="site-footer">
  <div class="container wide footer-row">
    <nav class="footer-nav" aria-label="Footer">
      <?php
        if (has_nav_menu('footer')) {
          wp_nav_menu([
            'theme_location' => 'footer',
            'container'      => false,
            'menu_class'     => 'footer-menu'
          ]);
        } else {
          wp_nav_menu([
            'theme_location' => 'primary',
            'container'      => false,
            'menu_class'     => 'footer-menu'
          ]);
        }
      ?>
    </nav>

    <div class="footer-brand">
      <?php 
        if (function_exists('the_custom_logo') && has_custom_logo()) {
          the_custom_logo();
        } else {
          echo '<span class="site-name">'. esc_html(get_bloginfo('name')) .'</span>';
        }
      ?>
    </div>

    <div class="footer-right">A blog about digital marketing</div>
  </div>
</footer>
<script>
addEventListener('scroll',()=>{
  document.documentElement.classList.toggle('scrolled', scrollY>10);
});
</script>
<?php wp_footer();?></body></html>
