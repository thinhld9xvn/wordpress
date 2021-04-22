export function resetFilterDistanceBar() {

    const $ui = jQuery("#slider-range-distance");

    $ui.find('.ui-slider-range').css('width', '100%');
    $ui.find('.ui-slider-handle').css('left', '0');

}