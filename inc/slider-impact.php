<section class="container-fluid impact white-bg grey-inner-bg">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <h2>Impact</h2>
                <hr class="blue-bar" />
			    <?php
                $slider_code = get_field('impact_slider', get_option( 'page_on_front' ));
                if( $slider_code )
                    echo do_shortcode( $slider_code );
                ?>
            </div>
        </div>
    </div>
</section>