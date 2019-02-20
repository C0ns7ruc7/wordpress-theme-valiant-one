<?php get_header()
/**
 * shows when a single page is on focus for the browser
 */
?>

    <div class="container pt-5 pb-5">
        <h1><?php single_cat_title(); /** cat = category, not animals **/ ?></h1>

        <?php if ( have_posts() ) : while( have_posts() ) : the_post(); ?>

        <div class="card mb-2">
            <div class="card-body">
                <h3><?php the_title(); ?></h3>

                <?php if( has_post_thumbnail() ): ?>
                    <img src="<?php the_post_thumbnail_url('thumb'); ?>" class="img-fluid">
                <?php endif; ?>

                <?php the_excerpt(); ?>
                <a href="<?php the_permalink(); ?>" class="btn btn-success">Read more</a>
            </div>
        </div>
        <?php endwhile; endif; ?>
    </div>

<?php get_footer() ?>