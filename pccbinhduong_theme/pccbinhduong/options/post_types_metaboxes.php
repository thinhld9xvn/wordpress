<?php 
    $this->metaboxes[] = array(
        
        'id' => 'custom-pt-metabox-san-pham',
        'title' => 'Thông tin sản phẩm',
        'where_show_on' => 'post',       
        'condition_to_show' => '',
        
        'fields' => array(

            array(
                
                'id' => 'pt-field-san-pham-price',
                'title' => 'Giá sản phẩm',
                'desc' => '',
                'type' => 'text'
            ),
                
            array(
                
                'id' => 'pt-field-san-pham-opcode',
                'title' => 'Mã sản phẩm',
                'desc' => '',
                'type' => 'text'
            ),

            array(
                
                'id' => 'pt-field-san-pham-hangsx',
                'title' => 'Xuất xứ',
                'desc' => '',
                'type' => 'text'
            ),

            array(
                
                'id' => 'pt-field-san-pham-gallery',
                'title' => 'Bộ sưu tập ảnh sản phẩm',
                'desc' => '',
                'type' => 'media',
                'multiple' => true
                                
            )
            
            
        )
        
    );     
?>