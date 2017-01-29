<section class="container-fluid content white-bg">
    <div class="container">
        <div class="row no-gutter">

            <div class="col-xs-12 col-sm-8 col-md-8">
                <?php
                if ( have_posts() ) : while ( have_posts() ) : the_post();
                    if(has_post_thumbnail()) {
                        the_post_thumbnail('large', array('itemprop' => 'image','class' => 'img-responsive'));
                    }
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <?php
                    get_template_part('inc/page-header');
                    the_content();
                    if( have_rows('after_content') ):
                        echo '<ul class="content-list list-unstyled">';
                        while ( have_rows('after_content') ) : the_row();
                            $image = get_sub_field('image');
                            ?>
                            <li class="row">
                                <div class="col-xs-12 col-md-1 image">
                                    <img src="<?php echo $image['url']; ?>" /><br />
                                </div>
                                <div class="col-xs-12 col-md-11 contents">
                                    <h2><?php echo get_sub_field('title'); ?></h2>
                                    <?php echo get_sub_field('description'); ?>
                                </div>
                            </li>
                            <?php
                        endwhile;
                        echo '</ul>';
                    endif;
                    ?>

                </article>
                <?php endwhile; endif; ?>
            </div>

            <?php get_sidebar(); ?>

        </div>
    </div>
</section>