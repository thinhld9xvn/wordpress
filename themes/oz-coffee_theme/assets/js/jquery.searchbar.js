function showSearchBarEvent() {

    const search_bar_node = jQuery('#header .header-search-box')[0],
        search_button_node = jQuery('#header .header-search > a')[0];

    jQuery(document).on('mouseup', function(e) {

        const target = e.target;

        if (search_button_node && search_button_node.contains(target) ) {

            if (search_button_node && ! search_bar_node.classList.contains("show") ) {

                search_bar_node.classList.add("show");

            }

            else {

               search_button_node && search_bar_node.classList.remove("show");

            }           

        }

        else {

            if ( search_bar_node && ! search_bar_node.contains(target) ) {

                if ( search_bar_node.classList.contains("show") ) {

                    search_bar_node.classList.remove("show");

                }

            }


        }

    })

}

function hideSearchBarWhenScroll() {

    const $search_bar = jQuery('#header .header-search-box');

    jQuery(window).scroll(function() {

        const v_scroll = jQuery(this).scrollTop();

        if ( v_scroll > 0 ) {

            if ( $search_bar.hasClass('show') ) {

                $search_bar.removeClass('show');

            }        

        }

    });

}

export function setupSearchbar() {

    showSearchBarEvent();
    hideSearchBarWhenScroll();

}