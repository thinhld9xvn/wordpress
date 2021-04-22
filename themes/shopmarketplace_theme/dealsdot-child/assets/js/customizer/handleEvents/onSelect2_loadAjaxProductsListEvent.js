import { performAjaxLoadSliderInTab } from '../utils/products/performAjaxLoadSliderInTabUtils.js';

export function onSelect2_loadAjaxProductsListEvent(e) {

    var data = e.params.data,
        selected_value = data.id,
        selected_text = data.text.trim(),

        $option = $slNavProductSlideShow.find('option[value="' + selected_value + '"]'),
        $target = jQuery(selected_value),

        term_slug = $option.data('term-slug'),
        num_products = parseInt($option.data('num-products')),
        is_loaded = $option.data('loaded');

    //console.log($target);

    $target.addClass('active')
        .siblings()
        .removeClass('active');

    performAjaxLoadSliderInTab({

        term_slug,
        num_products,
        is_loaded

    }, function(data) {
        let html = `<div class="owl-carousel home-owl-carousel custom-carousel owl-theme">
                ${data}
                </div>`;

        $target.find('.product-slider').html(html);

        $target.find('.owl-carousel').owlCarousel({

            autoPlay: true,
            margin: 10,
            pagination: false,
            navigation: true,
            navigationText: ["", ""],
            items: 4

        });

        $option.data('loaded', 'true');
    });


}