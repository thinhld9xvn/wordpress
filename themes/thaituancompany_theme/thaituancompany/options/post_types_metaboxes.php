<?php       

    $this->metaboxes[] = array(

        'id' => 'custom-pt-metabox-san-pham',

        'title' => 'Sản phẩm',

        'desc' => '',

        'where_show_on' => 'san-pham',

        'fields' => array(

            array(
                'id' => 'pt-field-groupbox-product',
                'title' => 'Thông tin sản phẩm',
                'desc' => '',
                'type' => 'groupbox',
                'fields' => array(

                    array(

                        'id' => 'pt-field-groupbox-product-accordion',
                        'title' => 'Nội dung các sản phẩm con',
                        'type' => 'groupbox',
                        'fields' => array( 

                            array(

                                'id' => 'pt-field-product-entries-content',

                                'title' => '',

                                'desc' => '',

                                'type' => 'accordion',

                                'collapse_title_field' => 'accordion-children-product-title',

                                'template' => array(

                                    array(

                                        'id' => 'accordion-groupbox-children-product-title',
                                        'title' => 'Tiêu đề sản phẩm',
                                        'type' => 'groupbox',
                                        'fields' => array(

                                            array(

                                                'id' => 'accordion-children-product-title',

                                                'title' => 'Tiêu đề sản phẩm',

                                                'desc' => '',

                                                'type' => 'text',
                                               
                                            )

                                        )

                                    ),

                                    array(

                                        'id' => 'accordion-groupbox-children-product-avatar',
                                        'title' => 'Ảnh đại diện sản phẩm',
                                        'type' => 'groupbox',
                                        'fields' => array(

                                            array(

                                                'id' => 'accordion-children-product-avatar',

                                                'title' => 'Ảnh đại diện sản phẩm',

                                                'desc' => '',

                                                'type' => 'media',

                                                'thumbnail' => true,

                                                'multiple' => false
                                               
                                            )

                                        )

                                    ),                                   

                                    array(

                                        'id' => 'accordion-groupbox-children-product-price',
                                        'title' => 'Giá tiền sản phẩm',
                                        'type' => 'groupbox',
                                        'fields' => array(

                                            array(

                                                'id' => 'accordion-children-product-price',

                                                'title' => 'Giá tiền sản phẩm',

                                                'desc' => '',

                                                'type' => 'text',

                                                'numformat' => 'vietnam' 
                                               
                                            )

                                        )

                                    ),

                                    array(

                                        'id' => 'accordion-groupbox-children-product-opcode',
                                        'title' => 'Mã sản phẩm',
                                        'type' => 'groupbox',
                                        'fields' => array(

                                            array(

                                                'id' => 'accordion-children-product-opcode',

                                                'title' => 'Mã sản phẩm',

                                                'desc' => '',

                                                'type' => 'text'
                                               
                                               
                                            )

                                        )

                                    ),

                                    array(

                                        'id' => 'accordion-groupbox-children-product-excerpt',
                                        'title' => 'Giới thiệu ngắn',
                                        'type' => 'groupbox',
                                        'fields' => array(

                                            array(

                                                'id' => 'accordion-children-product-excerpt',

                                                'title' => 'Giới thiệu ngắn',

                                                'desc' => '',

                                                'type' => 'editor',

                                                'rows' => 20
                                               
                                            )

                                        )

                                    ),                                   

                                    
                                )               
                               
                            )                         

                        )                 

                    ),

                    array(

                        'id' => 'pt-field-groupbox-product-description',
                        'title' => 'Mô tả chi tiết sản phẩm',
                        'type' => 'groupbox',
                        'fields' => array(

                            array(

                                'id' => 'pt-field-product-description',

                                'title' => 'Mô tả chi tiết sản phẩm',

                                'desc' => '',

                                'type' => 'editor',

                                'rows' => 20
                               
                            )

                        )

                    ), 

                    array(

                        'id' => 'pt-field-groupbox-product-advanced-options',
                        'title' => 'Tùy chọn nâng cao',
                        'type' => 'groupbox',
                        'fields' => array(

                            array(

                                'id' => 'pt-field-product-advanced-options',

                                'title' => 'Tùy chọn nâng cao',

                                'desc' => '',

                                'type' => 'check',

                                'data' => array(
                                    'show-product-on-homepage' => 'Hiển thị sản phẩm này ra trang chủ'
                                )
                               
                            )

                        )

                    ),                

                )
            
            )           

        )

    );