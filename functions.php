<?php


function mytheme_wp_init()
{
    //permet de s'assurer d'una affichage correct de nos balises title
    add_theme_support("title-tag");
    //permet d'ajouter une image à mettre en avant sur nos "Post"
    add_theme_support('post-thumbnails');
    //permet de s'assurer que nous puissons créer des menus dans notre thème
    add_theme_support("menus");
    register_nav_menu("header", "menu principal");
    register_nav_menu("footer", "menu secondaire");

    /*** 
     * CRÉATION DE CUSTOM POST TYPE 
     * précision : __() et _x() sont des fonctions de WordPress (et elles sont vraiment bien nommées !)
     * ***/

    // On rentre les différentes dénominations de notre custom post type qui seront affichées dans l'administration
    $labelsHeros = array(
        // Le nom au pluriel
        'name'                => _x('Héros', 'Post Type General Name'),
        // Le nom au singulier
        'singular_name'       => _x('Héros', 'Post Type Singular Name'),
        // Le libellé affiché dans le menu
        'menu_name'           => __('Héros'),
        // Les différents libellés de l'administration
        'all_items'           => __('Tous les héros'),
        'view_item'           => __('Voir les héros'),
        'add_new_item'        => __('Ajouter un nouveau héros'),
        'add_new'             => __('Ajouter'),
        'edit_item'           => __('Editer l\'héros'),
        'update_item'         => __('Modifier l\'héros'),
        'search_items'        => __('Rechercher un héros'),
        'not_found'           => __('Non trouvée'),
        'not_found_in_trash'  => __('Non trouvée dans la corbeille'),
    );

    // On peut définir ici d'autres options pour notre custom post type
    $argsHeros = array(
        'label'               => __('Héros'),
        'description'         => __('Tous sur héros'),
        'labels'              => $labelsHeros,
        'menu_icon'           => 'dashicons-superhero-alt',
        // On définit les options disponibles dans l'éditeur de notre custom post type
        'supports'            => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields',),
        /* 
		* Différentes options supplémentaires
		*/
        'show_in_rest'        => true,
        'hierarchical'        => false,
        'public'              => true,
        'has_archive'         => true,
        'rewrite'             => array('slug' => 'heros'),
        'show_in_nav_menus'   => true
    );

    // On rentre les différentes dénominations de notre custom post type qui seront affichées dans l'administration
    $labelsVilain = array(
        // Le nom au pluriel
        'name'                => _x('Vilains', 'Post Type General Name'),
        // Le nom au singulier
        'singular_name'       => _x('Vilain', 'Post Type Singular Name'),
        // Le libellé affiché dans le menu
        'menu_name'           => __('Vilains'),
        // Les différents libellés de l'administration
        'all_items'           => __('Tous les vilains'),
        'view_item'           => __('Voir les vilains'),
        'add_new_item'        => __('Ajouter une nouveau vilain'),
        'add_new'             => __('Ajouter'),
        'edit_item'           => __('Editer le vilain'),
        'update_item'         => __('Modifier le vilain'),
        'search_items'        => __('Rechercher un vilain'),
        'not_found'           => __('Non trouvée'),
        'not_found_in_trash'  => __('Non trouvée dans la corbeille'),
    );

    // On peut définir ici d'autres options pour notre custom post type

    $argsVilain = array(
        'label'               => __('Vilains'),
        'description'         => __('Tous sur vilain'),
        'labels'              => $labelsVilain,
        'menu_icon'           => 'dashicons-superhero',
        // On définit les options disponibles dans l'éditeur de notre custom post type
        'supports'            => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields',),
        /* 
		* Différentes options supplémentaires
		*/
        'show_in_rest' => true,
        'hierarchical'        => false,
        'public'              => true,
        'has_archive'         => true,
        'rewrite'              => array('slug' => 'vilains'),

    );

    // On enregistre nos custom post type qu'on nomme ici "heros" et "vilains" avec leurs arguments respectifs
    register_post_type('heros', $argsHeros);
    register_post_type('vilains', $argsVilain);
}


function mytheme_add_theme_scripts()
{
    //on ajoute le CSS de Bootstrap à notre thème
    wp_enqueue_style('bootstrap', "https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css");
    //On ajoute une Google Font
    wp_enqueue_style('wp-google-fonts-potta', 'https://fonts.googleapis.com/css2?family=Potta+One&display=swap', false);
    //On ajoute une 2ème Google Font
    wp_enqueue_style('wp-google-fonts-roboto', 'https://fonts.googleapis.com/css2?family=Roboto&display=swap', false);
    //On ajoute notre fichier "style.css"
    wp_enqueue_style('style', get_stylesheet_uri());
    //On ajoute notre JS
    wp_enqueue_script('mytheme_app', get_template_directory_uri() . '/js/app.js', [], false, true);
}

//Appelle des bons hooks pour les fonctions que nous avons créé afin que tout s'effectue dans WordPress
add_action('init', 'mytheme_wp_init');
add_action('wp_enqueue_scripts', 'mytheme_add_theme_scripts');
