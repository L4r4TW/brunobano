<?php get_header(); ?>

<!-- Hero (static image) -->
<section class="hero">
  <img src="<?php echo get_template_directory_uri(); ?>/hero.jpg" alt="">
  <h1 class="hero-title">LET'S SPEAK ABOUT DIGITAL MARKETING</h1>
</section>

<!-- Featured block -->
<section class="container wide featured-grid">
  <?php
  // Try to pull 3 posts from the "featured" category; fallback to latest 3
  $feat = new WP_Query([
    'posts_per_page'      => 3,
    'ignore_sticky_posts' => 1,
    'category_name'       => 'featured'
  ]);
  if(!$feat->have_posts()) {
    wp_reset_postdata();
    $feat = new WP_Query([
      'posts_per_page'      => 3,
      'ignore_sticky_posts' => 1,
    ]);
  }
  if($feat->have_posts()):
    while($feat->have_posts()): $feat->the_post();
      $cats = get_the_category();
      $cat_name = $cats ? $cats[0]->name : '';
      ?>
      <a href="<?php the_permalink(); ?>" class="feat-card" aria-label="<?php the_title_attribute(); ?>">
        <?php the_post_thumbnail('large'); ?>
        <div class="overlay">
          <h3 class="feat-title"><?php the_title(); ?></h3>
          <?php if($cat_name): ?><span class="cat"><?php echo esc_html($cat_name); ?></span><?php endif; ?>
        </div>
      </a>
    <?php endwhile; wp_reset_postdata(); endif; ?>
  
</section>

<!-- Newsletter -->
<section class="newsletter">
  <div class="container">
    <h2>Want to keep up with our blog?</h2>
    <form method="post" action="#">
      <input type="email" placeholder="Your e-mail" required>
      <button type="submit">Subscribe</button>
    </form>
  </div>
</section>

<!-- Latest Articles -->
<div class="container">
  <h2>Latest Articles</h2>
  <div class="grid">
    <?php
    $latest = new WP_Query(['posts_per_page' => 6]);
    while($latest->have_posts()): $latest->the_post(); ?>
      <a class="card" href="<?php the_permalink(); ?>">
        <?php the_post_thumbnail('medium'); ?>
        <div class="pad">
          <h3><?php the_title(); ?></h3>
          <p><?php echo wp_trim_words(get_the_excerpt(), 18); ?></p>
          <button class="readmore">Read More</button>
        </div>
      </a>
    <?php endwhile; wp_reset_postdata(); ?>
  </div>
</div>

<!-- Instagram / Gallery Footer -->
<section class="insta-footer">
  <div class="insta-row">
    <img src="img1.jpg"><img src="img2.jpg"><img src="img3.jpg"><img src="img4.jpg"><img src="img5.jpg">
  </div>
</section>

<?php get_footer(); ?>
