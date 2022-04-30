<?php 

$this->metaboxes[] = array(

    'id' => 'custom-pt-metabox-story',

    'title' => 'Story options',

    'desc' => '',

    'where_show_on' => 'stories',

    'fields' => array(
        
        array(

            'id' => 'pt-field-story-heading',

            'title' => 'Tiêu đề lớn',

            'desc' => '',               

            'type' => 'text'

        ),   

        array(

            'id' => 'pt-field-story-subheading',

            'title' => 'Tiêu đề nhỏ',

            'desc' => '',               

            'type' => 'text'

        ),   

        array(

            'id' => 'pt-field-story-video',

            'title' => 'Video',

            'desc' => '',               

            'type' => 'media',

        ),   

        array(

            'id' => 'pt-field-story-galleries',

            'title' => 'Thư viện ảnh',

            'desc' => '',               

            'type' => 'media',

            'multiple' => true

        ),   

    )
);

$this->metaboxes[] = array(

    'id' => 'custom-pt-metabox-page',

    'title' => 'Page options',

    'desc' => '',

    'where_show_on' => 'page',

    'fields' => array(
        
        array(

            'id' => 'pt-field-page-heading',

            'title' => 'Tiêu đề lớn',

            'desc' => '',               

            'type' => 'text'

        ),  

        array(

            'id' => 'pt-field-page-subheading',

            'title' => 'Tiêu đề nhỏ',

            'desc' => '',               

            'type' => 'text'

        ),  

        array(

            'id' => 'pt-field-page-type',

            'title' => 'Kiểu layout',

            'desc' => '',               

            'type' => 'select',
            
            'options' => array(

                'one' => 'One',
                'two' => 'Two'
                
            )

        ),  

    )
);