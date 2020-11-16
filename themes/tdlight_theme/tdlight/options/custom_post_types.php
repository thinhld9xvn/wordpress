<?php    

    $this->post_types[] = array(        

        'label' => 'Slider',

        'description' => 'Slider cho website',

        'slug' => 'slider'

    );

    $this->post_types[] = array(        

        'label' => 'Video',

        'description' => 'Video cho website',

        'slug' => 'video'

    );

    $this->post_types[] = array(        

        'label' => 'Sản phẩm',

        'description' => 'Thông tin sản phẩm',       

        'slug' => 'products',

        'disable' => array('editor', 'excerpt'),

        'taxonomy' => array(

            'label' => 'Danh mục sản phẩm',
            'slug' => 'dmuc-san-pham'

        )

    );