export function onClick_chooseThumbnailProductEvent(e) {

    e.preventDefault();        

        const $item = jQuery(this),

        uploader = wp.media({

            title: "Sélectionnez la photo d'un produit",

            button: {
                text: 'Choisir le média'
            },

            multiple: false // Set to true to allow multiple files to be selected

        }).on('select', function() {

            var attachment = uploader.state().get('selection').first().toJSON(),
                url = attachment['url'],
                idx = $item.index();

            $item.find('.image-thumbnail img').attr('src', url);

            jQuery('.modal.show .txtHidProductGalleries:eq(' + idx + ')').val(url);

            


        }).open();

}