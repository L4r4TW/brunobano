<?php get_header(); ?>
<div class="container">
  <h1><?php the_archive_title(); ?></h1>
  <?php if(have_posts()): while(have_posts()): the_post(); ?>
    <a class="card" href="<?php the_permalink(); ?>">
      <?php if(has_post_thumbnail()) the_post_thumbnail('large'); ?>
      <div class="pad">
        <h2><?php the_title(); ?></h2>
        <p class="post-meta"><?php echo get_the_date(); ?></p>
        <p><?php echo wp_kses_post(wp_trim_words(get_the_excerpt(), 28)); ?></p>
      </div>
    </a>
  <?php endwhile; the_posts_pagination(); else: ?><p>Nothing found.</p><?php endif; ?>
</div>
<?php get_footer(); ?>