export function setStateOfRow($row, checked) {

    if ( checked ) {

        $row.addClass('selected');

    }

    else {

        $row.removeClass('selected');

    }

}