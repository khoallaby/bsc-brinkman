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
                        <?php
                        echo '<a href="' . get_permalink() . '" title="' . esc_attr( get_the_title() ) . '" class="img-container">';
                        echo get_the_post_thumbnail( get_the_ID(), 'large', array('class' => 'img-responsive img') );
                        echo '</a>';
                        ?>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();
                ?>
            </div>
        </div>
    </div>
</section>