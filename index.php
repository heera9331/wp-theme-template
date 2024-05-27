<?php get_header(); ?>

<div class="container">

  <div class="row">
    <div class="col-sm-3">
      <h2>left sidebar</h2>
      <?php get_sidebar('left-sidebar'); ?>
    </div>
    <div class="col-sm-6">
      <article>
        <h2>main - middle content</h2>
        <?php
        if (have_posts()) {
          while (have_posts()) {
            the_post();
            get_template_part('template-parts/content', 'archive');
          }
        }
        ?>
        <?php the_posts_pagination(); ?>
      </article>
    </div>
    <div class="col-sm-3">
      <h2>right sidebar</h2>
      <?php get_sidebar('right-sidebar'); ?>
    </div>
  </div>
  <hr>
  <p> template is => index.php</p>
  <hr>
</div>

<?php get_footer(); ?>