<section class="container-fluid home-news">
    <div class="container">
        <div class="row no-gutter">
            <div class="col-xs-12 col-sm-4 col-md-4">
                <h2>News</h2>
                <ul class="news-items list-unstyled">
                    <?php
                    $args = array(
	                    'posts_per_page' => 2
                    );
                    $query = brinkman_cpt::get_query( 'post', $args );

                    while ( $query->have_posts() ) : $query->the_post();
                    ?>
                        <li class="news-item">
                            <?php #echo get_the_title() . ' <a href="' . get_permalink() . '" title="' . esc_attr( get_the_title() ) . '>Read more &gt;</a>'; ?>
                            <p><?php echo get_the_content( 'Read More &gt;', true ); ?></p>
                            <time class="entry-date" datetime="<?php the_time(get_option( 'time_format' )); ?>" itemprop="datePublished" pubdate><?php the_time( get_option( 'date_format' ) ); ?></time>
                        </li>
                    <?php
                    endwhile;
                    wp_reset_postdata();
                    ?>
                    <div class="news-item"><a href="<?php echo home_url(); ?>">ALL NEWS &gt;</a></div>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-8 col-md-8">
                <?php
                if( $image = get_field('team_image', get_option('page_on_front')) )
                    echo '<a href="/team-members"><img src="' . $image['url'] . '" class="img-responsive" /></a>';
                ?>
            </div>
        </div>
	</div>
</section>