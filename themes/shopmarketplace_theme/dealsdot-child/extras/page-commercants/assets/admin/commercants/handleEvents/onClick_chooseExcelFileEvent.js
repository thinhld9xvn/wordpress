import { performImportMerchantExcelFile } from '../utils/datatable/performImportMerchantExcelFileUtils.js';

export function onClick_chooseExcelFileEvent(e) {

    const mySelfInstance = this,
        $obj = jQuery(this),
        $field = $obj.prev('input[type=hidden]');

    const uploader = wp.media({
        title: 'Select or Upload Media Of Your Chosen Persuasion',
        button: {
            text: 'Use this media'
        },
        multiple: false // Set to true to allow multiple files to be selected
    }).on('select', function() {

        var attachment = uploader.state().get('selection').first().toJSON(),
            url = attachment['url'];

        performImportMerchantExcelFile.call(mySelfInstance, url);


    }).open();

}