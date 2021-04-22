export function openStoreDetailsPage(id) {

    //let parameter = encodeURIComponent(id);

    /*parameter = parameter.replace(/\'/ig, "%27")
                         .replace(/\%20/ig, "+");*/

    let url = CUSTOM_PAGE_URLS.store_details + encodeURI(id);

    window.location.href = url;

}