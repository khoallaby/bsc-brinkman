<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<section class="container-fluid content white-bg">
    <div class="container">
        <div class="row no-gutter">
            <?php
                if( have_rows('header_images') )
	                echo '<div class="col-xs-12 col-sm-8 col-md-8">';
                else
	                echo '<div class="col-xs-12 col-sm-12 col-md-12">';

                if(has_post_thumbnail()) {
                    $size = is_singular( 'team-members' ) ? 'team_member_featured_image' : 'full';
                    the_post_thumbnail( $size, array('itemprop' => 'image','class' => 'img-responsive') );
                }
                echo '</div>';


                    if( have_rows('header_images') ):
	                    echo '<div class="col-xs-12 col-sm-4 col-md-4">';
                        echo '<ul class="sidebar-images list-unstyled">';
                        while ( have_rows('header_images') ) : the_row();
                            $image = get_sub_field('image');
                            ?>
                            <li>
                                <img src="<?php echo $image['sizes']['medium_large']; ?>" class="img-responsive" />
                            </li>
                            <?php
                        endwhile;
                        echo '</ul></div>';
                    endif;
                ?>
        </div>
        <div class="row no-gutter">
    <?php $col_size = is_singular('projects') || is_singular('team-members') ? 'col-sm-8 col-md-8' : 'col-sm-9 col-md-9'; ?>
            <div class="col-xs-12 <?php echo $col_size; ?>">
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
                <?php endwhile; ?>
            </div>

            <?php get_sidebar(); ?>

        </div>
    </div>
</section>
<?php endif; ?>