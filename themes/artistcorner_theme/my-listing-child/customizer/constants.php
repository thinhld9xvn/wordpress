<?php

    define('AGORA_PLUGIN_DIR_PATH', WP_PLUGIN_DIR . '/wp-agora-io');
    define('AGORA_PLUGIN_DIR_URI', WP_PLUGIN_URL  . '/wp-agora-io');

    define('CHILD_THEME_DIR_URI', get_stylesheet_directory_uri());
    define('CHILD_THEME_DIR', get_stylesheet_directory());

    define('THEME_CSS_DIR_URI', CHILD_THEME_DIR_URI . '/assets/css');
    define('THEME_JS_DIR_URI', CHILD_THEME_DIR_URI . '/assets/js');
    
    define('THEME_SELECT2_DIR_URI', CHILD_THEME_DIR_URI . '/assets/select2');
    define('THEME_JQUERY_UI_DIR_URI', CHILD_THEME_DIR_URI . '/assets/jquery-ui');
    define('THEME_TAILWIND_DIR_URI', CHILD_THEME_DIR_URI . '/assets/tailwind');
    define('THEME_NOTY_DIR_URI', CHILD_THEME_DIR_URI . '/assets/noty');

    define('PARENT_THEME_FILE_UPLOAD_JS_URI', get_template_directory_uri() . '/assets/vendor/jquery-fileupload');

    define('SHORTCODES_DIR', dirname(__FILE__) . '/shortcodes');

    define('LIB_USER_ROLES', CHILD_THEME_DIR . '/includes/src/user-roles/user-roles.php');

    /* */    

    define('ALTERNATE_VIEW_TEMPLATE_NAME', 'alternate');

    define('JOBS_POST_TYPE', 'job_listing');
    define('JOBS_TAXONOMY', 'job_listing_category');

    define('REGION_TAXONOMY', 'region');

    define('JOBS_SALARY_TAXONOMY', 'job-salary');
    define('JOBS_QUALIFICATION_TAXONOMY', 'job-qualification');
    define('JOBS_VACANCY_TYPE_TAXONOMY', 'job-vacancy-type');
    define('JOBS_ACCOUNT_TYPE_TAXONOMY', 'account-type');
    define('JOBS_LANGUAGES_TAXONOMY', 'languages');
    define('JOBS_CATEGORY_OF_SERVICE_TAXONOMY', 'category-of-service');

    define('PROPOSAL_POST_TYPE', 'proposal');
    define('PROPOSAL_SKILLS_TAXONOMY', 'skills');

    define('_FIELD_JOBS_TYPE_KEY', '_case27_listing_type');
    define('_FIELD_JOBS_TYPE_VALUE', 'jobs');

    define('_FIELD_JOBS_VACANCY_TYPE', 'job-vacancy-type');
    define('_FIELD_JOBS_SALARY', '_job-salary');   
    define('_FIELD_JOBS_QUALIFICATION', 'job-qualification');
    define('_FIELD_JOBS_REGION', 'region');
    define('_FIELD_JOBS_COMPANY', 'job-place-relation');
    define('_FIELD_JOBS_DESCRIPTION', 'job_description');
    define('_FIELD_JOBS_ATTACHMENTS', 'upload-pdf');
    define('_FIELD_JOBS_EMAIL', 'job_email');
    define('_FIELD_JOBS_SOCIAL_NETWORKS', 'links');
    define('_FIELD_JOBS_GALLERIES', 'job_gallery');

    define('_FIELD_JOBS_BG_COVER', 'bg-cover-profile');

    define('_FIELD_USER_PROFILE_PHOTO_ID', '_mylisting_profile_photo');
    define('_FIELD_USER_PROFILE_PHOTO_URL', '_mylisting_profile_photo_url');

    //define('_FIELD_JOBS_CATEGORIES', 'job_category');

    define('_FIELD_JOBS_LOCATION_LATITUDE', 'geolocation_lat');
    define('_FIELD_JOBS_LOCATION_LNGITUTE', 'geolocation_long');

    define('_FIELD_JOBS_CONTACT_PHONE', 'job_phone');
    define('_FIELD_JOBS_CONTACT_LOCATION', 'job_location');
    define('_FIELD_JOBS_COMPANY_LOGO', 'job_logo');
    define('_FIELD_JOBS_COMPANY_WEBSITE', 'job_website');

    define('_FIELD_JOBS_ACCOUNT_TYPE', '_job_account_type');
    define('_FIELD_JOBS_RATES_BY_HOUR', '_job_rates_by_hour');
    define('_FIELD_JOBS_LANGUAGES', '_job_languages');
    define('_FIELD_JOBS_CATEGORY_OF_SERVICE', '_job_category_of_service');

    define('_FIELD_JOBS_DEMO_TAPE', 'job_demo_tape');
    define('_FIELD_JOBS_PORTFOLIO', 'job_portfolio');
    define('_FIELD_JOBS_BOOK_ONLINE', 'job_book_online');

    define('_FIELD_CATEGORY_TYPE_IDS', 'field_5a04e1d7362f5');
    define('_FIELD_CATEGORY_ICON', 'field_595b74be15f19');
    define('_FIELD_CATEGORY_IMAGE', 'field_595b751015f1c');
    define('_FIELD_CATEGORY_COLOR', 'field_595b74f315f1a');
    define('_FIELD_CATEGORY_TEXT_COLOR', 'field_595b750215f1b');
    
    define('_FIELD_PROPOSAL_STATUS', '_pt-field-proposal-status');
    define('_FIELD_PROPOSAL_USER_RECEIVE', '_pt-field-proposal-user-receive');

    define('_FIELD_PROPOSAL_BEGINNING_MISSION', '_pt-field-proposal-beginning-mission');
    define('_FIELD_PROPOSAL_LENGTH_MISSION', '_pt-field-proposal-length-mission');
    define('_FIELD_PROPOSAL_MISSION_LOCATION', '_pt-field-proposal-mission-location');
    define('_FIELD_PROPOSAL_PROJECT_DESCRIPTION', '_pt-field-proposal-project-description');
    define('_FIELD_PROPOSAL_UPLOAD_FILES', '_pt-field-proposal-uploaded-files');
    define('_FIELD_PROPOSAL_USER_BOOKING', '_pt-field-proposal-user-booking');
    define('_FIELD_PROPOSAL_KIND_OF_OFFER', '_pt-field-proposal-kind-of-offer');

    define('_USER_CALENDAR_EVENTS', '_user-field-calendar-events');

    define('_FILTER_TERM_SEARCH', 'term-search');

    define('ACCOUNT_TYPE_COACHING', 'coaching');

    /* */
    define('_FIELD_USER_ACCOUNT_ROLE', '_user_account_role');
    define('_ACCOUNT_ROLE_PROVIDER', 'provider');
    define('_ACCOUNT_ROLE_CUSTOMER', 'customer');

    /* */
    define('_FIELD_ACCOUNT_AVATAR', '_user_account_avatar');

    /* */
    define('_LABEL_WHAT_ARE_YOU_LOOKING_FOR', 'what are you looking for');
    define('_LABEL_CATEGORY', 'category');
    define('_LABEL_SALARY', 'salary');
    /* */
    
    define('_LABEL_LOCATION', 'location');
    define('_LABEL_ONCHANGE', 'filterChanged');

    define('_FILTER_PRICE_MIN', 0);
    define('_FILTER_PRICE_MAX_PLUS', 1000);
    define('_FILTER_PRICE_STEP', 1);
    define('_FILTER_PRICE_DEFAULT', 10);

    /* */
    define('_MY_ACCOUNT_URL', "//{$_SERVER['SERVER_NAME']}/my-account");
    define('_MY_ACCOUNT_REGISTER_URL', "//{$_SERVER['SERVER_NAME']}/my-account/?register");
    define('_MY_ACCOUNT_BOOKMARK_URL', "//{$_SERVER['SERVER_NAME']}/my-account/my-bookmarks");
    define('_MY_ACCOUNT_EDIT_URL', "//{$_SERVER['SERVER_NAME']}/my-account/edit-account");
    define('_EDIT_PROFILE_URL', _MY_ACCOUNT_EDIT_URL . '/?a=profile');
    define('_EDIT_ACCOUNT_URL', _MY_ACCOUNT_EDIT_URL . '/?a=account'); 
    
    define('_SET_ACCOUNT_SETTINGS_URL', _MY_ACCOUNT_URL . '/set-account-settings' );  

    /* */
    define('EXPLORE_JOBS_SEARCH_URL', "//{$_SERVER['SERVER_NAME']}/explore-2-columns/");
    define('EXPLORE_JOBS_MORE_URL', "//{$_SERVER['SERVER_NAME']}/explore-2-columns/?type=" . _FIELD_JOBS_TYPE_VALUE . "&tab=categories&sort=top-rated");
    define('EXPLORE_CATEGORY_JOBS_URL', "//{$_SERVER['SERVER_NAME']}/explore-2-columns/?type=" . _FIELD_JOBS_TYPE_VALUE . "&category=%term_slug%&sort=top-rated");

    define('_AJAX_GET_JOBS_LISTING_ACTION', 'sb_ajax_get_jobs_listing');
    define('_AJAX_SAVE_PROFILE_ACTION', 'sb_ajax_save_profile');
    define('_AJAX_GET_USERS_LIST_ACTION', 'sb_ajax_get_users_list');
    define('_AJAX_PUBLISH_PROPOSAL_ACTION', 'sb_ajax_publish_proposal');
    define('_AJAX_SET_STATUS_PROPOSAL_ACTION', 'sb_ajax_set_status_proposal');
    define('_AJAX_SUBMITTING_COMMENT_ACTION', 'sb_ajax_submitting_comment');
    define('_AJAX_UPDATE_COMMENT_ACTION', 'sb_ajax_update_comment');
    define('_AJAX_SAVE_PASSWORD_ACTION', 'sb_ajax_save_password');
    define('_AJAX_CHANGE_ACCOUNT_AVATAR_ACTION', 'sb_ajax_change_avatar_account');
    define('_AJAX_AGORA_CALL_VIDEO_ACTION', 'sb_ajax_agora_call_video');
    define('_AJAX_SAVE_EVENTS_LIST_ACTION', 'sb_ajax_save_events_list');

    