<?php get_header(); ?>

<div class="container">
    <h2 class="font-semibold text-2xl py-2">Posts</h2>
    <article class="border rounded-ms p-2">
        <?php 
            if(have_posts()) {
                while(have_posts()) {
                    the_post();
                    the_content();
                } 
            }
            get_template_part('template-parts/content', 'article');    
        ?>
    </article>
 
</div>


<hr>
<p>template is => front-page.php</p>
<hr>

<?php get_footer(); ?>