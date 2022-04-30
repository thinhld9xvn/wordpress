<?php 

    namespace Theme_Options;

    class THEME_OPTIONS_FIELDS {

        // global section

            const GLOBAL_SECTION_ID = 'section-global';
            const GLOBAL_TITLE = 'Tổng quan';
            const GLOBAL_DESCRIPTION = 'Thiết lập tổng quan';

            const GLOBAL_SECTION_1_ID = 'section-global-section-1';
            const GLOBAL_SECTION_1_TYPE = 'section';
            const GLOBAL_SECTION_1_TITLE = 'Phân trang';
            const GLOBAL_SECTION_1_DESCRIPTION = 'Thiết lập phân trang';
            const GLOBAL_SECTION_1_INDENT = true; 

            const GLOBAL_SECTION_2_ID = 'section-global-section-2';
            const GLOBAL_SECTION_2_TYPE = 'section';           
            const GLOBAL_SECTION_2_INDENT = false; 

        // header section
            const HEADER_SECTION_ID = 'section-header';
            const HEADER_TITLE = 'Header';
            const HEADER_DESCRIPTION = 'All header settings';

            const HEADER_SECTION_1_ID = 'header-section-1';
            const HEADER_SECTION_1_TYPE = 'section';
            const HEADER_SECTION_1_TITLE = 'Logo and background Settings';
            const HEADER_SECTION_1_DESC = '';
            const HEADER_SECTION_1_INDENT = true; 

            const HEADER_SECTION_LOGO_IMAGE_ID = 'logo-image';
            const HEADER_SECTION_LOGO_IMAGE_TYPE = 'media';
            const HEADER_SECTION_LOGO_IMAGE_TITLE = 'Logo website';
            const HEADER_SECTION_LOGO_IMAGE_DESCRIPTION = 'Please choose logo website image';

            const HEADER_SECTION_LOGO_IMAGE_MOBILE_ID = 'logo-image-mobile';
            const HEADER_SECTION_LOGO_IMAGE_MOBILE_TYPE = 'media';
            const HEADER_SECTION_LOGO_IMAGE_MOBILE_TITLE = 'Logo Mobile website';
            const HEADER_SECTION_LOGO_IMAGE_MOBILE_DESCRIPTION = 'Please choose logo mobile website image';

            const HEADER_SECTION_2_ID = 'header-section-2';
            const HEADER_SECTION_2_TYPE = 'section'; 
            const HEADER_SECTION_2_INDENT = false; 

        // custom post type section
            const CUSTOM_PT_SECTION_ID = 'section-custom-post-type';
            const CUSTOM_PT_TITLE = 'Custom post type';
            const CUSTOM_PT_DESCRIPTION = 'Thiết lập cho custom post type';

             //

             const CUSTOM_PT_SERVICES_SECTION_1_ID = 'custom-pt-services-section-1';
             const CUSTOM_PT_SERVICES_SECTION_1_TYPE = 'section';
             const CUSTOM_PT_SERVICES_SECTION_1_TITLE = 'Dịch vụ';
             const CUSTOM_PT_SERVICES_SECTION_1_DESC = 'Thiết lập cho custom post type Dịch vụ';
             const CUSTOM_PT_SERVICES_SECTION_1_INDENT = true; 
 
             const CUSTOM_PT_SERVICES_BACKGROUND_IMAGE_ID = 'custom-pt-services-background-image';
             const CUSTOM_PT_SERVICES_BACKGROUND_IMAGE_TYPE = 'media';
             const CUSTOM_PT_SERVICES_BACKGROUND_IMAGE_TITLE = 'Background';
             const CUSTOM_PT_SERVICES_BACKGROUND_IMAGE_DESCRIPTION = 'Mời chọn một ảnh nền';            
 
             const CUSTOM_PT_SERVICES_SECTION_2_ID = 'custom-pt-services-section-2';
             const CUSTOM_PT_SERVICES_SECTION_2_TYPE = 'section'; 
             const CUSTOM_PT_SERVICES_SECTION_2_INDENT = false; 

            const CUSTOM_PT_UUDAI_SECTION_1_ID = 'custom-pt-uudai-section-1';
            const CUSTOM_PT_UUDAI_SECTION_1_TYPE = 'section';
            const CUSTOM_PT_UUDAI_SECTION_1_TITLE = 'Ưu đãi';
            const CUSTOM_PT_UUDAI_SECTION_1_DESC = 'Thiết lập cho custom post type Ưu Đãi';
            const CUSTOM_PT_UUDAI_SECTION_1_INDENT = true; 

            const CUSTOM_PT_UUDAI_BACKGROUND_IMAGE_ID = 'custom-pt-uudai-background-image';
            const CUSTOM_PT_UUDAI_BACKGROUND_IMAGE_TYPE = 'media';
            const CUSTOM_PT_UUDAI_BACKGROUND_IMAGE_TITLE = 'Background';
            const CUSTOM_PT_UUDAI_BACKGROUND_IMAGE_DESCRIPTION = 'Mời chọn một ảnh nền';            

            const CUSTOM_PT_UUDAI_SECTION_2_ID = 'custom-pt-uudai-section-2';
            const CUSTOM_PT_UUDAI_SECTION_2_TYPE = 'section'; 
            const CUSTOM_PT_UUDAI_SECTION_2_INDENT = false; 

            //

            const CUSTOM_PT_TINTUC_SECTION_1_ID = 'custom-pt-tintuc-section-1';
            const CUSTOM_PT_TINTUC_SECTION_1_TYPE = 'section';
            const CUSTOM_PT_TINTUC_SECTION_1_TITLE = 'Tin tức';
            const CUSTOM_PT_TINTUC_SECTION_1_DESC = 'Thiết lập cho custom post type Tin tức';
            const CUSTOM_PT_TINTUC_SECTION_1_INDENT = true; 

            const CUSTOM_PT_TINTUC_BACKGROUND_IMAGE_ID = 'custom-pt-tintuc-background-image';
            const CUSTOM_PT_TINTUC_BACKGROUND_IMAGE_TYPE = 'media';
            const CUSTOM_PT_TINTUC_BACKGROUND_IMAGE_TITLE = 'Background';
            const CUSTOM_PT_TINTUC_BACKGROUND_IMAGE_DESCRIPTION = 'Mời chọn một ảnh nền';            

            const CUSTOM_PT_TINTUC_SECTION_2_ID = 'custom-pt-tintuc-section-2';
            const CUSTOM_PT_TINTUC_SECTION_2_TYPE = 'section'; 
            const CUSTOM_PT_TINTUC_SECTION_2_INDENT = false; 

             //

             const CUSTOM_PT_GALLERIES_SECTION_1_ID = 'custom-pt-thuvienanh-section-1';
             const CUSTOM_PT_GALLERIES_SECTION_1_TYPE = 'section';
             const CUSTOM_PT_GALLERIES_SECTION_1_TITLE = 'Thư viện ảnh';
             const CUSTOM_PT_GALLERIES_SECTION_1_DESC = 'Thiết lập cho custom post type Thư viện ảnh';
             const CUSTOM_PT_GALLERIES_SECTION_1_INDENT = true; 
 
             const CUSTOM_PT_GALLERIES_BACKGROUND_IMAGE_ID = 'custom-pt-thuvienanh-background-image';
             const CUSTOM_PT_GALLERIES_BACKGROUND_IMAGE_TYPE = 'media';
             const CUSTOM_PT_GALLERIES_BACKGROUND_IMAGE_TITLE = 'Background';
             const CUSTOM_PT_GALLERIES_BACKGROUND_IMAGE_DESCRIPTION = 'Mời chọn một ảnh nền';     

             const CUSTOM_PT_GALLERIES_DESCRIPTION_ID = 'custom-pt-thuvienanh-description';
             const CUSTOM_PT_GALLERIES_DESCRIPTION_TYPE = 'textarea';
             const CUSTOM_PT_GALLERIES_DESCRIPTION_TITLE = 'Giới thiệu về mục';
             const CUSTOM_PT_GALLERIES_DESCRIPTION_DESCRIPTION = '';     
 
             const CUSTOM_PT_GALLERIES_SECTION_2_ID = 'custom-pt-thuvienanh-section-2';
             const CUSTOM_PT_GALLERIES_SECTION_2_TYPE = 'section'; 
             const CUSTOM_PT_GALLERIES_SECTION_2_INDENT = false; 
            

        // social network section
            const SOCIAL_NETWORK_SECTION_ID = 'section-social-network';
            const SOCIAL_NETWORK_TITLE = 'Social Network';
            const SOCIAL_NETWORK_DESCRIPTION = 'All social network settings';

            const SOCIAL_NETWORK_SECTION_1_ID = 'social-network-section-1';
            const SOCIAL_NETWORK_SECTION_1_TYPE = 'section';
            const SOCIAL_NETWORK_SECTION_1_TITLE = 'Social network settings';
            const SOCIAL_NETWORK_SECTION_1_DESC = '';
            const SOCIAL_NETWORK_SECTION_1_INDENT = true; 

            const SOCIAL_NETWORK_SECTION_FACEBOOK_URL_ID = 'facebook-url';
            const SOCIAL_NETWORK_SECTION_FACEBOOK_URL_TYPE = 'text';
            const SOCIAL_NETWORK_SECTION_FACEBOOK_URL_TITLE = 'Facebook Url';
            const SOCIAL_NETWORK_SECTION_FACEBOOK_URL_DESCRIPTION = 'Please enter Facebook url';  

            const SOCIAL_NETWORK_SECTION_FANPAGE_URL_ID = 'fanpage-url';
            const SOCIAL_NETWORK_SECTION_FANPAGE_URL_TYPE = 'text';
            const SOCIAL_NETWORK_SECTION_FANPAGE_URL_TITLE = 'Fanpage Url';
            const SOCIAL_NETWORK_SECTION_FANPAGE_URL_DESCRIPTION = 'Please enter Fanpage url';  
            
            const SOCIAL_NETWORK_SECTION_INSTAGRAM_URL_ID = 'instagram-url';
            const SOCIAL_NETWORK_SECTION_INSTAGRAM_URL_TYPE = 'text';
            const SOCIAL_NETWORK_SECTION_INSTAGRAM_URL_TITLE = 'Instagram Url';
            const SOCIAL_NETWORK_SECTION_INSTAGRAM_URL_DESCRIPTION = 'Please enter Instagram url';  

            const SOCIAL_NETWORK_SECTION_YOUTUBE_URL_ID = 'youtube-url';
            const SOCIAL_NETWORK_SECTION_YOUTUBE_URL_TYPE = 'text';
            const SOCIAL_NETWORK_SECTION_YOUTUBE_URL_TITLE = 'Youtube Url';
            const SOCIAL_NETWORK_SECTION_YOUTUBE_URL_DESCRIPTION = 'Please enter Youtube url';  

            const SOCIAL_NETWORK_SECTION_ZALO_URL_ID = 'zalo-url';
            const SOCIAL_NETWORK_SECTION_ZALO_URL_TYPE = 'text';
            const SOCIAL_NETWORK_SECTION_ZALO_URL_TITLE = 'Zalo Url';
            const SOCIAL_NETWORK_SECTION_ZALO_URL_DESCRIPTION = 'Please enter zalo url';  

            const SOCIAL_NETWORK_SECTION_2_ID = 'social-network-section-2';
            const SOCIAL_NETWORK_SECTION_2_TYPE = 'section'; 
            const SOCIAL_NETWORK_SECTION_2_INDENT = false; 

        //shortcut sidebar section
            const SHORTCUT_SIDEBAR_SECTION_ID = 'section-shortcut-sidebar';
            const SHORTCUT_SIDEBAR_TITLE = 'Shortcut Utility Sidebar';
            const SHORTCUT_SIDEBAR_DESCRIPTION = 'All shortcut utility sidebar settings';

            const SHORTCUT_SIDEBAR_SECTION_1_ID = 'shortcut-sidebar-section-1';
            const SHORTCUT_SIDEBAR_SECTION_1_TYPE = 'section';
            const SHORTCUT_SIDEBAR_SECTION_1_TITLE = 'Shortcut utility sidebar settings';
            const SHORTCUT_SIDEBAR_SECTION_1_DESC = '';
            const SHORTCUT_SIDEBAR_SECTION_1_INDENT = true; 

            const SHORTCUT_SIDEBAR_SECTION_ORDER_PARTY_ICON_ID = 'order-party-shortcut-image';
            const SHORTCUT_SIDEBAR_SECTION_ORDER_PARTY_ICON_TYPE = 'media';
            const SHORTCUT_SIDEBAR_SECTION_ORDER_PARTY_ICON_TITLE = 'Order party shortcut image';
            const SHORTCUT_SIDEBAR_SECTION_ORDER_PARTY_ICON_DESCRIPTION = 'Please choose an image';
            
            const SHORTCUT_SIDEBAR_SECTION_PHONE_SUPPORTER_IMAGE_ID = 'phone-supporter-shortcut-image';
            const SHORTCUT_SIDEBAR_SECTION_PHONE_SUPPORTER_IMAGE_TYPE = 'media';
            const SHORTCUT_SIDEBAR_SECTION_PHONE_SUPPORTER_IMAGE_TITLE = 'Phone supporter image';
            const SHORTCUT_SIDEBAR_SECTION_PHONE_SUPPORTER_IMAGE_DESCRIPTION = 'Please choose an image';

            const SHORTCUT_SIDEBAR_SECTION_PHONE_SUPPORTER_URL_ID = 'phone-supporter-shortcut-url';
            const SHORTCUT_SIDEBAR_SECTION_PHONE_SUPPORTER_URL_TYPE = 'text';
            const SHORTCUT_SIDEBAR_SECTION_PHONE_SUPPORTER_URL_TITLE = 'Phone supporter url';
            const SHORTCUT_SIDEBAR_SECTION_PHONE_SUPPORTER_URL_DESCRIPTION = 'Please enter an url';

            const SHORTCUT_SIDEBAR_SECTION_FB_MESSENGER_IMAGE_ID = 'fb-messenger-shortcut-image';
            const SHORTCUT_SIDEBAR_SECTION_FB_MESSENGER_IMAGE_TYPE = 'media';
            const SHORTCUT_SIDEBAR_SECTION_FB_MESSENGER_IMAGE_TITLE = 'Facebook messenger image';
            const SHORTCUT_SIDEBAR_SECTION_FB_MESSENGER_IMAGE_DESCRIPTION = 'Please choose an image';

            const SHORTCUT_SIDEBAR_SECTION_FB_MESSENGER_URL_ID = 'fb-messenger-shortcut-url';
            const SHORTCUT_SIDEBAR_SECTION_FB_MESSENGER_URL_TYPE = 'text';
            const SHORTCUT_SIDEBAR_SECTION_FB_MESSENGER_URL_TITLE = 'Facebook messenger url';
            const SHORTCUT_SIDEBAR_SECTION_FB_MESSENGER_URL_DESCRIPTION = 'Please enter an url';        

            const SHORTCUT_SIDEBAR_SECTION_2_ID = 'shortcut-sidebar-section-2';
            const SHORTCUT_SIDEBAR_SECTION_2_TYPE = 'section'; 
            const SHORTCUT_SIDEBAR_SECTION_2_INDENT = false; 
        
        //slider section
            const SLIDER_SECTION_ID = 'section-slider';
            const SLIDER_SECTION_TITLE = 'Slider';
            const SLIDER_SECTION_DESCRIPTION = 'All slider settings';

            const SLIDER_SECTION_1_ID = 'slider-section-1';
            const SLIDER_SECTION_1_TYPE = 'section';
            const SLIDER_SECTION_1_TITLE = 'Slider settings';
            const SLIDER_SECTION_1_DESC = '';
            const SLIDER_SECTION_1_INDENT = true;            

            const SLIDER_SECTION_POST_TYPE_ID = 'slider-post-type';
            const SLIDER_SECTION_POST_TYPE_TYPE = 'select';
            const SLIDER_SECTION_POST_TYPE_DATA = 'post_type';
            const SLIDER_SECTION_POST_TYPE_TITLE = 'Slider post type';
            const SLIDER_SECTION_POST_TYPE_DESCRIPTION = 'Please choose a post type';   
            
            const SLIDER_SECTION_PAUSE_SETTING_ID = 'slider-pause-setting';
            const SLIDER_SECTION_PAUSE_SETTING_TYPE = 'range';    
            const SLIDER_SECTION_PAUSE_SETTING_MIN = '4000';    
            const SLIDER_SECTION_PAUSE_SETTING_MAX = '20000';    
            const SLIDER_SECTION_PAUSE_SETTING_STEP = '1000';    
            const SLIDER_SECTION_PAUSE_SETTING_VALUE = '10000';         
            const SLIDER_SECTION_PAUSE_SETTING_TITLE = 'Pause setting';
            const SLIDER_SECTION_PAUSE_SETTING_DESCRIPTION = 'Please choose a pause setting';   

            const SLIDER_SECTION_2_ID = 'slider-section-2';
            const SLIDER_SECTION_2_TYPE = 'section'; 
            const SLIDER_SECTION_2_INDENT = false; 

        //home section
            const HOME_SECTION_ID = 'section-home';
            const HOME_SECTION_TITLE = 'Home';
            const HOME_SECTION_DESCRIPTION = 'Thiết lập cho trang home';

            /* gioi thieu section */

                const HOME_INTRO_SECTION_1_ID = 'home-gt-section-1';
                const HOME_INTRO_SECTION_1_TYPE = 'section';
                const HOME_INTRO_SECTION_1_TITLE = 'Giới thiệu';
                const HOME_INTRO_SECTION_1_DESCRIPTION = 'Thiết lập cho section giới thiệu';
                const HOME_INTRO_SECTION_1_INDENT = true;            

                const HOME_INTRO_SECTION_TITLE_ID = 'home-gt-title';
                const HOME_INTRO_SECTION_TITLE_TYPE = 'text';
                const HOME_INTRO_SECTION_TITLE_TITLE = 'Tiêu đề lớn';
                const HOME_INTRO_SECTION_TITLE_DESCRIPTION = '';    
                
                const HOME_INTRO_SECTION_DESCRIPTION_ID = 'home-gt-description';
                const HOME_INTRO_SECTION_DESCRIPTION_TYPE = 'editor';
                const HOME_INTRO_SECTION_DESCRIPTION_TITLE = 'Mô tả';
                const HOME_INTRO_SECTION_DESCRIPTION_DESCRIPTION = ''; 
                
                const HOME_INTRO_SECTION_GALLERY1_ID = 'home-gt-gallery1';
                const HOME_INTRO_SECTION_GALLERY1_TYPE = 'media';
                const HOME_INTRO_SECTION_GALLERY1_TITLE = 'Ảnh khổ lớn 1';
                const HOME_INTRO_SECTION_GALLERY1_DESCRIPTION = ''; 

                const HOME_INTRO_SECTION_GALLERY2_ID = 'home-gt-gallery2';
                const HOME_INTRO_SECTION_GALLERY2_TYPE = 'media';
                const HOME_INTRO_SECTION_GALLERY2_TITLE = 'Ảnh khổ lớn 2';
                const HOME_INTRO_SECTION_GALLERY2_DESCRIPTION = ''; 

                const HOME_INTRO_SECTION_GALLERY3_ID = 'home-gt-gallery3';
                const HOME_INTRO_SECTION_GALLERY3_TYPE = 'media';
                const HOME_INTRO_SECTION_GALLERY3_TITLE = 'Ảnh khổ lớn 3';
                const HOME_INTRO_SECTION_GALLERY3_DESCRIPTION = ''; 

                const HOME_INTRO_SECTION_GALLERY4_ID = 'home-gt-gallery4';
                const HOME_INTRO_SECTION_GALLERY4_TYPE = 'media';
                const HOME_INTRO_SECTION_GALLERY4_TITLE = 'Ảnh khổ lớn 4';
                const HOME_INTRO_SECTION_GALLERY4_DESCRIPTION = ''; 

                const HOME_INTRO_SECTION_2_ID = 'slider-section-2';
                const HOME_INTRO_SECTION_2_TYPE = 'section'; 
                const HOME_INTRO_SECTION_2_INDENT = false; 

            /* dich vu section */

                const HOME_SERVICE_SECTION_1_ID = 'home-dichvu-section-1';
                const HOME_SERVICE_SECTION_1_TYPE = 'section';
                const HOME_SERVICE_SECTION_1_TITLE = 'Dịch vụ';
                const HOME_SERVICE_SECTION_1_DESCRIPTION = 'Thiết lập cho section dịch vụ';
                const HOME_SERVICE_SECTION_1_INDENT = true;     
                
                const HOME_SERVICE_SECTION_TITLE_ID = 'home-dichvu-title';
                const HOME_SERVICE_SECTION_TITLE_TYPE = 'text';
                const HOME_SERVICE_SECTION_TITLE_TITLE = 'Tiêu đề lớn';
                const HOME_SERVICE_SECTION_TITLE_DESCRIPTION = '';
                
                const HOME_SERVICE_SECTION_DESCRIPTION_ID = 'home-dichvu-description';
                const HOME_SERVICE_SECTION_DESCRIPTION_TYPE = 'textarea';
                const HOME_SERVICE_SECTION_DESCRIPTION_TITLE = 'Mô tả';
                const HOME_SERVICE_SECTION_DESCRIPTION_DESCRIPTION = '';

                const HOME_SERVICE_SECTION_BANNER_ID = 'home-dichvu-banner-image';
                const HOME_SERVICE_SECTION_BANNER_TYPE = 'media';
                const HOME_SERVICE_SECTION_BANNER_TITLE = 'Ảnh banner nền';
                const HOME_SERVICE_SECTION_BANNER_DESCRIPTION = 'Mời chọn một ảnh';

                const HOME_SERVICE_SECTION_POST_TYPE_ID = 'home-dichvu-post-type';
                const HOME_SERVICE_SECTION_POST_TYPE_TYPE = 'select';
                const HOME_SERVICE_SECTION_POST_TYPE_DATA = 'post_type';
                const HOME_SERVICE_SECTION_POST_TYPE_TITLE = 'Post type dịch vụ';
                const HOME_SERVICE_SECTION_POST_TYPE_DESCRIPTION = 'Mời chọn một custom post type';

                const HOME_SERVICE_SECTION_2_ID = 'home-dichvu-2';
                const HOME_SERVICE_SECTION_2_TYPE = 'section'; 
                const HOME_SERVICE_SECTION_2_INDENT = false; 

            /* tin tuc section */

                const HOME_NEWS_SECTION_1_ID = 'home-tintuc-section-1';
                const HOME_NEWS_SECTION_1_TYPE = 'section';
                const HOME_NEWS_SECTION_1_TITLE = 'Tin tức';
                const HOME_NEWS_SECTION_1_DESCRIPTION = 'Thiết lập cho section tin tức';
                const HOME_NEWS_SECTION_1_INDENT = true;     
                
                const HOME_NEWS_SECTION_TITLE_ID = 'home-tintuc-title';
                const HOME_NEWS_SECTION_TITLE_TYPE = 'text';
                const HOME_NEWS_SECTION_TITLE_TITLE = 'Tiêu đề lớn';
                const HOME_NEWS_SECTION_TITLE_DESCRIPTION = ''; 
                
                const HOME_NEWS_SECTION_POST_TYPE_ID = 'home-tintuc-post-type';
                const HOME_NEWS_SECTION_POST_TYPE_TYPE = 'select';
                const HOME_NEWS_SECTION_POST_TYPE_DATA = 'post_type';
                const HOME_NEWS_SECTION_POST_TYPE_TITLE = 'Post type tin tức';
                const HOME_NEWS_SECTION_POST_TYPE_DESCRIPTION = 'Mời chọn một custom post type';
            
                const HOME_NEWS_SECTION_2_ID = 'home-tintuc-2';
                const HOME_NEWS_SECTION_2_TYPE = 'section'; 
                const HOME_NEWS_SECTION_2_INDENT = false; 

            /* galleries section */

                const HOME_GALLERIES_SECTION_1_ID = 'home-galleries-section-1';
                const HOME_GALLERIES_SECTION_1_TYPE = 'section';
                const HOME_GALLERIES_SECTION_1_TITLE = 'Thư viện ảnh';
                const HOME_GALLERIES_SECTION_1_DESCRIPTION = 'Thiết lập cho section thư viện ảnh';
                const HOME_GALLERIES_SECTION_1_INDENT = true;     
                
                const HOME_GALLERIES_SECTION_TITLE_ID = 'home-galleries-title';
                const HOME_GALLERIES_SECTION_TITLE_TYPE = 'text';
                const HOME_GALLERIES_SECTION_TITLE_TITLE = 'Tiêu đề lớn';
                const HOME_GALLERIES_SECTION_TITLE_DESCRIPTION = ''; 
                
                const HOME_GALLERIES_SECTION_POST_TYPE_ID = 'home-galleries-post-type';
                const HOME_GALLERIES_SECTION_POST_TYPE_TYPE = 'select';
                const HOME_GALLERIES_SECTION_POST_TYPE_DATA = 'post_type';
                const HOME_GALLERIES_SECTION_POST_TYPE_TITLE = 'Post type thư viện ảnh';
                const HOME_GALLERIES_SECTION_POST_TYPE_DESCRIPTION = 'Mời chọn một custom post type';
            
                const HOME_GALLERIES_SECTION_2_ID = 'home-galleries-2';
                const HOME_GALLERIES_SECTION_2_TYPE = 'section'; 
                const HOME_GALLERIES_SECTION_2_INDENT = false; 

            /* reviews section */

                const HOME_REVIEWS_SECTION_1_ID = 'home-reviews-section-1';
                const HOME_REVIEWS_SECTION_1_TYPE = 'section';
                const HOME_REVIEWS_SECTION_1_TITLE = 'Đánh giá';
                const HOME_REVIEWS_SECTION_1_DESCRIPTION = 'Thiết lập cho section đánh giá';
                const HOME_REVIEWS_SECTION_1_INDENT = true;     
                
                const HOME_REVIEWS_SECTION_TITLE_ID = 'home-reviews-title';
                const HOME_REVIEWS_SECTION_TITLE_TYPE = 'text';
                const HOME_REVIEWS_SECTION_TITLE_TITLE = 'Tiêu đề lớn';
                const HOME_REVIEWS_SECTION_TITLE_DESCRIPTION = ''; 
                
                const HOME_REVIEWS_SECTION_POST_TYPE_ID = 'home-reviews-post-type';
                const HOME_REVIEWS_SECTION_POST_TYPE_TYPE = 'select';
                const HOME_REVIEWS_SECTION_POST_TYPE_DATA = 'post_type';
                const HOME_REVIEWS_SECTION_POST_TYPE_TITLE = 'Post type đánh giá';
                const HOME_REVIEWS_SECTION_POST_TYPE_DESCRIPTION = 'Mời chọn một custom post type';
            
                const HOME_REVIEWS_SECTION_2_ID = 'home-reviews-2';
                const HOME_REVIEWS_SECTION_2_TYPE = 'section'; 
                const HOME_REVIEWS_SECTION_2_INDENT = false; 
                
        //footer section
            const FOOTER_SECTION_ID = 'section-footer';
            const FOOTER_SECTION_TITLE = 'Footer';
            const FOOTER_SECTION_DESCRIPTION = 'Thiết lập cho footer';

            const FOOTER_SECTION_1_ID = 'footer-section-1';
            const FOOTER_SECTION_1_TYPE = 'section';
            const FOOTER_SECTION_1_TITLE = '';
            const FOOTER_SECTION_1_DESCRIPTION = '';
            const FOOTER_SECTION_1_INDENT = true;     

            const FOOTER_SECTION_LOGO_ID = 'footer-logo';
            const FOOTER_SECTION_LOGO_TYPE = 'media';
            const FOOTER_SECTION_LOGO_TITLE = 'Footer Logo';
            const FOOTER_SECTION_LOGO_DESCRIPTION = 'Mời chọn một logo cho footer';
            
            const FOOTER_SECTION_BACKGROUND_ID = 'footer-background';
            const FOOTER_SECTION_BACKGROUND_TYPE = 'media';
            const FOOTER_SECTION_BACKGROUND_TITLE = 'Footer background';
            const FOOTER_SECTION_BACKGROUND_DESCRIPTION = 'Mời chọn một background cho footer';

            const FOOTER_SECTION_CONTACT_TITLE_ID = 'footer-contact-title';
            const FOOTER_SECTION_CONTACT_TITLE_TYPE = 'text';
            const FOOTER_SECTION_CONTACT_TITLE_TITLE = 'Tiêu đề cho cột liên hệ';
            const FOOTER_SECTION_CONTACT_TITLE_DESCRIPTION = '';

            const FOOTER_SECTION_CONTACT_ADDRESS_ID = 'footer-contact-address';
            const FOOTER_SECTION_CONTACT_ADDRESS_TYPE = 'editor';
            const FOOTER_SECTION_CONTACT_ADDRESS_TITLE = 'Thông tin địa chỉ liên hệ';
            const FOOTER_SECTION_CONTACT_ADDRESS_DESCRIPTION = '';

            const FOOTER_SECTION_CONTACT_PHONE_ID = 'footer-contact-phone';
            const FOOTER_SECTION_CONTACT_PHONE_TYPE = 'text';
            const FOOTER_SECTION_CONTACT_PHONE_TITLE = 'Số điện thoại liên hệ';
            const FOOTER_SECTION_CONTACT_PHONE_DESCRIPTION = '';

            const FOOTER_SECTION_CONTACT_EMAIL_ID = 'footer-contact-email';
            const FOOTER_SECTION_CONTACT_EMAIL_TYPE = 'text';
            const FOOTER_SECTION_CONTACT_EMAIL_TITLE = 'Email liên hệ';
            const FOOTER_SECTION_CONTACT_EMAIL_DESCRIPTION = '';

            const FOOTER_SECTION_FANPAGE_TITLE_ID = 'footer-contact-fanpage-title';
            const FOOTER_SECTION_FANPAGE_TITLE_TYPE = 'text';
            const FOOTER_SECTION_FANPAGE_TITLE_TITLE = 'Tiêu đề cho cột fanpage';
            const FOOTER_SECTION_FANPAGE_TITLE_DESCRIPTION = '';
            
            const FOOTER_SECTION_2_ID = 'footer-section-2';
            const FOOTER_SECTION_2_TYPE = 'section'; 
            const FOOTER_SECTION_2_INDENT = false; 
        
        
        // testimolates section

            const TESTIMOLATES_SECTION_ID = 'section-testimolates';
            const TESTIMOLATES_SECTION_TITLE = 'Testimolates';
            const TESTIMOLATES_SECTION_DESCRIPTION = 'All testimolates settings';

            const TESTIMOLATES_SECTION_1_ID = 'testimolates-section-1';
            const TESTIMOLATES_SECTION_1_TYPE = 'section';
            const TESTIMOLATES_SECTION_1_TITLE = 'Testimolates settings';
            const TESTIMOLATES_SECTION_1_DESC = '';
            const TESTIMOLATES_SECTION_1_INDENT = true;            

            const TESTIMOLATES_SECTION_POST_TYPE_ID = 'testimolates-post-type';
            const TESTIMOLATES_SECTION_POST_TYPE_TYPE = 'select';
            const TESTIMOLATES_SECTION_POST_TYPE_DATA = 'post_type';
            const TESTIMOLATES_SECTION_POST_TYPE_TITLE = 'Testimolates post type';
            const TESTIMOLATES_SECTION_POST_TYPE_DESCRIPTION = 'Please choose a post type';        

            const TESTIMOLATES_SECTION_2_ID = 'testimolates-section-2';
            const TESTIMOLATES_SECTION_2_TYPE = 'section'; 
            const TESTIMOLATES_SECTION_2_INDENT = false; 


       // contact form   

            const CONTACT_FORM_SECTION_ID = 'section-contact-form';      
            const CONTACT_FORM_SECTION_TITLE = 'Contact Form';
            const CONTACT_FORM_SECTION_DESCRIPTION = 'All contact form settings';
            
            const CONTACT_FORM_SECTION_1_ID = 'contactform-section-1';
            const CONTACT_FORM_SECTION_1_TYPE = 'section';
            const CONTACT_FORM_SECTION_1_TITLE = 'Contact form settings';
            const CONTACT_FORM_SECTION_1_DESCRIPTION = '';
            const CONTACT_FORM_SECTION_1_INDENT = true;

            const CONTACT_FORM_EMAIL_ADDRESS_ID = 'contactform-email-address';
            const CONTACT_FORM_EMAIL_ADDRESS_TYPE = 'text';
            const CONTACT_FORM_EMAIL_ADDRESS_TITLE = 'Email ( customer information to send this )';
            const CONTACT_FORM_EMAIL_ADDRESS_DESCRIPTION = 'Please fill out validate email address';

            const CONTACT_FORM_EMAIL_NAME_ID = 'contactform-email-name';
            const CONTACT_FORM_EMAIL_NAME_TYPE = 'text';
            const CONTACT_FORM_EMAIL_NAME_TITLE = 'Default email name';
            const CONTACT_FORM_EMAIL_NAME_DESCRIPTION = '';

            const CONTACT_FORM_LAST_NAME_ID = 'contactform-last-name';
            const CONTACT_FORM_LAST_NAME_TYPE = 'text';
            const CONTACT_FORM_LAST_NAME_TITLE = 'Admin last name';
            const CONTACT_FORM_LAST_NAME_DESCRIPTION = '';

            const CONTACT_FORM_CIVILITY_ID = 'contactform-civility';
            const CONTACT_FORM_CIVILITY_TYPE = 'text';
            const CONTACT_FORM_CIVILITY_TITLE = 'Admin civility';
            const CONTACT_FORM_CIVILITY_DESCRIPTION = '';

            const CONTACT_FORM_SMTP_HOST_ID = 'contactform-smtp-host';
            const CONTACT_FORM_SMTP_HOST_TYPE = 'text';
            const CONTACT_FORM_SMTP_HOST_TITLE = 'SMTP address';
            const CONTACT_FORM_SMTP_HOST_DESCRIPTION = '';

            const CONTACT_FORM_SMTP_PORT_ID = 'contactform-smtp-port';
            const CONTACT_FORM_SMTP_PORT_TYPE = 'text';
            const CONTACT_FORM_SMTP_PORT_TITLE = 'SMTP port';
            const CONTACT_FORM_SMTP_PORT_DESCRIPTION = '';

            const CONTACT_FORM_SMTP_ENCRYPTION_ID = 'contactform-smtp-encryption';
            const CONTACT_FORM_SMTP_ENCRYPTION_TYPE = 'select';
            const CONTACT_FORM_SMTP_ENCRYPTION_TITLE = 'SMTP encryption';
            const CONTACT_FORM_SMTP_ENCRYPTION_DESCRIPTION = '';

            const CONTACT_FORM_SMTP_ENCRYPTION_NO_ENCRYPTION_VALUE = 'none';
            const CONTACT_FORM_SMTP_ENCRYPTION_NO_ENCRYPTION_LABEL = 'No encryption';

            const CONTACT_FORM_SMTP_ENCRYPTION_SSL_VALUE = 'ssl';
            const CONTACT_FORM_SMTP_ENCRYPTION_SSL_LABEL = 'SSL';

            const CONTACT_FORM_SMTP_ENCRYPTION_TLS_VALUE = 'tls';
            const CONTACT_FORM_SMTP_ENCRYPTION_TLS_LABEL = 'TLS';

            const CONTACT_FORM_AUTHENTICATION_USERNAME_ID = 'contactform-authentication-username';
            const CONTACT_FORM_AUTHENTICATION_USERNAME_TYPE = 'text';
            const CONTACT_FORM_AUTHENTICATION_USERNAME_TITLE = 'Username';
            const CONTACT_FORM_AUTHENTICATION_USERNAME_DESCRIPTION = 'SMTP username';

            const CONTACT_FORM_AUTHENTICATION_PASSWORD_ID = 'contactform-authentication-password';
            const CONTACT_FORM_AUTHENTICATION_PASSWORD_TYPE = 'text';
            const CONTACT_FORM_AUTHENTICATION_PASSWORD_TITLE = 'Password';
            const CONTACT_FORM_AUTHENTICATION_PASSWORD_DESCRIPTION = 'SMTP password';

            const CONTACT_FORM_SECTION_2_ID = 'contactform-section-2';      
            const CONTACT_FORM_SECTION_2_TYPE = 'section';    
            const CONTACT_FORM_SECTION_2_INDENT = false;


    }