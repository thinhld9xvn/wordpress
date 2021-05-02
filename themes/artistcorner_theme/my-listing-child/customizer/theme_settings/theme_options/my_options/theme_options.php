<?php

    $this->sections[] = array(

        'id' => 'section-header',

        'title'  => array(

           'vi' => 'Header',

           'en' => 'Header'

       ),

        'desc'   => array(

            'vi' => 'Tất cả thiết lập cho header',

           'en' => 'All header settings'

       ),

        'fields' => array(

            array(

                'id' => 'header-section-1',

                'type' => 'section',

                'title' => array(

                             

                               'vi' => 'Thiết lập logo và background',

                               'en' => 'Logo and background Settings'

                             

                           ),

                'desc' => '',

                'indent' => true

            ),

                array(

                    'id'    => 'logo-image',

                    'type'  => 'media',

                    'title' => array(                                    

                        'vi' => 'Logo website',

                        'en' => 'Logo website'

                    ),

                    'desc'  => array(                                 

                        'vi' => 'Mời chọn logo cho website',

                        'en' => 'Please choose logo website image'                                    

                    )

                ),            

                array(

                    'id'    => 'logo-image-mobile',

                    'type'  => 'media',

                    'title' => array(                                    

                        'vi' => 'Logo Mobile website',

                        'en' => 'Logo Mobile website'

                    ),

                    'desc'  => array(                                 

                        'vi' => 'Mời chọn logo mobile cho website',

                        'en' => 'Please choose logo mobile website image'                                    

                    )

                ),               
               

            array(

                'id' => 'header-section-2',

                'type' => 'section',

                'indent' => false 

            )

        )

    );      

    $this->sections[] = array(

        'id' => 'section-profile-form',

        'title'  => array(                     

            'vi' => 'Profile Form',                     

            'en' => 'Profile Form'

        ),

        'desc'   => array(

            'vi' => '',                     

            'en' => 'All profile form settings'            

        ),

        'fields' => array(            

            array(

                'id' => 'profileform-section-1',

                'type' => 'section',

                'title' => array(                                

                    'vi' => '',

                    'en' => 'Validation'                    

                ),

                'desc' => '',

                'indent' => true

            ),

                array(

                    'id'    => 'profileform-avatar-required-msg',

                    'type'  => 'text',

                    'title' => array(                        

                        'vi' => '',

                        'en' => 'Avatar profile required message'                        

                    ),

                    'desc'  => array(                                 

                        'vi' => '',

                        'en' => 'Please enter a message'                        

                    ),

                ),                

                array(

                    'id'    => 'profileform-bg-cover-required-msg',

                    'type'  => 'text',

                    'title' => array(                        

                        'vi' => '',

                        'en' => 'Background cover profile required message'                        

                    ),

                    'desc'  => array(                                 

                        'vi' => '',

                        'en' => 'Please enter a message'                        

                    ),

                ),                

                array(

                    'id'    => 'profileform-job-description-required-msg',

                    'type'  => 'text',

                    'title' => array(                        

                        'vi' => '',

                        'en' => 'Job description required message'                        

                    ),

                    'desc'  => array(                                 

                        'vi' => '',

                        'en' => 'Please enter a message'                        

                    ),

                ),    
                
                array(

                    'id'    => 'profileform-company-logo-required-msg',

                    'type'  => 'text',

                    'title' => array(                        

                        'vi' => '',

                        'en' => 'Company logo required message'                        

                    ),

                    'desc'  => array(                                 

                        'vi' => '',

                        'en' => 'Please enter a message'                        

                    ),

                ),   
                
                array(

                    'id'    => 'profileform-job-category-required-msg',

                    'type'  => 'text',

                    'title' => array(                        

                        'vi' => '',

                        'en' => 'Job category required message'                        

                    ),

                    'desc'  => array(                                 

                        'vi' => '',

                        'en' => 'Please enter a message'                        

                    ),

                ), 
                
                array(

                    'id'    => 'profileform-job-salary-required-msg',

                    'type'  => 'text',

                    'title' => array(                        

                        'vi' => '',

                        'en' => 'Job salary required message'                        

                    ),

                    'desc'  => array(                                 

                        'vi' => '',

                        'en' => 'Please enter a message'                        

                    ),

                ), 

                array(

                    'id'    => 'profileform-job-qualification-required-msg',

                    'type'  => 'text',

                    'title' => array(                        

                        'vi' => '',

                        'en' => 'Job qualification required message'                        

                    ),

                    'desc'  => array(                                 

                        'vi' => '',

                        'en' => 'Please enter a message'                        

                    ),

                ), 

                array(

                    'id'    => 'profileform-job-vacancy-type-required-msg',

                    'type'  => 'text',

                    'title' => array(                        

                        'vi' => '',

                        'en' => 'Job vacancy type required message'                        

                    ),

                    'desc'  => array(                                 

                        'vi' => '',

                        'en' => 'Please enter a message'                        

                    ),

                ), 

                array(

                    'id'    => 'profileform-region-required-msg',

                    'type'  => 'text',

                    'title' => array(                        

                        'vi' => '',

                        'en' => 'Region required message'                        

                    ),

                    'desc'  => array(                                 

                        'vi' => '',

                        'en' => 'Please enter a message'                        

                    ),

                ), 

                array(

                    'id'    => 'profileform-account-type-required-msg',

                    'type'  => 'text',

                    'title' => array(                        

                        'vi' => '',

                        'en' => 'Account type required message'                        

                    ),

                    'desc'  => array(                                 

                        'vi' => '',

                        'en' => 'Please enter a message'                        

                    ),

                ), 

                array(

                    'id'    => 'profileform-language-required-msg',

                    'type'  => 'text',

                    'title' => array(                        

                        'vi' => '',

                        'en' => 'Language required message'                        

                    ),

                    'desc'  => array(                                 

                        'vi' => '',

                        'en' => 'Please enter a message'                        

                    ),

                ), 

                array(

                    'id'    => 'profileform-category-of-service-required-msg',

                    'type'  => 'text',

                    'title' => array(                        

                        'vi' => '',

                        'en' => 'Category of service required message'                        

                    ),

                    'desc'  => array(                                 

                        'vi' => '',

                        'en' => 'Please enter a message'                        

                    ),

                ), 

            array(

                'id' => 'contactform-section-2',

                'type' => 'section',

                'indent' => false 

            ),

        )

    );    

    $this->sections[] = array(

        'id' => 'section-discover-job-categories',

        'title'  => array(                     

            'vi' => '',                     

            'en' => 'Discover Job Categories'

        ),

        'desc'   => array(

            'vi' => '',                     

            'en' => 'All settings in discover job categories box (home page)'            

        ),

        'fields' => array(            

            array(

                'id' => 'discover-job-categories-section-1',

                'type' => 'section',

                'title' => array(                                

                    'vi' => '',

                    'en' => 'Slogan'                    

                ),

                'desc' => '',

                'indent' => true

            ),

                array(

                    'id'    => 'discover-jobs-cat-slogan-icon',

                    'type'  => 'text',

                    'title' => array(                        

                        'vi' => '',

                        'en' => 'Slogan icon'                        

                    ),

                    'desc'  => array(                                 

                        'vi' => '',

                        'en' => 'Please enter a icon'                        

                    ),

                ), 

                array(

                    'id'    => 'discover-jobs-cat-slogan-intro',

                    'type'  => 'textarea',

                    'title' => array(                        

                        'vi' => '',

                        'en' => 'Slogan introduction'                        

                    ),

                    'desc'  => array(                                 

                        'vi' => '',

                        'en' => 'Please enter a message'                        

                    ),

                ), 

                array(

                    'id'    => 'discover-jobs-cat-slogan-author',

                    'type'  => 'text',

                    'title' => array(                        

                        'vi' => '',

                        'en' => 'Slogan author'                        

                    ),

                    'desc'  => array(                                 

                        'vi' => '',

                        'en' => 'Please enter a author name'                        

                    ),

                ), 
               

            array(

                'id' => 'discover-job-categories-section-2',

                'type' => 'section',

                'indent' => false 

            ),

        )

    );    

    $this->sections[] = array(

        'id' => 'section-proposal',

        'title'  => array(                     

            'vi' => '',                     

            'en' => 'Proposal'

        ),

        'desc'   => array(

            'vi' => '',                     

            'en' => 'All settings in proposal'            

        ),

        'fields' => array(            

            array(

                'id' => 'proposal-section-1',

                'type' => 'section',

                'title' => array(                                

                    'vi' => '',

                    'en' => 'Expires'                    

                ),

                'desc' => '',

                'indent' => true

            ),

                array(

                    'id'    => 'proposal-expire-timeout',

                    'type'  => 'text',

                    'title' => array(                        

                        'vi' => '',

                        'en' => 'Proposal expires timeout (day)'                        

                    ),

                    'desc'  => array(                                 

                        'vi' => '',

                        'en' => 'Please enter a value'                        

                    ),

                ), 
               

            array(

                'id' => 'proposal-section-2',

                'type' => 'section',

                'indent' => false 

            ),

            array(

                'id' => 'proposal-form-section-1',

                'type' => 'section',

                'title' => array(                                

                    'vi' => '',

                    'en' => 'Form settings'                    

                ),

                'desc' => '',

                'indent' => true

            ),

                array(

                    'id'    => 'proposal-form-beginning-mission',

                    'type'  => 'textarea',

                    'title' => array(                        

                        'vi' => '',

                        'en' => 'Beginning mision options'                        

                    ),

                    'desc'  => array(                                 

                        'vi' => '',

                        'en' => 'Please enter value options'                        

                    ),

                ), 

                array(

                    'id'    => 'proposal-form-length-mission',

                    'type'  => 'textarea',

                    'title' => array(                        

                        'vi' => '',

                        'en' => 'Length of the mission'                        

                    ),

                    'desc'  => array(                                 

                        'vi' => '',

                        'en' => 'Please enter value options'                        

                    ),

                ), 

                array(

                    'id'    => 'proposal-form-mission-location',

                    'type'  => 'textarea',

                    'title' => array(                        

                        'vi' => '',

                        'en' => 'Mission location'                        

                    ),

                    'desc'  => array(                                 

                        'vi' => '',

                        'en' => 'Please enter value options'                        

                    ),

                ), 
               

            array(

                'id' => 'proposal-form-section-2',

                'type' => 'section',

                'indent' => false 

            ),

            array(

                'id' => 'proposal-details-section-1',

                'type' => 'section',

                'title' => array(                                

                    'vi' => '',

                    'en' => 'Proposal details'                    

                ),

                'desc' => '',

                'indent' => true

            ),


                array(

                    'id'    => 'proposal-details-opening-body',

                    'type'  => 'textarea',

                    'title' => array(                        

                        'vi' => '',

                        'en' => 'Opening body contents'                        

                    ),

                    'desc'  => array(                                 

                        'vi' => '',

                        'en' => 'Please enter some contents'                        

                    ),

                ), 

                array(

                    'id'    => 'proposal-profile-sender',

                    'type'  => 'textarea',

                    'title' => array(                        

                        'vi' => '',

                        'en' => 'Profile sender template'                        

                    ),

                    'desc'  => array(                                 

                        'vi' => '',

                        'en' => 'Please enter a html template'                        

                    ),

                ), 

                array(

                    'id'    => 'proposal-no-information-msg',

                    'type'  => 'text',

                    'title' => array(                        

                        'vi' => '',

                        'en' => 'Proposal message when no information'                        

                    ),

                    'desc'  => array(                                 

                        'vi' => '',

                        'en' => 'Please enter a message'                        

                    ),

                ), 



            array(

                'id' => 'proposal-details-section-2',

                'type' => 'section',

                'indent' => false 

            ),

        )

    );
    
    $this->sections[] = array(

        'id' => 'section-comments-form',

        'title'  => array(                     

            'vi' => '',                     

            'en' => 'Comments form'

        ),

        'desc'   => array(

            'vi' => '',                     

            'en' => 'All settings in comments form'            

        ),

        'fields' => array(            

            array(

                'id' => 'commentform-section-1',

                'type' => 'section',

                'title' => array(                                

                    'vi' => '',

                    'en' => 'Expires'                    

                ),

                'desc' => '',

                'indent' => true

            ),

                array(

                    'id'    => 'commentform-update-template',

                    'type'  => 'textarea',

                    'title' => array(                        

                        'vi' => '',

                        'en' => 'Update comment form template'                        

                    ),

                    'desc'  => array(                                 

                        'vi' => '',

                        'en' => 'Please enter a template'                        

                    ),

                ), 
               

            array(

                'id' => 'commentform-section-2',

                'type' => 'section',

                'indent' => false 

            ),
            
        )

    );

    $this->sections[] = array(

        'id' => 'section-agora',

        'title'  => array(                     

            'vi' => '',                     

            'en' => 'Agora settings'

        ),

        'desc'   => array(

            'vi' => '',                     

            'en' => 'All settings in agora'            

        ),

        'fields' => array(            

            array(

                'id' => 'agora-section-1',

                'type' => 'section',

                'title' => array(                                

                    'vi' => '',

                    'en' => 'Global'                    

                ),

                'desc' => '',

                'indent' => true

            ),

                array(

                    'id'    => 'agora-global-def-channel-id',

                    'type'  => 'text',

                    'title' => array(                        

                        'vi' => '',

                        'en' => 'Channel default id'                        

                    ),

                    'desc'  => array(                                 

                        'vi' => '',

                        'en' => 'Please enter a channel id'                        

                    ),

                ), 

                array(

                    'id'    => 'agora-global-page-id',

                    'type'  => 'text',

                    'title' => array(                        

                        'vi' => '',

                        'en' => 'Agora video call page id template'                        

                    ),

                    'desc'  => array(                                 

                        'vi' => '',

                        'en' => 'Please enter a page id'                        

                    ),

                ), 

                array(

                    'id'    => 'agora-global-video-profile',

                    'type'  => 'text',

                    'title' => array(                        

                        'vi' => '',

                        'en' => 'Agora default video profile'                        

                    ),

                    'desc'  => array(                                 

                        'vi' => '',

                        'en' => 'Please enter a value'                        

                    ),

                ), 

                array(

                    'id'    => 'agora-global-screen-profile',

                    'type'  => 'text',

                    'title' => array(                        

                        'vi' => '',

                        'en' => 'Agora default screen profile'                        

                    ),

                    'desc'  => array(                                 

                        'vi' => '',

                        'en' => 'Please enter a value'                        

                    ),

                ), 
               

            array(

                'id' => 'agora-section-2',

                'type' => 'section',

                'indent' => false 

            ),
            
        )

    );