<?php 

function remove_admin_login_header() {
    remove_action('wp_head', '_admin_bar_bump_cb');
}

add_action('get_header', 'remove_admin_login_header');

add_filter( 'show_admin_bar', '__return_false' );


function filter_sort_qualification_terms( $terms, $taxonomy, $args ) { 

    $tax_slug = $taxonomy[0];          

    if ( $tax_slug === JOBS_QUALIFICATION_TAXONOMY ) :

        usort($terms, function($t1, $t2) {

            $t1_name = $t1->name;
            $t2_name = $t2->name;

            $i1 = (int) explode('-', $t1_name)[0];
            $i2 = (int) explode('-', $t2_name)[0];

            if ( $i1 === $i2 ) return 0;

            return $i1 < $i2 ? -1 : 1;

        });

    endif;

    return $terms; 

}	

add_filter( 'get_terms', 'filter_sort_qualification_terms', 10, 3 ); 

add_action('init', array('UserMemberShip', 'update_online_list'));

add_action( 'user_register', array('UserMemberShip', 'create_default_user_role'), 10, 1 );

add_action('wp', array('AgoraVideoCall', 'initialize'));
add_action('wp', array('UserMemberShip', 'requiredLogin'));

add_filter( 'body_class', 'fitler_custom_class', 999 );
function fitler_custom_class( $classes ) {

    if ( is_page_template() ) {        

        global $post;

        $p_acc_id = get_option( 'woocommerce_myaccount_page_id' );
        $p_tmp_id = $post->ID;

        $page_account_class = "page-id-$p_acc_id";
        $page_template_class = "page-id-$p_tmp_id";  

        $woocommerce_classes = ['woocommerce-account', 'woocommerce-page',
                                'woocommerce-js', 'woocommerce-' . $post->post_slug];           

        $idx = array_search($page_template_class, $classes);

        if ( FALSE !== $idx ) :

            unset($classes[$idx]);        

        endif;

       $classes = array_unique(array_merge($classes, array($page_account_class)));
       $classes = array_unique(array_merge($classes, $woocommerce_classes));
        
        if ( is_user_logged_in() ) : 
            
            $classes = array_unique(array_merge($classes, array('logged-in')));

        endif;

    }

    return $classes;
}