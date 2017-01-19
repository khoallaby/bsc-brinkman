<?php
$image = get_field('3_header_columns_background');

#vard($image);
?>
<section class="container-fluid home-3-header-columns" style="background-image: url('<?php echo $image['url']; ?>');">
    <div class="container">
        <div class="row">
			<?php
			if( have_rows('3_header_columns') ):
				while ( have_rows('3_header_columns') ) : the_row();
					$icon = get_sub_field('icon');
					$background = get_sub_field('background');
					?>
                    <div class="col-xs-12 col-sm-4 col-md-4 box" style="background-image: url('<?php echo $background['url']; ?>');">
                        <div class="contents vcenter">
                            <img src="<?php echo $icon['sizes']['large']; ?>" /><br />
                            <h3><?php echo get_sub_field( 'title' ); ?></h3>
                            <hr class="blue-bar" />
                            <?php echo get_sub_field( 'description' ); ?>
                        </div>
                    </div>
					<?php
				endwhile;
			endif;
			?>
        </div>
    </div>
</section>

