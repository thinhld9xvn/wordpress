jQuery( function($) {

    // chờ load xong toàn bộ thư viện javascript 
    $.when(              
        
        $.getScript(jspath + '/modules/navig-drawline.js'),
        $.getScript(jspath + '/modules/navig-jtooltip.js'),
        $.getScript(jspath + '/modules/navig-responsivebg.js'),
        $.getScript(jspath + '/modules/navig-setequalheight.js'),
        $.getScript(jspath + '/modules/menu.js'),
        $.getScript(jspath + '/modules/fixedObject.js'),
        $.getScript(jspath + '/modules/slider.js'),

        $.Deferred(function( deferred ){
            $( deferred.resolve );

        })

    ).done(function() {  

    });  

});