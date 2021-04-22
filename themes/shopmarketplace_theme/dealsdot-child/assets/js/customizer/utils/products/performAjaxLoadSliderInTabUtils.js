export function performAjaxLoadSliderInTab(params, callback) {

    if (typeof(params.is_loaded) === 'undefined') {

        const fd = new FormData();

        fd.append('action', __ACTIONS_HOOKS_LIST.UNICORN_GET_PRODUCT_SLIDER_ACTION);
        fd.append('term_slug', params.term_slug);
        fd.append('num_products', params.num_products);

        jQuery.ajax({
            type: "POST",
            url: '/wp-admin/admin-ajax.php',
            processData: false,
            contentType: false,
            data: fd
        }).done(function(data) {

            if (data !== 'error') {

                callback(data);

            }

        });

    }

}