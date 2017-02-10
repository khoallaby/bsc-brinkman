<section class="container-fluid content">
    <div class="container">
        <div class="row no-gutter">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <div class="col-xs-12 col-sm-6 col-md-6">
            <?php the_field('column_1'); ?>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
            <?php the_field('column_2'); ?>
            </div>
        </div>
    </div>
</section>
<?php endwhile; endif; ?>