jQuery(function($) {

    var menu = {

        ready: function() {

            $(document).mouseup(this.onToggleNavMenu);
            $('.expand', '.m-menu').click(this.onExpandSubMenu);

            this.onAutoSwitchMenu();
            $(window).resize( this.onAutoSwitchMenu );

        },

        onToggleNavMenu: function(e) {

            var $container = $('.m-mainmenu'),
                $target = $(e.target);        

            if ( $target.hasClass('m-menuicon')
                  || $target.parent().hasClass('m-menuicon' ) ) {

                $container.toggleClass('active');
            }       

            else {

                if ( ! $container.is(e.target) // if the target of the click isn't the container...
                     && $container.has(e.target).length === 0 ) { // ... nor a descendant of the container
                
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
        },

        // chuyển sang ipad menu nếu như menu chính bị tràn
        onAutoSwitchMenu: function(e) {

            // không áp dụng cho mobile
            if ( window.innerWidth > 768 ) {

                var $menu = $('#menu'),
                    $ipad_menu = $('#ipad-menu'),
                    $menu_items = $menu.find('li')
                                      .filter( function(index, elem) {
                                           return ( ! $(elem).closest('ul').hasClass('sub-menu') );
                                      }),

                    margin_total = parseInt( $menu_items.css('margin-right') ) * ( $menu_items.length - 1 );

                    menu_items_totalwidth = 0;

                $menu_items.each(function(index, elem) {

                    menu_items_totalwidth += $(elem).outerWidth();

                });

                menu_items_totalwidth += margin_total;

                // tràn menu
                if ( $menu.width() < menu_items_totalwidth ) {

                    if ( ! $menu.hasClass( 'hidden' ) ) {
                        $menu.addClass('hidden')
                    }

                    if ( $ipad_menu.hasClass( 'hidden' ) ) {
                        $ipad_menu.removeClass('hidden');
                    }

                }

                else {

                    if ( $menu.hasClass( 'hidden' ) ) {
                        $menu.removeClass('hidden')
                    }

                    if ( ! $ipad_menu.hasClass( 'hidden' ) ) {
                        $ipad_menu.addClass('hidden');
                    }

                }

            }


        }
    }

    menu.ready();

});