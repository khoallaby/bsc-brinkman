<?php
	if( is_singular('projects') || is_page() )
		$content_bg = 'white-bg';
	elseif( is_post_type_archive('team-members') )
		$content_bg = '';
	else
		$content_bg = '';
?>
<section class="container-fluid content <?php echo $content_bg; ?>">
    <div class="container">
        <div class="row no-gutter">
            <div class="col-xs-12 col-md-12">
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
			            ?>
                    </article>

	            <?php endwhile; endif; ?>
            </div>
        </div>
    </div>
</section>


