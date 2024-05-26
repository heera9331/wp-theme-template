<?php get_header(); ?>

<div class="container">
    <img class="img-thumbnail img-fluid" src="<?php the_post_thumbnail_url(); ?>" alt="">
    <article>
        <?php
        if (have_posts()) {
            while (have_posts()) {
                the_post();
                get_template_part('template-parts/content', 'page');
            }
        }
        ?>
    </article>

    <!-- dynamic sidebar -->
    <?php // dynamic_sidebar('sidebar-1'); ?>
    <hr>
    <p>page.php</p>
    <hr>
</div>

<?php get_footer(); ?>