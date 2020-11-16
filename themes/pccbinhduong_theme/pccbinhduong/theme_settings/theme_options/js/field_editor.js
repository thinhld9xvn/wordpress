jQuery( function($) {
   
    $('#frmThemeOption').on( 'submit', function(e) {
        
        for( var i = 0; i < tinyMCE.editors.length; i++ ) {
            
             var contents = tinyMCE.editors[i].getContent(),
                 id = tinyMCE.editors[i].id;
                 
            $('#' + id + '-editor').val( contents );
            
        }
        
    });
    
    
});