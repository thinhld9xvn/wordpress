<?php 
    $this->metaboxes[] = array(
        'id' => 'custom-pt-metabox-slider',
        'title' => 'Slider options',
        'desc' => '',
        'where_show_on' => 'slider',
        'fields' => array(
            array(
                'id' => 'pt-field-slider-heading-label',
                'title' => 'Heading',
                'desc' => '',               
                'type' => 'text'
            ), 
            array(
                'id' => 'pt-field-slider-details-label',
                'title' => 'Nhãn chi tiết',
                'desc' => '',               
                'type' => 'text'
            ), 
            array(
                'id' => 'pt-field-slider-video',
                'title' => 'Video',
                'desc' => '',               
                'type' => 'media'
            ), 
            array(
                'id' => 'pt-field-slider-url',
                'title' => 'Url',
                'desc' => '',               
                'type' => 'text'
            ), 
        )
    );
    $this->metaboxes[] = array(
        'id' => 'custom-pt-metabox-projects',
        'title' => 'Project options',
        'desc' => '',
        'where_show_on' => 'projects',
        'fields' => array(
            array(
                'id' => 'pt-field-project-banner-description',
                'title' => 'Banner description',
                'desc' => '',               
                'type' => 'text'
            ),
            array(
                'id' => 'pt-field-project-heading',
                'title' => 'Heading',
                'desc' => '',               
                'type' => 'text'
            ),   
            array(
                'id' => 'pt-field-project-description',
                'title' => 'Description',
                'desc' => '',               
                'type' => 'editor'
            ),   
            array(
                'id' => 'pt-field-project-location',
                'title' => 'Vị trí',
                'desc' => '',               
                'type' => 'text'
            ),   
            array(
                'id' => 'pt-field-project-dt',
                'title' => 'Diện tích (m2)',
                'desc' => '',               
                'type' => 'text'
            ),   
            array(
                'id' => 'pt-field-project-tg',
                'title' => 'Thời gian',
                'desc' => '',               
                'type' => 'text'
            ),   
            array(
                'id' => 'pt-field-project-team',
                'title' => 'Team',
                'desc' => '',               
                'type' => 'text'
            ),   
            array(
                'id' => 'pt-field-groupbox-project-galleries-id',
                'title' => 'Thư viện ảnh',                
                'type' => 'groupbox',
                'fields' => array(
                    array(
                        'id' => 'pt-field-groupbox-project-gallery-row',
                        'title' => '',
                        'desc' => '',
                        'type' => 'accordion',
                        'collapse_title_field' => 'accordion-project-gallery-title',
                        'template' => array(
                            array(
                                'id' => 'accordion-project-gallery-row',
                                'title' => 'Mời nhập đầy đủ thông tin',
                                'type' => 'groupbox',
                                'fields' => array(
                                    array(
                                        'id' => 'accordion-project-gallery-title',
                                        'title' => 'Tiêu đề',
                                        'desc' => '',  
                                        'type' => 'text'
                                    ),
                                    array(
                                        'id' => 'accordion-project-gallery-setof',
                                        'title' => 'Thư viện ảnh',
                                        'desc' => '',  
                                        'type' => 'media',
                                        'multiple' => true
                                    ),
                                )
                            )
                        )
                    )
                )                   
            ),
        )
    );
    $this->metaboxes[] = array(
        'id' => 'custom-pt-metabox-videos',
        'title' => 'Video options',
        'desc' => '',
        'where_show_on' => 'video',
        'fields' => array(
            array(
                'id' => 'pt-field-video-youtube-id',
                'title' => 'Video Youtube id',
                'desc' => '',               
                'type' => 'text'
            ),   
        )
    );
    $this->metaboxes[] = array(
        'id' => 'custom-pt-metabox-gt',
        'title' => 'Thiết lập trang giới thiệu',
        'desc' => '',
        'where_show_on' => 'page',
        'page_id' => ['19', '175'],
        'fields' => array(
            array(
                'id' => 'pt-field-gt-heading-id',
                'title' => 'Heading',
                'desc' => '',               
                'type' => 'text'
            ),   
            array(
                'id' => 'pt-field-gt-introduction-id',
                'title' => 'Phần mở đầu',
                'desc' => '',               
                'type' => 'editor'
            ),   
            array(
                'id' => 'pt-field-gt-slider-id',
                'title' => 'Slider',
                'desc' => '',               
                'type' => 'media',
                'multiple' => true
            ),   
            array(
                'id' => 'pt-field-gt-strength-heading-id',
                'title' => 'Heading (box giới thiệu điểm mạnh)',
                'desc' => '',               
                'type' => 'text'
            ),   
            array(
                'id' => 'pt-field-gt-strength-heading-desc-id',
                'title' => 'Description (box giới thiệu điểm mạnh)',
                'desc' => '',               
                'type' => 'text'
            ),   
            array(
                'id' => 'pt-field-groupbox-strength-lists-id',
                'title' => 'Các điểm mạnh hiện có',                
                'type' => 'groupbox',
                'fields' => array(
                    array(
                        'id' => 'pt-field-groupbox-strength-list-item',
                        'title' => '',
                        'desc' => '',
                        'type' => 'accordion',
                        'collapse_title_field' => 'accordion-strength-list-item-title',
                        'template' => array(
                            array(
                                'id' => 'accordion-strength-list-item',
                                'title' => 'Mời nhập đầy đủ thông tin',
                                'type' => 'groupbox',
                                'fields' => array(
                                    array(
                                        'id' => 'accordion-strength-list-item-title',
                                        'title' => 'Tiêu đề',
                                        'desc' => '',  
                                        'type' => 'text'
                                    ),
                                    array(
                                        'id' => 'accordion-strength-list-item-no',
                                        'title' => 'Số',
                                        'desc' => '',  
                                        'type' => 'text'
                                    ),
                                    array(
                                        'id' => 'accordion-strength-list-item-icon',
                                        'title' => 'Icon',
                                        'desc' => '',  
                                        'type' => 'media'
                                    ),
                                    array(
                                        'id' => 'accordion-strength-list-item-contents',
                                        'title' => 'Nội dung',
                                        'desc' => '',  
                                        'type' => 'editor'
                                    )
                                )
                            )
                        )
                    )
                )                   
            ),
            array(
                'id' => 'pt-field-groupbox-userlists-id',
                'title' => 'Giới thiệu các thành viên công ty',                
                'type' => 'groupbox',
                'fields' => array(
                    array(
                        'id' => 'pt-field-groupbox-user-item',
                        'title' => '',
                        'desc' => '',
                        'type' => 'accordion',
                        'collapse_title_field' => 'accordion-user-item-name',
                        'template' => array(
                            array(
                                'id' => 'accordion-user-item',
                                'title' => 'Mời nhập đầy đủ thông tin',
                                'type' => 'groupbox',
                                'fields' => array(
                                    array(
                                        'id' => 'accordion-user-item-name',
                                        'title' => 'Tên thành viên',
                                        'desc' => '',  
                                        'type' => 'text'
                                    ),
                                    array(
                                        'id' => 'accordion-user-item-avatar',
                                        'title' => 'Ảnh thành viên',
                                        'desc' => '',  
                                        'type' => 'media'
                                    ),
                                    array(
                                        'id' => 'accordion-user-item-professor',
                                        'title' => 'Chức vụ',
                                        'desc' => '',  
                                        'type' => 'text'
                                    ),
                                    array(
                                        'id' => 'accordion-user-item-type',
                                        'title' => 'Xếp loại',
                                        'desc' => '',  
                                        'type' => 'select',
                                        'options' => USER_LISTS_TYPES
                                    ),
                                )
                            )
                        )
                    )
                )                   
            ),
            array(
                'id' => 'pt-field-gt-price-heading-id',
                'title' => 'Heading (box giá)',
                'desc' => '',               
                'type' => 'text'
            ), 
            array(
                'id' => 'pt-field-gt-price-contents-id',
                'title' => 'Nội dung (box giá)',
                'desc' => '',               
                'type' => 'editor'
            ), 
            array(
                'id' => 'pt-field-gt-price-thumbnail-id',
                'title' => 'Ảnh đại diện (box giá)',
                'desc' => '',               
                'type' => 'media',
            ), 
            array(
                'id' => 'pt-field-gt-price-button-text-id',
                'title' => 'Button text (box giá)',
                'desc' => '',               
                'type' => 'text'
            ), 
            array(
                'id' => 'pt-field-gt-price-page-id-id',
                'title' => 'Trang sẽ chuyển đến khi nhấn nút (box giá)',
                'desc' => '',               
                'type' => 'select',
                'data' => 'pages',
            ), 
            array(
                'id' => 'pt-field-gt-duration-working-heading-id',
                'title' => 'Heading (box giai đoạn làm việc)',
                'desc' => '',               
                'type' => 'text'
            ), 
            array(
                'id' => 'pt-field-gt-duration-working-desc-id',
                'title' => 'Mô tả ngắn (box giai đoạn làm việc)',
                'desc' => '',               
                'type' => 'text'
            ), 
            array(
                'id' => 'pt-field-groupbox-gt-duration-working-list-items-id',
                'title' => 'Danh sách thứ tự các công đoạn',                
                'type' => 'groupbox',
                'fields' => array(
                    array(
                        'id' => 'pt-field-groupbox-gt-duration-working-list-item',
                        'title' => '',
                        'desc' => '',
                        'type' => 'accordion',
                        'collapse_title_field' => 'accordion-duration-working-list-item-title',
                        'template' => array(
                            array(
                                'id' => 'accordion-duration-working-list-item',
                                'title' => 'Mời nhập đầy đủ thông tin',
                                'type' => 'groupbox',
                                'fields' => array(
                                    array(
                                        'id' => 'accordion-duration-working-list-item-title',
                                        'title' => 'Tiêu đề',
                                        'desc' => '',  
                                        'type' => 'text'
                                    ),
                                    array(
                                        'id' => 'accordion-duration-working-list-item-icon',
                                        'title' => 'Icon',
                                        'desc' => '',  
                                        'type' => 'media'
                                    ),
                                    array(
                                        'id' => 'accordion-duration-working-list-item-contents',
                                        'title' => 'Nội dung',
                                        'desc' => '',  
                                        'type' => 'editor'
                                    )
                                )
                            )
                        )
                    )
                )                   
            ),
        )
    );
    $this->metaboxes[] = array(
        'id' => 'custom-pt-metabox-recruit',
        'title' => 'Thiết lập trang tuyển dụng',
        'desc' => '',
        'where_show_on' => 'page',
        'page_id' => ['25', '105'],
        'fields' => array(
            array(
                'id' => 'pt-field-recruit-heading-id',
                'title' => 'Heading',
                'desc' => '',               
                'type' => 'text'
            ),   
            array(
                'id' => 'pt-field-recruit-introduction-id',
                'title' => 'Introduction',
                'desc' => '',               
                'type' => 'editor'
            ),   
            array(
                'id' => 'pt-field-recruit-button-text-id',
                'title' => 'Button text',
                'desc' => '',               
                'type' => 'text'
            ),   
            array(
                'id' => 'pt-field-recruit-page-id-id',
                'title' => 'Trang sẽ chuyển đến khi nhấn vào button',
                'desc' => '',               
                'type' => 'select',
                'data' => 'pages'
            ),   
        )
    );
    $this->metaboxes[] = array(
        'id' => 'custom-cpt-metabox-recruit',
        'title' => 'Thiết lập trang tuyển dụng',
        'desc' => '',
        'where_show_on' => 'recruit',
        'fields' => array(
            array(
                'id' => 'pt-field-recruit-location-id',
                'title' => 'Địa điểm tuyển dụng',
                'desc' => '',               
                'type' => 'text'
            ),   
        )
    );