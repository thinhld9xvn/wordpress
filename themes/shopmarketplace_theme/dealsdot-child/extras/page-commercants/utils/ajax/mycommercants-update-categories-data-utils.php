<?php 

    namespace MyCommercantsPage;

    class MyCommercantsUpdateCategoriesDataUtils {

        public static function update() {

            $categories_list = json_decode( stripslashes( $_POST['categories_list'] ), true );

            $product_cat = PRODUCT_TAXONOMY;

            foreach ($categories_list as $key => $row):     
                
                $name = ucfirst( trim( $row[1] ) );

                if ( ! term_exists($name, $product_cat ) ) :

                    $term = wp_create_term($name, $product_cat);

                    if ( is_wp_error($term) ) :

                        echo 'error';
                        
                        die();

                    endif;
                
                endif;

            endforeach;

            echo date('d-m-Y h:i A', time());
            die();

           
        }

    }