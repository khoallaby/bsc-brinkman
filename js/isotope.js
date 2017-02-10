(function($){
    $(document).ready(function() {

        // init Isotope
        var $grid = $('.grid').isotope({
            layoutMode: 'masonry',
            itemSelector: '.grid-item',
            percentPosition: true,
            //stamp: '.stamp',
            //stamp: $grid.find('.tall'),

            getSortData: {
                name: 'h3 a',
                order: '[data-order] parseInt',
                category: '[data-category]'
            },
            sortBy : 'order', //'original-order',
            sortAscending: true,
            masonry: {
                columnWidth: '.col-md-4',
                isFitWidth: true
            }
        });


        /*
        $(window).smartresize(function(){
            $grid.isotope({
                columnWidth: '.col-md-4'
            });
            $grid('layout');
        });

        $(window).resize(function () {
            $grid('layout');
        });
        */

        // bind filter button click
        $('.filters-button-group').on( 'click', 'button', function() {
            var filterValue = $( this ).attr('data-filter');
            $grid.isotope({ filter: filterValue });
        });
        // change is-checked class on buttons
        $('.button-group').each( function( i, buttonGroup ) {
            var $buttonGroup = $( buttonGroup );
            $buttonGroup.on( 'click', 'button', function() {
                $buttonGroup.find('.active').removeClass('active');
                $( this ).addClass('active');
            });
        });


    });
})(jQuery);
