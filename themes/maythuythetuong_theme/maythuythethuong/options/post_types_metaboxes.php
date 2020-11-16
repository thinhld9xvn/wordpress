<?php 

    $this->metaboxes[] = array(

        'id' => 'custom-pt-metabox-san-pham',

        'title' => 'Thông tin sản phẩm',

        'desc' => '',

        'where_show_on' => 'san-pham',

        'fields' => array(

            array(
                'id' => 'pt-field-groupbox-san-pham',
                'title' => 'Thông tin sản phẩm',
                'desc' => '',
                'type' => 'groupbox',
                'fields' => array(         

                    array(

                        'id' => 'pt-field-san-pham-giatien',

                        'title' => 'Giá tiền',

                        'desc' => '',               

                        'type' => 'text'

                    ),                    

                    array(

                        'id' => 'pt-field-san-pham-opcode',

                        'title' => 'Mã sản phẩm',

                        'desc' => '',

                        'type' => 'text'

                    ),

                    array(

                        'id' => 'pt-field-san-pham-tt',

                        'title' => 'Thông tin thêm về sản phẩm',

                        'desc' => '',               

                        'type' => 'editor'
                    ),        

                    array(

                        'id' => 'pt-field-san-pham-tskt',

                        'title' => 'Thông số kỹ thuật',

                        'desc' => '',               

                        'type' => 'editor'
                    ),                   

                )
            
            )           

        )
    );

    $this->metaboxes[] = array(

        'id' => 'custom-pt-metabox-gallery',

        'title' => 'Thư viện hình ảnh',

        'desc' => '',

        'where_show_on' => 'thu-vien-hinh-anh',

        'fields' => array(

            array(
                'id' => 'pt-field-groupbox-gallery',
                'title' => 'Thư viện hình ảnh',
                'desc' => '',
                'type' => 'groupbox',
                'fields' => array(

                    array(

                        'id' => 'pt-field-gallery-images',

                        'title' => 'Thư viện hình ảnh',

                        'desc' => 'Mời chọn các hình ảnh cho thư viện',               

                        'thumbnail' => true,
                        'multiple' => true,

                        'type' => 'media'
                    ),                   

                )
            
            )           

        )
    );
   
    
?>