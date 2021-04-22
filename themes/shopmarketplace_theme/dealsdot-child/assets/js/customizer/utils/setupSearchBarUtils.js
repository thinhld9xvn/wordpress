import { onClick_searchBarDropDownEvent } from '../handleEvents/onClick_searchBarDropDownEvent.js';

import { getOptionTextOfCategoryDropDown } from './searchbar/getOptionTextOfCategoryDropDownUtils.js';

import { onClick_toggleCategoriesDropDownEvent } from '../handleEvents/onClick_toggleCategoriesDropDownEvent.js';

export function setupSearchBar() {

    const $categoriesHeadFilSelect2 = jQuery('.js-select2-header-dropdown-simple'),
        $categoriesHeadFilWrapper = jQuery('#searchbar-categories-dropdown');

    let sl_value_init = -1;

    $categoriesHeadFilSelect2.each((i, filter) => {

        const v = parseInt(jQuery(filter).data('field-value-init'));

        if (v !== -1) {

            sl_value_init = v;

            return;

        }

    });
   
    $categoriesHeadFilSelect2.select2({

        placeholder: '--- Select an option ---'

    }).on('select2:select', function(e) {

        var data = e.params.data,
            selected_value = parseInt(data.id),
            selected_text = data.text.trim();

        selected_text = selected_value !== -1 ? selected_text : 'Tous';

        $categoriesHeadFilSelect2.each((i, obj) => {

            //console.log(obj);

            var $obj = jQuery(obj),
                txtHidField = document.getElementById($obj.data('fieldIdBinding'));

            if (txtHidField !== null) {

                txtHidField.value = data.id;

            }

            $obj.val(selected_value);
            $obj.trigger('change');

            jQuery('#btnSearchBarDropDown .caption').text(selected_text);

        });

    }).on('select2:close', function(e) {

        $categoriesHeadFilWrapper.removeClass('active');

    });

    $categoriesHeadFilSelect2.val(sl_value_init);
    $categoriesHeadFilSelect2.trigger('change');

    jQuery('#btnSearchBarDropDown .caption').text(getOptionTextOfCategoryDropDown(sl_value_init));

    jQuery('#btnSearchBarDropDown').click(onClick_searchBarDropDownEvent);

    jQuery('#btnSearchToggleBox').click(onClick_toggleCategoriesDropDownEvent);

}