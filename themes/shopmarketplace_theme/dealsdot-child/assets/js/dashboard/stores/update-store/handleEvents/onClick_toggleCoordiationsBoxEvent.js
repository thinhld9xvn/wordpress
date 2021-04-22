export function onClick_toggleCoordiationsBoxEvent(e) {
    
    e.preventDefault();

    jQuery(this).siblings('.gts-coordiations').toggle();

}