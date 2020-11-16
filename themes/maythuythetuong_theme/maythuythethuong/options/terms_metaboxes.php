<?php 

    $this->metaboxes[] = array(

        'id' => 'term-metabox-service',
        'title' => 'Metabox service',
        'layout' => 'service',
        'fields' => array(

            array(

                'id' => 'term-field-cat-service-avatar',
                'title' => 'Ảnh đại diện cho danh mục',
                'desc' => 'Mời chọn ảnh đại diện cho danh mục',
                'type' => 'media',
                'thumbnail' => true,
                'multiple' => false

            ),

            array(

                'id' => 'term-field-cat-service-showhomepage',
                'title' => 'Hiển thị mục này ra trang chủ ( dưới slider )',
                'desc' => '( Chọn mục này nếu muốn hiển thị dịch vụ này ra trang chủ )',
                'type' => 'checkbox'                

            ),

        )

    );     

    $this->metaboxes[] = array(

        'id' => 'term-metabox-product',
        'title' => 'Metabox product',
        'layout' => 'product',
        'fields' => array(

            array(

                'id' => 'term-field-term-product-avatar',
                'title' => 'Ảnh đại diện cho nhóm sản phẩm',
                'desc' => 'Mời chọn ảnh đại diện cho nhóm sản phẩm',
                'type' => 'media',
                'thumbnail' => true,
                'multiple' => false

            ),

            array(

                'id' => 'term-field-term-product-showhomepage',
                'title' => 'Hiển thị mục này ra trang chủ ( dưới nhóm dịch vụ )',
                'desc' => '( Chọn mục này nếu muốn hiển thị nhóm sản phẩm này ra trang chủ )',
                'type' => 'checkbox'

            ),

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
                    'service' => 'Dịch vụ',
                    'product' => 'Sản phẩm'
                   
                )

            )

        )

    ); ?>