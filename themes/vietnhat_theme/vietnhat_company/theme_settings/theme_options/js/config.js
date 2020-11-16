jQuery(function($) {

    var $obj = $('.wp-first-item').filter(function() { return $(this).text() === 'Theme Option'; });
    $obj.css('display', 'none');
    
});