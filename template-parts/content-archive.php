<div class="container-xl">
    <div class="py-4">
        <img class="img-thumbnail img-fluid" src="<?php the_post_thumbnail_url(); ?>" alt="">
    </div>
    <h3 class="font-bold"><?php the_title(); ?></h3>
    <div>
        <?php the_author(); ?>
        <?php the_date(); ?>
        <?php the_tags(); ?>
        <?php comments_number(); ?>
    </div>
    <?php the_excerpt(); ?>
    <p class="py-2">
        <a class="text-blue-800 font-semibold" href="<?php the_permalink(); ?>">Read More</a>
    </p>
    <hr>
    <p>template is => content-archive.php</p>
    <hr>
</div>