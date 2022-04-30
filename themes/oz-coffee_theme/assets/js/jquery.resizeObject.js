export let resizeObject = {
    ready: function() {
        
        this.responsiveObj();
        jQuery(window).resize(this.responsiveObj);
    },
    responsiveObj: function(e) {

        jQuery('iframe, .wp-caption img, .fixed-object').each(function() {
        
            var w = jQuery(this).attr('width');
            var h = jQuery(this).attr('height');
            var ratio = h / w;

            if ( ! isNaN(ratio) ) {
                
                var width = jQuery(this).width();
                var height = width * ratio;

                jQuery(this).css('height', height + 'px');

                if ( jQuery(this).is('iframe') ) {

                    jQuery(this).css({                                       
                                    'display' : 'table',
                                    'margin' : 'auto'
                                });

                }

            }
                        
        });

    }
}