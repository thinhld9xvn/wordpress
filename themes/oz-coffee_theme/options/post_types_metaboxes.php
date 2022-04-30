<?php 

$this->metaboxes[] = array(

    'id' => 'custom-pt-metabox-slider',

    'title' => 'Slider options',

    'desc' => '',

    'where_show_on' => 'slider',

    'fields' => array(

        array(

            'id' => 'pt-field-slider-breadcrumbs-label',

            'title' => 'Breadcrumbs Label',

            'desc' => '',               

            'type' => 'text'

        ),              
        
        array(

            'id' => 'pt-field-slider-description',

            'title' => 'Description',

            'desc' => '',               

            'type' => 'text'

        ),       
        
        array(

            'id' => 'pt-field-slider-button-text',

            'title' => 'Button text',

            'desc' => '',               

            'type' => 'text'

        ),       

        array(

            'id' => 'pt-field-slider-button-url',

            'title' => 'Button url',

            'desc' => '',               

            'type' => 'text'

        ),       

    )
);

$this->metaboxes[] = array(

    'id' => 'custom-pt-metabox-testimolates',

    'title' => 'Testimolates options',

    'desc' => '',

    'where_show_on' => 'testimolates',

    'fields' => array(

        array(

            'id' => 'pt-field-testimolates-avatar',

            'title' => 'Avatar',

            'desc' => '',               

            'type' => 'media'

        ),                   
        
        array(

            'id' => 'pt-field-testimolates-jobtitle',

            'title' => 'Job Title',

            'desc' => '',               

            'type' => 'text'

        ),                   

    )
);

$this->metaboxes[] = array(

    'id' => 'custom-pt-metabox-services',

    'title' => 'Service options',

    'desc' => '',

    'where_show_on' => 'dich-vu',

    'fields' => array(

        array(

            'id' => 'pt-field-service-icon',

            'title' => 'Icon',

            'desc' => '',               

            'type' => 'media'

        ),
        
        array(

            'id' => 'pt-field-service-heading',

            'title' => 'Tiêu đề khổ lớn',

            'desc' => '',               

            'type' => 'text'

        ),
        
        array(

            'id' => 'pt-field-service-panel-content',

            'title' => 'Nội dung bên trái video',

            'desc' => '',               

            'type' => 'editor'

        ),
        
        array(

            'id' => 'pt-field-service-panel-video-image',

            'title' => 'Ảnh nền video',

            'desc' => '',               

            'type' => 'media'

        ),
        
        array(

            'id' => 'pt-field-service-panel-video-url',

            'title' => 'Link video',

            'desc' => '',               

            'type' => 'text'

        ),
        
        array(

            'id' => 'pt-field-service-extra-contents',

            'title' => 'Nội dung bổ sung thêm nếu có (hiển thị dưới nội dung video)',

            'desc' => '',               

            'type' => 'editor'

        )           

    )
);

$this->metaboxes[] = array(

    'id' => 'custom-pt-metabox-services-slider1',

    'title' => 'Thiết lập cho slider thứ nhất',

    'desc' => '',

    'where_show_on' => 'dich-vu',

    'fields' => array(        
     
        array(

            'id' => 'pt-field-service-carousel1-large-image',

            'title' => 'Ảnh khổ lớn',

            'desc' => '',  

            'type' => 'media'                
        ),

        array(

            'id' => 'pt-field-service-carousel1-above-image',

            'title' => 'Ảnh khổ nhỏ thuộc hàng trên',

            'desc' => '',  

            'type' => 'media'                
        ),

        array(

            'id' => 'pt-field-service-carousel1-below-image',

            'title' => 'Ảnh khổ nhỏ thuộc hàng dưới',

            'desc' => '',  

            'type' => 'media'                
        ),

        array(

            'id' => 'pt-field-service-carousel1-above-title',

            'title' => 'Tiêu đề lớn thuộc hàng trên',

            'desc' => '',  

            'type' => 'text'                
        ),

        array(

            'id' => 'pt-field-service-carousel1-above-description',

            'title' => 'Phần mô tả thuộc hàng trên',

            'desc' => '',  

            'type' => 'textarea'                
        ),

        array(

            'id' => 'pt-field-service-carousel1-above-button-text',

            'title' => 'Nhãn Button thuộc hàng trên',

            'desc' => '',  

            'type' => 'text'                
        ),

        array(

            'id' => 'pt-field-service-carousel1-above-button-url',

            'title' => 'Url Button thuộc hàng trên',

            'desc' => '',  

            'type' => 'text'                
        ),

        //

        array(

            'id' => 'pt-field-service-carousel1-below-title',

            'title' => 'Tiêu đề lớn thuộc hàng dưới',

            'desc' => '',  

            'type' => 'text'                
        ),

        array(

            'id' => 'pt-field-service-carousel1-below-description',

            'title' => 'Phần mô tả thuộc hàng dưới',

            'desc' => '',  

            'type' => 'textarea'                
        ),

        array(

            'id' => 'pt-field-service-carousel1-below-button-text',

            'title' => 'Nhãn Button thuộc hàng dưới',

            'desc' => '',  

            'type' => 'text'                
        ),

        array(

            'id' => 'pt-field-service-carousel1-below-button-url',

            'title' => 'Url Button thuộc hàng dưới',

            'desc' => '',  

            'type' => 'text'                
        ),

    )
);

$this->metaboxes[] = array(

    'id' => 'custom-pt-metabox-services-slider2',

    'title' => 'Thiết lập cho slider thứ hai',

    'desc' => '',

    'where_show_on' => 'dich-vu',

    'fields' => array(        
     
        array(

            'id' => 'pt-field-service-carousel2-large-image',

            'title' => 'Ảnh khổ lớn',

            'desc' => '',  

            'type' => 'media'                
        ),

        array(

            'id' => 'pt-field-service-carousel2-above-image',

            'title' => 'Ảnh khổ nhỏ thuộc hàng trên',

            'desc' => '',  

            'type' => 'media'                
        ),

        array(

            'id' => 'pt-field-service-carousel2-below-image',

            'title' => 'Ảnh khổ nhỏ thuộc hàng dưới',

            'desc' => '',  

            'type' => 'media'                
        ),

        array(

            'id' => 'pt-field-service-carousel2-above-title',

            'title' => 'Tiêu đề lớn thuộc hàng trên',

            'desc' => '',  

            'type' => 'text'                
        ),

        array(

            'id' => 'pt-field-service-carousel2-above-description',

            'title' => 'Phần mô tả thuộc hàng trên',

            'desc' => '',  

            'type' => 'textarea'                
        ),

        array(

            'id' => 'pt-field-service-carousel2-above-button-text',

            'title' => 'Nhãn Button thuộc hàng trên',

            'desc' => '',  

            'type' => 'text'                
        ),

        array(

            'id' => 'pt-field-service-carousel2-above-button-url',

            'title' => 'Url Button thuộc hàng trên',

            'desc' => '',  

            'type' => 'text'                
        ),

        //

        array(

            'id' => 'pt-field-service-carousel2-below-title',

            'title' => 'Tiêu đề lớn thuộc hàng dưới',

            'desc' => '',  

            'type' => 'text'                
        ),

        array(

            'id' => 'pt-field-service-carousel2-below-description',

            'title' => 'Phần mô tả thuộc hàng dưới',

            'desc' => '',  

            'type' => 'textarea'                
        ),

        array(

            'id' => 'pt-field-service-carousel2-below-button-text',

            'title' => 'Nhãn Button thuộc hàng dưới',

            'desc' => '',  

            'type' => 'text'                
        ),

        array(

            'id' => 'pt-field-service-carousel2-below-button-url',

            'title' => 'Url Button thuộc hàng dưới',

            'desc' => '',  

            'type' => 'text'                
        ),

    )
);

$this->metaboxes[] = array(

    'id' => 'custom-pt-metabox-galleries',

    'title' => 'Galleries options',

    'desc' => '',

    'where_show_on' => 'galleries',

    'fields' => array(

        array(

            'id' => 'pt-field-galleries-address',

            'title' => 'Địa chỉ',

            'desc' => '',               

            'type' => 'text'

        ),   

        array(

            'id' => 'pt-field-galleries-subitems',

            'title' => 'Thiết lập cho bộ thư viện ảnh ở những trang con',

            'desc' => '',

            'type' => 'accordion',

            'collapse_title_field' => 'accordion-galleries-subitem-title',

            'template' => array(

                array(

                    'id' => 'accordion-groupbox-galleries-subitem',
                    'title' => 'Mời thiết lập những thuộc tính cho đối tượng',
                    'type' => 'groupbox',
                    'fields' => array(

                        array(

                            'id' => 'accordion-galleries-subitem-title',

                            'title' => 'Tiêu đề',

                            'desc' => '',  

                            'type' => 'text'                
                        ),

                        array(

                            'id' => 'accordion-galleries-subitem-description',

                            'title' => 'Mô tả',

                            'desc' => '',  

                            'type' => 'text'                
                        ),

                        array(

                            'id' => 'accordion-galleries-subitem-tax',

                            'title' => 'Danh mục gắn kết',

                            'desc' => '', 
                            
                            'data' => array(
                                'query_tax' => true,
                                'taxonomy' => \Archive\Galleries\GALLERIES_FIELDS::GALLERIES_TAXONOMY,
                                'parent' => \Archive\Galleries\GALLERIES_FIELDS::GALLERIES_CAT_TERM_ID
                            ),

                            'type' => 'select'                
                        ),

                        array(

                            'id' => 'accordion-galleries-subitem-thumbnail',

                            'title' => 'Ảnh thumbnail',

                            'desc' => '',  

                            'type' => 'media'

                        ),

                        array(

                            'id' => 'accordion-galleries-subitem-icon',

                            'title' => 'Icon',

                            'desc' => '',  

                            'type' => 'media'

                        ),

                        /*array(

                            'id' => 'accordion-galleries-subitem-galleries-image',

                            'title' => 'Bộ sưu tập ảnh',

                            'desc' => '',  

                            'type' => 'media',

                            'has_name_box' => true,

                            'multiple' => true
                        

                        ),  */                      
                        

                    )

                )

            )

        )
        
        
     

    )
);

$this->metaboxes[] = array(

    'id' => 'custom-pt-metabox-galleries-style',

    'title' => 'Thiết lập bộ sưu tập theo phong cách',

    'desc' => '',

    'where_show_on' => 'galleries',

    'fields' => array(

        array(

            'id' => 'pt-field-galleries-image-style',

            'title' => 'Bộ sưu tập ảnh',

            'desc' => '',  

            'type' => 'media',

            'has_name_box' => true,

            'multiple' => true
        

        ),
        
        
     

    )
);


$this->metaboxes[] = array(

    'id' => 'custom-pt-metabox-galleries-advanced-settings',

    'title' => 'Thiết lập nâng cao',

    'desc' => '',

    'where_show_on' => 'galleries',

    'fields' => array(

        array(

            'id' => 'pt-field-galleries-item-show-setting',

            'title' => 'Thiết lập hiển thị trong thư viện ảnh',

            'desc' => '',  

            'type' => 'check',

            'data' => array(
                'show-on-gallery-post-type' => 'Bài này ưu tiên hiển thi trong thư viên ảnh'
            )
        

        )
     

    )
);

$this->metaboxes[] = array(

    'id' => 'custom-pt-metabox-page',

    'title' => 'Page options',

    'desc' => '',

    'where_show_on' => 'page',

    'fields' => array(

        array(

            'id' => 'pt-field-page-heading',

            'title' => 'Heading',

            'desc' => '',               

            'type' => 'text'

        ),   

        array(

            'id' => 'pt-field-page-subtitle',

            'title' => 'Subtitle',

            'desc' => '',               

            'type' => 'text'

        ),   

    )
);

$this->metaboxes[] = array(

    'id' => 'custom-pt-metabox-page-lh',

    'title' => 'Thiết lập cho trang liên hệ',

    'desc' => '',

    'where_show_on' => 'page',

    'page_template' => 'page-contact-layout',

    'fields' => array(

        array(

            'id' => 'pt-field-page-lh-google-map',

            'title' => 'Mã nhúng google map',

            'desc' => '',               

            'type' => 'textarea'

        ),   
        
        array(

            'id' => 'pt-field-page-lh-form-banner',

            'title' => 'Ảnh Form Banner',

            'desc' => '',               

            'type' => 'media'

        ),   

        array(

            'id' => 'pt-field-page-lh-form-id',

            'title' => 'Form id',

            'desc' => '',               

            'type' => 'text'

        ),   


    )
);
