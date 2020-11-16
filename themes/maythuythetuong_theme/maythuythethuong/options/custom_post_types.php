<?php    

    $this->post_types[] = array(        

        'label' => 'Slider',

        'description' => 'Slider cho website',

        'slug' => 'slider'

    );

    $this->post_types[] = array(        

        'label' => 'Sản phẩm',

        'description' => 'Sản phẩm công ty',

        'slug' => 'san-pham',

        'taxonomy' => array(
        				'label' => 'Danh mục sản phẩm',
        				'slug' => 'dmuc-san-pham'
        			)

    );

    $this->post_types[] = array(        

        'label' => 'Dịch vụ',

        'description' => 'Dịch vụ công ty',

        'slug' => 'dich-vu',

        'taxonomy' => array(
                        'label' => 'Danh mục dịch vụ',
                        'slug' => 'dmuc-dich-vu'
                    )

    );

    $this->post_types[] = array(

        'label' => 'Đối tác',

        'description' => 'Đối tác công ty',

        'slug' => 'doi-tac'

    );

    $this->post_types[] = array(        

        'label' => 'Thư viện hình ảnh',

        'description' => 'Thư viện hình ảnh công ty',

        'slug' => 'thu-vien-hinh-anh'

    );
  
?>