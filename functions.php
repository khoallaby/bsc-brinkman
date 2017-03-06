<?php
function brinkman_enqueue_styles() {
	// JS

	#wp_register_script( 'brinkman', get_stylesheet_directory_uri() . '/js/brinkman.js', array( 'jquery' ), wp_get_theme()->get( 'Version' ), true );
	wp_register_script( 'isotope', get_stylesheet_directory_uri() . '/js/isotope.pkgd.js', array( 'jquery' ), '3.0.1', true );
	wp_register_script( 'imagesloaded', get_stylesheet_directory_uri() . '/js/imagesloaded.pkgd.min.js', array( 'isotope' ), '4.1.1', true );
	wp_register_script( 'isotope-js', get_stylesheet_directory_uri() . '/js/isotope.js', array( 'jquery', 'isotope', 'imagesloaded' ), wp_get_theme()->get( 'Version' ), true );
	
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
	echo '<script src="https://use.typekit.net/bfu3kvh.js"></script><script>try{Typekit.load({ async: true });}catch(e){}</script>';
}
add_action( 'wp_head', 'brinkman_enqueue_js', 2 );


function brinkman_get_acf_sliders( ) {
	if( get_field('show_impact_slider' ) )
		get_template_part('inc/slider-impact');
	if( get_field('show_what_we_do_slider' ) )
		get_template_part('inc/slider-what-we-do');
}



/**
 * Get all the registered image sizes along with their dimensions
 *
 * @global array $_wp_additional_image_sizes
 *
 * @link http://core.trac.wordpress.org/ticket/18947 Reference ticket
 * @return array $image_sizes The image sizes
 */
function _get_all_image_sizes() {
	global $_wp_additional_image_sizes;
	$default_image_sizes = array( 'thumbnail', 'medium', 'large' );

	foreach ( $default_image_sizes as $size ) {
		$image_sizes[$size]['width']	= intval( get_option( "{$size}_size_w") );
		$image_sizes[$size]['height'] = intval( get_option( "{$size}_size_h") );
		$image_sizes[$size]['crop']	= get_option( "{$size}_crop" ) ? get_option( "{$size}_crop" ) : false;
	}

	if ( isset( $_wp_additional_image_sizes ) && count( $_wp_additional_image_sizes ) )
		$image_sizes = array_merge( $image_sizes, $_wp_additional_image_sizes );

	return $image_sizes;
}



function brinkman_home_srcset( $sources, $size_array, $image_src, $image_meta, $attachment_id ) {


	$all_sizes = _get_all_image_sizes();
	$small_width = $all_sizes['project_small']['width'];
	$large_width = $all_sizes['project_large']['width'];
	$small_url = $sources[$small_width]['url'];
	$large_url = $sources[$large_width]['url'];

	$new_sources = array(
		'400' => array(
			'url' => $small_url,
			'descriptor' => 'w',
			'value' => '400'
		),
		'767' => array(
			'url' => $large_url,
			'descriptor' => 'w',
			'value' => '767'
		),
		'1170' => array(
			'url' => $small_url,
			'descriptor' => 'w',
			'value' => '1170'
		)
	);

	foreach( $sources as $size => $meta ) {
		if( $size < 768 && $size >= $small_width )
			#$sources[ $size ]['url'] = $large_url;
			$new_sources[300] = array(
				'url' => $small_url,
				'descriptor' => 'w',
				'value' => '300'
			);
		else
			$sources[$size]['url'] = $small_url;
	}


	return $new_sources;

}



require_once dirname( __FILE__ ) . '/functions/class.base.php';
require_once dirname( __FILE__ ) . '/functions/class.brinkman_cpt.php';

add_action( 'init', array(brinkman_cpt::get_instance(), 'init') );

update_option( 'medium_large_size_w', 975, true );

add_image_size( 'project_vertical', 400, 450, true );
add_image_size( 'project_small', 400, 225, true );
add_image_size( 'project_large', 800, 450, true );
add_image_size( 'team_member_featured_image', 1170, 470, array('center', 'top') );
add_image_size( 'full_featured_image', 1170, 99999 );


