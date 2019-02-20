<?php
/**
 * header file, added as first to the page, standard things
 */
?>

<!doctype html>
<html>
    <head>
        <?php wp_head(); ?>
    </head>
<body <?php body_class(); ?>>


<header class="sticky-top">
    <div class="container">
        <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'top-menu', // 'theme_location' refers to functions.php/3.0
                    'menu_class' => 'navigation', // adds class to the menu for style
                )
            );
        ?>
        <?php
            get_search_form();
        ?>
    </div>
</header>
