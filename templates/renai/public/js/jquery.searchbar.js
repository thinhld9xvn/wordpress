export function setupSearchBar() {

    const $searchbar = jQuery('.header-secondary .search-box');

    const showSearchBarEvent = () => {

        const search_button_node = jQuery('.header-secondary .search-box button')[0],
                searchbar_node = $searchbar[0],

               setupMouseupEvent = (e) => {
    
                    const target = e.target;

                    if ( jQuery(window).width() > 1060 ) return;
            
                    if ( search_button_node && search_button_node.contains(target) ) {
            
                        if ( searchbar_node && ! searchbar_node.classList.contains("show") ) {
            
                            searchbar_node.classList.add("show");
            
                        }
            
                        else {
            
                            searchbar_node && searchbar_node.classList.remove("show");
            
                        }           
            
                    }
            
                    else {
            
                        if ( searchbar_node && ! searchbar_node.contains(target) ) {
            
                            if ( searchbar_node.classList.contains("show") ) {
            
                                searchbar_node.classList.remove("show");
            
                            }
            
                        }
            
            
                    }
               }
    
        jQuery(document).on('mouseup', setupMouseupEvent);
    
    }

    const hideSearchBarWhenScroll = () => {
    
        jQuery(window).scroll(function() {
    
            const v_scroll = jQuery(this).scrollTop();
    
            if ( v_scroll > 0 ) {
    
                if ( $searchbar.hasClass('show') ) {
    
                    $searchbar.removeClass('show');
    
                }        
    
            }
    
        });
    
    }  

    showSearchBarEvent();
    hideSearchBarWhenScroll();
    

}