<?php 
    $this->metaboxes[] = array(
        
        'id' => 'custom-pt-metabox-san-pham',
        'title' => 'Thông tin sản phẩm',
        'where_show_on' => 'post',      
        'condition_to_show' => '',
        
        'fields' => array(
            
            array(
                
                'id' => 'pt-field-san-pham-large-avatar',
                'title' => 'Ảnh mô tả sản phẩm ( Cỡ lớn )',
                'desc' => '',
                'type' => 'media'
            ),

            array(
                
                'id' => 'pt-field-san-pham-bang-ts',
                'title' => 'Bảng thông số sản phẩm',
                'desc' => '',
                'type' => 'editor'
                                
            ),

            array(
                
                'id' => 'pt-field-san-pham-mo-ta-ngan',
                'title' => 'Mô tả ngắn sản phẩm',
                'desc' => '',
                'type' => 'editor'
                                
            ),

            array(
                
                'id' => 'pt-field-san-pham-mo-ta-ctiet',
                'title' => 'Mô tả chi tiết sản phẩm',
                'desc' => '',
                'type' => 'editor'
                                
            )            
            
        )
        
    );     
?>