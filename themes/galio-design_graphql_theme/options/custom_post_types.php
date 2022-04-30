<?php   
    $this->post_types[] = array(   
        'label' => 'Dự án',
        'description' => 'Dự án',
        'slug' => 'projects',
        'taxonomy' => array(
            'label' => 'Categories',
            'slug' => 'projects-category'
        )
    );
    $this->post_types[] = array(   
        'label' => 'Media',
        'description' => 'Media',
        'slug' => 'galio-media',
        'taxonomy' => array(
            'label' => 'Categories',
            'slug' => 'galio-media-category'
        )
    );
    $this->post_types[] = array(   
        'label' => 'Slider',
        'description' => 'Slider',
        'slug' => 'slider'
    );
    $this->post_types[] = array(   
        'label' => 'Khách hàng Slider',
        'description' => 'Clients',
        'slug' => 'clients'
    );
    $this->post_types[] = array(   
        'label' => 'Video',
        'description' => 'Video',
        'slug' => 'video',
        'taxonomy' => array(
            'label' => 'Categories',
            'slug' => 'video-category'
        )
    );
    $this->post_types[] = array(   
        'label' => 'Tuyển dụng',
        'description' => 'Tuyển dụng',
        'slug' => 'recruit'
    );
