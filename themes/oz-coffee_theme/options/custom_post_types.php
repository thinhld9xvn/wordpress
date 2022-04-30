<?php   

    $this->post_types[] = array(        

        'label' => 'Slider',

        'description' => 'Slider',

        'slug' => 'slider'

    );

   $this->post_types[] = array(        

        'label' => 'Testimolates',

        'description' => 'Testimolates',

        'slug' => 'testimolates'

    );

    $this->post_types[] = array(        

        'label' => 'Dịch vụ',

        'description' => 'Dịch vụ',

        'slug' => 'dich-vu'

    );

    $this->post_types[] = array(        

        'label' => 'Ưu đãi',

        'description' => 'Ưu đãi',

        'slug' => 'uu-dai'

    );

    
    $this->post_types[] = array(        

        'label' => 'Tin tức',

        'description' => 'Tin tức',

        'slug' => 'tin-tuc'

    );

    $this->post_types[] = array(        

        'label' => 'Thư viện ảnh',

        'description' => 'Thư viện ảnh',

        'slug' => 'galleries',

        'taxonomy' => array(

            //array(

                'label' => 'Danh mục',
                'slug' => 'dmuc-galleries'

            //),

            //array(

                //'label' => 'Chủ sở hữu',
                //'slug' => 'dmuc-galleries-owner'
                
            //)

        )

    );

    