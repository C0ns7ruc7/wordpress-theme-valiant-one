<?php wp_footer(); ?>

<footer class="footer">
    <div class="container">
        <?php
        wp_nav_menu(
            array(
                'theme_location' => 'footer-menu', // 'theme_location' refers to functions.php/3.0
                'menu_class' => 'navigation', // adds class to the menu for style
            )
        );
        ?>
    </div>
</footer>

</body>
</html>
