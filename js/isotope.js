(function($){
    $(document).ready(function() {

        // init Isotope
        var $grid = $('.grid').isotope({
            itemSelector: '.grid-item',
            percentPosition: true,
            layoutMode: 'masonry',
            //stamp: '.stamp',
            //stamp: $grid.find('.tall'),

            getSortData: {
                name: 'h3 a',
                order: '[data-order] parseInt',
                category: '[data-category]'
            },
            //sortBy : 'order', //'original-order',
            //sortAscending: true,
            masonry: {
                columnWidth: '.grid-sizer',
                isFitWidth: true
            },
            masonryHorizontal: {
                columnHeight: '.grid-sizer'
            }
        });

        /*
        $(window).smartresize(function(){
            $grid.isotope({
                columnWidth: '.col-md-4'
            });
        });
        */

        // filter functions
        var filterFns = {
            // show if number is greater than 50
            numberGreaterThan50: function() {
                var number = $(this).find('.number').text();
                return parseInt( number, 10 ) > 50;
            },
            // show if name ends with -ium
            ium: function() {
                var name = $(this).find('.name').text();
                return name.match( /ium$/ );
            }
        };
        // bind filter button click
        $('.filters-button-group').on( 'click', 'button', function() {
            var filterValue = $( this ).attr('data-filter');
            // use filterFn if matches value
            filterValue = filterFns[ filterValue ] || filterValue;
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



        $(window).resize(function () {
            //$grid('reLayout');
            //console.log('rrrrr');
        });
    });
})(jQuery);
