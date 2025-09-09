<?php get_header(); ?>
<div class="container">
  <?php if(is_home() && !is_paged()): // optional hero on homepage ?>
  <?php $f = get_posts(['numberposts'=>1,'meta_key'=>'_thumbnail_id']); if($f){ $p=$f[0]; ?>
    <section class="hero">
      <?php echo get_the_post_thumbnail($p->ID,'full'); ?>
      <h1 class="hero-title"><?php echo esc_html(get_the_title($p)); ?></h1>
    </section>
  <?php } endif; ?>

  <?php if(have_posts()): ?>
    <div class="grid">
      <section>
        <?php while(have_posts()): the_post(); ?>
          <a class="card" href="<?php the_permalink(); ?>">
            <?php if(has_post_thumbnail()) the_post_thumbnail('large'); ?>
            <div class="pad">
              <h2><?php the_title(); ?></h2>
              <p class="post-meta"><?php echo get_the_date(); ?> · <?php the_category(', ');?></p>
              <p><?php echo wp_kses_post(wp_trim_words(get_the_excerpt(), 25)); ?></p>
            </div>
          </a>
        <?php endwhile; the_posts_pagination(); ?>
      </section>
      <aside>
        <?php get_search_form(); ?>
        <h3>Categories</h3>
        <ul><?php wp_list_categories(['title_li'=>'']); ?></ul>
      </aside>
    </div>
  <?php else: ?><p>No posts yet.</p><?php endif; ?>
</div>
<?php get_footer(); ?>