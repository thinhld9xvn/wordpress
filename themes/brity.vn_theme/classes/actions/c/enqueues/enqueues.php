<?php    



    require_once ACTIONS_ENQUEUES_UTILS_DIR . '/enqueue-theme-styles-utils.php';  



    add_action(\Actions\ACTIONS::GCO_ENQUEUE_SCRIPTS_ACTION, 

                    array('\Actions\Enqueues\EnqueueThemeStylesUtils', 'render'), 99);  

    /*add_filter(\Actions\ACTIONS::GCO_SCRIPT_LOADER_TAG_ACTION, 

                    array('\Actions\Enqueues\EnqueueThemeStylesUtils', 'registerModule'), 10, 3);  */