import { selectMarker } from '../marker/selectMarkerUtils.js';

export function selectBrandItem(e) {

    e.preventDefault();

    const target = e.currentTarget,
        index = parseInt(jQuery(this).data('index'));

    jQuery('.brands-list .brand-item').removeClass('active');

    target.classList.add('active');

    selectMarker(index);

    const offset_top = jQuery("#page-entry-banner").offset().top;

    jQuery('body, html').animate({
        scrollTop: offset_top - 40 + 'px'
    }, 100);

    //openStoreDetailsPage(MAP_SETTINGS.coordiates[index].enseigne);

}