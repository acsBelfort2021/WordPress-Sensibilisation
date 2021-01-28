<?php
get_header();
?>
<div class="container" id="page">
    <div class="row">
        <?php if (have_posts()) :
            while (have_posts()) :
                the_post(); ?>
                <h1 class="text-center"><?php the_title(); ?></h1>
                <div class="intro">
                    <?php the_content(); ?>
                </div>
        <?php endwhile;
        endif;
        ?>
    </div>
</div>
<?php
get_footer();
?>