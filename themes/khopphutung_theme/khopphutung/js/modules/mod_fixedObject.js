jQuery( function($) {

    var fixedObject = {
        ready: function() {
            
            this.responsiveObj();
            $(window).resize(this.responsiveObj);
        },
        responsiveObj: function(e) {

            $('iframe, .wp-caption img, .fixed-object').each(function() {
            
                var w = $(this).attr('width');
                var h = $(this).attr('height');
                var ratio = h / w;

                if ( ! isNaN(ratio) ) {
                    
                    var width = $(this).width();
                    var height = width * ratio;

                    $(this).css('height', height + 'px');

                    if ( $(this).is('iframe') ) {

                        $(this).css({                                       
                                        'display' : 'table',
                                        'margin' : 'auto'
                                    });

                    }

                }
                           
            });

        }
    }

    fixedObject.ready();

});