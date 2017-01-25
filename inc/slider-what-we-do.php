<section class="container-fluid what-we-do">
    <div class="row no-gutter">
        <div class="col-xs-12 col-md-12">
            <?php
            $homepage_id = get_option('page_on_front');
            if( get_field('what_we_do_slider', $homepage_id) )
                echo do_shortcode( get_field('what_we_do_slider', $homepage_id) );
            ?>
        </div>
    </div>
</section>