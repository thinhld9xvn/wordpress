<?php

function __ajax_unicorn_sb_update_calendar_events_action() { 

    global $current_user;

    $strEventsList = stripslashes( $_POST['eventsList'] );

    $eventsList = json_decode( $strEventsList, true);

    Calendar::updateCalendarEventsByUid($current_user->ID, $eventsList);

    echo 'success';
    
    die();

}

add_action("wp_ajax_" . _AJAX_SAVE_EVENTS_LIST_ACTION, "__ajax_unicorn_sb_update_calendar_events_action");
add_action("wp_ajax_nopriv_" . _AJAX_SAVE_EVENTS_LIST_ACTION, "__ajax_unicorn_sb_update_calendar_events_action");