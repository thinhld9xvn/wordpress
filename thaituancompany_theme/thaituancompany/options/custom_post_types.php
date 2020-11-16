<?php    

    $this->post_types[] = array(        

        'label' => 'Slider',

        'description' => 'Slider cho website',

        'slug' => 'slider'

    );  

    $this->post_types[] = array(        

        'label' => 'Sản phẩm',

        'description' => 'Sản phẩm',

        'slug' => 'san-pham',

        'disable' => array('editor', 'excerpt')        
       

    );

    $this->post_types[] = array(        

        'label' => 'Công trình dự án',

        'description' => 'Công trình dự án',

        'slug' => 'cong-trinh-du-an',

        'disable' => array('editor', 'excerpt')        
       

    );
  
?>