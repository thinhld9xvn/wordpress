export function onClick_editCellEvent(e) {

    const $cell = jQuery(this),
            idx = $cell.index();

    if ( idx === 0 || idx === 1 || idx === 2 ) {           

    }

    else {

        $cell.attr('contenteditable', true);
        $cell.focus();

    }

}