<?php
	get_template_part('inc/home-3-header-columns');
	get_template_part('inc/home-second-header');
?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<?php #the_content(); ?>
<?php endwhile; endif; ?>


