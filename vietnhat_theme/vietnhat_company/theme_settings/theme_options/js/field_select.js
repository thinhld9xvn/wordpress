jQuery(function($) {
    
    $('.selectFieldBox').change(function(e) {
        $(this).next('input[type="hidden"]').val( $(this).val() );
    });
    
});