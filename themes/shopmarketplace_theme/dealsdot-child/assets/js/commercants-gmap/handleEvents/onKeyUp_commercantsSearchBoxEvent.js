import { onClick_filterCommercantName } from '../handleEvents/onClick_filterCommercantNameEvent.js';

import { setStoreNameSelected } from '../inits/inits.js';

export function onKeyUp_commercantsSearchBoxKeyUp(e) {

    if (e.keyCode === 13) {

        e.preventDefault();

        onClick_filterCommercantName();

    }

    else {

        setStoreNameSelected( jQuery(this).val().toString().trim() ); 

    }

}   