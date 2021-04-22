<?php 

    namespace Products;

    class ProductPrintListsInLoopSliderUtils {

        public static function print($args) {

            query_posts( $args );

            if ( have_posts() ) :
            
                    while ( have_posts() ) : the_post(); 

                        global $product;

                        $shop_name = \Commercants\CommercantGetShopNameUtils::get_by_pid($product->get_id(), 'uppercase'); 
                        
                        if ( empty($shop_name) ) continue; ?>

                        <div class="products">

                <?php 
                            ProductPrintTemplateUtils::print($product); ?>

                        </div>
                    
                <?php endwhile;
            
            endif; 

            wp_reset_query();

        }

    }