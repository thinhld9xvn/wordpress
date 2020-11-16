jQuery(function($) { 

    var menu = {
        ready: function() {
            $(document).mouseup(this.onToggleNavMenu);       
            $('.expand', '.menu').click(this.onExpandSubMenu);
        },
        onToggleNavMenu: function(e) {
            var $container = $('.m-mainmenu'),
                $target = $(e.target);        

            if ( $target.hasClass('m-menuicon')
                  || $target.parent().hasClass('m-menuicon' ) ) {

                $container.toggleClass('active');
            }       

            else {

                if (!$container.is(e.target) // if the target of the click isn't the container...
                && $container.has(e.target).length === 0) // ... nor a descendant of the container
                {
                  if ( $container.hasClass('active') ) {
                    $container.removeClass('active');
                  }

                }   
            }
        }, 
        onExpandSubMenu: function(e) {

            var $subMenu = $(this).next('ul.sub-menu');

            if ( $subMenu.length > 0 ) {

                $(this).toggleClass('--opened');
                $subMenu.toggleClass('active');

            }


        }
    }

    menu.ready();

});