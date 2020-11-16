jQuery(function($) {

    var menu = {

        ready: function() {

            $(document).on('mouseup', this.onToggleNavMenu);
            $('.expand', '.m-menu').on('click', this.onExpandSubMenu);

            $(window).resize( this.onAutoSwitchMenu );  

            $(window).scroll( this.onFixedScrollMenu );          

            $(window).load(function() {

                menu.onAutoSwitchMenu();

            });

        },

        onToggleNavMenu: function(e) {

            var $container = $('.m-mainmenu'),
                $target = $(e.target);        

            if ( $target.hasClass('m-menuicon')
                  || $target.parent().hasClass('m-menuicon' ) ) {                          

                if ( $target.hasClass('m-menuicon') ) {

                    $container = $target.next('.m-mainmenu');

                }

                else {

                    $container = $target.parent().next('.m-mainmenu');

                }

                if ( $container.hasClass('active') ) {

                    $container.removeClass('active');

                }

                else {

                    $container.addClass('active');

                }

                
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

            var $expand = $(this),
                $subMenu = $expand.next();

            if ( $subMenu.length > 0 ) {

                if ( ! $expand.hasClass('-opened') ) {

                    $expand.addClass('-opened');

                }  

                else {

                    $expand.removeClass('-opened');

                }          

                if ( ! $subMenu.hasClass('active') ) {

                    $subMenu.addClass('active');

                }  

                else {

                    $subMenu.removeClass('active');

                }              
               

            }
        },

        // chuyển sang ipad menu nếu như menu chính bị tràn
        onAutoSwitchMenu: function(e) {

            // không áp dụng cho mobile
            if ( window.innerWidth > 768 ) {

                var $menu = $('.main-menu');

                $menu.each(function(i, e) {

                    var $_menu = $(this),
                        $ipad_menu = $_menu.next(),
                        menu_width = $_menu.closest('.menu').width(),

                        menu_items_totalwidth = 0;

                    if ( $_menu.data('menu_items_totalwidth') === undefined ) {

                        var $menu_items = $('.main-list-menu > li', this),

                            margin_total = 0;

                        $menu_items.each(function(index, elem) {

                            var $elem = $(elem),
                                mright = parseInt( $elem.css('margin-right') ),
                                mleft = parseInt( $elem.css('margin-left') );

                            menu_items_totalwidth += $elem.outerWidth();

                            if ( ! isNaN( mright ) && mright > 0 ) {

                                margin_total += mright ;

                            }

                            if ( ! isNaN( mleft ) && mleft > 0 ) {

                                margin_total += mleft ;

                            }

                        });

                        menu_items_totalwidth += margin_total;   

                        $_menu.data('menu_items_totalwidth', menu_items_totalwidth);

                    }

                    else {

                        menu_items_totalwidth = $_menu.data('menu_items_totalwidth');

                    }

                    // tràn menu
                    if ( menu_width <= menu_items_totalwidth ) {

                        if ( ! $_menu.hasClass( 'hidden' ) ) {
                            $_menu.addClass('hidden');
                        }

                        if ( $ipad_menu.hasClass( 'hidden' ) ) {
                            $ipad_menu.removeClass('hidden');
                        }

                    }

                    else {

                        if ( $_menu.hasClass( 'hidden' ) ) {
                            $_menu.removeClass('hidden');
                        }

                        if ( ! $ipad_menu.hasClass( 'hidden' ) ) {
                            $ipad_menu.addClass('hidden');
                        }

                    }

                });

            }
            
        },

        // menu tự động di chuyển theo thao tác cuộn trang
        // khi cuộn quá header
        onFixedScrollMenu: function(e) {

            var scrollTop = $(window).scrollTop(),
                hw = $('#header').outerHeight(),
                $fixedMenu = $('#fixedTopMenu');

            if ( scrollTop > hw ) {

                if ( ! $fixedMenu.hasClass('active') ) {
                    $fixedMenu.addClass('active');
                }

            }

            else {

                if ( $fixedMenu.hasClass('active') ) {
                    $fixedMenu.removeClass('active');
                }

            }

        }
        
    }

    menu.ready();

});