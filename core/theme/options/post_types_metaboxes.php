<?php   

    $this->metaboxes[] = array(

        'id' => 'custom-pt-metabox-product',

        'title' => 'Sản phẩm',

        'desc' => '',

        'where_show_on' => 'products',

        'fields' => array(  

            array(

                'id' => 'pt-field-sp-price',

                'title' => 'Giá tiền (vnđ)',

                'desc' => '',

                'type' => 'text',

                'numformat' => 'vietnam'            
               
            ),

            array(

                'id' => 'pt-field-sp-opcode',

                'title' => 'Mã sản phẩm',

                'desc' => '',

                'type' => 'text'
              
               
            ),

            array(

                'id' => 'pt-field-sp-tskt',

                'title' => 'Thông số kỹ thuật sản phẩm ( hiển thị khi di chuột vào sản phẩm )',

                'desc' => '',

                'type' => 'editor'                
               
            ),   

            array(

                'id' => 'pt-field-sp-desc',

                'title' => 'Mô tả ngắn sản phẩm',

                'desc' => '',

                'type' => 'editor'                
               
            ),          

            array(

                'id' => 'pt-field-sp-details',

                'title' => 'Chi tiết sản phẩm',

                'desc' => '',

                'type' => 'editor'                
               
            ),

            array(

                'id' => 'pt-field-sp-galleries',

                'title' => 'Thư viện ảnh',

                'desc' => '',

                'type' => 'media',

                'multiple' => true,

                'thumbnail' => true                
               
            ),

            array(

                'id' => 'pt-field-sp-priority',

                'title' => 'Độ ưu tiên hiển thị bài viết',

                'desc' => '',

                'type' => 'text'      
               
            ),

            array(

                'id' => 'pt-field-sp-advanced-options',

                'title' => 'Tùy chọn nâng cao',

                'desc' => '',

                'type' => 'check',

                'data' => array(
                    
                    'show-on-product-featuredbox' => 'Hiển thị trong box sản phẩm nổi bật'

                )
                     
               
            ),
                  

        )

    );

    $this->metaboxes[] = array(

        'id' => 'custom-pt-metabox-video',

        'title' => 'Thông tin video',

        'desc' => '',

        'where_show_on' => 'video',

        'fields' => array(

            array(

                'id' => 'pt-field-video-url',

                'title' => 'Url của video ( youtube )',

                'desc' => '',

                'type' => 'text'
                        
               
            ) 

        )

    );

    $this->metaboxes[] = array(

        'id' => 'custom-pt-metabox-galleries',

        'title' => 'Thư viện hình ảnh',

        'desc' => '',

        'where_show_on' => 'tvha',

        'fields' => array(

            array(

                'id' => 'pt-field-tvha-galleries',

                'title' => 'Bộ sưu tập hình ảnh',

                'desc' => '',

                'type' => 'media',

                'multiple' => true,

                'thumbnail' => true                
               
            ) 

        )

    );

    $this->metaboxes[] = array(

        'id' => 'custom-pt-metabox-catalogue',

        'title' => 'Thông tin về catalogue',

        'desc' => '',

        'where_show_on' => 'catalogue',

        'fields' => array(

            array(

                'id' => 'pt-field-catalogue-catalogues',

                'title' => 'Catalogues',

                'desc' => '',

                'type' => 'media',

                'has_name_box' => true,

                'multiple' => true,                

                'thumbnail' => false,
               
            )          

        )

    );     


    $this->metaboxes[] = array(

        'id' => 'custom-pt-metabox-post',

        'title' => 'Thông tin bài viết',

        'desc' => '',

        'where_show_on' => 'post',

        'fields' => array(

            array(

                'id' => 'pt-field-groupbox-post',

                'title' => 'Thông tin bài viết',

                'desc' => '',

                'type' => 'groupbox',

                'fields' => array(

                    array(

                        'id' => 'pt-field-post-priority',

                        'title' => 'Độ ưu tiên hiển thị bài vi',

                        'desc' => '',

                        'type' => 'text'                
                       
                    )

                )

            )           

        )

    );

    $this->metaboxes[] = array(

        'id' => 'custom-pt-metabox-page-lh',

        'title' => 'Thông tin liên hệ',

        'desc' => '',

        'where_show_on' => 'page',
        'layout' => 'Liên hệ',

        'fields' => array(            

            array(

                'id' => 'pt-field-page-lh-company-name',

                'title' => 'Tên công ty',

                'desc' => '',

                'type' => 'editor'                
               
            ),

            array(

                'id' => 'pt-field-page-lh-company-address',

                'title' => 'Địa chỉ công ty',

                'desc' => '',

                'type' => 'editor'                
               
            ),         

            array(

                'id' => 'pt-field-page-lh-hotline',

                'title' => 'Điện thoại liên hệ',

                'desc' => '',

                'type' => 'editor'                
               
            ),        

            array(

                'id' => 'pt-field-page-lh-working-time',

                'title' => 'Thời gian làm việc',

                'desc' => '',

                'type' => 'editor'                
               
            ),        

            array(

                'id' => 'pt-field-page-lh-email',

                'title' => 'Email công ty',

                'desc' => '',

                'type' => 'editor'                
               
            ),      

            array(

                'id' => 'pt-field-page-lh-cform-id',

                'title' => 'Mã form liên hệ',

                'desc' => '',

                'type' => 'text'                
               
            ),                    

        )

    );  