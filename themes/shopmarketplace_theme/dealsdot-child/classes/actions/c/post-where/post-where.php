<?php 

    require_once ACTIONS_POST_WHERE_UTILS_DIR . '/action-post-where-attachments-utils.php';

    add_filter(\Actions\ACTIONS::UNICORN_POST_WHERE_ACTION, 
                array('\Actions\Post_Where\ActionPostWhereAttachmentsUtils', 'init'));