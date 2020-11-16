jQuery(function($) {

    var fixedObject = {

        ready: function() {
            
            this.responsiveObj();
            $(window).resize(this.responsiveObj);            

        },

        responsiveObj: function(e) {

            $('.fixed-object').each(function() {

                $obj = $(this).find('iframe, img');

                $obj.each( function( index, elem ) {
                   fixedObject.fixedEachOtherObject( $(elem) );                         
                });
                           
            });

        },

        fixedEachOtherObject: function( $obj ) {

            var w = $obj.attr('width'),
                h = $obj.attr('height'),
                ratio = h / w;

            if ( ! isNaN(ratio) ) {
                
                var width = $obj.width(),                
                    height = width * ratio;

                $obj.css('height', height + 'px');

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