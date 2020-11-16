jQuery( function($) {

    $('.txtRangeObj').change(function(e) {
        $(this).next('.txtRangeNum').val( $(this).val() );
    });
    
});