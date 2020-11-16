<?php    

    $this->post_types[] = array(        

        'label' => 'Slider',

        'description' => 'Slider cho website',

        'slug' => 'slider'

    );

    $this->post_types[] = array(        

        'label' => 'Sản phẩm',

        'description' => 'Sản phẩm cho website',

        'slug' => 'san-pham',

        'taxonomy' => array(

            'label' => 'Danh mục sản phẩm',

            'slug' => 'dmuc-san-pham'

        )        

    );

?>