<?php

function brinkman_custom_sidebars() {

	foreach( range(1,5) as $i ) {
		if ( is_active_sidebar( 'footer-widget-' . $i ) )
			unregister_sidebar( 'footer-widget-' . $i );

		$args = array(
			'name' => __( 'Footer Widget ' . $i,'blue-summit-creative-bootstrap-for-wordpress'),
			'id' => 'footer-widget-' . $i,
			'before_widget' => '<div class="col-md-2 footer-widget">',
			'after_widget' => '</div>',
			'before_title' => '<h4>',
			'after_title' => '</h4>',
		);

		#register_sidebar( $args );
	}
}

add_action( 'widgets_init', 'brinkman_custom_sidebars', 11 );
