<?php get_header(); ?>
<div class="container" id="front-page">
    <?php if (have_posts()) :
        while (have_posts()) :
            the_post(); ?>
            <h1 class="text-center"><?php the_title(); ?></h1>
            <div class="intro">
                <?php the_content(); ?>
            </div>
    <?php endwhile;
    endif;
    wp_reset_postdata();
    ?>

    <?php
    // 1. On définit les arguments pour définir ce que l'on souhaite récupérer
    $args = array(
        'post_type' => 'heros',
        'posts_per_page' => 3,
        'order' => 'ASC'
    );

    // 2. On exécute la WP Query
    $my_query = new WP_Query($args); ?>

    <h2>Les héros</h2>
    <div class="row">
        <?php // 3. On lance la boucle !
        if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post();
        ?>
                <div class="col-12 col-md-4 character">
                    <a href="<?= the_permalink(); ?>">
                        <img src=" <?= get_the_post_thumbnail_url() ?>" class="w-100">
                        <h3><?php the_title(); ?></h3>
                    </a>
                </div>
        <?php
            endwhile;
        endif;

        // 4. On réinitialise à la requête principale (important)
        wp_reset_postdata(); ?>
    </div>
    <a href="heros">Découvrir les héros...</a>
    <?php
    // 1. On définit les arguments pour définir ce que l'on souhaite récupérer
    $args = array(
        'post_type' => 'vilains',
        'posts_per_page' => 3,
        'order' => 'ASC'
    );

    // 2. On exécute la WP Query
    $my_query = new WP_Query($args); ?>

    <h2>Les vilains</h2>
    <div class="row">
        <?php // 3. On lance la boucle !
        if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post();
        ?>
                <div class="col-12 col-md-4 character">
                    <a href="<?= the_permalink(); ?>">
                        <img src=" <?= get_the_post_thumbnail_url() ?>" class="w-100">
                        <h3><?php the_title(); ?></h3>
                    </a>
                </div>
        <?php
            endwhile;
        endif;

        // 4. On réinitialise à la requête principale (important)
        wp_reset_postdata(); ?>
    </div>
    <a href="vilains">Découvrir les vilains...</a>
</div>
<?php get_footer(); ?>