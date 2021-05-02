<?php      

    $this->post_types[] = array(        

        'label' => 'Proposal',

        'description' => 'Proposal',       

        'slug' => 'proposal',

        'disable' => array('editor', 'excerpt'),

        'taxonomy' => array(

            'label' => 'Skills',
            'slug' => 'skills'

        )

    );