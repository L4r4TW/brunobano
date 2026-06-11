<?php get_header(); ?>

<?php
$archive_title       = get_the_archive_title();

if (is_home()) {
  $archive_title = __('Blog', 'bruno');
} elseif (is_category() || is_tag() || is_tax()) {
  $archive_title = single_term_title('', false);
} elseif (is_author()) {
  $archive_title = get_the_author_meta('display_name', get_queried_object_id());
} elseif (is_post_type_archive()) {
  $archive_title = post_type_archive_title('', false);
}

$archive_description = is_home() ? get_bloginfo('description') : get_the_archive_description();
$posts_page_id       = (int) get_option('page_for_posts');
$blog_index_url      = $posts_page_id ? get_permalink($posts_page_id) : home_url('/');
$categories          = get_categories([
  'orderby' => 'count',
  'order'   => 'DESC',
  'number'  => 8,
]);
?>

<section class="blog-archive-hero">
  <div class="container wide blog-archive-hero__inner">
    <p class="blog-eyebrow"><?php esc_html_e('Insights', 'bruno'); ?></p>
    <h1><?php echo wp_kses_post($archive_title); ?></h1>
    <?php if ($archive_description): ?>
      <div class="blog-archive-description">
        <?php echo wp_kses_post(wpautop($archive_description)); ?>
      </div>
    <?php else: ?>
      <p class="blog-archive-description">
        <?php esc_html_e('Practical ideas on strategy, content, SEO, analytics, and digital growth.', 'bruno'); ?>
      </p>
    <?php endif; ?>

    <?php if (!empty($categories)): ?>
      <nav class="blog-topic-nav" aria-label="<?php esc_attr_e('Blog topics', 'bruno'); ?>">
        <a class="<?php echo is_home() ? 'is-active' : ''; ?>" href="<?php echo esc_url($blog_index_url); ?>">
          <?php esc_html_e('All', 'bruno'); ?>
        </a>
        <?php foreach ($categories as $category): ?>
          <a class="<?php echo is_category($category->term_id) ? 'is-active' : ''; ?>" href="<?php echo esc_url(get_category_link($category)); ?>">
            <?php echo esc_html($category->name); ?>
          </a>
        <?php endforeach; ?>
      </nav>
    <?php endif; ?>
  </div>
</section>

<div class="container wide blog-archive">
  <?php if (have_posts()): ?>
    <?php $grid_open = is_paged(); ?>
    <?php if ($grid_open): ?>
      <div class="blog-section-heading">
        <p class="blog-eyebrow"><?php esc_html_e('Latest articles', 'bruno'); ?></p>
        <h2><?php esc_html_e('More marketing insights', 'bruno'); ?></h2>
      </div>
      <div class="blog-card-grid">
    <?php endif; ?>

    <?php
    $post_index = 0;
    while (have_posts()):
      the_post();
      $post_index++;
      $category_list = get_the_category();
      $primary_category = !empty($category_list) ? $category_list[0] : null;
      ?>
      <?php if ($post_index === 1 && !is_paged()): ?>
        <article <?php post_class('blog-featured-card'); ?>>
          <a class="blog-featured-card__image" href="<?php the_permalink(); ?>" aria-label="<?php the_title_attribute(); ?>">
            <?php if (has_post_thumbnail()): ?>
              <?php the_post_thumbnail('large'); ?>
            <?php else: ?>
              <img src="<?php echo esc_url(get_template_directory_uri() . '/hero.jpg'); ?>" alt="">
            <?php endif; ?>
          </a>
          <div class="blog-featured-card__content">
            <div class="blog-card-meta">
              <?php if ($primary_category): ?>
                <a href="<?php echo esc_url(get_category_link($primary_category)); ?>"><?php echo esc_html($primary_category->name); ?></a>
              <?php endif; ?>
              <span><?php echo esc_html(get_the_date()); ?></span>
            </div>
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <p><?php echo esc_html(wp_trim_words(get_the_excerpt(), 34)); ?></p>
            <a class="blog-read-more" href="<?php the_permalink(); ?>"><?php esc_html_e('Read article', 'bruno'); ?></a>
          </div>
        </article>

        <?php if ($GLOBALS['wp_query']->post_count > 1): ?>
          <div class="blog-section-heading">
            <p class="blog-eyebrow"><?php esc_html_e('Latest articles', 'bruno'); ?></p>
            <h2><?php esc_html_e('Fresh thinking for better marketing', 'bruno'); ?></h2>
          </div>
          <div class="blog-card-grid">
          <?php $grid_open = true; ?>
        <?php endif; ?>
      <?php else: ?>
        <article <?php post_class('blog-card'); ?>>
          <a class="blog-card__image" href="<?php the_permalink(); ?>" aria-label="<?php the_title_attribute(); ?>">
            <?php if (has_post_thumbnail()): ?>
              <?php the_post_thumbnail('medium_large'); ?>
            <?php else: ?>
              <img src="<?php echo esc_url(get_template_directory_uri() . '/hero.jpg'); ?>" alt="">
            <?php endif; ?>
          </a>
          <div class="blog-card__content">
            <div class="blog-card-meta">
              <?php if ($primary_category): ?>
                <a href="<?php echo esc_url(get_category_link($primary_category)); ?>"><?php echo esc_html($primary_category->name); ?></a>
              <?php endif; ?>
              <span><?php echo esc_html(get_the_date()); ?></span>
            </div>
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <p><?php echo esc_html(wp_trim_words(get_the_excerpt(), 22)); ?></p>
          </div>
        </article>
      <?php endif; ?>
    <?php endwhile; ?>

    <?php if ($grid_open): ?>
      </div>
    <?php endif; ?>

    <div class="blog-pagination">
      <?php
      the_posts_pagination([
        'mid_size'  => 1,
        'prev_text' => __('Previous', 'bruno'),
        'next_text' => __('Next', 'bruno'),
      ]);
      ?>
    </div>
  <?php else: ?>
    <section class="blog-empty">
      <p class="blog-eyebrow"><?php esc_html_e('No articles yet', 'bruno'); ?></p>
      <h2><?php esc_html_e('Nothing has been published here.', 'bruno'); ?></h2>
      <p><?php esc_html_e('Check back soon for new insights.', 'bruno'); ?></p>
    </section>
  <?php endif; ?>
</div>

<?php get_footer(); ?>
