<?php 

    require_once dirname(__FILE__) . '/constants.php';

    require_once dirname(__FILE__) . '/theme-enqueue.php';

    require_once dirname(__FILE__) . '/theme-hooks.php';
    require_once dirname(__FILE__) . '/theme-functions.php';
    require_once dirname(__FILE__) . '/walker/menu-walker.php';

    // theme options    
    require_once dirname(__FILE__) . '/theme_settings/theme_options/options.php';

    // custom post type
    require_once dirname(__FILE__) . '/theme_settings/custom_post_types/options.php';

    // custom metaboxes
    require_once dirname(__FILE__) . '/theme_settings/metaboxes/options.php';
 
    // shortcodes
    require_once SHORTCODES_DIR . '/home-search-filter-artists.php';
    require_once SHORTCODES_DIR . '/home-job-categories-artist.php';
    require_once SHORTCODES_DIR . '/home-explore-providers.php';
    require_once SHORTCODES_DIR . '/home-featured-articles-trending.php';
    require_once SHORTCODES_DIR . '/home-get-started-box.php';