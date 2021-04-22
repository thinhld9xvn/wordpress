export const MAP_SETTINGS = {

    user_geolocation : {

        coord: {
            location: '',
            lat: -1,
            lng: -1
        },
        marker: null
    
    },
    mzoom : 15,
    myPosRadius : '1000'

};

export const UI_AUTOCOMPLETE = {

    ui_html : `<ul id="locationQueryResults"></ul>`,
    item_html : `<li data-lat="{lat}" data-lng="{lng}"><img src="{logo}" alt="" /> <span class="padLeft5">{name}</span></li>`

};