export function setupWidget() {

    if ( $(window).width() < 768 ) {

        jQuery('.widget > h4').click(function() {

            jQuery(this).parent()
                        .toggleClass('__expand');

        })

    }

}