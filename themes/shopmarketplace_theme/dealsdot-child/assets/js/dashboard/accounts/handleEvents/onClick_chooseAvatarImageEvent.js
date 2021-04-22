export function onClick_chooseAvatarImageEvent(e) {

    e.preventDefault();

        const $avatar = jQuery('#imgProfileAvatar'),
            $txtAvatar = jQuery('#txtHidProfileAvatar');

        var custom_uploader = wp.media({
                title: 'Select Media',
                button: {
                    text: 'Upload Image'
                },
                multiple: false // Set this to true to allow multiple files to be selected
            })
            .on('select', function() {

                var attachment = custom_uploader.state().get('selection').first().toJSON();

                $avatar.attr('src', attachment['url']);

                $txtAvatar.val(attachment['url']);

            })
            .open();

}