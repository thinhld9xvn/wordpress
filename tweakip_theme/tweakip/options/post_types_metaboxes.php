<?php 

    $this->metaboxes[] = array(

        'id' => 'custom-pt-metabox-slider',

        'title' => 'Slider Metabox',

        'desc' => '',

        'where_show_on' => 'slider',

        'fields' => array(  

            array(

                'id' => 'pt-field-groupbox-slider-heading',
                'title' => 'Slider heading',                
                'type' => 'groupbox',                
                'fields' => array( 

                    array(

                        'id' => 'pt-field-slider-heading',

                        'title' => 'Heading line text',

                        'desc' => '',

                        'type' => 'editor'

                    ),

                    array(

                        'id' => 'pt-field-slider-small',

                        'title' => 'Small line text',

                        'desc' => '',

                        'type' => 'editor'

                    )

                )

            )

        )
    );

    $this->metaboxes[] = array(

        'id' => 'custom-pt-metabox-page-diensten',

        'title' => 'Diensten Metabox',

        'desc' => '',

        'where_show_on' => 'page',

        'page_template' => 'page-diensten',

        'fields' => array(

            array(

                'id' => 'pt-field-groupbox-page-diensten',
                'title' => 'Diensten Template',                
                'type' => 'groupbox', 
                'condition' => array(

                    'visible' => array(

                            'meta_field_id' => 'pt-field-diensten-item-layout',
                            'meta_field_value' => 'none',
                            'meta_field_compare' => '='
                            
                        )
                
                ),              
                'fields' => array(

                    array(

                        'id' => 'pt-field-diensten-template-previous-thread',

                        'title' => 'Previous thread text',

                        'desc' => '',

                        'type' => 'text'

                    ),

                )
            ),

            array(

                'id' => 'pt-field-groupbox-page-diensten',
                'title' => 'Diensten Item',                
                'type' => 'groupbox', 
                'condition' => array(

                    'visible' => array(

                            'meta_field_id' => 'pt-field-diensten-item-layout',
                            'meta_field_value' => 'children',
                            'meta_field_compare' => '='
                            
                        )
                
                ),              
                'fields' => array(

                    array(

                        'id' => 'pt-field-diensten-item-icon',

                        'title' => 'Icon',

                        'desc' => '',

                        'type' => 'media'

                    ),

                    array(

                        'id' => 'pt-field-diensten-item-background',

                        'title' => 'Background',

                        'desc' => '',

                        'type' => 'media'

                    ),


                    array(

                        'id' => 'pt-field-diensten-item-description',

                        'title' => 'Description',

                        'desc' => '',

                        'type' => 'textarea'

                    ),

                    array(

                        'id' => 'pt-field-diensten-item-readmore',

                        'title' => 'Readmore',

                        'desc' => '',

                        'type' => 'text'

                    )

                )

            ),            

            array(

                'id' => 'pt-field-groupbox-page-diensten',
                'title' => 'Diensten Layout',                
                'type' => 'groupbox',                
                'fields' => array( 

                    array(

                        'id' => 'pt-field-diensten-item-layout',              

                        'title' => 'Diensten layout',

                        'desc' => '( Note: If this page is "Diensten", you will choose "None" )',

                        'type' => 'select',

                        'options' => array(

                            'none' => 'None',
                            'children' => 'Children',
                            'subchildren' => 'Subchildren'

                        ),

                        'validate' => true

                    )

                    
                )

            )

        )
    );

    $this->metaboxes[] = array(

        'id' => 'custom-pt-metabox-page-portfolio',

        'title' => 'Portfolio Metabox',

        'desc' => '',

        'where_show_on' => 'page',

        'page_template' => 'page-portfolio',

        'fields' => array(

            array(

                'id' => 'pt-field-groupbox-page-portfolio-case',
                'title' => 'Portfolio Case',
                'type' => 'groupbox',
                'condition' => array(

                    'visible' => array(

                            'meta_field_id' => 'pt-field-portfolio-item-layout',
                            'meta_field_value' => 'case',
                            'meta_field_compare' => '='
                            
                        )
                
                ),                           
                'fields' => array( 
                    
                    array(

                        'id' => 'pt-field-portfolio-case-fbpost-code',

                        'title' => 'Facebook Post Code',

                        'desc' => '',

                        'type' => 'textarea'

                    ), 

                    array(

                        'id' => 'pt-field-portfolio-case-slider',

                        'title' => 'Case Slider',

                        'desc' => 'Please choose multiple images',

                        'multiple' => true,

                        'type' => 'media'

                    )

                )

            ),

            array(

                'id' => 'pt-field-groupbox-portfolio-layout',
                'title' => 'Portfolio Layout',                
                'type' => 'groupbox',                
                'fields' => array(

                    array(

                        'id' => 'pt-field-portfolio-item-layout',              

                        'title' => 'Portfolio layout',

                        'desc' => '( Note: If this page is "Portfolio", you will choose "None" )',

                        'type' => 'select',

                        'options' => array(

                            'none' => 'None',
                            'case' => 'Case'                            

                        ),

                        'validate' => true

                    )

                    
                )

            )

        )
    );

    $this->metaboxes[] = array(

        'id' => 'custom-pt-metabox-page-support',

        'title' => 'Support Metabox',

        'desc' => '',

        'where_show_on' => 'page',

        'page_template' => 'page-support',

        'fields' => array(

            array(

                'id' => 'pt-field-groupbox-support-heading',
                'title' => 'Support heading',                
                'type' => 'groupbox',  
                'condition' => array(

                        'visible' => array(

                                'meta_field_id' => 'pt-field-support-item-layout',
                                'meta_field_value' => 'none',
                                'meta_field_compare' => '='
                                
                            )
                
                ),
                'fields' => array(

                    array(

                        'id' => 'pt-field-support-heading-description',
                        'title' => 'Heading description',
                        'desc' => '',
                        'type' => 'textarea'
                    ),           

                    array(

                        'id' => 'pt-field-support-small-description',
                        'title' => 'Small description',
                        'desc' => '',  
                        'type' => 'textarea'
                    )

                )
                
            ),
            
            array(

                'id' => 'pt-field-groupbox-support-item',
                'title' => 'Support item',
                'type' => 'groupbox',
                'condition' => array(

                    'visible' => array(

                        array(

                            array(

                                'meta_field_id' => 'pt-field-support-item-layout',
                                'meta_field_value' => 'none',
                                'meta_field_compare' => '!='

                            ),

                            array(

                                'meta_field_id' => 'pt-field-support-vragen-item-layout',
                                'meta_field_value' => 'none',
                                'meta_field_compare' => '='

                            )

                        ),

                        array(

                            'condition_operator' => 'AND'

                        )

                    )

                ),

                'fields' => array(

                    array(

                        'id' => 'pt-field-support-child-icon',

                        'title' => 'Icon',

                        'desc' => 'This field display on box list in Support page',

                        'multiple' => false,

                        'type' => 'media'                       

                    ),

                    array(

                        'id' => 'pt-field-support-child-background',

                        'title' => 'Background',

                        'desc' => 'This field display on box list in Support page',  

                        'multiple' => false,

                        'type' => 'media'
                    ),

                    array(

                        'id' => 'pt-field-support-child-description',

                        'title' => 'Description',

                        'desc' => 'This field display on box list in Support page',  

                        'type' => 'textarea'

                    )
                
                )
            
            ),

            array(

                'id' => 'pt-field-groupbox-support-layout',
                'title' => 'Support layout',
                'type' => 'groupbox',
                'fields' => array(

                    array(

                        'id' => 'pt-field-support-item-layout',              

                        'title' => 'Support layout',

                        'desc' => '( Note: If this page is "Support", you will choose "None" )',

                        'type' => 'select',

                        'options' => array(

                            'none' => 'None',                    
                            'service-desk' => 'Servicedesk',
                            'hulp-op-afstand' => 'Hulp op afstand',
                            'vragen' => 'Vragen'

                        ),

                        'validate' => true

                    )

                )

            )

        )
    );    

    $this->metaboxes[] = array(

        'id' => 'custom-pt-metabox-page-support-servicedesk',

        'title' => 'Servicedesk Metabox',

        'desc' => '',

        'where_show_on' => 'page',

        'page_template' => 'page-support',

        'condition' => array(

            'visible' => array(

                    'meta_field_id' => 'pt-field-support-item-layout',
                    'meta_field_value' => 'service-desk',
                    'meta_field_compare' => '='                        

                )

        ),

        'fields' => array(

            array(

                'id' => 'pt-field-groupbox-support-servicedesk-heading',
                'title' => 'Servicedesk heading',                
                'type' => 'groupbox',
                'fields' => array(

                    array(

                        'id' => 'pt-field-support-servicedesk-heading-description',

                        'title' => 'Heading description',

                        'desc' => 'This field display on heading in Servicedesk page',  

                        'type' => 'textarea'

                    ),

                    array(

                        'id' => 'pt-field-support-servicedesk-small-description',

                        'title' => 'Small description',

                        'desc' => 'This field display on Small description ( below heading ) in Servicedesk page',  

                        'type' => 'textarea'               

                    )

                )

            ),

            array(

                'id' => 'pt-field-groupbox-support-servicedesk-contacts',
                'title' => 'Servicedesk contacts',                
                'type' => 'groupbox',
                
                'fields' => array(

                    array(

                        'id' => 'pt-field-support-servicedesk-contact-item-content',

                        'title' => '',

                        'desc' => '',

                        'type' => 'accordion',

                        'collapse_title_field' => 'accordion-support-servicedesk-contact-item-title',

                        'template' => array(

                            array(

                                'id' => 'accordion-groupbox-support-servicedesk-contact-item',
                                'title' => 'Contact',
                                'type' => 'groupbox',
                                'fields' => array(

                                    array(

                                        'id' => 'accordion-support-servicedesk-contact-item-title',

                                        'title' => 'Title',

                                        'desc' => 'This field display on box list in Servicedesk page',  

                                        'type' => 'text'

                                    ),

                                    array(

                                        'id' => 'accordion-support-servicedesk-contact-icon',

                                        'title' => 'Icon',

                                        'desc' => 'This field display on box list in Servicedesk page',  

                                        'type' => 'media',

                                        'multiple' => false                       

                                    ),

                                    array(

                                        'id' => 'accordion-support-servicedesk-contact-background',

                                        'title' => 'Background',

                                        'desc' => 'This field display on box list in Servicedesk page',  

                                        'type' => 'media',

                                        'multiple' => false                       
                                    ),

                                    array(

                                        'id' => 'accordion-support-servicedesk-contact-description',

                                        'title' => 'Description',

                                        'desc' => 'This field display on box list in Servicedesk page',  

                                        'type' => 'textarea'                        

                                    ),

                                    array(

                                        'id' => 'accordion-support-servicedesk-contact-url',

                                        'title' => 'Url',

                                        'desc' => 'This field display on box list in Servicedesk page',  

                                        'type' => 'text'                       

                                    )

                                )

                            )

                        )

                    )

                )                   

            )         

        )
    );  

    $this->metaboxes[] = array(

        'id' => 'custom-pt-metabox-page-support-hulp-op-afstand',

        'title' => 'Hulp op afstand Metabox',

        'desc' => '',

        'where_show_on' => 'page',

        'page_template' => 'page-support',

        'condition' => array(

                'visible' => array(

                        'meta_field_id' => 'pt-field-support-item-layout',
                        'meta_field_value' => 'hulp-op-afstand',
                        'meta_field_compare' => '='                        

                    )

            ),

        'fields' => array(

            array(

                'id' => 'pt-field-support-hulp-op-afstand-url',

                'title' => 'Url',

                'desc' => 'This field display on box list in support page',  

                'type' => 'text'
               
            ), 

        )
    );  

    $this->metaboxes[] = array(

        'id' => 'custom-pt-metabox-page-support-vragen',

        'title' => 'Vragen Template Metabox',

        'desc' => '',

        'where_show_on' => 'page',

        'page_template' => 'page-support',

        'condition' => array(

                'visible' => array(

                        'meta_field_id' => 'pt-field-support-item-layout',
                        'meta_field_value' => 'vragen',
                        'meta_field_compare' => '='                        

                    )

            ),

        'fields' => array( 

            array(

                'id' => 'pt-field-groupbox-support-vragen-template-heading',
                'title' => 'Heading',                
                'type' => 'groupbox',  
                'condition' => array(

                    'visible' => array(

                            'meta_field_id' => 'pt-field-support-vragen-item-layout',
                            'meta_field_value' => 'none',
                            'meta_field_compare' => '='

                        )

                ),
                'fields' => array(

                    array(

                        'id' => 'pt-field-support-vragen-template-heading',

                        'title' => 'Heading',

                        'desc' => '',  

                        'type' => 'textarea'                        
                       
                    ), 

                    array(

                        'id' => 'pt-field-support-vragen-template-small-description',

                        'title' => 'Small description',

                        'desc' => '',  

                        'type' => 'textarea'

                    )

                )

            ),

            array(

                'id' => 'pt-field-groupbox-support-vragen-template-overview',
                'title' => 'Overview',                
                'type' => 'groupbox',  
                'condition' => array(

                    'visible' => array(

                            'meta_field_id' => 'pt-field-support-vragen-item-layout',
                            'meta_field_value' => 'none',
                            'meta_field_compare' => '='

                        )

                ),
                'fields' => array(

                    array(

                        'id' => 'pt-field-support-vragen-template-overview-button-text',

                        'title' => 'Overview button text',

                        'desc' => '',

                        'type' => 'text'                       
                       
                    ),
                    array(

                        'id' => 'pt-field-support-vragen-template-children-previous-thread-text',

                        'title' => 'Previous thread text',

                        'desc' => 'Previous thread text of children vragen page',

                        'type' => 'text'
                       
                    ),
                     array(

                        'id' => 'pt-field-support-vragen-template-subchildren-previous-thread-text',

                        'title' => 'Previous thread text',

                        'desc' => 'Previous thread text of sub-children vragen page',

                        'type' => 'text'                       
                       
                    )

                )

            ),            

            array(

                'id' => 'pt-field-groupbox-vragen-layout',
                'title' => 'Vragen layout',                
                'type' => 'groupbox',
                'fields' => array(

                   array(

                        'id' => 'pt-field-support-vragen-item-layout',

                        'title' => 'Layout',

                        'desc' => '( Note: If this page is "Vragen", you will choose "None" )',  

                        'type' => 'select',

                         'options' => array(

                            'none' => 'None',                    
                            'children' => 'Children'

                        ),

                        'validate' => true
                       
                    )               

                )

            )          

        )
    );    

    $this->metaboxes[] = array(

        'id' => 'custom-pt-metabox-page-support-vragen-children',

        'title' => 'Vragen Children Metabox',

        'desc' => '',

        'where_show_on' => 'page',

        'page_template' => 'page-support',

        'condition' => array(

                'visible' => array(

                        'meta_field_id' => 'pt-field-support-vragen-item-layout',
                        'meta_field_value' => 'children',
                        'meta_field_compare' => '='                        

                    )

            ),

        'fields' => array(             

            array(

                'id' => 'pt-field-groupbox-vragen-children-content',
                'title' => 'Children entries content',
                'type' => 'groupbox',
                'fields' => array( 

                    array(

                        'id' => 'pt-field-support-vragen-children-entries-content',

                        'title' => '',

                        'desc' => '',

                        'type' => 'accordion',

                        'collapse_title_field' => 'accordion-vragen-children-entry-title',

                        'template' => array(

                            array(

                                'id' => 'accordion-groupbox-vragen-children-entry-title',
                                'title' => 'Entry title',
                                'type' => 'groupbox',
                                'fields' => array(

                                    array(

                                        'id' => 'accordion-vragen-children-entry-title',

                                        'title' => 'Entry title',

                                        'desc' => '',

                                        'type' => 'text',
                                       
                                    )

                                )

                            ),

                            array(

                                'id' => 'accordion-groupbox-vragen-subchildren-entry-content',
                                'title' => 'Entry content',
                                'type' => 'groupbox',
                                'fields' => array(                            
                             
                                    array(

                                        'id' => 'accordion-vragen-subchildren-entry-content',

                                        'title' => 'Entry content',

                                        'desc' => '',

                                        'type' => 'editor'  
                                       
                                    )

                                )

                            )

                        )               
                       
                    )                         

                )                 

            )

        )  

        
    ); 
   
    
?>