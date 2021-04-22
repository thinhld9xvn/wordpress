export const MAP_SETTINGS = {

    zoom : 15,
    coordiates : []

}

const ICON_URL = window.location.origin + '/wp-content/uploads/2020';

export const MARKER_ICONS = {

    red_marker : ICON_URL + '/12/red-marker.png',
    green_marker : ICON_URL + '/11/gmark.png',
    user_marker : ICON_URL + '/12/current-marker.png',
    family_icon :  ICON_URL + '/12/family-icon.png'

}

export const USER_GEOLOCATION = {

    coord: {

        lat: -1,
        lng: -1

    },

    marker: null

};

const NUM_ITEMS = 18;
const PAGESIZE = NUM_ITEMS + 2;

export const COMMERCANTS_PAGINATION = {

    num_items : NUM_ITEMS,
    pagesize : PAGESIZE,
    incremslide : PAGESIZE,
    startpage : 0,
    numberpage : 0

};

export const STRBASE64 = 'data:image/png;base64,';