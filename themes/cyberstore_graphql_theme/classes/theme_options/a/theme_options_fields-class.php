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

            /*const HEADER_SECTION_LOGO_IMAGE_MOBILE_ID = 'logo-image-mobile';
            const HEADER_SECTION_LOGO_IMAGE_MOBILE_TYPE = 'media';
            const HEADER_SECTION_LOGO_IMAGE_MOBILE_TITLE = 'Logo Mobile website';
            const HEADER_SECTION_LOGO_IMAGE_MOBILE_DESCRIPTION = 'Please choose logo mobile website image';

            const HEADER_SECTION_LOGO_FOOTER_ID = 'logo-footer';
            const HEADER_SECTION_LOGO_FOOTER_TYPE = 'media';
            const HEADER_SECTION_LOGO_FOOTER_TITLE = 'Logo Footer website';
            const HEADER_SECTION_LOGO_FOOTER_DESCRIPTION = 'Please choose logo mobile website image';*/

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

            const SOCIAL_NETWORK_SECTION_LINKEDIN_URL_ID = 'linkedin-url';
            const SOCIAL_NETWORK_SECTION_LINKEDIN_URL_TYPE = 'text';
            const SOCIAL_NETWORK_SECTION_LINKEDIN_URL_TITLE = 'Linkedin Url';
            const SOCIAL_NETWORK_SECTION_LINKEDIN_URL_DESCRIPTION = 'Please enter Linkedin url';  

            const SOCIAL_NETWORK_SECTION_PINTEREST_URL_ID = 'pinterest-url';
            const SOCIAL_NETWORK_SECTION_PINTEREST_URL_TYPE = 'text';
            const SOCIAL_NETWORK_SECTION_PINTEREST_URL_TITLE = 'Pinterest Url';
            const SOCIAL_NETWORK_SECTION_PINTEREST_URL_DESCRIPTION = 'Please enter Pinterest url';  
         

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

            const CTINFO_SECTION_CONTACT_PHONE_ID = 'ctinfo-contact-phone';
            const CTINFO_SECTION_CONTACT_PHONE_TYPE = 'text';
            const CTINFO_SECTION_CONTACT_PHONE_TITLE = 'Phone contact';
            const CTINFO_SECTION_CONTACT_PHONE_DESCRIPTION = '';

            const CTINFO_SECTION_CONTACT_PHONE_URL_ID = 'ctinfo-contact-phone-url';
            const CTINFO_SECTION_CONTACT_PHONE_URL_TYPE = 'text';
            const CTINFO_SECTION_CONTACT_PHONE_URL_TITLE = 'Phone contact url';
            const CTINFO_SECTION_CONTACT_PHONE_URL_DESCRIPTION = '';

            const CTINFO_SECTION_GMAP_ID = 'ctinfo-gmap';
            const CTINFO_SECTION_GMAP_TYPE = 'textarea';
            const CTINFO_SECTION_GMAP_TITLE = 'Google map';
            const CTINFO_SECTION_GMAP_DESCRIPTION = '';
          
            const CTINFO_SECTION_COPYRIGHT_ID = 'ctinfo-copyright';
            const CTINFO_SECTION_COPYRIGHT_TYPE = 'editor';
            const CTINFO_SECTION_COPYRIGHT_TITLE = 'Copyright';
            const CTINFO_SECTION_COPYRIGHT_DESCRIPTION = '';
            
            const CTINFO_SECTION_2_ID = 'ctinfo-section-2';
            const CTINFO_SECTION_2_TYPE = 'section'; 
            const CTINFO_SECTION_2_INDENT = false; 

        // sales off section
            const SALES_OFF_SECTION_ID = 'section-sales-off';
            const SALES_OFF_SECTION_TITLE = 'Sales off';
            const SALES_OFF_SECTION_DESCRIPTION = 'All sales off box settings';

            const SALES_OFF_SECTION_1_ID = 'salesoff-section-1';
            const SALES_OFF_SECTION_1_TYPE = 'section';
            const SALES_OFF_SECTION_1_TITLE = 'Thiết lập mục Sales off ở trang chủ';
            const SALES_OFF_SECTION_1_DESC = '';
            const SALES_OFF_SECTION_1_INDENT = true; 

            const SALES_OFF_SECTION_BANNER_ID = 'salesoff-image';
            const SALES_OFF_SECTION_BANNER_TYPE = 'media';
            const SALES_OFF_SECTION_BANNER_TITLTE = 'Sales off banner';
            const SALES_OFF_SECTION_BANNER_DESCRIPTION = 'Mời chọn một ảnh banner';

            const SALES_OFF_SECTION_HEADING_ID = 'salesoff-heading';
            const SALES_OFF_SECTION_HEADING_TYPE = 'text';
            const SALES_OFF_SECTION_HEADING_TITLTE = 'Sales off heading';
            const SALES_OFF_SECTION_HEADING_DESCRIPTION = 'Mời nhập heading';

            const SALES_OFF_SECTION_SUBHEADING_ID = 'salesoff-subheading';
            const SALES_OFF_SECTION_SUBHEADING_TYPE = 'text';
            const SALES_OFF_SECTION_SUBHEADING_TITLE = 'Sales off subheading';
            const SALES_OFF_SECTION_SUBHEADING_DESCRIPTION = 'Mời nhập subheading';

            const SALES_OFF_SECTION_BUTTON_TEXT_ID = 'salesoff-button-text';
            const SALES_OFF_SECTION_BUTTON_TEXT_TYPE = 'text';
            const SALES_OFF_SECTION_BUTTON_TEXT_TITLE = 'Sales off button text';
            const SALES_OFF_SECTION_BUTTON_TEXT_DESCRIPTION = 'Mời nhập text cho button';
            
            const SALES_OFF_SECTION_BUTTON_URL_ID = 'salesoff-button-url';
            const SALES_OFF_SECTION_BUTTON_URL_TYPE = 'text';
            const SALES_OFF_SECTION_BUTTON_URL_TITLE = 'Sales off button url';
            const SALES_OFF_SECTION_BUTTON_URL_DESCRIPTION = 'Mời nhập url cho button';
       
            const SALES_OFF_SECTION_2_ID = 'salesoff-section-2';
            const SALES_OFF_SECTION_2_TYPE = 'section'; 
            const SALES_OFF_SECTION_2_INDENT = false; 

        // promotion section
            const PROMOTION_SECTION_ID = 'section-promotion';
            const PROMOTION_SECTION_TITLE = 'Promotion';
            const PROMOTION_SECTION_DESCRIPTION = 'All promotion box settings';

            const PROMOTION_SECTION_1_ID = 'promotion-section-1';
            const PROMOTION_SECTION_1_TYPE = 'section';
            const PROMOTION_SECTION_1_TITLE = 'Promotion box on homepage';
            const PROMOTION_SECTION_1_DESC = '';
            const PROMOTION_SECTION_1_INDENT = true; 

            const PROMOTION_SECTION_HTML_ID = 'promotion-html';
            const PROMOTION_SECTION_HTML_TYPE = 'editor';
            const PROMOTION_SECTION_HTML_TITLE = 'Promotion';
            const PROMOTION_SECTION_HTML_DESCRIPTION = '';

            const PROMOTION_SECTION_2_ID = 'promotion-section-2';
            const PROMOTION_SECTION_2_TYPE = 'section'; 
            const PROMOTION_SECTION_2_INDENT = false; 

        // delivery section
            const DELIVERY_SECTION_ID = 'section-delivery';
            const DELIVERY_SECTION_TITLE = 'Delivery';
            const DELIVERY_SECTION_DESCRIPTION = 'All delivery box settings';

            // box 1

                const DELIVERY_SECTION_BOX1_ID = 'delivery-section-box1';
                const DELIVERY_SECTION_BOX1_TYPE = 'section';
                const DELIVERY_SECTION_BOX1_TITLE = 'Box 1 settings';
                const DELIVERY_SECTION_BOX1_DESC = '';
                const DELIVERY_SECTION_BOX1_INDENT = true; 
            

                    const DELIVERY_SECTION_BOX1_IMAGE_ID = 'delivery-box-1-image';
                    const DELIVERY_SECTION_BOX1_IMAGE_TYPE = 'media';
                    const DELIVERY_SECTION_BOX1_IMAGE_TITLE = 'Image';
                    const DELIVERY_SECTION_BOX1_IMAGE_DESCRIPTION = 'Please choose an image';

                    const DELIVERY_SECTION_BOX1_HEADING_ID = 'delivery-box-1-heading';
                    const DELIVERY_SECTION_BOX1_HEADING_TYPE = 'text';
                    const DELIVERY_SECTION_BOX1_HEADING_TITLE = 'Heading';
                    const DELIVERY_SECTION_BOX1_HEADING_DESCRIPTION = 'Please enter a heading';
                    
                    const DELIVERY_SECTION_BOX1_HOTLINE_ID = 'delivery-box-1-hotline';
                    const DELIVERY_SECTION_BOX1_HOTLINE_TYPE = 'text';
                    const DELIVERY_SECTION_BOX1_HOTLINE_TITLE = 'Hotline';
                    const DELIVERY_SECTION_BOX1_HOTLINE_DESCRIPTION = 'Please enter a hotline';

                    const DELIVERY_SECTION_BOX1_HOTLINE_URL_ID = 'delivery-box-1-hotline-url';
                    const DELIVERY_SECTION_BOX1_HOTLINE_URL_TYPE = 'text';
                    const DELIVERY_SECTION_BOX1_HOTLINE_URL_TITLE = 'Hotline url';
                    const DELIVERY_SECTION_BOX1_HOTLINE_URL_DESCRIPTION = 'Please enter a hotline url';

                const DELIVERY_SECTION_BOX1_END_ID = 'delivery-section-box1-end';
                const DELIVERY_SECTION_BOX1_END_TYPE = 'section'; 
                const DELIVERY_SECTION_BOX1_END_INDENT = false; 

            // box 2

                const DELIVERY_SECTION_BOX2_ID = 'delivery-section-box2';
                const DELIVERY_SECTION_BOX2_TYPE = 'section';   
                const DELIVERY_SECTION_BOX2_TITLE = 'Box 2 settings';  
                const DELIVERY_SECTION_BOX2_DESC = '';
                const DELIVERY_SECTION_BOX2_INDENT = true; 

                    const DELIVERY_SECTION_BOX2_IMAGE_ID = 'delivery-box-2-image';
                    const DELIVERY_SECTION_BOX2_IMAGE_TYPE = 'media';
                    const DELIVERY_SECTION_BOX2_IMAGE_TITLE = 'Image';
                    const DELIVERY_SECTION_BOX2_IMAGE_DESCRIPTION = 'Please choose an image';

                    const DELIVERY_SECTION_BOX2_HEADING_ID = 'delivery-box-2-heading';
                    const DELIVERY_SECTION_BOX2_HEADING_TYPE = 'text';
                    const DELIVERY_SECTION_BOX2_HEADING_TITLE = 'Heading';
                    const DELIVERY_SECTION_BOX2_HEADING_DESCRIPTION = 'Please enter a heading';

                    const DELIVERY_SECTION_BOX2_SUBHEADING_ID = 'delivery-box-2-subheading';
                    const DELIVERY_SECTION_BOX2_SUBHEADING_TYPE = 'text';
                    const DELIVERY_SECTION_BOX2_SUBHEADING_TITLE = 'Subheading';
                    const DELIVERY_SECTION_BOX2_SUBHEADING_DESCRIPTION = 'Please enter a subheading';

                const DELIVERY_SECTION_BOX2_END_ID = 'delivery-section-box2-end';
                const DELIVERY_SECTION_BOX2_END_TYPE = 'section'; 
                const DELIVERY_SECTION_BOX2_END_INDENT = false;         

            // box 3

                const DELIVERY_SECTION_BOX3_ID = 'delivery-section-box3';
                const DELIVERY_SECTION_BOX3_TYPE = 'section';   
                const DELIVERY_SECTION_BOX3_TITLE = 'Box 2 settings';  
                const DELIVERY_SECTION_BOX3_DESC = '';
                const DELIVERY_SECTION_BOX3_INDENT = true; 

                    const DELIVERY_SECTION_BOX3_IMAGE_ID = 'delivery-box-3-image';
                    const DELIVERY_SECTION_BOX3_IMAGE_TYPE = 'media';
                    const DELIVERY_SECTION_BOX3_IMAGE_TITLE = 'Image';
                    const DELIVERY_SECTION_BOX3_IMAGE_DESCRIPTION = 'Please choose an image';

                    const DELIVERY_SECTION_BOX3_HEADING_ID = 'delivery-box-3-heading';
                    const DELIVERY_SECTION_BOX3_HEADING_TYPE = 'text';
                    const DELIVERY_SECTION_BOX3_HEADING_TITLE = 'Heading';
                    const DELIVERY_SECTION_BOX3_HEADING_DESCRIPTION = 'Please enter a heading';
                    
                    const DELIVERY_SECTION_BOX3_SUBHEADING_ID = 'delivery-box-3-subheading';
                    const DELIVERY_SECTION_BOX3_SUBHEADING_TYPE = 'text';
                    const DELIVERY_SECTION_BOX3_SUBHEADING_TITLE = 'Subheading';
                    const DELIVERY_SECTION_BOX3_SUBHEADING_DESCRIPTION = 'Please enter a subheading';
                    
                    const DELIVERY_SECTION_BOX3_SUBHEADING_URL_ID = 'delivery-box-3-subheading-url';
                    const DELIVERY_SECTION_BOX3_SUBHEADING_URL_TYPE = 'text';
                    const DELIVERY_SECTION_BOX3_SUBHEADING_URL_TITLE = 'Subheading url';
                    const DELIVERY_SECTION_BOX3_SUBHEADING_URL_DESCRIPTION = 'Please enter a subheading url';

                const DELIVERY_SECTION_BOX3_END_ID = 'delivery-section-box3-end';
                const DELIVERY_SECTION_BOX3_END_TYPE = 'section'; 
                const DELIVERY_SECTION_BOX3_END_INDENT = false; 

        // payment section
            const PAYMENT_SECTION_ID = 'section-payments';
            const PAYMENT_SECTION_TITLE = 'Payments';
            const PAYMENT_SECTION_DESCRIPTION = 'All payments box settings';

            const PAYMENT_SECTION_1_ID = 'payments-section-1';
            const PAYMENT_SECTION_1_TYPE = 'section';
            const PAYMENT_SECTION_1_TITLE = 'Payments images';
            const PAYMENT_SECTION_1_DESC = '';
            const PAYMENT_SECTION_1_INDENT = true; 

                const PAYMENT_VISA_IMAGE_ID = 'payment-visa-image';
                const PAYMENT_VISA_IMAGE_TYPE = 'media';
                const PAYMENT_VISA_IMAGE_TITLE = 'Visa image';
                const PAYMENT_VISA_IMAGE_DESCRIPTION = '';

                const PAYMENT_MASTERCARD_IMAGE_ID = 'payment-mastercard-image';
                const PAYMENT_MASTERCARD_IMAGE_TYPE = 'media';
                const PAYMENT_MASTERCARD_IMAGE_TITLE = 'Mastercard image';
                const PAYMENT_MASTERCARD_IMAGE_DESCRIPTION = '';

                const PAYMENT_PAYPAL_IMAGE_ID = 'payment-paypal-image';
                const PAYMENT_PAYPAL_IMAGE_TYPE = 'media';
                const PAYMENT_PAYPAL_IMAGE_TITLE = 'Paypal image';
                const PAYMENT_PAYPAL_IMAGE_DESCRIPTION = '';

                const PAYMENT_WESTERN_UNION_IMAGE_ID = 'payment-western-union-image';
                const PAYMENT_WESTERN_UNION_IMAGE_TYPE = 'media';
                const PAYMENT_WESTERN_UNION_IMAGE_TITLE = 'Western Union image';
                const PAYMENT_WESTERN_UNION_IMAGE_DESCRIPTION = '';

            const PAYMENT_SECTION_2_ID = 'payments-section-2';
            const PAYMENT_SECTION_2_TYPE = 'section'; 
            const PAYMENT_SECTION_2_INDENT = false; 

       
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