export function onKeyDown_checkSalesPriceEvent(e) {

    //console.log(e.which);

    if ((e.which >= 48 && e.which <= 57) ||
    (e.keyCode >= 96 && e.keyCode <= 105) ||
    e.which === 8 ||
    e.which === 188 ||
    e.which === 190 ||
    e.which === 110 ||
    e.which === 46) {} else {

        return false;

    }

}