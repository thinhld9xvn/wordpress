<?php 

    $this->sections[] = array(
        'id' => 'section-global',
        'title'  => 'Tổng quan',
        'desc'   => 'Tất cả các cài đặt tổng quan cho website',
        'fields' => array(
            
            array(
                'id' => 'global-section-1',
                'type' => 'section',
                'title' => 'Thiết lập chung',
                'desc' => '',
                'indent' => true
            ),
        
                array(
                    'id'    => 'global-site-title',
                    'type'  => 'text',
                    'title' => 'Nội dung tiêu đề cho website',
                    'desc'  => ''
                ),       

                array(
                    'id'    => 'global-site-description',
                    'type'  => 'editor',
                    'title' => 'Nội dung thẻ meta description cho website',
                    'desc'  => ''
                ),     

                array(
                    'id'    => 'global-site-keywords',
                    'type'  => 'editor',
                    'title' => 'Nội dung thẻ meta keywords cho website',
                    'desc'  => ''
                ),     

                array(
                    'id'    => 'global-site-robots',
                    'type'  => 'editor',
                    'title' => 'Nội dung thẻ meta robots cho website ( mặc định là noodp,index,follow )',
                    'desc'  => ''
                ),

                array(
                    'id'    => 'global-site-revisit-after',
                    'type'  => 'editor',
                    'title' => 'Nội dung thẻ meta revisit after cho website ( mặc định là 1 days )',
                    'desc'  => ''
                ),     


                array(
                    'id'    => 'global-site-google-analytics',
                    'type'  => 'editor',
                    'title' => 'Mã Google Analytics cho website ( có thẻ script đầy đủ )',
                    'desc'  => ''
                ),
                
            array(
                'id' => 'global-section-2',
                'type' => 'section',
                'indent' => false 
            )
                
        )
        
        
    );
    
    $this->sections[] = array(
        'id' => 'section-header',
        'title'  => 'Header',
        'desc'   => 'Tất cả các thiết lập cho phần header.',
        'fields' => array(
            
            array(
                'id' => 'header-section-1',
                'type' => 'section',
                'title' => 'Thiết lập logo',
                'desc' => '',
                'indent' => true
            ),
            
                array(
                    'id'    => 'logo-image',
                    'type'  => 'media',
                    'title' => 'Logo website',
                    'desc'  => 'Vui lòng chọn một ảnh mà bạn muốn làm logo '
                ),

                array(
                    'id'    => 'banner-header',
                    'type'  => 'media',
                    'title' => 'Banner header',
                    'desc'  => 'Vui lòng chọn một ảnh mà bạn muốn làm banner '
                ),
                
            array(
                'id' => 'header-section-2',
                'type' => 'section',
                'indent' => false 
            )
                
        )
        
        
    );
    
    $this->sections[] = array(
        'id' => 'section-slider',
        'title'  => 'Slider',
        'desc'   => 'Tất cả các thiết lập cho phần slider',
        'fields' => array(
            
            array(
                'id' => 'slider-section-1',
                'type' => 'section',
                'title' => 'Thiết lập cho slider',
                'desc' => '',
                'indent' => true
            ),
            
                array(
                    'id'    => 'slider-select',
                    'type'  => 'select',
                    'title' => 'Danh mục slider',
                    'desc'  => 'Vui lòng chọn một danh mục để làm slider',
                    'data'  => 'post_type'
                ),
                
                array(
                    'id'    => 'slider-number',
                    'type'  => 'range',
                    'title' => 'Số lượng slider',
                    'desc'  => 'Vui lòng chọn một giá trị giới hạn số lượng slider sẽ hiển thị',
                    'min' => 1,
                    'max' => 20,
                    'step' => 1,
                    'value' => 5
                ),
                
            array(
                'id' => 'slider-section-2',
                'type' => 'section',
                'indent' => false 
            )
                
        )
        
        
    );

    $this->sections[] = array(

        'id' => 'section-shoppingcart',
        'title'  => 'Shopping Cart',
        'desc'   => 'Tất cả các thiết lập cho phần giỏ hàng.',
        'fields' => array(

            array(
                'id' => 'shoppingcart-section-1',
                'type' => 'section',
                'title' => 'Thiết lập cho giỏ hàng',
                'desc' => '',
                'indent' => true
            ),

                array(
                    'id'       => 'shoppingcart-select',
                    'type'     => 'select',
                    'title'    => 'Trang giỏ hàng',                
                    'desc'     => 'Vui lòng chọn một trang trong hộp xổ xuống làm trang giỏ hàng',
                    // Must provide key => value pairs for select options
                    'data'  => 'page'
                    
                ),

                array(
                    'id'    => 'shoppingcart-icon',
                    'type'  => 'media',
                    'title' => 'Chọn icon cho giỏ hàng',
                    'desc'  => 'Vui lòng chọn một ảnh mà bạn muốn làm icon '
                ),

                array(
                    'id'        => 'shoppingcart-session-timeout',
                    'type'      => 'range',
                    'title'     => 'Khoảng thời gian dữ liệu giỏ hàng còn tồn tại',              
                    'desc'      => 'Tối thiểu là 5 và tối đa là 30 phút',
                    "value"     => 15,
                    "min"       => 5,
                    "step"      => 1,
                    "max"       => 30
                ),    

                array(
                    'id'               => 'shoppingcart-message',
                    'type'             => 'editor',
                    'title'            => 'Nội dung cho trang giỏ hàng'             
                   
                ),

            array(
                'id' => 'shoppingcart-section-2',
                'type' => 'section',              
                'indent' => false
            )

        )

    );
    
    $this->sections[] = array(
        'id' => 'section-contact-form',
        'title'  => 'Contact Form',
        'desc'   => 'Tất cả các thiết lập cho phần contact form',
        'fields' => array(
            
            array(
                'id' => 'contactform-section-1',
                'type' => 'section',
                'title' => 'Thiết lập cho contact form',
                'desc' => '',
                'indent' => true
            ),
                array(
                    'id'    => 'contactform-email-address',
                    'type'  => 'text',
                    'title' => 'Email chủ mà thông tin khách hàng sẽ gửi đến',
                    'desc'  => 'Vui lòng điền đúng tên và định dạng email ( email phải tồn tại trên internet )'
                ),

                array(
                    'id'    => 'contactform-email-name',
                    'type'  => 'text',
                    'title' => 'Tên email mặc định khi được gửi đến',
                    'desc'  => ''
                ),

                array(
                    'id'    => 'contactform-smtp-host',
                    'type'  => 'text',
                    'title' => 'Địa chỉ dịch vụ SMTP',
                    'desc'  => ''
                ),

                array(
                    'id'    => 'contactform-smtp-port',
                    'type'  => 'text',
                    'title' => 'Cổng kết nối SMTP',
                    'desc'  => ''
                ),

                array(
                    'id'    => 'contactform-smtp-encryption',
                    'type'  => 'select',
                    'title' => 'Phương thức mã hóa SMTP',
                    'desc'  => '',
                    'data' => array(
                        ''    => 'Không mã hóa',
                        'SSL' => 'SSL',
                        'TLS' => 'TLS'
                    )
                ),

                array(
                    'id'    => 'contactform-authentication-username',
                    'type'  => 'text',
                    'title' => 'Tên đăng nhập',
                    'desc'  => 'Tên đăng nhập sử dụng SMTP'
                ),

                array(
                    'id'    => 'contactform-authentication-password',
                    'type'  => 'text',
                    'title' => 'Mật khẩu',
                    'desc'  => 'Mật khẩu đăng nhập sử dụng SMTP'
                ),
                
            array(
                'id' => 'contactform-section-2',
                'type' => 'section',
                'indent' => false 
            )
                
        )
        
        
    );  
   
    
    
?>