<div class="col-md-12">

    <h1>Meaningful Places</h1>
    <hr class="blue-bar" />

    <div class="text-center">
        <ul class="menu-categories list-unstyled">
        <li><a href="#all">All</a></li>
        <?php

        $terms = get_terms( array(
	        'hide_empty' => false,
            'taxonomy' => 'project-category'
        ));
        foreach( $terms as $term ) {
            echo sprintf( '<li><a href="#%s">%s</a></li>', $term->slug, $term->name );
        }
        #vard($terms);
        ?>
        </ul>
    </div>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class('row'); ?>>
			<?php if(has_post_thumbnail()) { ?>
			<div class="col-xs-12 col-sm-3 col-md-3">
				<a href="<?php the_permalink() ?>"><?php the_post_thumbnail( 'medium', array('itemprop' => 'image','class' => 'img-responsive'));?></a>
			</div>
			<div class="col-xs-12 col-sm-9 col-md-9">
				<?php } else { ?>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<?php } ?>
					<h3 itemprop="headline"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
					<p class="author">Submitted by <?php the_author(); ?></p>
					<time class="entry-date" datetime="<?php the_time(get_option( 'time_format' )); ?>" itemprop="datePublished" pubdate><?php the_time( get_option( 'date_format' ) ); ?></time>
					<p class="excerpt"><?php echo get_the_excerpt();?></p>
					<!--<a href="<?php /*the_permalink(); */?>" class="read-more">Read More</a><br />-->

					<p class="tags"><?php the_tags( '<strong>Tags: </strong>' ); ?></p>
				</div>
		</article>
		<?php wp_link_pages(); ?>
	<?php endwhile; endif; ?>

</div>