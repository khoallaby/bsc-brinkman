        <?php if( !is_front_page() ) { ?>
    	    </div>
	    </section>
        <?php } ?>
        <footer class="container-fluid footer-widgets">
            <div class="container">
                <div class="row">
	                <?php get_template_part('inc/footer-menu'); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-md-8 col-md-offset-1">
                    <div class="row">
                    <?php
                    #$menu = wp_get_nav_menu_items('Header Menu');
                    /*
                    foreach( range(1,5) as $i ) {
                        $offset = $i == 1 ? 'col-md-offset-1' : '';
                        echo '<div class="col-xs-12 col-md-2 ' . $offset . '">';
                        if ( is_active_sidebar( 'footer-widget-' . $i ) )
                            dynamic_sidebar( 'footer-widget-' . $i );
                        echo '</div>';
                    }
                    */
                    ?>
                    </div>
                </div>
            </div>
        </footer>
        <footer class="container-fluid footer">
        	<div class="container">
                <div class="row copyright">
                    <div class="col-xs-12 col-md-10">
                        <?php echo '&copy; ' .  date('Y') . ' ' . get_bloginfo('name') . ', Inc. All rights reserved. Website by <a href="#">A-Train Marketing</a>'; ?>
                    </div>

                    <ul class="col-xs-12 col-md-2 list-unstyled text-right social-media">
                        <?php
                        $social_icons = get_field( 'social_media_links', 'option' );
                        foreach( (array)$social_icons as $social_icon ) {
                            $target = isset($social_icon['new_window']) ? ' ' .$social_icon['new_window'] : '';
                            echo '<li><a href="' . $social_icon['link'] . '"' . $target . '><i class="fa ' . $social_icon['icon'] . ' fa-fw"></i></a></li>';
                        }
                        ?>
                    </ul>
                </div>
           </div>
        </footer>
        <?php wp_footer(); ?>
    </body>
</html>