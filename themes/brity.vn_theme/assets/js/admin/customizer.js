jQuery(function($) {

    let tmr = null;


    function sendRequestToNodejs() {

        const url = "https://jamapi.gcosoftware.vn/v1/job";

        /*const data = {

            name : 'test.gco.2'

        }*/
        

        $.ajax({

            type : "PUT",

            url,

            contentType: 'application/x-www-form-urlencoded',

            data : "name=test.gco.2"

        }).done(function() {

            window.location.reload();


        })


    }

    $('#wp-admin-bar-gatsby-build-site > a').click(function(e) {

        e.preventDefault();
        e.stopImmediatePropagation();

        //console.log('abc');

        /*jQuery('body').append(`<div id="ajax-loader" class="show">

                                 <span class="fa fa-circle-o-notch fa-spin"></span>

                                 <span class="padLeft10">Building site, please wait ...</span>

                               </div>`);*/



        $.ajax({

            type: "POST",

            url: ajaxurl,

            data : {

                action : "sb_gatsby_building_callback"

            }

        }).done(function(data) {


            if ( data === 'success' ) { 

                sendRequestToNodejs();

            }



        });

        //sendRequestToNodejs();



    })

    

})