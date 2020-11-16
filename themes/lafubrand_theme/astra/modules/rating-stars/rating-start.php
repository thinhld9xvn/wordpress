<?php	

    function lafuratingstar_enqueue_scripts() {

        if ( is_single() ) :

            global $post;

           wp_enqueue_script('lafu-lafuratingstar-script', ASTRA_THEME_URI . '/modules/rating-stars/js/ratingstar.js', array('jquery'));
           wp_enqueue_style('lafu-lafuratingstar-stylesheet', ASTRA_THEME_URI . '/modules/rating-stars/css/style.css');

           $params = array(

               'post_id' => $post->ID,
               'ip_address' => lafuratingstar_get_ip_address()

           );

           wp_localize_script( 'lafu-lafuratingstar-script', '__current_post_data', $params );

        endif;

    }

    function lafuratingstar_print_frontend_box() { ?>

            <span class="lafuratingbox">

                <span class="ratingbox">

                    <span class="fa fa-star-o star"></span>
                    <span class="fa fa-star-o star"></span>
                    <span class="fa fa-star-o star"></span>
                    <span class="fa fa-star-o star"></span>
                    <span class="fa fa-star-o star"></span>
                    
                </span>

                <span class="label ratedMessage"></span>
                <span class="label thankyouMessage"></span>

                
            </span>

<?php 
    }

    function lafuratingstar_get_ip_address() {

        if ( ! empty( $_SERVER['HTTP_CLIENT_IP'] ) ) :
        
            //check ip from share internet
            $ip = $_SERVER['HTTP_CLIENT_IP'];

        elseif ( ! empty( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) :
            
            //to check ip is pass from proxy
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];

        else :
            
            $ip = $_SERVER['REMOTE_ADDR'];

        endif;

        return $ip;

    }

    function lafuratingstar_ajax_get_rating_post() {

        $post_id = intval( $_POST['post_id'] );

        $key = '_lafuratingstar_post_data';

        $lafuratingstar_post_data = get_post_meta($post_id, $key, true);      

        if ( FALSE === $lafuratingstar_post_data || empty( $lafuratingstar_post_data ) ) :

           echo 'null';           

        else :

           header('Content-Type: application/json; charset: utf-8');
           echo $lafuratingstar_post_data;

        endif;

        die();

    }

    function lafuratingstar_ajax_update_rating_post() {

        $post_id = intval( $_POST['post_id'] );
        $data = $_POST['data'];

        $key = '_lafuratingstar_post_data';

        //$lafuratingstar_post_data = array();

        $lafuratingstar_post_data = get_post_meta($post_id, $key, true);
        $lafuratingstar_post_data = FALSE === $lafuratingstar_post_data || empty( $lafuratingstar_post_data ) ? array() : json_decode( $lafuratingstar_post_data, true );

        $ip = lafuratingstar_get_ip_address();    

        //echo "<pre>"; print_r( $lafuratingstar_post_data ); die();

        if ( empty( $lafuratingstar_post_data ) ) :

            $value = array(

                $ip => array(
               
                    'rate_point' => $data['rate_point']

                )

            );        

            update_post_meta($post_id, $key, json_encode( $value ) );

        else :

            // not exist rating in this ip
            if ( ! array_key_exists($ip, $lafuratingstar_post_data) ) :

                $lafuratingstar_post_data[$ip] = array(
               
                    'rate_point' => $data['rate_point']

                );

                //echo "<pre>"; print_r( $lafuratingstar_post_data ); die();

                update_post_meta($post_id, $key, json_encode( $lafuratingstar_post_data ));


            endif;

        endif;

        echo 'success';

        die();

    }
 
    add_action( 'wp_enqueue_scripts', 'lafuratingstar_enqueue_scripts' );

    add_action( 'wp_ajax_sb_get_rating_post', 'lafuratingstar_ajax_get_rating_post' );
    add_action( 'wp_ajax_nopriv_sb_get_rating_post', 'lafuratingstar_ajax_get_rating_post' );

    add_action( 'wp_ajax_sb_update_rating_post', 'lafuratingstar_ajax_update_rating_post' );
    add_action( 'wp_ajax_nopriv_sb_update_rating_post', 'lafuratingstar_ajax_update_rating_post' );
    