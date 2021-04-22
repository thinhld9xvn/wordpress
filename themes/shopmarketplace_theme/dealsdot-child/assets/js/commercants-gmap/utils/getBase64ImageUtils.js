import { MARKER_ICONS } from '../constants/constants.js';

import { setBase64GreenMarkerImage, 
         setBase64UserMarkerImage, 
         setBase64FamilyIconImage, 
         setBase64RedMarkerImage } from '../inits/inits.js';

export function getBase64Image(url) {

    var canvas = document.createElement("canvas"),
        image = new Image(),

        dataURL = '';

    image.src = url;

    jQuery(image).on('load', function() {

        canvas.width = image.width;
        canvas.height = image.height;

        var ctx = canvas.getContext("2d");
        ctx.drawImage(image, 0, 0);

        dataURL = canvas.toDataURL("image/png");

        let srcbase64 = dataURL.replace(/^data:image\/(png|jpg);base64,/, "");

        if (MARKER_ICONS.red_marker === url) {

            setBase64RedMarkerImage(srcbase64);

        }

        if (MARKER_ICONS.green_marker === url) {

            setBase64GreenMarkerImage(srcbase64);

        }

        if (MARKER_ICONS.user_marker === url) {

            setBase64UserMarkerImage(srcbase64);

        }

        if (MARKER_ICONS.family_icon === url) {
           
            setBase64FamilyIconImage(srcbase64);

        }

    });
}