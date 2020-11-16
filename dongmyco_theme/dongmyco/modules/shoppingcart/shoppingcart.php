<?php     
    require_once 'inc/shortcodes.php';    

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
        wp_enqueue_script('ajx-shoppingcart', get_template_directory_uri() . '/modules/shoppingcart/js/ajx.shoppingcart.min.js', array('jquery'), 'v1.0.0' , true);
        wp_localize_script('ajx-shoppingcart', 'sb_admin_ajax', array('url' => admin_url('admin-ajax.php')));
      }
     add_action('wp_enqueue_scripts', 'sb_shoppingcart_script');
     
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
        $result = 'failed';
            
        $shoppingcart = new ShoppingCart;
        
        switch ($cmd) {
            
            case 'update_carts':
               $carts = json_decode( preg_replace( "/\\\/", "", $_POST['carts'] ) );               
               $result = $shoppingcart->update_carts( $carts );               

               break;
            
            default:
                break;
        }

        echo $result;
        die();
        
    }
    
    add_action('wp_ajax_sb_shoppingcart_ajax', 'sb_shoppingcart_callback');
    add_action('wp_ajax_nopriv_sb_shoppingcart_ajax', 'sb_shoppingcart_callback');
?>