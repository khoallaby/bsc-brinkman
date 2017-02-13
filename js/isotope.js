(function($){
    $(document).ready(function() {



        function getHashFilter() {
            // get filter=filterName
            var matches = location.hash.match( /filter=([^&]+)/i );
            var hashFilter = matches && matches[1];
            return hashFilter && decodeURIComponent( hashFilter );
        }


        // bind filter button click
        var $filterButtonGroup = $('.button-group');
        $filterButtonGroup.on( 'click', 'button', function() {
            var filterAttr = $( this ).attr('data-filter');
            // set filter in hash
            location.hash = 'filter=' + encodeURIComponent( filterAttr );
            // and filter stuff
            $grid.isotope({ filter: filterValue });
        });


        // init Isotope
        var $grid = $('.grid');
        var isIsotopeInit = false;


        function onHashchange() {
            var hashFilter = getHashFilter();
            if ( !hashFilter && isIsotopeInit ) {
                return;
            }
            isIsotopeInit = true;
            // filter isotope
            $grid.isotope({
                layoutMode: 'masonry',
                itemSelector: '.grid-item',
                percentPosition: true,
                //stamp: '.stamp',
                //stamp: $grid.find('.tall'),

                filter: hashFilter,

                getSortData: {
                    name: 'h3 a',
                    order: '[data-order] parseInt',
                    category: '[data-category]'
                },
                sortBy : 'order', //'original-order',
                sortAscending: true,
                masonry: {
                    columnWidth: '.col-md-4'
                }
            });
            // set selected class on button
            if ( hashFilter ) {
                $filterButtonGroup.find('.active').removeClass('active');
                $filterButtonGroup.find('[data-filter="' + hashFilter + '"]').addClass('active');
            }
        }

        $(window).on( 'hashchange', onHashchange );

        // trigger event handler to init Isotope
        onHashchange();



    });
})(jQuery);
