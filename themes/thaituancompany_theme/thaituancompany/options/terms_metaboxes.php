<?php 
   $this->metaboxes[] = array(

        'id' => 'term-metabox-product',

        'title' => 'Metabox product',

        'layout' => 'san-pham',

        'fields' => array(

            array(

                'id' => 'term-field-product-show-priority',

                'title' => 'Độ ưu tiên khi hiển thị',

                'desc' => 'Mời nhập một giá trị số nguyên xác định độ ưu tiên của đối tượng',

                'type' => 'text'
                
            )           

        )

    );   

    $this->metaboxes[] = array(

        'id' => 'term-metabox-layout',

        'title' => 'Terms Layout',

        'term_metaboxes_layout' => true,

        'fields' => array(

            array(

                'id' => 'term-field-layout',

                'title' => 'Metabox Layout',

                'desc' => 'Mời chọn layout cho metabox',

                'type' => 'select',

                'options' => array(

                    'null' => 'Trống',
                    'san-pham' => 'Sản phẩm'

                )

            )
        )

    );