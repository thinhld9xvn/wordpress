<?php

    $this->metaboxes[] = array(

        'id' => 'term-metabox-product',
        'title' => 'Metabox products',
        'layout' => 'product',
        'fields' => array( 

            array(

                'id' => 'term-field-term-product-advanced-options',
                'title' => 'Tùy chọn nâng cao',
                'desc' => '',
                'type' => 'check',
                'data' => array(

                    'show-on-featuredbox' => 'Hiển thị danh mục này ra box sản phẩm nổi bật'

                )

            ),

        )

    );    

    $this->metaboxes[] = array(

        'id' => 'term-metabox-other',
        'title' => 'Metabox other',
        'fields' => array(

            array(

                'id' => 'term-field-term-priority',
                'title' => 'Độ ưu tiên khi hiển thị',
                'desc' => 'Mời nhập một số nguyên biểu thị độ ưu tiên hiển thị trong nhóm.',
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
                    'product' => 'Sản phẩm'                 
                   
                )

            )

        )

    );