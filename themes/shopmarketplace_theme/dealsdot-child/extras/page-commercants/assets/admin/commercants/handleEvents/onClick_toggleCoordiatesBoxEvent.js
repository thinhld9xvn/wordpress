export function onClick_toggleCoordiatesBoxEvent(e) {

    e.preventDefault();

    jQuery(this).siblings('.gts-coordiations').toggle();

}