<?php
/* Template Name: Agora Call One By One*/

    get_header();

    $uids = $_GET['uids'];
    $uids = explode(',', $uids);

    $uids = array_map('intval', $uids);

    echo AgoraVideoCall::createBroadCastRoom($uids);

    get_footer();