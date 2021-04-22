export function performFilterCatBasedQuery(shop_cat) {

    shop_cat = decodeURIComponent(shop_cat.trim());

    //console.log(shop_cat);

    if (shop_cat !== '') {

        const $cat = jQuery('.widget-categories-box li a[data-name="' + shop_cat + '"]');

        if ($cat.length > 0) {

            $cat.trigger('click');

        }

    }

}