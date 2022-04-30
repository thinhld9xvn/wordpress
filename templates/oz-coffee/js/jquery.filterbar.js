function setupMajFilterBar() {

    const parent_node = jQuery('.majFilterContainerElem')[0],
        $maj_filter_list = jQuery('.majFilterContainerElem > ul'),       
        $mj_selected_elem = jQuery('.majFilterContainerElem > span.mjFilterValSelected'),
         dropdown_node = $mj_selected_elem[0],
         onShowFilterListCallback = function() {

            const v = $mj_selected_elem.data('value');

            $maj_filter_list.find(`a[data-value="${v}"]`)                            
                            .closest('li')
                            .addClass('hidden')
                            .siblings()                            
                            .removeClass('hidden');

         };

    jQuery(document).on('mouseup', function(e) {

        const target = e.target;

        if ( dropdown_node && dropdown_node.contains(target) ) {

            if ( parent_node && ! parent_node.classList.contains("show") ) {

                parent_node.classList.add("show");

                onShowFilterListCallback();

            }

            else {

                parent_node && parent_node.classList.remove("show");

            }           

        }

        else {

            /*if ( ! maj_filter_list_node.contains(target) ) {

                if ( parent_node.classList.contains("show") ) {

                    parent_node.classList.remove("show");

                }

            }*/

            if ( parent_node && parent_node.classList.contains("show") ) {

                parent_node.classList.remove("show");

            }


        }

    })

    jQuery('.majFilterContainerElem a').click(function(e) {

        e.preventDefault();

        const v = jQuery(this).data('value'),
             text = jQuery(this).text().trim();

        $mj_selected_elem.data('value', v)
                         .text(text);



    });

}

function setupMajLightGallery() {

    jQuery('.majFilterGridLayoutElem .item a').click(function(e) {

        e.preventDefault();

        const index = jQuery(this).closest('.item')
                                  .index();

        jQuery(`.lightGallery a:eq(${index})`).trigger('click');

    })

}

export function setupFilterBar() {

    setupMajFilterBar();
    setupMajLightGallery();

}