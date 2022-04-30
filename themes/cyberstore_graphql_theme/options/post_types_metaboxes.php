<?php 

$this->metaboxes[] = array(

    'id' => 'custom-pt-metabox-slider',

    'title' => 'Slider options',

    'desc' => '',

    'where_show_on' => 'slider',

    'fields' => array(
        
        array(

            'id' => 'pt-field-slider-heading',

            'title' => 'Heading',

            'desc' => '',               

            'type' => 'text'

        ),       

        array(

            'id' => 'pt-field-slider-subheading',

            'title' => 'Subheading',

            'desc' => '',               

            'type' => 'text'

        ),      
       
        array(

            'id' => 'pt-field-slider-button-text',

            'title' => 'Button text',

            'desc' => '',               

            'type' => 'text'

        ),       

        array(

            'id' => 'pt-field-slider-button-url',

            'title' => 'Button url',

            'desc' => '',               

            'type' => 'text'

        ),       

    )
);

$this->metaboxes[] = array(

    'id' => 'custom-pt-metabox-portfolio',

    'title' => 'Portfolio options',

    'desc' => '',

    'where_show_on' => 'portfolio',

    'fields' => array(
        
       
        array(

            'id' => 'pt-field-portfolio-button-text',

            'title' => 'Button text',

            'desc' => '',               

            'type' => 'text'

        ),       

        array(

            'id' => 'pt-field-portfolio-button-url',

            'title' => 'Button url',

            'desc' => '',               

            'type' => 'text'

        ),       

    )
);