<?php 

    require_once ACTIONS_REDIRECT_UTILS_DIR . '/action-redirect-theme-template-utils.php';

    add_action(\Actions\ACTIONS::UNICORN_TEMPLATE_REDIRECT_ACTION, 
                    array('\Actions\Redirect\ActionRedirectThemeTemplateUtils', 'init'));    
