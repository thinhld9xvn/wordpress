<?php 

    require_once ACTIONS_QUERY_VARS_UTILS_DIR . '/action-query-vars-commerce-utils.php';

    add_filter(\Actions\ACTIONS::UNICORN_QUERY_VARS_ACTION, 
                array('\Actions\Query_Vars\ActionQueryVarsCommerceUtils', 'init'), 
                0, 1);