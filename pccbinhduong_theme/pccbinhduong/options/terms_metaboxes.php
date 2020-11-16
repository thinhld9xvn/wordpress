<?php 
    $this->cat_fields[] = array(

        'id' => 'cat-metabox-layout-category',
        'title' => 'Layout danh mục',
        'desc' => 'Mời chọn layout cho danh mục',
        'type' => 'select',
        'options' => array(
            'null' => 'Trống',
            'tin-tuc' => 'Tin tức',
            'san-pham' => 'Sản phẩm',
            'duan-congtrinh' => 'Dự án công trình',
        )
    );   

     $this->cat_fields[] = array(

        'id' => 'cat-metabox-avatar-category',
        'title' => 'Ảnh đại diện cho danh mục',
        'desc' => 'Mời chọn ảnh đại diện cho danh mục',
        'type' => 'media',
        'multiple' => false
    );  

    $this->cat_fields[] = array(

        'id' => 'cat-metabox-gallery-category',
        'title' => 'Bộ sưu tập ảnh cho danh mục',
        'desc' => 'Mời chọn bộ sưu tập ảnh cho danh mục',
        'type' => 'media',
        'multiple' => true
    ); 

?>