jQuery(function($) {

    let tmr = null;

    function sendRequestToNodejs() {

        const url = "http://node-shopcenter.io:3000/hook";
        const data = {
            action : 'build'
        }
        
        $.ajax({
            type : "POST",
            url,
            contentType: 'application/json',
            data : JSON.stringify(data)
        }).done(function() {

           console.log('success');

        })

    }

    $('#wp-admin-bar-gatsby-build-site > a').click(function(e) {

        e.preventDefault();

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

            //console.log(data);

            if ( data === 'success' ) { 

                sendRequestToNodejs();

                window.location.reload();

            }

        }); 

    })
    
})