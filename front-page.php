<?php get_header()
/**
 * this is the front page, it shows when going to the index.php of a theme
 *
 *
 */
?>

    <div class="container pt-5 pb-5">
        <?php if ( have_posts() ) : while( have_posts() ) : the_post(); ?>

            <h1><?php the_title(); ?></h1>

            <?php the_content(); ?>

        <?php endwhile; endif; ?>
    </div>

<?php get_footer() ?>
