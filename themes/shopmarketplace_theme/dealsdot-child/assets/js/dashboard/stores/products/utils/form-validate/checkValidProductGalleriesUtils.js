export function checkValidProductGalleries($obj) {

    let boolGalleriesValidate = false;

    $obj.each(function(i, txtGallery) {

        const v = jQuery(txtGallery).val().toString().trim();

        if (v !== '') {

            boolGalleriesValidate = true;

            return;

        }

    });

    if (!boolGalleriesValidate) {

        alert(MESSAGE_NOTIFICATIONS['choose-one-least-product-picture-required-msg']);

    }

    return boolGalleriesValidate;

}