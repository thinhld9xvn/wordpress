export var tmrLocationsAutoComplete = null;   

export var map;

export var infoWindow;

export var  service;

export var locationsData = [];

export var tmrRenderGmap = null;

export function setMap(v) {

    map = v;

}

export function setInfoWindow(v) {

    infoWindow = v;

}

export function setService(v) {

    service = v;

}

export function setLocationsData(v) {

    locationsData = v;

}

export function setTimerRenderGoogleMap(v) {

    tmrRenderGmap = v;

}