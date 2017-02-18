<?php $col_size = is_home() || is_single('post') ? 3 : 4; ?>
<div class="col-xs-12 col-sm-<?php echo $col_size; ?> col-md-<?php echo $col_size; ?>">
    <div class="sidebar">
	<?php
	if(is_home() || is_single('post') ) {
		if ( is_active_sidebar( 'sidebar-2' ) ) :
			dynamic_sidebar( 'sidebar-2' );
		endif;
		/*} elseif ( is_woocommerce() ) {
			if ( is_active_sidebar( 'woocommerce' ) ) :
				dynamic_sidebar( 'woocommerce' );
			endif;
		} elseif ( is_cart() ) {
			if ( is_active_sidebar( 'woocommerce' ) ) :
				dynamic_sidebar( 'woocommerce' );
			endif;
		} elseif ( is_checkout() ) {
			if ( is_active_sidebar( 'woocommerce' ) ) :
				dynamic_sidebar( 'woocommerce' );
			endif;
		} elseif ( is_account_page() ) {
			if ( is_active_sidebar( 'woocommerce' ) ) :
				dynamic_sidebar( 'woocommerce' );
			endif;*/
	} elseif( is_singular('projects') ) {
		get_template_part('inc/sidebar-projects');
	} elseif( is_singular('team-members') ) {
		get_template_part('inc/sidebar-team-members');
	} else {
		if ( is_active_sidebar( 'sidebar-1' ) ) :
			dynamic_sidebar( 'sidebar-1' );
		endif;
	}
	?>
    </div>
</div>