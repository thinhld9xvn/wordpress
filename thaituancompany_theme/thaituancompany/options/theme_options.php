<?php

    $this->sections[] = array(

        'id' => 'section-global',

        'title'  => array( 

                        'vi' => 'Tổng quan',

                        'en' => 'Global'

                    ),

        'desc'   => array( 

                        

                        'vi' => 'Tất cả các cài đặt tổng quan cho website',

                        'en' => 'All global settings for website'

                           

                    ),

        'fields' => array(            

            array(

                'id' => 'global-section-1',

                'type' => 'section',

                'title' => array(

                                

                                'vi' => 'Thiết lập chung',

                                'en' => 'Global settings'

                                

                           ),

                'desc' => '',

                'indent' => true

            ),

                array(

                    'id'    => 'global-site-title',

                    'type'  => 'textarea',

                    'title' => array(                                    

                       'vi' => 'Nội dung tiêu đề cho website',

                       'en' => 'Website title'

                    ),

                    'desc'  => '',

                    'attributes' => array(
                        'data-seochecker' => 'title'
                    )

                ), 

                array(

                    'id'    => 'global-site-description',

                    'type'  => 'textarea',

                    'title' => array(                                    

                        'vi' => 'Nội dung thẻ meta description cho website',

                        'en' => 'Website meta description'                                    

                    ),

                    'desc'  => '',

                    'attributes' => array(
                        'data-seochecker' => 'description'
                    )

                ), 

                array(

                    'id'    => 'global-site-keywords',

                    'type'  => 'textarea',

                    'title' => array(

                                 

                                   'vi' => 'Nội dung thẻ meta keywords cho website',

                                   'en' => 'Website meta keywords'

                                 

                               ),

                    'desc'  => ''

                ),  

                array(

                    'id'    => 'global-site-robots',

                    'type'  => 'textarea',

                    'title' => array(

                                 

                                    'vi' => 'Nội dung thẻ meta robots cho website ( mặc định là noodp,index,follow )',

                                    'en' => 'Website meta robots ( default: noodp,index,follow ) '

                                    

                               ),

                    'desc'  => ''

                ),

                array(

                    'id'    => 'global-site-revisit-after',

                    'type'  => 'textarea',

                    'title' => array(

                                 

                                    'vi' => 'Nội dung thẻ meta revisit after cho website ( mặc định là 1 days )',

                                    'en' => 'Website meta visit after ( default: 1 days ) '

                                   

                               ),

                    'desc'  => ''

                ),  

                array(

                    'id'    => 'global-site-google-analytics',

                    'type'  => 'textarea',

                    'title' =>  array(

                                 

                                    'vi' => 'Mã Google Analytics cho website ( có thẻ script đầy đủ )',

                                     'en' => 'Website google analytics ( include script tag ) '

                                  

                               ),

                    'desc'  => ''

                ),

            array(

                'id' => 'global-section-2',

                'type' => 'section',

                'indent' => false 

            ),

            array(

                'id' => 'global-section-3',

                'type' => 'section',

                'title' => array(

                                 

                                   'vi' => 'Phân trang',

                                   'en' => 'Pagination'

                                 

                               ),

                'desc' => '',

                'indent' => true

            ),

            array(

                'id' => 'global-section-4',

                'type' => 'section',               

                'indent' => false

            )

        )

    );

    $end_section = end( $this->sections );       

    foreach( $GLOBALS['_custom_post_types_registered'] as $post_type ) :        

        $section_field = array(

                    "id"    => "global-pagenumber-post-type-{$post_type['slug']}",

                    "type"  => "text",

                    "title" => array(

                                    "vi" => "Post Type {$post_type['label']}",

                                    "en" => "Post Type {$post_type['label']}"

                                ),

                    "desc"  => ""

                );

       

        array_splice( $end_section['fields'], 

                      sizeof( $end_section['fields'] ) - 1,

                      0,

                      array( $section_field ) );       

    endforeach;

    $args = array(

        'hide_empty' => false

    );

    $categories = get_categories( $args );

    foreach ( $categories as $category ) :

        $section_field = array(

                    "id"    => "global-pagenumber-category-{$category->slug}",

                    "type"  => "text",

                    "title" => array(

                                  "vi" => "Danh mục {$category->name}",

                                  "en" => "Category {$category->name}"

                               ),

                    "desc"  => ""

                );

       

        array_splice( $end_section['fields'], 

                      sizeof( $end_section['fields'] ) - 1,

                      0,

                      array( $section_field ) );      

    endforeach;

    $this->sections[ sizeof( $this->sections ) - 1 ] = $end_section;   

    $this->sections[] = array(

        'id' => 'section-header',

        'title'  => array(

           'vi' => 'Header',

           'en' => 'Header'

       ),

        'desc'   => array(

            'vi' => 'Tất cả thiết lập cho header',

           'en' => 'All header settings'

       ),

        'fields' => array(

            array(

                'id' => 'header-section-1',

                'type' => 'section',

                'title' => array(

                             

                               'vi' => 'Thiết lập logo và background',

                               'en' => 'Logo and background Settings'

                             

                           ),

                'desc' => '',

                'indent' => true

            ),

                array(

                    'id'    => 'logo-image',

                    'type'  => 'media',

                    'title' => array(                                    

                        'vi' => 'Logo website',

                        'en' => 'Logo website'

                    ),

                    'desc'  => array(                                 

                        'vi' => 'Mời chọn logo cho website',

                        'en' => 'Please choose logo website image'                                    

                    )

                ),

                array(

                    'id'    => 'logo-image-mobile',

                    'type'  => 'media',

                    'title' => array(

                        'vi' => 'Logo website (mobile)',

                        'en' => 'Logo website (mobile)'

                    ),

                    'desc'  => array(

                        'vi' => 'Mời chọn logo cho website (mobile)',

                        'en' => 'Please choose logo website image (mobile)'

                    )

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

        'title'  => array(

            'vi' => 'Slider',

            'en' => 'Slider'

       ),

        'desc'   => array(

            'vi' => 'Tất cả các thiết lập cho phần slider',

            'en' => 'All slider settings'

       ),

        'fields' => array(

            array(

                'id' => 'slider-section-1',

                'type' => 'section',

                'title' => array(

                             

                                'vi' => 'Thiết lập cho slider',

                                'en' => 'Slider settings'

                             

                           ),

                'desc' => '',

                'indent' => true

            ),

            

                array(

                    'id'    => 'slider-select',

                    'type'  => 'select',

                    'title' => array(

                                 

                                    'vi' => 'Danh mục slider',

                                    'en' => 'Slider category'

                                 

                               ),

                    'desc'  => array(

                                 

                                    'vi' => 'Vui lòng chọn một danh mục để làm slider',

                                   'en' => 'Please choose a slider category'

                                 

                               ),

                    'data'  => 'post_type'

                ),

                

                array(

                    'id'    => 'slider-number',

                    'type'  => 'range',

                    'title' => array(

                                 

                                    'vi' => 'Số lượng slider',

                                    'en' => 'Slider number'

                                 

                               ),

                    'desc'  => array(

                                 

                                    'vi' => 'Vui lòng chọn một giá trị giới hạn số lượng slider sẽ hiển thị',

                                   'en' => 'Please choose a maximum slider number'

                                 

                               ),

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

        'id' => 'section-ultimate-cache',

        'title'  => array(                     

            'vi' => 'Ultimate Cache',                     

            'en' => 'Ultimate Cache'                     

        ),

        'desc'   => array(                     

            'vi' => 'Tất cả các thiết lập cho phần ultimate cache',                     

            'en' => 'All ultimate cache settings'                     

        ),

        'fields' => array(            

            array(

                'id' => 'ultimate-cache-section-1',

                'type' => 'section',

                'title' => array(                                

                    'vi' => 'Thiết lập cho ultimate cache',

                    'en' => 'Ultimate cache settings'                             

               ),

                'desc' => '',

                'indent' => true

            ),

                array(

                    'id'    => 'ultimate-cache-delete-timeout',

                    'type'  => 'text',

                    'title' => array(                                 

                        'vi' => 'Khoảng thời gian mà cache sẽ tự động xóa (s)',

                        'en' => 'Cache automatically deleted timeout (s)'
                   
                    ),

                    'desc'  => '',

                ),                
                

            array(

                'id' => 'ultimate-cache-section-2',

                'type' => 'section',

                'indent' => false 

            ),

        )

    );          

    $this->sections[] = array(

        'id' => 'section-contact-form',

        'title'  => array(

                     

                        'vi' => 'Contact Form',                     

                        'en' => 'Contact Form'

                     

                   ),

        'desc'   => array(

                     

                        'vi' => 'Tất cả các thiết lập cho phần contact form',                     

                       'en' => 'All contact form settings'

                     

                   ),

        'fields' => array(            

            array(

                'id' => 'contactform-section-1',

                'type' => 'section',

                'title' => array(

                                

                                'vi' => 'Thiết lập cho contact form',

                                'en' => 'Contact form settings'

                             

                           ),

                'desc' => '',

                'indent' => true

            ),

                array(

                    'id'    => 'contactform-email-address',

                    'type'  => 'text',

                    'title' => array(

                                 

                                    'vi' => 'Email chủ mà thông tin khách hàng sẽ gửi đến',

                                    'en' => 'Email ( customer information to send this )'

                                 

                               ),

                    'desc'  => array(

                                 

                                    'vi' => 'Vui lòng điền đúng tên và định dạng email ( email phải tồn tại trên internet )',

                                    'en' => 'Please fill out validate email address'

                                    

                               ),

                ),

                array(

                    'id'    => 'contactform-email-name',

                    'type'  => 'text',

                    'title' => array(

                                 

                                    'vi' => 'Tên email mặc định khi được gửi đến',

                                    'en' => 'Default email name'                                    

                               ),

                    'desc'  => ''

                ),

                array(

                    'id'    => 'contactform-smtp-host',

                    'type'  => 'text',

                    'title' => array(

                                 

                                   'vi' => 'Địa chỉ dịch vụ SMTP',                                 

                                   'en' => 'SMTP address'

                                 

                               ),

                    'desc'  => ''

                ),

                array(

                    'id'    => 'contactform-smtp-port',

                    'type'  => 'text',

                    'title' => array(

                                 

                                    'vi' => 'Cổng kết nối SMTP',

                                   'en' => 'SMTP port'

                                 

                               ),

                    'desc'  => ''

                ),

                array(

                    'id'    => 'contactform-smtp-encryption',

                    'type'  => 'select',

                    'title' => array(

                                 

                                    'vi' => 'Phương thức mã hóa SMTP',                                

                                    'en' => 'SMTP encryption'

                                 

                               ),

                    'desc'  => '',

                    'data' => array(

                        ''  => array(

                                     

                                      'vi' => 'Không mã hóa',                                     

                                      'en' => 'No encryption'

                                     

                                   ),

                        'ssl' => array(

                                    

                                    'vi' => 'SSL',

                                    'en' => 'SSL'

                                    

                                ),

                        'tls' => array(

                                    

                                    'vi' => 'TLS',

                                    'en' => 'TLS'

                                    

                                ),

                    )

                ),

                array(

                    'id'    => 'contactform-authentication-username',

                    'type'  => 'text',

                    'title' => array(

                                     

                                       'vi' => 'Tên đăng nhập',                                     

                                       'en' => 'Username'

                                     

                                   ),

                    'desc'  => array(

                                     

                                        'vi' => 'Tên đăng nhập sử dụng SMTP',

                                       'en' => 'SMTP username'

                                     

                                   ),

                ),

                array(

                    'id'    => 'contactform-authentication-password',

                    'type'  => 'text',

                    'title' => array(

                                    

                                    'vi' => 'Mật khẩu',

                                    'en' => 'Password'

                                    

                               ),

                    'desc'  => array(

                                    

                                    'vi' => 'Mật khẩu đăng nhập sử dụng SMTP',

                                    'en' => 'SMTP password'

                                 

                               ),

                ),

                

            array(

                'id' => 'contactform-section-2',

                'type' => 'section',

                'indent' => false 

            ),

        )

    );    