<?php
/**
 * Template Name: Confidentialité
 */
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/confidentialite.css" />
</head>

<body>
    <?php
    // 1. On définit les arguments pour définir ce que l'on souhaite récupérer
    $args = array(
        'post_type' => 'page',
        'p' => 3 //ce 3 correspond à l'ID du Post, soit ma Page
    );

    // 2. On exécute la WP Query
    $my_query = new WP_Query($args); ?>

        <?php // 3. On lance la boucle !
        if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post();
                the_content(); 
            endwhile;
        endif;

        // 4. On réinitialise à la requête principale (important)
        wp_reset_postdata(); ?>
</body>

</html>