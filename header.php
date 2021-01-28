<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php if (is_front_page()) {
                echo "DC Comics";
            } else {
                wp_title('');
            } ?></title>
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/menu.css" />
    <?php
    wp_head();
    ?>
</head>

<body>
    <?php get_template_part("includes/section", "navheader"); ?>