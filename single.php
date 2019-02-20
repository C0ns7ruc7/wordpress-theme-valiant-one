<?php get_header()
/**
 * shows when a single post is on focus for the browser
 */
?>

    <div class="container pt-5 pb-5">

        <?php if ( have_posts() ) : while( have_posts() ) : the_post(); ?>
            <h1><?php the_title(); ?></h1>

            <?php if( has_post_thumbnail() ): ?>
                <img src="<?php the_post_thumbnail_url('largest'); ?>" class="img-fluid">
            <?php endif; ?>

            <?php the_content(); ?>

        <?php endwhile; endif; ?>
    </div>

<?php get_footer() ?>