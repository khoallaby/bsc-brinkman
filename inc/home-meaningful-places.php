<section class="container-fluid home-meaningful-places text-center">
    <div class="container">
        <div class="row no-gutter">
            <h2>Meaningful Places</h2>
            <hr class="blue-bar" />
            <div class="">
                <?php
                $query = brinkman_cpt::get_query( 'projects' );
                while ( $query->have_posts() ) : $query->the_post();
                    ?>
                    <div class="col-xs-12 col-sm-4 col-md-4 item">
                        <figure class="image-hover">
                            <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( get_the_title() ); ?>"><?php echo get_the_post_thumbnail( get_the_ID(), 'large', array('class' => 'img-responsive img') ); ?></a>
                            <figcaption class="image-hover-text"><h3><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( get_the_title() ); ?>"><?php the_title(); ?></a></h3></figcaption>
                        </figure>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();
                ?>
            </div>
        </div>
    </div>
</section>