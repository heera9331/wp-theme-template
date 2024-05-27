


<div class="container-xl">
    <h1 class="font-semibold text-xl"><?php the_title(); ?></h1>
    <div class="flex gap-2">
        <?php the_author(); ?>
        <?php the_date(); ?>
        <?php esc_html('<span class="px-2 py-1 rounded-sm bg-gray-300">'.the_category().'</span>'); ?>
        <?php comments_number(); ?>
    </div>

    <div class="">
        <?php the_content(); ?>

        <?php comments_template(); ?>
    </div>

    
    <hr>
    <p>template is => content-article.php</p>
    <hr>
</div>