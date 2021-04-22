export function onClick_addNewStoreEvent(e) {

    window.localLoadNewStore = 'true';

    jQuery('#newStoreModal').modal({
        show : true
    });

}