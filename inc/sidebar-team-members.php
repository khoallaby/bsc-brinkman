<ul class="list-unstyled">
    <li class="text-center"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-info.png" /></li>
    <li>
        <h2><?php the_title(); ?></h2>
        <?php echo get_field('title') ? '<h3>' . get_field('title') . '</h3>' :''; ?>
    </li>
    <?php
    if( get_field('email') || get_field('phone') ):
        echo '<li>';
        if( get_field('email') )
            echo '<div><i class="fa fa-envelope"></i> ' . get_field('email') . '</div>';
        if( get_field('phone') )
            echo '<div><i class="fa fa-phone"></i> ' . get_field('phone') . '</div>';
        echo '</li>';
    endif;
    ?>

<?php

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

?>

</ul>
