var player;

function setupVideoPlayer(videoId) {
    player = new YT.Player('player', {
        height: '390',
        width: '640',
        videoId,
        playerVars: {
            'playsinline': 1,
            rel: 0, 
            showinfo: 0, 
            ecver: 2
        },
        events: {
            'onReady': onPlayerReady
        }
    });
}

function onPlayerReady(event) {
    event.target.playVideo();
}

function stopVideo() {
    console.log(player);
    player.stopVideo();
}

function resetVideo() {

    player = null;

    jQuery('.lession-ifr .iframe').html('<div id="player"></div>');

}

function playVideoLessionEvent() { 

    jQuery('.campboot-lession .play').click(function(e) {

        e.preventDefault();

        const $elem = jQuery(this),
              $loading = $elem.next(),
              vid = jQuery(this).closest('.campboot-lession').data('videoId'),
              $lession_ifr = jQuery('.lession-ifr');

        $loading.addClass('loading');

        $elem.addClass('hide');

        setupVideoPlayer(vid);

        setTimeout(function() {

            $elem.removeClass('hide');
            $loading.removeClass('loading');

            $lession_ifr.addClass('show');            

        }, 1000);

    });

    jQuery('.ifr-close').click(function(e) {
        e.preventDefault();

        stopVideo();
        resetVideo();

        jQuery(this).closest('.lession-ifr').removeClass('show');
    })

}

export function setupVideo() {

    playVideoLessionEvent();

}