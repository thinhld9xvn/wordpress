<?php     
    require_once 'inc/shortcodes.php';   

    if ( session_status() == PHP_SESSION_NONE ) :

        session_start();

    endif; 

    //unset( $_SESSION['carts'] );

    $options = get_option('section-shoppingcart_option_name');

    $sess_timeout = $options['shoppingcart-session-timeout-id'];

    if ( isset( $_SESSION['carts'] ) ) :

        if ( ! isset( $_SESSION['shoppingcart_expire'] ) ) :

            $_SESSION['shoppingcart_expire'] = time() + (60 * $sess_timeout);

        else :

            $t_expire = $_SESSION['shoppingcart_expire'];
            $t_current = time();

            if ( $t_current >= $t_expire ) :

                unset( $_SESSION['carts'] );
                unset( $_SESSION['shoppingcart_expire'] );

            endif;

        endif;

    endif;
    
    function sb_shoppingcart_script() {
        
        if ( ! is_admin() ) :

            global $combine_admin_enqueue;

            $combine_admin_enqueue['stylesheet'][] = get_template_directory_uri() . '/modules/shoppingcart/css/style.css';

            // datatables
            $combine_admin_enqueue['stylesheet'][] = get_template_directory_uri() . '/modules/shoppingcart/datatables/dataTables.responsive.css';       
            $combine_admin_enqueue['stylesheet'][] = get_template_directory_uri() . '/modules/shoppingcart/datatables/jquery.dataTables.css';       
            
            $combine_admin_enqueue['scripts'][] = get_template_directory_uri() . '/modules/shoppingcart/datatables/jquery.dataTables.min.js';
            $combine_admin_enqueue['scripts'][] = get_template_directory_uri() . '/modules/shoppingcart/datatables/jquery.dataTables.responsive.min.js';       

            // shoppingcart
            $combine_admin_enqueue['scripts'][] = get_template_directory_uri() . '/modules/shoppingcart/js/currency.min.js';            
            $combine_admin_enqueue['scripts'][] = get_template_directory_uri() . '/modules/shoppingcart/js/shoppingcart.min.js';            

        endif;      

    }

    add_action('init', 'sb_shoppingcart_script');

     /* */
     class ShoppingCart {
         
        public function update_carts( $carts ) {

            $_SESSION['carts'] = $carts;

            return 'success';

         }
         
        public function get_carts() {
             
             $carts = array();
             
             if ( isset( $_SESSION['carts'] ) ) :

                $carts = $_SESSION['carts'];

             endif;
             
            return $carts;
         }
         
        public function getTotalCart( $cart ) {

            return $cart->quantity * $cart->price;

        }
         
        public function getTotalCarts( $carts ) {

            $total = 0;
             
            foreach ($carts as $cart) :
                 
                $total += $this->getTotalCart( $cart );
                 
            endforeach;
             
            return $total;

        }
        
    }
    
    function sb_shoppingcart_callback() {
       
        $cmd = $_POST['cmd'];        
            
        $shoppingcart = new ShoppingCart;
        
        switch ($cmd) {
            
            case 'update_carts':

               $carts = json_decode( preg_replace( "/\\\/", "", $_POST['carts'] ) );               
               $result = $shoppingcart->update_carts( $carts );            

               break;

            case 'get_carts':

                $carts = $shoppingcart->get_carts();  

                header('Content-Type: application/json; charset=utf-8');
                echo json_encode( $carts );

                break;           
        }

        die();
        
    }
    
    add_action('wp_ajax_sb_shoppingcart_ajax', 'sb_shoppingcart_callback');
    add_action('wp_ajax_nopriv_sb_shoppingcart_ajax', 'sb_shoppingcart_callback');
?>