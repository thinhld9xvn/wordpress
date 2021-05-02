<?php

function __ajax_unicorn_sb_agora_call_video_action() { 
   
    $uids = json_decode( $_POST['uids'], true); 
    
    $contents = AgoraVideoCall::createBroadCastRoom($uids);

    echo $contents;
    die();

}

/*add_action("wp_ajax_" . _AJAX_AGORA_CALL_VIDEO_ACTION, "__ajax_unicorn_sb_agora_call_video_action");
add_action("wp_ajax_nopriv_" . _AJAX_AGORA_CALL_VIDEO_ACTION, "__ajax_unicorn_sb_agora_call_video_action");*/