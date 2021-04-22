import { performAjaxLoadSliderInTab } from '../utils/products/performAjaxLoadSliderInTabUtils.js';

export function onClick_loadAjaxProductsListEvent(e) {

    e.preventDefault();

    const $obj = jQuery(this),
        $target = jQuery($obj.attr('href')),
        term_slug = $obj.data('term-slug'),
        num_products = $obj.data('num-products'),
        is_loaded = $obj.data('loaded');

    $obj.parent().addClass('active')
        .siblings()
        .removeClass('active');

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

        $obj.data('loaded', 'true');
    });



}