<?php $col_size = is_home() || is_singular('post') ? 3 : 4; ?>
<div class="col-xs-12 col-sm-<?php echo $col_size; ?> col-md-<?php echo $col_size; ?>">
    <div class="sidebar">
	<?php
	if(is_home() || is_singular('post') ) {
		if ( is_active_sidebar( 'sidebar-2' ) ) :
			dynamic_sidebar( 'sidebar-2' );
		endif;
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