<?php 

    namespace MyCommercantsPage;

    class MyCommercantsUpdateCoordsDataUtils {

        public static function update() {

            $commercants_coords = $_POST['commercants_coords_list'];      

            update_option( _COM_COORDS_OPTION_NAME, $commercants_coords );
    
            echo 'success';
    
            die();

        }

    }