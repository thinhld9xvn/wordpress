jQuery(function($) {

    var fixedObject = {
        ready: function() {
            
            this.responsiveObj();
            $(window).resize(this.responsiveObj);
        },
        responsiveObj: function(e) {

            $('iframe, .wp-caption img, .fixed-object').each(function() {

                var $obj = $(this);

                if ( $obj.hasClass('.fixed-object') ) {
                    $obj = $obj.find('iframe, img');

                    $obj.each( function(index, elem) {
                       fixedObject.fixedEachOtherObject( $(elem) );                         
                    }); 
                }

                else {
                    fixedObject.fixedEachOtherObject( $obj );
                }
                
                           
            });

        },
        fixedEachOtherObject: function( $obj ) {

            var w = $obj.attr('width'),
                h = $obj.attr('height'),
                ratio = h / w;

            if ( ! isNaN(ratio) ) {
                
                var width = $obj.width();
                var height = width * ratio;

                $(this).css('height', height + 'px');

                if ( $obj.is('iframe') ) {

                    $obj.css({                                       
                            'display' : 'table',
                            'margin' : 'auto'
                        });

                }

            }
        }
    }

    fixedObject.ready();

});