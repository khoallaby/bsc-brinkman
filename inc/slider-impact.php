<section class="container-fluid impact white-bg grey-inner-bg">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <h2>Impact</h2>
                <hr class="blue-bar" />
			    <?php
                if( get_field('impact_slider') )
                    echo do_shortcode( get_field('impact_slider') );
                ?>
            </div>
        </div>
    </div>
</section>