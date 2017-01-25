<?php

# images

if( have_rows('header_images') ):
	echo '<ul class="sidebar-images list-unstyled">';
	while ( have_rows('header_images') ) : the_row();
		$image = get_sub_field('image');
		?>
        <li>
            <img src="<?php echo $image['sizes']['medium_large']; ?>" class="img-responsive" />
        </li>
		<?php
	endwhile;
	echo '</ul>';
endif;


# extra content boxes

if( have_rows('sidebar_content') ):
	echo '<ul class="sidebar-content-list list-unstyled clearfix">';
	while ( have_rows('sidebar_content') ) : the_row();
		?>
        <li>
            <h3><?php echo get_sub_field('title'); ?></h3>
            <?php echo get_sub_field('description'); ?>
        </li>
		<?php
	endwhile;
	echo '</ul>';
endif;


# team members

$members = get_field('team_members');
if( !empty( $members ) ):
?>
<div class="sidebar-team-members clearfix">
    <h2>Team</h2>
    <ul class="list-unstyled">
    <?php
	foreach( $members as $member ) :
		?>
        <li>
			<?php echo get_the_post_thumbnail( $member->ID, 'thumbnail' ) ?><a href="<?php echo get_the_permalink($member->ID); ?>"></a>
        </li>
		<?php
	endforeach;
	echo '</ul></div>';
endif;