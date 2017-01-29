<?php
/* Template Name: Non Negotiables */
get_header();
get_template_part('inc/page-loop');


if( have_rows('banners') ):
	while ( have_rows('banners') ) : the_row();
		$image = get_sub_field('image');
		?>
		<section class="container-fluid banner-nn" style="background-image: url('<?php echo $image['url']; ?>');">
			<div class="container vcenter">
				<div class="row no-gutter">
					<div class="col-md-12">
						<div class="col-xs-12 col-md-7">
							<h2 class="rounded-header"><?php the_sub_field('title'); ?></h2>
						</div>
						<div class="col-xs-12 col-md-5">
							<?php the_sub_field('description'); ?>
						</div>
					</div>
				</div>
			</div>
		</section>
		<?php
	endwhile;
endif;


brinkman_get_acf_sliders();

get_footer();
