<?php 
    $this->metaboxes[] = array(
        
        'id' => 'custom-pt-metabox-san-pham',
        'title' => 'Thông tin sản phẩm',
        'desc' => '',
        'where_show_on' => 'san-pham',
        
        'fields' => array( 

            array(
                
                'id' => 'pt-field-san-pham-giatien',
                'title' => 'Giá tiền sản xuất',
                'desc' => '',               
                'type' => 'text'
                                
            ),

            array(
                
                'id' => 'pt-field-san-pham-hangsx',
                'title' => 'Hãng sản xuất',
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
                
                'id' => 'pt-field-san-pham-gallery',
                'title' => 'Bộ sưu tập ảnh sản phẩm',
                'desc' => '',
                'multiple' => true,
                'type' => 'media'
                                
            ),

            array(
                
                'id' => 'pt-field-san-pham-checkbox-hot',
                'title' => 'Thiết lập sản phẩm Hot',
                'desc' => 'Cho sản phẩm này vào mục sản phẩm Hot',               
                'type' => 'check'
                                
            )
            
            
        )
        
    );

?>