<?php
function brinkman_enqueue_styles() {
	// JS

	#wp_register_script( 'brinkman', get_stylesheet_directory_uri() . '/js/brinkman.js', array( 'jquery' ), wp_get_theme()->get( 'Version' ), true );
	wp_register_script( 'isotope', get_stylesheet_directory_uri() . '/js/isotope.pkgd.js', array( 'jquery' ), '3.0.1', true );
	wp_register_script( 'isotope-js', get_stylesheet_directory_uri() . '/js/isotope.js', array( 'isotope' ), wp_get_theme()->get( 'Version' ), true );
	
	if( is_post_type_archive('projects') || is_post_type_archive('team-members') )
		wp_enqueue_script( 'isotope-js' );


	// CSS

	wp_enqueue_style( 'snowbank', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'child-style',
		get_stylesheet_directory_uri() . '/style.css',
		array( 'snowbank' ),
		wp_get_theme()->get('Version')
	);


}
add_action( 'wp_enqueue_scripts', 'brinkman_enqueue_styles', 20 );




function brinkman_enqueue_js() {
	echo '<script src="//use.typekit.net/sdi8wgu.js"></script><script>try{Typekit.load({ async: true });}catch(e){}</script>';
}
add_action( 'wp_head', 'brinkman_enqueue_js', 2 );


function brinkman_get_acf_sliders( ) {
	if( get_field('show_impact_slider' ) )
		get_template_part('inc/slider-impact');
	if( get_field('show_what_we_do_slider' ) )
		get_template_part('inc/slider-what-we-do');
}



require_once dirname( __FILE__ ) . '/functions/class.base.php';
require_once dirname( __FILE__ ) . '/functions/class.brinkman_cpt.php';

add_action( 'init', array(brinkman_cpt::get_instance(), 'init') );

update_option( 'medium_large_size_w', 975, true );
#add_image_size( 'project_vertical', 488, 549, true );
add_image_size( 'project_vertical', 768, 864, true );
add_image_size( 'team_member_featured_image', 1920, 770, array('center', 'top') );


