<?php get_header(); ?>
<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <?php if (have_posts()) :
        while (have_posts()) :the_post(); ?>
          <h1><?php the_title(); ?></h1>
          <h4>Posted on <?php the_time('F jS, Y') ?></h4>
          <br />
          <p><?php the_content(); ?></p>
        <?php endwhile;
      else: ?>
        <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
      <?php endif; ?>
    </div>
  </div>
</div>

<?php get_footer(); ?>