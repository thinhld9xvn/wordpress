export function setupFilterSliderOnSidebar() {

    const $filter_price_obj = jQuery("#filter-price-range"),
            price_min = parseInt($filter_price_obj.data('min-value')),
            price_max = parseInt($filter_price_obj.data('max-value')),
            price_selected_min = parseInt($filter_price_obj.data('selected-min-value')),

            price_selected_max = parseInt($filter_price_obj.data('selected-max-value'));

    $filter_price_obj.slider({
        range: true,
        min: price_min,
        max: price_max,
        values: [price_selected_min, price_selected_max],
        slide: function(event, ui) {

            const minValue = ui.values[0],
                maxValue = ui.values[1];

            jQuery('.slider-range-price.slider-range-two-points .filter-input-min-value').val(minValue);
            jQuery('.slider-range-price.slider-range-two-points .lowest').html(minValue);

            jQuery('#txtFilPriceMin').val(minValue);

            jQuery('.slider-range-price.slider-range-two-points .filter-input-max-value').val(maxValue);
            jQuery('.slider-range-price.slider-range-two-points .highest').html(maxValue);

            jQuery('#txtFilPriceMax').val(maxValue);

        }

    });

    const $filter_range_obj = jQuery("#slider-range-distance"),
        distance_min = parseInt($filter_range_obj.data('min-value')),
        distance_max = parseInt($filter_range_obj.data('max-value')),
        distance_value = parseInt($filter_range_obj.data('selected-value'));

    $filter_range_obj.slider({

        range: "max",
        min: distance_min,
        max: distance_max,
        value: distance_value,
        slide: function(event, ui) {

            jQuery(".slider-range-distance .value").html(ui.value);
            jQuery("#txtFilDistance").val(ui.value);
        }

    });

}