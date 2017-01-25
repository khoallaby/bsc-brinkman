        <?php if( !is_front_page() ) { ?>
                </div>
            </div>
	    </section>
        <?php } ?>
        <footer class="container-fluid footer">
            <div class="container">
                <div class="row">
	                <?php get_template_part('inc/footer-menu'); ?>
                </div>
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