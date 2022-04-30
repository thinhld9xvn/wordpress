<?php 
    namespace Theme_Options;
    class HOME_FIELDS {
        // home section
        const HOME_SECTION_ID = 'section-home';
        const HOME_TITLE = 'Trang chủ';
        const HOME_DESCRIPTION = 'Thiết lập cho trang chủ';

        /* Dịch vụ */
        const HOME_SECTION_SV1_ID = 'home-section-sv-1';
        const HOME_SECTION_SV1_TYPE = 'section';         
        const HOME_SECTION_SV1_TITLE = 'Dịch vụ'; 
        const HOME_SECTION_SV1_DESCRIPTION = ''; 
        const HOME_SECTION_SV1_INDENT = true;   

        const HOME_SECTION_SV_HEADING_ID = 'home-section-sv-heading';
        const HOME_SECTION_SV_HEADING_TYPE = 'text';
        const HOME_SECTION_SV_HEADING_TITLE = 'Tiêu đề lớn';
        const HOME_SECTION_SV_HEADING_DESCIPTION = '';

        const HOME_SECTION_SV_SMALL_HEADING_ID = 'home-section-sv-small-heading';
        const HOME_SECTION_SV_SMALL_HEADING_TYPE = 'editor';
        const HOME_SECTION_SV_SMALL_HEADING_TITLE = 'Tiêu đề nhỏ';
        const HOME_SECTION_SV_SMALL_HEADING_DESCIPTION = '';

        const HOME_SECTION_SV_BUTTON_TEXT_ID = 'home-section-sv-button-text';
        const HOME_SECTION_SV_BUTTON_TEXT_TYPE = 'text';
        const HOME_SECTION_SV_BUTTON_TEXT_TITLE = 'Nội dung button';
        const HOME_SECTION_SV_BUTTON_TEXT_DESCIPTION = '';
        
        const HOME_SECTION_SV_POST_TYPE_ID = 'home-section-sv-post-type';
        const HOME_SECTION_SV_POST_TYPE_TYPE = 'select';
        const HOME_SECTION_SV_POST_TYPE_DATA = 'post_type';
        const HOME_SECTION_SV_POST_TYPE_TITLE = 'Post type';
        const HOME_SECTION_SV_POST_TYPE_DESCIPTION = '';

        const HOME_SECTION_SV_POSTS_PER_PAGE_ID = 'home-section-sv-posts-per-page';
        const HOME_SECTION_SV_POSTS_PER_PAGE_TYPE = 'text';
        const HOME_SECTION_SV_POSTS_PER_PAGE_TITLE = 'Số mục cần lấy';
        const HOME_SECTION_SV_POSTS_PER_PAGE_DESCIPTION = '';

        const HOME_SECTION_SV_PAGE_ID_ID = 'home-section-sv-page-id';
        const HOME_SECTION_SV_PAGE_ID_TYPE = 'select';
        const HOME_SECTION_SV_PAGE_ID_DATA = 'pages';
        const HOME_SECTION_SV_PAGE_ID_TITLE = 'Url trang';
        const HOME_SECTION_SV_PAGE_ID_DESCIPTION = '';

        const HOME_SECTION_SV2_ID = 'home-section-sv-2';
        const HOME_SECTION_SV2_TYPE = 'section'; 
        const HOME_SECTION_SV2_INDENT = false;  

        /* Giới thiệu */
        const HOME_SECTION_GT1_ID = 'home-section-gt-1';
        const HOME_SECTION_GT1_TYPE = 'section';         
        const HOME_SECTION_GT1_TITLE = 'Giới thiệu'; 
        const HOME_SECTION_GT1_DESCRIPTION = ''; 
        const HOME_SECTION_GT1_INDENT = true;   

        const HOME_SECTION_GT_TITLE_ID = 'home-section-gt-title';
        const HOME_SECTION_GT_TITLE_TYPE = 'text';
        const HOME_SECTION_GT_TITLE_TITLE = 'Tiêu đề';
        const HOME_SECTION_GT_TITLE_DESCIPTION = '';

        const HOME_SECTION_GT_DESCRIPTION_ID = 'home-section-gt-description';
        const HOME_SECTION_GT_DESCRIPTION_TYPE = 'editor';
        const HOME_SECTION_GT_DESCRIPTION_TITLE = 'Mô tả';
        const HOME_SECTION_GT_DESCRIPTION_DESCIPTION = '';

        const HOME_SECTION_GT_BUTTON_TEXT_ID = 'home-section-gt-button-text';
        const HOME_SECTION_GT_BUTTON_TEXT_TYPE = 'text';
        const HOME_SECTION_GT_BUTTON_TEXT_TITLE = 'Nội dung button';
        const HOME_SECTION_GT_BUTTON_TEXT_DESCIPTION = '';

        const HOME_SECTION_GT_PAGE_ID_ID = 'home-section-gt-page-id';
        const HOME_SECTION_GT_PAGE_ID_TYPE = 'select';
        const HOME_SECTION_GT_PAGE_ID_DATA = 'pages';
        const HOME_SECTION_GT_PAGE_ID_TITLE = 'Url trang';
        const HOME_SECTION_GT_PAGE_ID_DESCIPTION = '';

        const HOME_SECTION_GT_THUMBNAIL_ID = 'home-section-gt-thumbnail';
        const HOME_SECTION_GT_THUMBNAIL_TYPE = 'media';
        const HOME_SECTION_GT_THUMBNAIL_TITLE = 'Ảnh đại diện';
        const HOME_SECTION_GT_THUMBNAIL_DESCIPTION = '';

        const HOME_SECTION_GT2_ID = 'home-section-gt-2';
        const HOME_SECTION_GT2_TYPE = 'section'; 
        const HOME_SECTION_GT2_INDENT = false;  

        /* Sản phẩm */
        const HOME_SECTION_SP1_ID = 'home-section-sp-1';
        const HOME_SECTION_SP1_TYPE = 'section';         
        const HOME_SECTION_SP1_TITLE = 'Sản phẩm'; 
        const HOME_SECTION_SP1_DESCRIPTION = ''; 
        const HOME_SECTION_SP1_INDENT = true;  

        const HOME_SECTION_SP_TITLE_ID = 'home-section-sp-title';
        const HOME_SECTION_SP_TITLE_TYPE = 'text';
        const HOME_SECTION_SP_TITLE_TITLE = 'Tiêu đề';
        const HOME_SECTION_SP_TITLE_DESCIPTION = '';

        const HOME_SECTION_SP_POST_TYPE_ID = 'home-section-sp-post-type';
        const HOME_SECTION_SP_POST_TYPE_TYPE = 'select';
        const HOME_SECTION_SP_POST_TYPE_DATA = 'post_type';
        const HOME_SECTION_SP_POST_TYPE_TITLE = 'Post type';
        const HOME_SECTION_SP_POST_TYPE_DESCIPTION = '';

        const HOME_SECTION_SP_POSTS_PER_PAGE_ID = 'home-section-sp-posts-per-page';
        const HOME_SECTION_SP_POSTS_PER_PAGE_TYPE = 'text';
        const HOME_SECTION_SP_POSTS_PER_PAGE_TITLE = 'Số mục cần lấy';
        const HOME_SECTION_SP_POSTS_PER_PAGE_DESCIPTION = '';

        const HOME_SECTION_SP_BUTTON_TEXT_ID = 'home-section-sp-button-text';
        const HOME_SECTION_SP_BUTTON_TEXT_TYPE = 'text';
        const HOME_SECTION_SP_BUTTON_TEXT_TITLE = 'Nội dung button';
        const HOME_SECTION_SP_BUTTON_TEXT_DESCIPTION = '';

        const HOME_SECTION_SP_PAGE_ID_ID = 'home-section-sp-page-id';
        const HOME_SECTION_SP_PAGE_ID_TYPE = 'select';
        const HOME_SECTION_SP_PAGE_ID_DATA = 'pages';
        const HOME_SECTION_SP_PAGE_ID_TITLE = 'Url trang';
        const HOME_SECTION_SP_PAGE_ID_DESCIPTION = '';
        
        const HOME_SECTION_SP2_ID = 'home-section-sp-2';
        const HOME_SECTION_SP2_TYPE = 'section'; 
        const HOME_SECTION_SP2_INDENT = false;          

        /* Kiến thức */
        const HOME_SECTION_KT1_ID = 'home-section-kt-1';
        const HOME_SECTION_KT1_TYPE = 'section';         
        const HOME_SECTION_KT1_TITLE = 'Kiến thức'; 
        const HOME_SECTION_KT1_DESCRIPTION = ''; 
        const HOME_SECTION_KT1_INDENT = true;  

        const HOME_SECTION_KT_TITLE_ID = 'home-section-kt-title';
        const HOME_SECTION_KT_TITLE_TYPE = 'text';
        const HOME_SECTION_KT_TITLE_TITLE = 'Tiêu đề';
        const HOME_SECTION_KT_TITLE_DESCIPTION = '';

        const HOME_SECTION_KT_POST_TYPE_ID = 'home-section-kt-post-type';
        const HOME_SECTION_KT_POST_TYPE_TYPE = 'select';
        const HOME_SECTION_KT_POST_TYPE_DATA = 'post_type';
        const HOME_SECTION_KT_POST_TYPE_TITLE = 'Post type';
        const HOME_SECTION_KT_POST_TYPE_DESCIPTION = '';

        const HOME_SECTION_KT_POSTS_PER_PAGE_ID = 'home-section-kt-posts-per-page';
        const HOME_SECTION_KT_POSTS_PER_PAGE_TYPE = 'text';
        const HOME_SECTION_KT_POSTS_PER_PAGE_TITLE = 'Số mục cần lấy';
        const HOME_SECTION_KT_POSTS_PER_PAGE_DESCIPTION = '';

        const HOME_SECTION_KT_BUTTON_TEXT_ID = 'home-section-kt-button-text';
        const HOME_SECTION_KT_BUTTON_TEXT_TYPE = 'text';
        const HOME_SECTION_KT_BUTTON_TEXT_TITLE = 'Nội dung button';
        const HOME_SECTION_KT_BUTTON_TEXT_DESCIPTION = '';

        const HOME_SECTION_KT_PAGE_ID_ID = 'home-section-kt-page-id';
        const HOME_SECTION_KT_PAGE_ID_TYPE = 'select';
        const HOME_SECTION_KT_PAGE_ID_DATA = 'pages';
        const HOME_SECTION_KT_PAGE_ID_TITLE = 'Url trang';
        const HOME_SECTION_KT_PAGE_ID_DESCIPTION = '';
        
        const HOME_SECTION_KT2_ID = 'home-section-kt-2';
        const HOME_SECTION_KT2_TYPE = 'section'; 
        const HOME_SECTION_KT2_INDENT = false;          

        /* Đối tác */
        const HOME_SECTION_CL1_ID = 'home-section-cl-1';
        const HOME_SECTION_CL1_TYPE = 'section';         
        const HOME_SECTION_CL1_TITLE = 'Đối tác'; 
        const HOME_SECTION_CL1_DESCRIPTION = ''; 
        const HOME_SECTION_CL1_INDENT = true;  

        const HOME_SECTION_CL_TITLE_ID = 'home-section-cl-title';
        const HOME_SECTION_CL_TITLE_TYPE = 'text';
        const HOME_SECTION_CL_TITLE_TITLE = 'Tiêu đề';
        const HOME_SECTION_CL_TITLE_DESCIPTION = '';

        const HOME_SECTION_CL_POST_TYPE_ID = 'home-section-cl-post-type';
        const HOME_SECTION_CL_POST_TYPE_TYPE = 'select';
        const HOME_SECTION_CL_POST_TYPE_DATA = 'post_type';
        const HOME_SECTION_CL_POST_TYPE_TITLE = 'Post type';
        const HOME_SECTION_CL_POST_TYPE_DESCIPTION = '';

        const HOME_SECTION_CL_POSTS_PER_PAGE_ID = 'home-section-cl-posts-per-page';
        const HOME_SECTION_CL_POSTS_PER_PAGE_TYPE = 'text';
        const HOME_SECTION_CL_POSTS_PER_PAGE_TITLE = 'Số mục cần lấy';
        const HOME_SECTION_CL_POSTS_PER_PAGE_DESCIPTION = '';
        
        const HOME_SECTION_CL2_ID = 'home-section-cl-2';
        const HOME_SECTION_CL2_TYPE = 'section'; 
        const HOME_SECTION_CL2_INDENT = false;          

    }