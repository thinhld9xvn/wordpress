<?php 

    $this->metaboxes[] = array(

        'id' => 'custom-pt-metabox-san-pham',

        'title' => 'Thông tin sản phẩm',

        'desc' => '',

        'where_show_on' => 'san-pham',        

        'fields' => array( 

            array(

                'id' => 'pt-field-san-pham-giatien',

                'title' => 'Giá tiền',

                'desc' => '',               

                'type' => 'text'

            ),

            array(

                'id' => 'pt-field-san-pham-quycach',

                'title' => 'Quy cách sản phẩm',

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

                'id' => 'pt-field-san-pham-gallery',

                'title' => 'Bộ sưu tập ảnh sản phẩm',

                'desc' => '',

                'multiple' => true,

                'type' => 'media'

            ),

            array(

                'id' => 'pt-field-san-pham-checkbox-hot',

                'title' => 'Thiết lập sản phẩm tiêu biểu',

                'desc' => 'Cho sản phẩm này vào mục sản phẩm tiêu biểu',               

                'type' => 'check'

            )

        )
    );
?>