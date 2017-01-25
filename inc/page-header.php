<h1 itemprop="headline">
    <?php
    if ( is_home() ) {
        echo 'Blog';
    } elseif ( is_404() ) {
        echo '404 Not Found';
        /*} elseif ( is_shop() ) {
            echo 'Shop';*/
    } elseif ( is_search() ) {
        echo $wp_query->found_posts . ' results found for "' . esc_html( get_search_query( false ) ) .'"';
    } else {
        the_title();
    }
    ?>
</h1>
<hr class="blue-bar" />