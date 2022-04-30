function showNavMobileMenuEvent() {

    const mobile_menu_node = jQuery('#header #main-menu > nav > ul')[0],
         mobile_button_node = jQuery('#header #main-menu > nav button')[0];

    jQuery(document).on('mouseup', function(e) {

        const target = e.target;

        if ( mobile_button_node && mobile_button_node.contains(target) ) {

            if ( mobile_button_node && ! mobile_menu_node.classList.contains("show") ) {

                mobile_menu_node.classList.add("show");

            }

            else {

                mobile_button_node && mobile_menu_node.classList.remove("show");

            }           

        }

        else {

            if ( mobile_menu_node && ! mobile_menu_node.contains(target) ) {

                if ( mobile_menu_node.classList.contains("show") ) {

                    mobile_menu_node.classList.remove("show");

                }

            }


        }

    })

}

function hideNavMobileMenuWhenScroll() {

    const $mobile_menu = jQuery('#header #main-menu > nav > ul');

    jQuery(window).scroll(function() {

        const v_scroll = jQuery(this).scrollTop();

        if ( v_scroll > 0 ) {

            if ( $mobile_menu.hasClass('show') ) {

                $mobile_menu.removeClass('show');

            }        

        }

    });

}

function expandSubMobileMenu() {

    jQuery('#header #main-menu > nav .toggle').click(function(e) {

        e.preventDefault();

        jQuery(this).closest('li').toggleClass('expand');

    });

}

export function setupNavMobileMenu() {

    showNavMobileMenuEvent();
    hideNavMobileMenuWhenScroll();
    expandSubMobileMenu();

}