jQuery(function($) {
    
    $('.select_field_metabox').change(function(e) {
        $(this).next('input[type="hidden"]').val( $(this).val() );
    });
    
});