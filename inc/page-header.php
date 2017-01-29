<h1 itemprop="headline">
    <?php
    if ( is_home() ) {
        echo 'Blog';
    } elseif ( is_404() ) {
        echo '404 Not Found';
        /*} elseif ( is_shop() ) {
            echo 'Shop';*/
    } elseif ( is_search() ) {
	    echo $wp_query->found_posts . ' results found for "' . esc_html( get_search_query( false ) ) . '"';
    } elseif( is_post_type_archive( 'projects' ) ) {
	    echo 'Meaningful Places';
    } elseif( is_post_type_archive( 'team-members' ) ) {
	    echo 'Our Team';
    } else {
        the_title();
    }
    ?>
</h1>
<?php
if( is_singular('team-members') )
    $h2_title = get_field('title');

if( $h2_title )
    echo '<h2>' . $h2_title . '</h2>';
?>
<hr class="blue-bar" />