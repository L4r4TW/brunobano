<?php
/*
Template Name: Blog Index
*/
get_header();

// Hero title uses current page title
$hero_title = get_the_title();
?>

<!-- Hero (static image like other pages) -->
<section class="hero">
  <img src="<?php echo get_template_directory_uri(); ?>/hero.jpg" alt="">
  <h1 class="hero-title"><?php echo esc_html($hero_title); ?></h1>
</section>

<!-- Blog posts grid -->
<div class="container wide">
  <div class="grid">
    <?php
    $paged = max(1, get_query_var('paged'), get_query_var('page'));
    $q = new WP_Query([
      'post_type' => 'post',
      'paged'     => $paged,
      'ignore_sticky_posts' => 1,
    ]);
    if ($q->have_posts()): while ($q->have_posts()): $q->the_post(); ?>
      <a class="card" href="<?php the_permalink(); ?>">
        <?php if (has_post_thumbnail()) { the_post_thumbnail('large'); } ?>
        <div class="pad">
          <h3><?php the_title(); ?></h3>
          <p><?php echo wp_trim_words(get_the_excerpt(), 22); ?></p>
          <button class="readmore">Read More</button>
        </div>
      </a>
    <?php endwhile; endif; wp_reset_postdata(); ?>
  </div>

  <?php
  echo paginate_links([
    'total'   => $q->max_num_pages,
    'current' => $paged,
    'mid_size'=> 2,
    'prev_text' => '&laquo;',
    'next_text' => '&raquo;',
  ]);
  ?>
</div>

<?php get_footer(); ?>

