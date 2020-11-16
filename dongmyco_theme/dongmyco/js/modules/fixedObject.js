jQuery(function($) {

var fixedObject = {
    ready: function() {
        
        this.responsiveObj();
        $(window).resize(this.responsiveObj);
    },
    responsiveObj: function(e) {

        $('iframe, .wp-caption img, .fixed-object img').each(function() {
        
            var w = $(this).attr('width'),
                h = $(this).attr('height'),
                ratio = h / w,
                width = 0,
                height = 0;    
            
            if ( ! isNaN(ratio) ) {

                if ( ! $(this).hasClass('--fullwidth') ) {
                
                    width = $(this).width();
                }

                else {

                    width = $(this).parent().width();
                    $(this).css('width', width + 'px');                   

                }

                height = width * ratio;

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