<ul class="list-unstyled">

<?php



# extra content boxes

if( get_field('email') || get_field('phone') ):
    echo '<li>';
	if( get_field('email') )
		echo '<div><i class="fa fa-envelope"></i> ' . get_field('email') . '</div>';
	if( get_field('phone') )
		echo '<div><i class="fa fa-phone"></i> ' . get_field('phone') . '</div>';
	echo '</li>';
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

?>

</ul>
