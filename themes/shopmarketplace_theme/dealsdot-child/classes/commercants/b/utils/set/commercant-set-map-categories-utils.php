<?php 

    namespace Commercants;

    class CommercantSetMapCategoriesUtils {

        public static function map() {

            $args = array(
                'post_type' => 'product',
                'posts_per_page' => -1
            );
    
            query_posts( $args );
    
            $arrShopListsCInfo = array();
    
            if ( have_posts() ) :
    
                while ( have_posts() ) : the_post();
    
                    global $product;
    
                    $shop_name = CommercantGetShopNameUtils::get_by_pid($product->get_id(), 'lowercase');
    
                    $cids = $product->get_category_ids();
    
                    //echo $shop_name . "<br/>";
    
                    if ( ! empty( $shop_name ) ) :
    
                        if ( ! array_key_exists($shop_name, $arrShopListsCInfo) ) :
    
                            $arrShopListsCInfo[$shop_name] = array();
                            
                        endif;				
    
                        foreach( $cids as $key => $cid ) :
    
                            $term = get_term_by('id', $cid, 'product_cat');
    
                            if ( -1 === \Products\ProductSearchCategoryUtils::search( $term, 
                                                                                      $arrShopListsCInfo[$shop_name] ) ) :						
    
                                $arrShopListsCInfo[$shop_name][] = array(
                                    'id' => $term->term_id,
                                    'name' => $term->name,
                                    'permalink' => get_term_link( $term )
                                );
    
                            endif;
    
                        endforeach;
    
                    endif;
    
                endwhile;
    
                update_option(__COM_SHOP_MAP_CATEGORIES, json_encode($arrShopListsCInfo));
    
            endif;
    
            wp_reset_query();
    
            //echo "<pre>"; print_r( $arrShopListsCInfo );       

        }

    }