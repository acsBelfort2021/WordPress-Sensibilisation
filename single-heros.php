<?php get_header(); ?>
<div class="container single">
    <div class="row">
        <?php if (have_posts()) :
            while (have_posts()) :
                the_post(); ?>
                <h1 class="col-12 text-center"><?= the_title(); ?></h1>
                <div class="col-12">
                    <?php the_content(); ?>
                </div>
        <?php endwhile;
        endif; ?>
    </div>
</div>
<?php get_footer(); ?>