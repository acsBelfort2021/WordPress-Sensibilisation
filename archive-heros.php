<?php get_header(); ?>
<div class="container">
    <h1>Les Héros de DC Comics</h1>
    <div class="row">
        <?php if (have_posts()) :
            while (have_posts()) :
                the_post(); ?>
                <div class="col-12 col-md-4 character">
                    <a href="<?= the_permalink(); ?>">
                        <img src=" <?= get_the_post_thumbnail_url() ?>" class="w-100">
                        <h3><?php the_title(); ?></h3>
                    </a>
                </div>
        <?php endwhile;
        endif; ?>
    </div>
</div>
<?php get_footer(); ?>