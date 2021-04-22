export function onModalHidden_hideModalEvent(e) {

    jQuery('body').css('overflow', '');

    if ( window.localLoadNewStore ) {

        delete window.localLoadNewStore;

    }

    if ( window.localLoadAjaxSuccess ) {

        delete window.localLoadAjaxSuccess;

    }

    if ( window.localModalObjects ) {

        delete window.localModalObjects;

    }

}