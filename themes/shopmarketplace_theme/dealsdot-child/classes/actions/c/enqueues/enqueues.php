<?php 

    require_once ACTIONS_ENQUEUES_UTILS_DIR . '/localize/enqueue-admin-localize-dt-labels-utils.php';

    require_once ACTIONS_ENQUEUES_UTILS_DIR . '/localize/enqueue-admin-localize-dt-columns-utils.php';

    require_once ACTIONS_ENQUEUES_UTILS_DIR . '/localize/enqueue-localize-action-lists-utils.php';

    require_once ACTIONS_ENQUEUES_UTILS_DIR . '/localize/enqueue-localize-custom-page-urls-utils.php';

    require_once ACTIONS_ENQUEUES_UTILS_DIR . '/localize/enqueue-localize-pagination-utils.php';

    /* */

    require_once ACTIONS_ENQUEUES_UTILS_DIR . '/dashboard/enqueue-dashboard-store-layout-utils.php';

    require_once ACTIONS_ENQUEUES_UTILS_DIR . '/dashboard/enqueue-dashboard-edit-account-layout-utils.php';

    require_once ACTIONS_ENQUEUES_UTILS_DIR . '/dashboard/enqueue-dashboard-reset-password-utils.php';

    /* */

    require_once ACTIONS_ENQUEUES_UTILS_DIR . '/enqueue-theme-styles-utils.php'; 

    require_once ACTIONS_ENQUEUES_UTILS_DIR . '/enqueue-commercants-layout-utils.php';    

    require_once ACTIONS_ENQUEUES_UTILS_DIR . '/enqueue-single-product-layout-utils.php';    

    require_once ACTIONS_ENQUEUES_UTILS_DIR . '/enqueue-google-map-api-key-utils.php';    

    require_once ACTIONS_ENQUEUES_UTILS_DIR . '/enqueue-search-utils.php';

    require_once ACTIONS_ENQUEUES_UTILS_DIR . '/enqueue-store-details-page-utils.php';    

    add_action(\Actions\ACTIONS::UNICORN_ENQUEUE_SCRIPTS_ACTION, 
                    array('\Actions\Enqueues\EnqueueThemeStylesUtils', 'render'), 99);

    add_action(\Actions\ACTIONS::UNICORN_ENQUEUE_SCRIPTS_ACTION, 
                    array('\Actions\Enqueues\EnqueueCommercantsLayoutUtils', 'render'));

    add_action(\Actions\ACTIONS::UNICORN_ENQUEUE_SCRIPTS_ACTION, 
                    array('\Actions\Enqueues\EnqueueGoogleMapApiKeyUtils', 'render'));

    add_action(\Actions\ACTIONS::UNICORN_ENQUEUE_SCRIPTS_ACTION, 
                    array('\Actions\Enqueues\EnqueueDashboardStoreLayoutUtils', 'render'));  
                    
    add_action(\Actions\ACTIONS::UNICORN_ADMIN_ENQUEUE_SCRIPTS_ACTION, 
                    array('\Actions\Enqueues\EnqueueAdminLocalizeDtColumnsUtils', 'render'), 999);  

    add_action(\Actions\ACTIONS::UNICORN_ADMIN_ENQUEUE_SCRIPTS_ACTION, 
                    array('\Actions\Enqueues\EnqueueAdminLocalizeDtLabelsUtils', 'render'), 999); 

    add_action(\Actions\ACTIONS::UNICORN_ENQUEUE_SCRIPTS_ACTION, 
                    array('\Actions\Enqueues\EnqueueDashboardEditAccountLayoutUtils', 'render'));  
                    
    add_action(\Actions\ACTIONS::UNICORN_ENQUEUE_SCRIPTS_ACTION, 
                    array('\Actions\Enqueues\EnqueueSearchUtils', 'render'));  

    add_action(\Actions\ACTIONS::UNICORN_ENQUEUE_SCRIPTS_ACTION, 
                    array('\Actions\Enqueues\EnqueueStoreDetailsPageUtils', 'render'));         
                    
    add_action(\Actions\ACTIONS::UNICORN_ENQUEUE_SCRIPTS_ACTION, 
                    array('\Actions\Enqueues\EnqueueLocalizeActionListsUtils', 'render')); 
                    
    add_action(\Actions\ACTIONS::UNICORN_ADMIN_ENQUEUE_SCRIPTS_ACTION, 
                    array('\Actions\Enqueues\EnqueueLocalizeActionListsUtils', 'render')); 

    add_action(\Actions\ACTIONS::UNICORN_ENQUEUE_SCRIPTS_ACTION, 
                    array('\Actions\Enqueues\EnqueueLocalizeCustomPageUrlsUtils', 'render')); 

    add_action(\Actions\ACTIONS::UNICORN_ENQUEUE_SCRIPTS_ACTION, 
                    array('\Actions\Enqueues\EnqueueSingleProductLayoutUtils', 'render')); 
                    
    add_action(\Actions\ACTIONS::UNICORN_ENQUEUE_SCRIPTS_ACTION, 
                    array('\Actions\Enqueues\EnqueueDashboardResetPasswordLayoutUtils', 'render'));

    add_action(\Actions\ACTIONS::UNICORN_ENQUEUE_SCRIPTS_ACTION, 
                    array('\Actions\Enqueues\EnqueueLocalizePaginationUtils', 'render')); 

    add_action(\Actions\ACTIONS::UNICORN_ADMIN_ENQUEUE_SCRIPTS_ACTION, 
                    array('\Actions\Enqueues\EnqueueLocalizePaginationUtils', 'render')); 

    add_filter(\Actions\ACTIONS::UNICORN_SCRIPT_LOADER_TAG_ACTION, 
                    array('\Actions\Enqueues\EnqueueThemeStylesUtils', 'registerModule'), 10, 3);

    add_filter(\Actions\ACTIONS::UNICORN_SCRIPT_LOADER_TAG_ACTION, 
                    array('\Actions\Enqueues\EnqueueCommercantsLayoutUtils', 'registerModule'), 10, 3);        
                    
    add_filter(\Actions\ACTIONS::UNICORN_SCRIPT_LOADER_TAG_ACTION, 
                    array('\Actions\Enqueues\EnqueueDashboardStoreLayoutUtils', 'registerModule'), 10, 3);
                    
    add_filter(\Actions\ACTIONS::UNICORN_SCRIPT_LOADER_TAG_ACTION, 
                    array('\Actions\Enqueues\EnqueueSingleProductLayoutUtils', 'registerModule'), 10, 3);

    add_filter(\Actions\ACTIONS::UNICORN_SCRIPT_LOADER_TAG_ACTION, 
                    array('\Actions\Enqueues\EnqueueDashboardEditAccountLayoutUtils', 'registerModule'), 10, 3);

    add_filter(\Actions\ACTIONS::UNICORN_SCRIPT_LOADER_TAG_ACTION, 
                    array('\Actions\Enqueues\EnqueueDashboardResetPasswordLayoutUtils', 'registerModule'), 10, 3);

    add_filter(\Actions\ACTIONS::UNICORN_SCRIPT_LOADER_TAG_ACTION, 
                    array('\Actions\Enqueues\EnqueueSearchUtils', 'registerModule'), 10, 3); 
    