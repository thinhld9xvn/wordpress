export var infoWindow;

export var gmap;

export var distance_value = 0;

export var store_name_selected = '';

export var category_ids_selected = [];

export var idx_marker_selected = -1;

export var green_marker = '';

export var user_marker = '';

export var family_icon = '';

export var red_marker = '';

export function setInfoWindow(v) {

    infoWindow = v;

}

export function setGmap(v) {

    gmap = v;

}

export function setDistanceValue(v) {

    distance_value = v;

}

export function setStoreNameSelected(v) {

    store_name_selected = v;

}

export function setCategoryIdsSelected(v) {

    category_ids_selected = v;

}

export function setIndexMarkerSelected(v) {

    idx_marker_selected = v;

}

export function setBase64GreenMarkerImage(v) {

    green_marker = v;

}

export function setBase64UserMarkerImage(v) {

    user_marker = v;

}

export function setBase64FamilyIconImage(v) {

    family_icon = v;

}

export function setBase64RedMarkerImage(v) {

    red_marker = v;

}