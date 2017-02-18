<section class="container-fluid home-news">
    <div class="container">
        <div class="row no-gutter">
            <div class="col-xs-12 col-sm-4 col-md-4">
                <h2>News</h2>
                <ul class="news-items list-unstyled">
                    <?php
                    $args = array(
	                    'posts_per_page' => 2,
                        'meta_key' => 'featured_news_post',
                        'meta_value' => '1',
	                    'order' => 'DESC',
	                    'orderby' => 'post_date'
                    );
                    $query = brinkman_cpt::get_query( 'post', $args );

                    if( $query->post_count === 0 ) {
	                    unset($args['meta_key']);
	                    unset($args['meta_value']);
	                    $query = brinkman_cpt::get_query( 'post', $args );
                    }

                    while ( $query->have_posts() ) : $query->the_post();
                        $limit = 100;
                        $the_excerpt = get_the_excerpt();
                        // checks to see if excerpt is longer than $limit
                        if( strlen($the_excerpt) > $limit ) {
                            // substr by whole words
                            $s = substr($the_excerpt, 0, $limit);
                            $excerpt = substr($s, 0, strrpos($s, ' '));
                            $excerpt = rtrim($excerpt, '?!.,\'";/\\'); // strips punctuation from the end of the string
                            $excerpt = force_balance_tags( $excerpt );
                            $more_link_text = 'Read More &gt;';
                            $more_link = apply_filters( 'the_content_more_link', ' <a href="' . get_permalink() . "#more-" . get_the_ID() . "\" class=\"more-link\">$more_link_text</a>", $more_link_text );
                            $excerpt_link = $excerpt . '... ' . $more_link;
                        } else {
                            $excerpt_link = get_the_content( 'Read More &gt;', true );
                        }


	                    ?>
                        <li class="news-item">
                            <?php #echo get_the_title() . ' <a href="' . get_permalink() . '" title="' . esc_attr( get_the_title() ) . '>Read more &gt;</a>'; ?>
                            <p><?php echo $excerpt_link; ?></p>
                            <time class="entry-date" datetime="<?php the_time(get_option( 'time_format' )); ?>" itemprop="datePublished" pubdate><?php the_time( get_option( 'date_format' ) ); ?></time>
                        </li>
                    <?php
                    endwhile;
                    wp_reset_postdata();
                    ?>
                    <div class="news-item"><a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>">ALL NEWS &gt;</a></div>
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