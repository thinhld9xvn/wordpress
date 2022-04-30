export let tabsList = {

    ready: function() {

        jQuery("*[data-navig='tabsList']").each(function() {

            var $tList = jQuery(this).find( jQuery(this).attr('data-tlist') ),
                $tContent = jQuery(this).find( jQuery(this).attr('data-tcontent') );

            $tContent.find('> div').each(function() {

                jQuery(this).data('original-height', jQuery(this).outerHeight() );

            });

            $tList.on('click', 'li', tabsList.onTabClick);

            $tList.find('li:eq(0)').click();

        });

    },

    onTabClick: function(e) {	

        e.preventDefault();		

        if ( ! jQuery(this).hasClass('active') ) {

            var $t_target = jQuery( jQuery(this).attr('data-target') ),
                t_height = $t_target.data('original-height');

            //console.log( $t_target );

            jQuery(this).siblings().removeClass('active');
            jQuery(this).addClass('active');

            if ( ! $t_target.hasClass('active') ) {

                $t_target.siblings().removeClass('active');

                $t_target.outerHeight( t_height );
                $t_target.parent().outerHeight( t_height );
                $t_target.addClass('active');

            }

        }

    },

}