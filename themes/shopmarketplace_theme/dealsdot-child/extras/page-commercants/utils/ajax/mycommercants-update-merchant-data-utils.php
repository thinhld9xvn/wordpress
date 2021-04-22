<?php 

    namespace MyCommercantsPage;

    class MyCommercantsUpdateMercantDataUtils {

        public static function update() {             
    
            $data = json_decode(stripslashes( $_POST['commercants_lists'] ), true); 
            
            $commercants_list = '';
    
            //print_r($data); die();
    
            if ( sizeof( $data ) > 0 ) :

                $commercants_list = \Commercants\CommercantParseListsToOptionsUtils::parse($data, true);
                
                //echo $commercants_list;

                \Commercants\CommercantUpdateListsOptionUtils::update($commercants_list);
    
                //update_option(_COM_OPTION_NAME, $commercants_list);
    
                //echo get_option(_COM_OPTION_NAME); die();
                
                \Commercants\CommercantSetMapCategoriesUtils::map();
    
                $txtDateNow = date('d-m-Y h:i A', time());
    
                update_option(_COM_OPTION_RECENT_UPDATE, $txtDateNow);
    
                echo $txtDateNow;
    
                die();
    
            endif;
    
            echo 'error';
    
            die();
           
        }

    }