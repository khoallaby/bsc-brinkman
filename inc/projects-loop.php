<section class="container-fluid content">
    <div class="container">
        <div class="row no-gutter">

            <div class="col-md-12">
            <?php get_template_part('inc/page-header'); ?>

            <div class="text-center">
                <ul class="menu-categories list-unstyled button-group filters-button-group">
                    <li><button data-filter="*" class="active">All</button></li>
			        <?php

			        $args = array(
				        'posts_per_page' => -1
			        );

			        if( is_post_type_archive('projects') ) {
				        $cpt = 'projects';
				        $taxonomy = 'project-category';
				        $layout = array( 4, 8, 4, 8, '4 vert', 4, 4, 4 );
				        #$layout = array( 8, 4, 4, '4 vert', 8, 4, 4, 4 );

                    } elseif( is_post_type_archive('team-members') ) {
				        $cpt = 'team-members';
				        $taxonomy = 'team-category';
				        $layout = array( 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4 );
				        $args['meta_key'] = 'position';
				        $args['orderby'] = 'meta_value_num';
				        $args['order'] = 'ASC';

                    }


                    $terms_args = array(
	                    'hide_empty' => false,
	                    'taxonomy' => $taxonomy
                    );

			        if( $taxonomy == 'team-category' ) {
				        $terms_args['orderby'] = 'meta_value_num';
				        $terms_args['order'] = 'ASC';
				        $terms_args['meta_key'] = 'position';
			        }

			        $terms = get_terms( $terms_args);

			        foreach( $terms as $term )
				        echo sprintf( '<li><button data-filter=".%s">%s</button></li>', $term->slug, $term->name );
			        ?>
                </ul>
            </div>

            <div class="grid">
		        <?php

		        $query = brinkman_cpt::get_query( $cpt, $args );
		        $posts = $query->get_posts();

		        // $i = total, $i_l = index # for $layout
		        $i = $i_l = 0;


		        foreach( $posts as $post ) {
			        // generate category names from taxonomy
			        if( $terms = get_the_terms( $post->ID, $taxonomy ) ){
				        $cats = array();
				        foreach( $terms as $term )
					        $cats[] = $term->slug;
				        $class = implode( ' ', $cats );
			        } else {
				        $class = '';
			        }

			        $grid_sizer = $layout[$i_l] == 4 ? ' grid-sizer' : '';
			        if( $layout[$i_l] === '4 vert' ) {
				        #$class .= ' stamp';
				        $image_size = 'project_vertical';
			        } elseif( $layout[$i_l] == 8 ) {
				        $image_size = 'project_large';
			        } else {
				        $image_size = 'project_small';
                    }

			        ?>
                    <div data-order="<?php echo ($i + 1); ?>" class="grid-item col-xs-12 col-sm-6 col-md-<?php echo $layout[$i_l] . $grid_sizer . ' ' . $class . ' ' . $image_size; ?>" data-category="<?php echo $class; ?>">
                        <figure class="image-hover">
                            <a href="<?php the_permalink( $post->ID ); ?>" title="<?php echo esc_attr( get_the_title($post->ID) ); ?>"><?php echo get_the_post_thumbnail( get_the_ID(), $image_size, array('class' => 'img-responsive img') ); ?></a>
                            <figcaption class="image-hover-text"><h3><a href="<?php the_permalink( $post->ID ); ?>" title="<?php echo esc_attr( $post->post_title ); ?>"><?php echo $post->post_title; ?></a></h3></figcaption>
                        </figure>
                    </div>
			        <?php
			        $i++;
			        if( ($i_l+1) < count($layout) )
			            $i_l++;
			        else
				        $i_l = 0;
		        }

		        ?>

            </div><!-- end grid -->
        </div>

        <br /><br />


        </div>
    </div>
</section>