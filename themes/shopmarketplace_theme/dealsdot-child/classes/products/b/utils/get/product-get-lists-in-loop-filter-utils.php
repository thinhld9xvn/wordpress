<?php 

    namespace Products;

    class ProductGetListsInLoopFilterUtils {   
        
        public static function __get_lists($products_list, $posts_per_page, $paged) {

            $arr_product_lists = array();

            $start = $paged * $posts_per_page - $posts_per_page;
            $end = $paged * $posts_per_page - 1;

            $commercants_list = \Commercants\CommercantGetListUtils::get();

            foreach ( $products_list as $key => $product ) :

                if ( $key >= $start && $key <= $end ) :

                    $arr_product_lists[] = \Products\ProductGetDataUtils::get($commercants_list, $product);

                endif;

            endforeach;

            return $arr_product_lists;

        }

        public static function get($args, $filter_args, $msg_empty = "") {

            //print_r($args);

            $messages = \MessageNotification\MessageGetUtils::get_all();

            //extract($messages);

            if ( empty( $msg_empty ) ) :

                $msg_empty = $messages[\Theme_Options\THEME_OPTIONS_FIELDS::NOT_FOUND_ANY_PRODUCT_LABEL_ID];

            endif;

            $product_lists = query_posts( $args );

            //echo var_dump($product_lists); die();
            
            $arr_product_lists = array();
            $products_data = array();

            $distance_args = $filter_args['dis_radius'];

            $livraison_args = $filter_args['livraisons'] ? $filter_args['livraisons'] : \Stores\STORE_DATA::NO_VALUE;
            $clickandcollect_args = $filter_args['clickandcollect'] ? $filter_args['clickandcollect'] : \Stores\STORE_DATA::NO_VALUE;

            $posts_per_page = $filter_args['posts_per_page'];
            $paged = $filter_args['paged'];

            if ( ! empty( $distance_args ) ) :

                $commercants_list = \Commercants\CommercantGetListUtils::get();
                $commercants_coords_list = \Commercants\CommercantGetCoordsListUtils::get();
                
            endif;
            
            if ( have_posts() ) :

                while ( have_posts() ) : the_post();

                    global $product;		
                    
                    $product_id = $product->get_id();

                    $sale_price = $product->regular_price;

                    $shop_name = \Commercants\CommercantGetShopNameUtils::get_by_pid($product_id, 'uppercase');                   

                    if ( empty( $shop_name ) ) continue;

                    $boolValidate = true;

                    if ( /*( ! empty( $filter_args['min_price'] ) && 
                            ! empty( $filter_args['max_price'] ) ) ||*/ 
                            ! empty( $distance_args ) ) :						

                       /* if ( $sale_price >= $filter_args['min_price'] && $sale_price <= $filter_args['max_price'] ) :
                            
                            $boolValidate = true;

                        else :

                            $boolValidate = false;

                        endif;*/

                        //if ( $boolValidate ) :

                            //if ( ! empty( $filter_args['dis_radius'] ) ) :

                                $radius = $distance_args;
                                $user_lat = floatval( $filter_args['user_lat'] );
                                $user_lng = floatval( $filter_args['user_lng'] );

                                $shop_name = \Commercants\CommercantGetShopNameUtils::get_by_pid($product_id);		
                    
                                $id = \Commercants\CommercantSearchShopUtils::search_id($commercants_list, $shop_name);
                                
                                $shop_coords = $commercants_coords_list[$id];

                                $distance = \Commercants\CommercantCalculateDistanceUtils::calc($user_lat, 
                                                                                                $user_lng, 
                                                                                                $shop_coords['lat'], 
                                                                                                $shop_coords['lng']);								

                                if ( $distance <= $radius ) :

                                    $boolValidate = true;

                                else :

                                    $boolValidate = false;

                                endif;
                                
                            //endif;

                        //endif;

                    endif; 

                    if ( $boolValidate ) : 
                    
                        if ( \Stores\StoreValidAttributeUtils::no($livraison_args) && 
                                \Stores\StoreValidAttributeUtils::no($clickandcollect_args) ) :


                            // ignore

                        else :
                                
                            $boolValidate = \Stores\StoreCheckAttributesUtils::has($shop_name,
                                                                                    array(
                                                                                        \Stores\STORE_FIELDS::STORE_DELIVERY_FIELD => $livraison_args,
                                                                                        \Stores\STORE_FIELDS::STORE_CLICK_AND_COLLECT_FIELD => $clickandcollect_args
                                                                                    )
                                                                                );
                            
                        endif;

                    endif;

                    if ( $boolValidate ) :

                        $arr_product_lists[] = $product;

                        //$_products_list[] = \Products\ProductGetDataUtils::get($product);                  

                    endif;					

                endwhile; 

                //echo var_dump($_products_list); die();   
                
                $products_data = $arr_product_lists;
                
                if ( count( $products_data ) > 0 ) : 
                
                    $sort_by = $filter_args['sort_by'];
                    
                    if ( ! empty( $sort_by ) ) :

                        //print_r( $_products_list ); die();					

                        usort($products_data, function ($p1, $p2) use($sort_by) {

                            $price1 = floatval($p1->regular_price);
                            $price2 = floatval($p2->regular_price);

                            $name1 = $p1->get_name();
                            $name2 = $p2->get_name();

                            if ( $sort_by === 'price-up' || $sort_by === 'price-down' ) :

                                if ($price1 === $price2) return 0;
                                
                                if ( $sort_by === 'price-up' ) :

                                    return $price1 < $price2 ? -1 : 1;							

                                endif;
                                
                                return $price2 < $price1 ? -1 : 1;

                            else :
                                
                                if ( $sort_by === 'name-alphabet-az' ) :								

                                    return strcmp($name1, $name2);

                                endif;

                                return strcmp($name2, $name1);

                            endif;						

                        });
                    
                    endif;
                    
                    if ( ! empty( $args['_s'] ) ) :

                        $products_data = ProductSortRevelanceListsInLoopFilterUtils::sort($products_data, $args['_s']);

                    endif;

                endif;          
                
                $arr_results = self::__get_lists($products_data, $posts_per_page, $paged);                
                    
        
            endif; 

            wp_reset_query();

            return array(
                'data' => $arr_results,
                'total' => count($products_data),
                'posts_per_page' => $posts_per_page
            );           

        }

    }