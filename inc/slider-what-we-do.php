<section class="container-fluid what-we-do">
    <div class="row no-gutter">
        <div class="col-xs-12 col-md-12">
            <?php
            if( get_field('what_we_do_slider') )
                echo do_shortcode( get_field('what_we_do_slider') );
            ?>
        </div>
    </div>
</section>