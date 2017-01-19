<?php
get_template_part('inc/home-3-header-columns');
get_template_part('inc/home-second-header');
get_template_part('inc/home-meaningful-places');
#get_template_part('inc/slider-what-we-do');
get_template_part('inc/home-our-non-negotiables');
get_template_part('inc/home-impact');


if ( have_posts() ) : while ( have_posts() ) : the_post();
	#the_content();
endwhile; endif;
