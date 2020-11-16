jQuery( function($) {

    // chờ load xong toàn bộ thư viện javascript 
    $.when(        
        $.getScript(jspath + '/modules/menu.js'),
        $.getScript(jspath + '/modules/slider.js'),
        $.getScript(jspath + '/modules/navig-setequalheight.js'),       
        $.getScript(jspath + '/modules/jtable.js'),
        $.getScript(jspath + '/modules/fixedObject.js'),       

        $.Deferred(function( deferred ){
            $( deferred.resolve );

        })

    ).done(function() {  

    });  

});