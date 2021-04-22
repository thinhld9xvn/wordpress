export function onTimer_changeLabelInMediaDialog() {

    jQuery('.media-modal.wp-core-ui .media-frame-tab-panel .media-menu-item#menu-item-upload').trigger('click');

    const t = setInterval(function() {

        jQuery('.media-modal.wp-core-ui #menu-item-browse').text(MESSAGE_NOTIFICATIONS['media-libraries-label']);
        jQuery('.media-modal.wp-core-ui #menu-item-upload').text(MESSAGE_NOTIFICATIONS['media-upload-label']);
        jQuery('.media-modal.wp-core-ui h2.media-attachments-filter-heading').text(MESSAGE_NOTIFICATIONS['media-attachment-filter-heading-label']);
        jQuery('.media-modal.wp-core-ui #media-attachment-date-filters option:first-child').text(MESSAGE_NOTIFICATIONS['media-attachment-date-filter-heading-label']);
        jQuery('.media-modal.wp-core-ui .media-search-input-label').text(MESSAGE_NOTIFICATIONS['media-search-input-label']);
        jQuery('.media-modal.wp-core-ui .upload-instructions.drop-instructions').text(MESSAGE_NOTIFICATIONS['media-upload-instruction-label']);
        jQuery('.media-modal.wp-core-ui .browser.button.button-hero').text(MESSAGE_NOTIFICATIONS['media-button-hero-label']);
        jQuery('.media-modal.wp-core-ui .max-upload-size').text(MESSAGE_NOTIFICATIONS['media-max-upload-size-label']);


    }, 10);

}