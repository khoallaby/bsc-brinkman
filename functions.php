<?php
function brinkman_enqueue_styles() {
	$parent_style = 'parent-style';

	wp_register_script( 'slick-slider', get_stylesheet_directory_uri() . '/js/slick/slick.js', array('jquery'), '1.6' );
	wp_register_style( 'slick-slider', get_stylesheet_directory_uri() . '/js/slick/slick.css', array(), '1.6' );
	wp_register_style( 'slick-slider-theme', get_stylesheet_directory_uri() . '/js/slick/slick-theme.css', array(),  '1.6' );
	#wp_register_script( 'brinkman', get_stylesheet_directory_uri() . '/js/brinkman.js', array( 'jquery' ), wp_get_theme()->get( 'Version' ), true );


	wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'child-style',
		get_stylesheet_directory_uri() . '/style.css',
		array( $parent_style ),
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