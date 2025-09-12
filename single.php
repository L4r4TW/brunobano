<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

  <!-- Post Hero -->
  <section class="post-hero">
    <?php if (has_post_thumbnail()) {
      the_post_thumbnail('full');
    } else { ?>
      <img src="<?php echo get_template_directory_uri(); ?>/hero.jpg" alt="">
    <?php } ?>
    <div class="post-hero-overlay">
      <div class="single-date"><?php echo esc_html(get_the_date()); ?></div>
      <h1 class="single-title"><?php the_title(); ?></h1>
      <div class="author-inline">
        <?php echo get_avatar(get_the_author_meta('ID'), 40, '', get_the_author(), ['class' => 'avatar']); ?>
        <span class="by">by <?php the_author(); ?></span>
      </div>
    </div>
  </section>

  <!-- Post body -->
  <article class="post-wrap container wide">
    
    <!-- Share bar -->
    <div class="share-bar">
      <?php $url = urlencode(get_permalink()); $title = urlencode(get_the_title()); ?>
      <a class="share fb"  href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $url; ?>" target="_blank" rel="noopener">Facebook</a>
      <a class="share tw"  href="https://twitter.com/intent/tweet?url=<?php echo $url; ?>&text=<?php echo $title; ?>" target="_blank" rel="noopener">Twitter</a>
      <a class="share ln"  href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $url; ?>&title=<?php echo $title; ?>" target="_blank" rel="noopener">LinkedIn</a>
      <a class="share wa"  href="https://api.whatsapp.com/send?text=<?php echo $title; ?>%20<?php echo $url; ?>" target="_blank" rel="noopener">WhatsApp</a>
    </div>

    <div class="post-content">
      <?php the_content(); ?>
    </div>
  </article>

  <!-- Related posts -->
  <?php
  $related = new WP_Query([
    'posts_per_page' => 4,
    'post__not_in'   => [get_the_ID()],
    'ignore_sticky_posts' => 1,
    'category__in'   => wp_get_post_categories(get_the_ID()),
  ]);
  if ($related->have_posts()) : ?>
    <section class="container wide related">
      <h2>Related Posts</h2>
      <div class="related-grid">
        <?php while ($related->have_posts()) : $related->the_post();
          $cats = get_the_category();
          $cat_name = $cats ? $cats[0]->name : '';
        ?>
          <a class="rel-card" href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail('large'); ?>
            <div class="overlay">
              <h3 class="feat-title"><?php the_title(); ?></h3>
              <?php if($cat_name): ?><span class="cat"><?php echo esc_html($cat_name); ?></span><?php endif; ?>
            </div>
          </a>
        <?php endwhile; wp_reset_postdata(); ?>
      </div>
    </section>
  <?php endif; ?>

<?php endwhile; endif; ?>

<?php get_footer(); ?>
