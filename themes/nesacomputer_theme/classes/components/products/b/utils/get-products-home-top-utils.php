<?php 
    namespace Products;
    class GetProductsHomeTopUtils {
        public static function get($num) {
            $args = array(
                'post_type' => PRODUCTS_POST_TYPE,
                'posts_per_page' => -1,
                'no_paging' => true,
                'meta_query' => [
                    'relation' => 'OR',
                    [
                        'key' => PROD_ADV_OPTIONS,
                        'value' => SHOW_ON_TOP_PC_ST,
                        'compare' => 'LIKE'
                    ],
                    [
                        'key' => PROD_ADV_OPTIONS,
                        'value' => SHOW_ON_TOP_PC_GRAPHICS_ST,
                        'compare' => 'LIKE'
                    ],
                    [
                        'key' => PROD_ADV_OPTIONS,
                        'value' => SHOW_ON_TOP_PC_GAMING_ST,
                        'compare' => 'LIKE'
                    ]
                ]
            );
            query_posts($args); 
            $arrProducts = [SHOW_ON_TOP_PC_ST => [], SHOW_ON_TOP_PC_GRAPHICS_ST => [], SHOW_ON_TOP_PC_GAMING_ST => []];
            while ( have_posts() ) : the_post(); 
                global $product;
                $option = (get_field(PROD_ADV_OPTIONS, $product->get_id()))[0];
                $result = \Products\PrintProductTemplate::get($product, 'li');
                if ( FALSE === $result ) continue;
                if ( $option === SHOW_ON_TOP_PC_ST && count($arrProducts[SHOW_ON_TOP_PC_ST]) < $num ) :
                    $arrProducts[SHOW_ON_TOP_PC_ST][] = $result;
                endif;
                if ( $option === SHOW_ON_TOP_PC_GRAPHICS_ST && count($arrProducts[SHOW_ON_TOP_PC_GRAPHICS_ST]) < $num ) :
                    $arrProducts[SHOW_ON_TOP_PC_GRAPHICS_ST][] = $result;
                endif;
                if ( $option === SHOW_ON_TOP_PC_GAMING_ST && count($arrProducts[SHOW_ON_TOP_PC_GAMING_ST]) < $num ) :
                    $arrProducts[SHOW_ON_TOP_PC_GAMING_ST][] = $result;
                endif;
            endwhile;
            wp_reset_query();
            return  $arrProducts;
        }
    }