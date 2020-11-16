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
                
                'id' => 'pt-field-san-pham-bang-ds',
                'title' => 'Bảng danh sách sản phẩm',
                'desc' => '',
                'type' => 'editor'
                                
            )
            
            
        )
        
    );  

    
    $this->metaboxes[] = array(
        
        'id' => 'custom-pt-metabox-bang-gia',
        'title' => 'Thông tin bảng giá đính kèm',
        'where_show_on' => 'page',        
        'fields' => array(
            
            array(
                
                'id' => 'pt-field-bang-gia-attachment',
                'title' => 'Bảng giá đính kèm',
                'desc' => 'Xin vui lòng chọn file bảng giá đính kèm',
                'type' => 'media',
                'thumbnail' => false,
                'multiple' => true
            )  

        )
        
    );       

?>