(function ($) {
    "use strict";

    var set_height = function () {
        var w_window = $( window ).width();
        var maxHeight = 0;
        var maxHeightContent = 0;
        var maxHeightCaption = 0;
       
    }

    jQuery(document).ready(function ($) {
        set_height();

    });
    jQuery( window ).load( function() {
        set_height();
    });
})(jQuery);