import { performImportCategoriesListFile } from '../utils/datatable/performImportCategoriesListFileUtils.js';

export function onClick_chooseExcelCategoriesFileEvent(e) {

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

            performImportCategoriesListFile.call(mySelfInstance, url);


        }).open();

}