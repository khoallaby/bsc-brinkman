<?php
get_template_part('inc/home-3-header-columns');
get_template_part('inc/home-second-header');
get_template_part('inc/home-meaningful-places');


if ( have_posts() ) : while ( have_posts() ) : the_post();
	#the_content();
endwhile; endif;
