export function setupSidebar() {

    if ( jQuery(window).width() < 1020 ) {

        jQuery('.sidebar h2').click(function(e) {

            e.preventDefault();

            jQuery(this).parent().toggleClass('__expand');       

        });

    }

}