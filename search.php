<?php get_header()
/**
 * search view
 * shows some basic things that are searched for with th standard function.
 */
?>

<div class="container pt-5 pb-5">
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
    <?php endwhile; else: ?>
        <div class="card mb-2">
            <div class="card-body">
                <h3>No results</h3>
            </div>
        </div>
    <?php endif; ?>
</div>

<?php get_footer() ?>

