<?php get_header(); ?>

<div class="container">
    <article>
        <?php 
            if(have_posts()) {
                while(have_posts()) {
                    the_post(); 
                }
            }
            get_template_part('template-parts/content', 'archive'); 
        ?>
    </article>
</div>


<hr>
<p>template is => archive.php</p>
<hr>

<?php get_footer(); ?>