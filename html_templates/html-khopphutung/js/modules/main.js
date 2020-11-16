jQuery( function($) {

    // chờ load xong toàn bộ thư viện javascript 
    $.when(    
        
        $.getScript('/js/modules/mod_menu.min.js'),
        $.getScript('/js/modules/mod_slider.min.js'),
        $.getScript('/js/modules/mod_pvcf-orderForm.min.js'),

        $.Deferred(function( deferred ){
            $( deferred.resolve );

        })

    ).done(function() {  

    });  

});