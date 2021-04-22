<?php 

    require_once ACTIONS_INIT_UTILS_DIR . '/action-init-product-support-author-utils.php';

    require_once ACTIONS_INIT_UTILS_DIR . '/action-init-disable-access-to-amin-panel-utils.php';

    require_once ACTIONS_INIT_UTILS_DIR . '/action-init-rewrite-rules-utils.php';

    add_action(\Actions\ACTIONS::UNICORN_INIT_ACTION, 
                array('\Actions\Init\ActionInitProductSupportAuthorUtils', 'init'));

    add_action(\Actions\ACTIONS::UNICORN_INIT_ACTION, 
                array('\Actions\Init\ActionDisableAccessToAdminPanelUtils', 'init'));

     add_action(\Actions\ACTIONS::UNICORN_INIT_ACTION, 
                array('\Actions\Init\ActionInitRewriteRulesUtils', 'init'));           