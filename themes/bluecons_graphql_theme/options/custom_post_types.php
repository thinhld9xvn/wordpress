<?php   
    $this->post_types[] = array(   
        'label' => 'Slider',
        'description' => 'Slider',
        'slug' => 'slider'
    );
    $this->post_types[] = array(   
        'label' => 'Dịch vụ',
        'description' => 'Dịch vụ',
        'slug' => 'services',
        'taxonomy' => array(
            'label' => 'Services categories',
            'slug' => 'services-category',
            'rewrite' => array(
                'slug' => 'danh-muc-dv'
            )
        ),
        'rewrite' => array(
            'slug' => 'dich-vu'
        )
    );
    $this->post_types[] = array(   
        'label' => 'Sản phẩm',
        'description' => 'Sản phẩm',
        'slug' => 'products',
        'taxonomy' => array(
            'label' => 'Products categories',
            'slug' => 'products-category',
            'rewrite' => array(
                'slug' => 'danh-muc-sp'
            )
        ),
        'rewrite' => array(
            'slug' => 'san-pham'
        )
    );
    $this->post_types[] = array(   
        'label' => 'Dự án',
        'description' => 'Dự án',
        'slug' => 'projects',
        'taxonomy' => array(
            'label' => 'Projects categories',
            'slug' => 'projects-category',
            'rewrite' => array(
                'slug' => 'danh-muc-da'
            )
        ),
        'rewrite' => array(
            'slug' => 'du-an'
        )
    );
    $this->post_types[] = array(   
        'label' => 'Đối tác',
        'description' => 'Đối tác',
        'slug' => 'clients'
    );
    