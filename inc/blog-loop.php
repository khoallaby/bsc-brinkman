<section class="container-fluid content white-bg">
    <div class="container">
        <div class="row no-gutter">
            <div class="col-xs-12 col-sm-9 col-md-9">
		        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <h2 itemprop="headline"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                        <p class="entry-meta">Posted on
                            <time class="entry-date" datetime="<?php the_time(get_option( 'time_format' )); ?>" itemprop="datePublished" pubdate><?php the_time( get_option( 'date_format' ) ); ?></time>
                            by <?php the_author(); ?></p>
				        <?php if(has_post_thumbnail()) { ?>
                            <div class="row">
                                <div class="col-xs-12 col-sm-4 col-md-3">
                                    <a href="<?php the_permalink() ?>"><?php the_post_thumbnail( 'thumbnail', array('itemprop' => 'image','class' => 'img-responsive') );?></a>
                                </div>
                                <div class="col-xs-12 col-sm-8 col-md-9"><?php the_excerpt();?></div>
                            </div>
				        <?php
				        } else {
				            the_excerpt();
				        }

				        #the_category(', ');
				        the_tags();
				        ?>
                    </article>
			        <?php wp_link_pages(); ?>
		        <?php endwhile; endif; ?>
		        <?php wpex_pagination(); ?>
            </div>
            <?php get_sidebar(); ?>
        </div>
    </div>
</section>

