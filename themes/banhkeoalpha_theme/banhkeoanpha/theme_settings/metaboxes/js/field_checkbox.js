jQuery(function($) {
    
    $('.checkbox_field_metabox').change(function(e) {
        $(this).next('input[type="hidden"]').val( $(this).prop('checked') );
    });
    
});