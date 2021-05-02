<?php 
    namespace Actions;

    class ActionGetSearchedProductsUtils {

        public static function perform() {

            $params = $_POST['params'];	
		
            $params = \Strings\StringExtractParametersUtils::parse($params);		

            extract($params);

            $posts_per_page = (int) $_POST['posts_per_page'];
            $paged = (int) $_POST['paged'];
 
            $filter_args = array();

            $args = array(

                'post_type' => \Products\PRODUCT_FIELDS::PRODUCT_POST_TYPE,		
                'orderby' => 'id',
                'order' => 'ASC',
                'posts_per_page' => -1
            
            ); 

            $filter_args['posts_per_page'] = $posts_per_page;
            $filter_args['paged'] = $paged;

            if ( ! empty( $s ) ) :

                //$s = remove_accents( \Strings\StringFormatUtils::format($s, 'lowercase') );

                $args['s'] = remove_accents( \Strings\StringFormatUtils::format($s, 'lowercase') );
                $args['_s'] = $s;

            endif;
        
            if ( ! empty( $product_cat_id ) ) :

                $product_cat_id = (int) $product_cat_id;

                if ( $product_cat_id !== -1 ) :

                    $args['tax_query'] = array(

                        array(
                            'taxonomy' => PRODUCT_TAXONOMY,
                            'field' => 'id',
                            'terms' => array($product_cat_id)
                        )

                    );

                endif;

            endif; 
        
            if ( ! empty($min_price) && ! empty( $max_price ) ) : 

                $min_price = floatval($min_price);
                $max_price = floatval($max_price);

                /*$filter_args['min_price'] = $min_price;
                $filter_args['max_price'] = $max_price;*/

                $args['meta_query']['price_clauses'] = array(

                    'key' => \Products\PRODUCT_FIELDS::PRODUCT_REGULAR_PRICE_FIELD,
                    'value' => array($min_price, $max_price),
                    'type' => 'NUMERIC',
                    'compare' => 'BETWEEN'

                );
            
            endif; 
        
            if ( ! empty($dis_radius) ) : 

                $dis_radius = (int) $dis_radius;

                if ( $dis_radius !== - 1 ) :

                    $filter_args['dis_radius'] = $dis_radius;
                    $filter_args['user_lat'] = $user_lat;
                    $filter_args['user_lng'] = $user_lng;

                endif;
            
            endif;

            if ( ! empty( $shop_name ) ) :

                if ( ! array_key_exists('meta_query', $args) ) :

                    $args['meta_query'] = array();

                endif;

                $args['meta_query']['shop_clauses'] = array(

                    'key' => \Products\PRODUCT_FIELDS::PRODUCT_SHOP_NAME_FIELD,
                    'value' => '^' . $shop_name,
                    'compare' => 'REGEXP'

                );

                if ( ! array_key_exists('relation', $args['meta_query']) ) :

                    $args['meta_query']['relation'] = 'AND';

                endif;

            endif;
            
            if ( ! empty($sort_by) ) : 

                if ( $sort_by !== 'default' ) :

                    $filter_args['sort_by'] = $sort_by;

                endif;
            
            endif;	 
            
            if ( ! empty($livraisons) && $livraisons === \Stores\STORE_DATA::YES_VALUE ) :

                $filter_args['livraisons'] = \Stores\STORE_DATA::YES_VALUE;

            endif;

            if ( ! empty($clickandcollect) && $clickandcollect === \Stores\STORE_DATA::YES_VALUE ) :

                $filter_args['clickandcollect'] = \Stores\STORE_DATA::YES_VALUE;

            endif;

            /*echo "<pre>";
            print_r($args);
            print_r($filter_args); die();*/

            $results = \Products\ProductGetListsInLoopFilterUtils::get($args, $filter_args);	

            //echo "<pre>"; print_r($results);

            header("Content-Type: json/application; charset: utf-8");
            echo json_encode($results);

            die();

        }

    }