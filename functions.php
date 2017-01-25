<?php
function brinkman_enqueue_styles() {
	// JS

	#wp_register_script( 'brinkman', get_stylesheet_directory_uri() . '/js/brinkman.js', array( 'jquery' ), wp_get_theme()->get( 'Version' ), true );
	wp_register_script( 'isotope', get_stylesheet_directory_uri() . '/js/isotope.pkgd.min.js', array(), '3.0.1', true );
	wp_register_script( 'isotope-js', get_stylesheet_directory_uri() . '/js/isotope.js', array( 'isotope' ), wp_get_theme()->get( 'Version' ), true );
	
	if( is_singular('projects') )
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




require_once dirname( __FILE__ ) . '/functions/class.base.php';
require_once dirname( __FILE__ ) . '/functions/class.brinkman_cpt.php';

add_action( 'init', array(brinkman_cpt::get_instance(), 'init') );


function vard($content) {
	echo '<pre>';
	var_dump($content);
	echo '</pre>';
}