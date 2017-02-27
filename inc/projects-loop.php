<section class="container-fluid content">
    <div class="container">
        <div class="row no-gutter">

            <div class="col-md-12">
            <?php get_template_part('inc/page-header'); ?>

            <div class="text-center">
                <ul class="menu-categories list-unstyled button-group filters-button-group">
                    <li><button data-filter="*" class="active">All</button></li>
			        <?php

			        if( is_post_type_archive('projects') ) {
				        $cpt = 'projects';
				        $taxonomy = 'project-category';
			        } elseif( is_post_type_archive('team-members') ) {
				        $cpt = 'team-members';
				        $taxonomy = 'team-category';
			        }

                    $terms_args = array(
	                    'hide_empty' => false,
	                    'taxonomy' => $taxonomy
                    );

			        if( $taxonomy == 'team-category' ) {
				        $terms_args['meta_key'] = 'position';
				        $terms_args['orderby'] = 'meta_value_num';
				        $terms_args['order'] = 'ASC';
			        }

			        $terms = get_terms( $terms_args);

			        foreach( $terms as $term )
				        echo sprintf( '<li><button data-filter=".%s">%s</button></li>', $term->slug, $term->name );
			        ?>
                </ul>
            </div>

            <div class="grid">
		        <?php

		        $i = 1;
		        $args = array(
			        'posts_per_page' => -1,
			        'meta_key' => 'position',
			        'orderby' => 'meta_value_num',
			        'order' => 'ASC'
		        );

		        $posts = brinkman_cpt::get_posts( $cpt, $args );


		        // generate category names from taxonomy
		        foreach( $posts as $post ) {
			        if( $terms = get_the_terms( $post->ID, $taxonomy ) ){
				        $cats = array();
				        foreach( $terms as $term )
					        $cats[] = $term->slug;
				        $class = implode( ' ', $cats );
			        } else {
				        $class = '';
			        }

			        $size = get_field( 'image_size', $post->ID );
			        if( !$size )
			            $size = 'small';
			        $image_size = 'project_' . $size;

			        if( $size == 'vertical' || $size == 'small' )
			            $col_size = 4;
			        elseif( $size == 'large' )
                        $col_size = 8;

			        ?>
                    <div data-order="<?php echo get_field( 'position' ); ?>" class="grid-item col-xs-12 col-sm-6 col-md-<?php echo $col_size . ' ' . $class . ' ' . $image_size; ?>" data-category="<?php echo $class; ?>">
                        <figure class="image-hover">
                            <a href="<?php the_permalink( $post->ID ); ?>" title="<?php echo esc_attr( get_the_title($post->ID) ); ?>"><?php echo get_the_post_thumbnail( get_the_ID(), $image_size, array('class' => 'img-responsive img') ); ?></a>
                            <figcaption class="image-hover-text"><h3><a href="<?php the_permalink( $post->ID ); ?>" title="<?php echo esc_attr( $post->post_title ); ?>"><?php echo $post->post_title; ?></a></h3></figcaption>
                        </figure>
                    </div>
			        <?php } ?>

            </div><!-- end grid -->
        </div>

        <br /><br />


        </div>
    </div>
</section>