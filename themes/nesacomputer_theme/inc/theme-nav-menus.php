<?php   
    $args = array(
        'primary' => __( 'Primary Menu', 'gco' ),
        'nav' => __( 'Nav Category Menu', 'gco' ),
        'footer1' => __( 'Footer Menu 1', 'gco' ),
        'footer2' => __( 'Footer Menu 2', 'gco' ),
        'footer3' => __( 'Footer Menu 3', 'gco' ),
    );
    register_nav_menus( $args );