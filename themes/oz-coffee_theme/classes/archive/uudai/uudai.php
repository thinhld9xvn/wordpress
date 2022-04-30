<?php  
    require_once ARCHIVE_UUDAI_CLASS_DIR . '/a/uudai-fields-class.php';

    require_once ARCHIVE_UUDAI_CLASS_UTILS_DIR . '/query/uudai-get-articles-list-utils.php';
    require_once ARCHIVE_UUDAI_CLASS_UTILS_DIR . '/query/uudai-get-related-articles-list-utils.php';
    
    require_once ARCHIVE_UUDAI_CLASS_UTILS_DIR . '/get/uudai-get-background-image-utils.php';

    require_once ARCHIVE_UUDAI_CLASS_UTILS_DIR . '/get/uudai-get-posts-per-page-utils.php';  
    require_once ARCHIVE_UUDAI_CLASS_UTILS_DIR . '/get/uudai-get-post-type-utils.php';      

    require_once ARCHIVE_UUDAI_CLASS_UTILS_DIR . '/render/uudai-print-article-html-utils.php';
    require_once ARCHIVE_UUDAI_CLASS_UTILS_DIR . '/render/uudai-print-articles-list-utils.php';
    require_once ARCHIVE_UUDAI_CLASS_UTILS_DIR . '/render/uudai-print-articles-pagination-utils.php';
    require_once ARCHIVE_UUDAI_CLASS_UTILS_DIR . '/render/uudai-print-html-utils.php';

    require_once ARCHIVE_UUDAI_CLASS_UTILS_DIR . '/render/single/uudai-print-heading-html-utils.php';
    require_once ARCHIVE_UUDAI_CLASS_UTILS_DIR . '/render/single/uudai-print-single-html-utils.php';
    require_once ARCHIVE_UUDAI_CLASS_UTILS_DIR . '/render/single/uudai-print-metadata-utils.php';
    require_once ARCHIVE_UUDAI_CLASS_UTILS_DIR . '/render/single/uudai-print-page-content-html-utils.php';
    require_once ARCHIVE_UUDAI_CLASS_UTILS_DIR . '/render/single/uudai-print-facebook-comments-utils.php';
    require_once ARCHIVE_UUDAI_CLASS_UTILS_DIR . '/render/single/uudai-print-related-box-utils.php';

    require_once ARCHIVE_UUDAI_CLASS_UTILS_DIR . '/render/single/related-box/uudai-print-related-heading-html-utils.php';
    require_once ARCHIVE_UUDAI_CLASS_UTILS_DIR . '/render/single/related-box/uudai-print-related-articles-list-html-utils.php';
    require_once ARCHIVE_UUDAI_CLASS_UTILS_DIR . '/render/single/related-box/uudai-print-related-article-html-utils.php';