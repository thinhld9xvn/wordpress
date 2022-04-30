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

            const HEADER_SECTION_LOGO_FOOTER_ID = 'logo-footer';
            const HEADER_SECTION_LOGO_FOOTER_TYPE = 'media';
            const HEADER_SECTION_LOGO_FOOTER_TITLE = 'Logo Footer website';
            const HEADER_SECTION_LOGO_FOOTER_DESCRIPTION = 'Please choose logo mobile website image';

            const HEADER_SECTION_2_ID = 'header-section-2';
            const HEADER_SECTION_2_TYPE = 'section'; 
            const HEADER_SECTION_2_INDENT = false;     

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
            
            const SOCIAL_NETWORK_SECTION_TWITTER_URL_ID = 'twitter-url';
            const SOCIAL_NETWORK_SECTION_TWITTER_URL_TYPE = 'text';
            const SOCIAL_NETWORK_SECTION_TWITTER_URL_TITLE = 'Twitter Url';
            const SOCIAL_NETWORK_SECTION_TWITTER_URL_DESCRIPTION = 'Please enter Twitter url';
            
            const SOCIAL_NETWORK_SECTION_INSTAGRAM_URL_ID = 'instagram-url';
            const SOCIAL_NETWORK_SECTION_INSTAGRAM_URL_TYPE = 'text';
            const SOCIAL_NETWORK_SECTION_INSTAGRAM_URL_TITLE = 'Instagram Url';
            const SOCIAL_NETWORK_SECTION_INSTAGRAM_URL_DESCRIPTION = 'Please enter Instagram url';  

            const SOCIAL_NETWORK_SECTION_YOUTUBE_URL_ID = 'youtube-url';
            const SOCIAL_NETWORK_SECTION_YOUTUBE_URL_TYPE = 'text';
            const SOCIAL_NETWORK_SECTION_YOUTUBE_URL_TITLE = 'Youtube Url';
            const SOCIAL_NETWORK_SECTION_YOUTUBE_URL_DESCRIPTION = 'Please enter Youtube url';  

            const SOCIAL_NETWORK_SECTION_BEHANCE_URL_ID = 'behance-url';
            const SOCIAL_NETWORK_SECTION_BEHANCE_URL_TYPE = 'text';
            const SOCIAL_NETWORK_SECTION_BEHANCE_URL_TITLE = 'Behance Url';
            const SOCIAL_NETWORK_SECTION_BEHANCE_URL_DESCRIPTION = 'Please enter Behance url';

            const SOCIAL_NETWORK_SECTION_DRB_URL_ID = 'drb-url';
            const SOCIAL_NETWORK_SECTION_DRB_URL_TYPE = 'text';
            const SOCIAL_NETWORK_SECTION_DRB_URL_TITLE = 'Drb Url';
            const SOCIAL_NETWORK_SECTION_DRB_URL_DESCRIPTION = 'Please enter Drb url';
         

            const SOCIAL_NETWORK_SECTION_2_ID = 'social-network-section-2';
            const SOCIAL_NETWORK_SECTION_2_TYPE = 'section'; 
            const SOCIAL_NETWORK_SECTION_2_INDENT = false; 
        
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
                
        //CTINFO section
            const CTINFO_SECTION_ID = 'section-ctinfo';
            const CTINFO_SECTION_TITLE = 'Contact information';
            const CTINFO_SECTION_DESCRIPTION = 'Thiết lập thông tin công ty hoặc tổ chức';

            const CTINFO_SECTION_1_ID = 'ctinfo-section-1';
            const CTINFO_SECTION_1_TYPE = 'section';
            const CTINFO_SECTION_1_TITLE = '';
            const CTINFO_SECTION_1_DESCRIPTION = '';
            const CTINFO_SECTION_1_INDENT = true;  

            const CTINFO_SECTION_DESCRIPTION_ID = 'ctinfo-description';
            const CTINFO_SECTION_DESCRIPTION_TYPE = 'textarea';
            const CTINFO_SECTION_DESCRIPTION_TITLE = 'Vài dòng mô tả ngắn';
            const CTINFO_SECTION_DESCRIPTION_DESCRIPTION = '';

            const CTINFO_SECTION_CONTACT_ADDRESS_ID = 'ctinfo-contact-address';
            const CTINFO_SECTION_CONTACT_ADDRESS_TYPE = 'textarea';
            const CTINFO_SECTION_CONTACT_ADDRESS_TITLE = 'Thông tin địa chỉ liên hệ';
            const CTINFO_SECTION_CONTACT_ADDRESS_DESCRIPTION = '';

            const CTINFO_SECTION_CONTACT_PHONE_ID = 'ctinfo-contact-phone';
            const CTINFO_SECTION_CONTACT_PHONE_TYPE = 'text';
            const CTINFO_SECTION_CONTACT_PHONE_TITLE = 'Số điện thoại liên hệ';
            const CTINFO_SECTION_CONTACT_PHONE_DESCRIPTION = '';

            const CTINFO_SECTION_CONTACT_PHONE_URL_ID = 'ctinfo-contact-phone-url';
            const CTINFO_SECTION_CONTACT_PHONE_URL_TYPE = 'text';
            const CTINFO_SECTION_CONTACT_PHONE_URL_TITLE = 'Số điện thoại liên hệ dạng url';
            const CTINFO_SECTION_CONTACT_PHONE_URL_DESCRIPTION = '';

            const CTINFO_SECTION_CONTACT_EMAIL_ID = 'ctinfo-contact-email';
            const CTINFO_SECTION_CONTACT_EMAIL_TYPE = 'text';
            const CTINFO_SECTION_CONTACT_EMAIL_TITLE = 'Email liên hệ';
            const CTINFO_SECTION_CONTACT_EMAIL_DESCRIPTION = '';

            const CTINFO_SECTION_GMAP_ID = 'ctinfo-gmap';
            const CTINFO_SECTION_GMAP_TYPE = 'textarea';
            const CTINFO_SECTION_GMAP_TITLE = 'Google map';
            const CTINFO_SECTION_GMAP_DESCRIPTION = '';

            const CTINFO_FB_CHAT_MESSENGER_ID = 'chat-messenger';
            const CTINFO_FB_CHAT_MESSENGER_TYPE = 'textarea';
            const CTINFO_FB_CHAT_MESSENGER_TITLE = 'Chat Messenger';
            const CTINFO_FB_CHAT_MESSENGER_DESCRIPTION = '';
            
            const CTINFO_SECTION_COPYRIGHT_ID = 'ctinfo-copyright';
            const CTINFO_SECTION_COPYRIGHT_TYPE = 'editor';
            const CTINFO_SECTION_COPYRIGHT_TITLE = 'Copyright';
            const CTINFO_SECTION_COPYRIGHT_DESCRIPTION = '';
            
            const CTINFO_SECTION_2_ID = 'ctinfo-section-2';
            const CTINFO_SECTION_2_TYPE = 'section'; 
            const CTINFO_SECTION_2_INDENT = false; 

        // stories section
        
            const STORIES_SECTION_ID = 'section-stories';
            const STORIES_SECTION_TITLE = 'Stories';
            const STORIES_SECTION_DESCRIPTION = 'All stories settings';

            const STORIES_SECTION_1_ID = 'stories-section-1';
            const STORIES_SECTION_1_TYPE = 'section'; 
            const STORIES_SECTION_1_TITLE = 'Stories settings';           
            const STORIES_SECTION_1_DESCRIPTION = ''; 
            const STORIES_SECTION_1_INDENT = true;  

            const STORIES_LABEL_ID = 'stories-section-label';
            const STORIES_LABEL_TYPE = 'text';
            const STORIES_LABEL_TITLE = 'Label';
            const STORIES_LABEL_DESCRIPTION = '';

            const STORIES_HEADING_ID = 'stories-section-heading';
            const STORIES_HEADING_TYPE = 'text';
            const STORIES_HEADING_TITLE = 'Heading';
            const STORIES_HEADING_DESCRIPTION = '';          
            
            const STORIES_DESCRIPTION_ID = 'stories-section-description';
            const STORIES_DESCRIPTION_TYPE = 'editor';
            const STORIES_DESCRIPTION_TITLE = 'Description';
            const STORIES_DESCRIPTION_DESCRIPTION = '';          
       
            const STORIES_SECTION_2_ID = 'stories-section-2';
            const STORIES_SECTION_2_TYPE = 'section'; 
            const STORIES_SECTION_2_INDENT = false; 


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