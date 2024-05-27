<?php get_header(); ?>

<div class="container">
    <?php the_post_thumbnail(); ?>
    <article>
        <?php 
            if(have_posts()) {
                while(have_posts()) {
                    the_post();
                    get_template_part('template-parts/content', 'article');
                }
            }
        ?>
    </article>
    <hr>
    <p>single.php</p>
    <hr>
</div>
 
<?php get_footer(); ?>