# Projet WordPress Sensibilisation (exemple d'utilisation de différents éléments de WordPress)

Bonjour ! Ce remote GitHub a été créé afin de vous donner des exemples et des idées pour vous aider à la réalisation du projet WordPress sur la sensibilisation à une thématique de société.

___

## Avant propos

Ce thème comporte des **exemples** et non pas des **règles** absolues de "il faut faire comme ça" (et mon style n'est pas poussé du tout non plus et mes images sont trop grandes). Soyez cohérent dans ce que vous voulez faire, préparez vous, et tout ira bien. 
De plus, j'ai choisi un sujet de site pas du tout en rapport avec vos sujets :smiley: !

**Quand je parle de Post dans ce README**, je ne fais **PAS référence à la superglobale $_POST** mais à la notion de **Post dans WordPress.**

Dans ce README sera présenter les différents **notions** :

* *Custom Post Type*
* *Template Page et Template Part*
* *Requêtes personnalisées*
* *Des petites astuces à droite à gauche*

**Le code dans ce thème a été commenté le plus possible afin de donner des explications sur ce dernier, regardez bien le code !**

___

## Custom Post Type

Pour rappel, dans WordPress, presque tout est un "Post" : vos articles, vos pages ; c'est pour cela que la **WP_Query** se base toujours sur : 

```php
<?php if (have_posts()) : while (have_posts()) :the_post(); ?>
<!-- dans cette loop je ne donne que des exemples hein, ce n'est pas forcement toujours comme ça ! -->
    <h1><?php the_title(); ?></h1>
    <img src="<?php get_the_post_thumbnail_url(); ?>" alt="">
    <div><?php the_excerpt(); ?></div>
<?php endwhile; endif; ?>
```

WordPress nous propose de créer notre propre "Post". Des **Custom Post** qui définiront des éléments de notre site que l'on pourra éditer et utiliser dans notre site **autre** que des *articles* ou *pages classiques*.

Créer un Custom Post Type se passe dans le fichier **functions.php**. Dans une fonction nous allons écrire le code nécessaire pour créer notre Custom Post Type puis nous appelerons cette fonction dans le bon [*hook*](https://capitainewp.io/formations/developper-theme-wordpress/hooks-functions/) qui dans ce cas est : *init*, ce qui donne :
```php
<?php
    add_action("init", "my_function");
?>
``` 
La fonction de WordPress a utilisé pour créer nos Custom Post Type est : **register_post_type()**. Dans les exemples présents dans ce thème (pour créer les Custom Post Type "Héros" et "Vilains"), le code est séparé. Tout d'abord, les *labels* (ce qui sera affiché dans le dashboard de l'administration de WordPress) du Custom Post Type sont définis dans une variable, puis les *arguments* pour enregistrés ce Custom Post Type sont définis dans une autre variable.

Pour enregister notre Custom Post Type, nous finissons dans la fonction par :
```php
<?php
    register_post_type($name, $args); 
    //$name étant une chaîne de caractère étant le nom de notre Custom Post Type
    //$args, les arguments (un tableau ou un chaîne de caractère, mais c'est plus pratique avec un tableau) qui sont les arguments de notre Custom Post Type.
?>
```

Une fois le Custom Post Type enregistré, nous aurons accès à celui dans le dashboard ET si celui-ci a été correctement configuré, nous aurons les mêmes possibilités d'édition sur ce dernier comme pour les Articles ou les Pages.

___

## Template Page et Template Part

### Template Page

Dans WordPress, nous pouvons créer nos propres **Template Page**, c'est à dire des fichiers PHP qui peuvent prendre le dessus sur les templates normalement utilisé par WordPress issus de la [Template Hierarchy](https://developer.wordpress.org/files/2014/10/Screenshot-2019-01-23-00.20.04.png). Les Template Page fonctionnent sur les Pages créées dans le dashboard de l'administration de WordPress.

Pour créer un Template Page, il suffit de créer un fichier PHP (je vous conseille de le nommer avec le préfixe *template-* afin de mieux vous y retrouver) et de le commencer par un commentaire PHP (oubliez pas la balise d'ouverture de PHP du coup hein) qui aura cette forme au minimum :
```php
/**
 * Template Name: Nom de votre template
 */ 
```
Il est très **IMPORTANT** que les deux points soit collé contre le e de "Name" et qu'il y ait un espace entre le nom du template et . Il faut absolument que cela soit écrit ainsi, sinon, WordPress ne comprendra que vous essayer de créer un Template Page. De même mettez vos Template Page à la racine de votre thème.
Une fois votre Template Page créée, vous pouvez écrire n'importe quel code HTML, PHP, JS ou CSS dedans.

Pour affecter votre Template Page à une page précise de votre WordPress cela se passe de le dashboard de l'administration. Rendez vous dans "Pages", puis sélectionnez la Page à laquelle vous voulez affecter le Template Page et cliquez sur "Modifier". Dans l'éditeur de la Page se trouve une partie "Attributs de la page". Dans cette partie se trouve une liste déroulante "Modèle". En déroulant, vous trouverez votre Template Page et l'affecter à cette Page (n'oubliez pas d'enregistrer les modifications).

### Template Part

WordPress nous permet également de créer des **Template Part**, c'est à dire des morceaux de code que nous pourrons appeler dans nos différents templates (encore une fois HTML, PHP, JS, CSS comme vous voulez). Vous pouvez voir cela dans l'idée comme un ```php require("header.php"); ``` comme nous faisions auparavant. Cependant pour appeler une Template Part, nous utiliserons la fonction de WordPress **get_template_part**, car c'est WordPress et on fait comme WordPress dit !  

Pour s'organiser, le plus simple est de créer un dossier à la racine de votre thème qui s'appelle "includes" ou "template-part", peut importe. Dans celui-ci vos mettrez vos différents fichiers PHP. Encore une fois, pour s'organiser, nommez vos fichiers sous la forme : "_prefixe_**-**_part_.php". Pour intégrer ces fichiers dans votre template, il suffira de faire : 
```php
<?php
    get_template_part("includes/section", "truc");
    //Dans cet exemple :
    //Nous avons un dossier à la racine "includes"
    //Nous avons un fichier nommé "section-truc.php"
    //Les 2 arguments représentent le chemin vers le fichier PHP, leur séparation se fait au niveau du tiret dans le nom du fichier 
?>
```
___

## Requêtes personnalisées

La boucle WordPress par défaut renverra les "Post" (Articles, Pages, Custom Post Type) selon ce qui lui semble le plus approprié pour le template appelé. Nous pouvons personnaliser tout cela et faire des **requêtes personnalisées** grâce à la classe PHP de WordPress **WP_Query** (et oui l'Orienté Objet ça sert partout !).

Des exemples d'utilisation de la *WP_Query* se trouve dans ce thème sur les fichiers :
* front-page.php
* template-confidentialite.php

Le code des WP_Query sont expliqués dans les fichiers PHP.

___

## Des petites astuces à droite à gauche

* Afin d'avoir **une image dans mon menu**, *sans avoir trop à me casser la tête*, j'ai procédé ainsi. Dans le dashboard de l'administration de WordPress (toute l'opération se passe dans le dashboard), je me suis rendu dans "Médias". J'ai sélectionné l'image qui m'intéressait et ai cliqué sur "Modifier". Sur la page d'édition du média, j'ai trouvé l'URL de celui-ci dans la partie "URL du fichier". Une fois cette URL récupéré, j'ai accédé à "Apparence/Menus". Pour le menu de navigation que j'ai créé, j'ai placé :
  ```html
  <img src="URL-en-Question">
  ```
  au lieu d'un texte.
* Pour inclure **un autre fichier CSS** que *style.css*, j'ai procédé ainsi. Pour m'organiser, j'ai créé un dossier css à la racine de mon thème. Dedans j'ai créé le fichier CSS que je voulais. J'ai ensuite ajouté ce code dans les templates PHP dans lesquels je voulais utiliser ce CSS :
  ```php
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/nom-du-fichier.css" />
  ```
  Ainsi, j'ai pu rajouter du CSS à mes templates sans forcémment avoir à les *register* dans mon fichier functions.php ni à avoir à les accrocher à des hooks.
* Pour **connaître l'ID d'un Post** (quel que soit la nature du Post), il suffit de l'avoir le modifier dans le dashboard de l'administration. L'ID du Post se trouvera à un endroit dans l'URL : **post=valeur**.
