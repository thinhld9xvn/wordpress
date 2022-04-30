<?php
    $this->metaboxes[] = array(

        'id' => 'term-metabox-product',
        'title' => 'Metabox products',
        'layout' => 'product',
        'fields' => array( 

            array(

                'id' => 'term-field-term-product-advanced-options',
                'title' => 'Advanced options',
                'desc' => '',
                'type' => 'check',
                'data' => array(

                    'show-on-gadgets-homepage' => 'Show on gadgets homepage'

                )

            )

        )

    ); 
    
    $this->metaboxes[] = array(

        'id' => 'term-metabox-layout',
        'title' => 'Terms Layout',
        'term_metaboxes_layout' => true,
        'fields' => array(

            array(

                'id' => 'term-field-layout',
                'title' => 'Metabox Layout',
                'desc' => 'Metabox Layout',
                'type' => 'select',
                'options' => array(

                    'null' => 'Empty',
                    'product' => 'Products'                 
                   
                )

            )

        )

    );