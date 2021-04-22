<?php 

    namespace Products;

    class ProductGetListsInLoopSliderUtils {

        public static function get($args) {

            ob_start();

            $products = query_posts( $args );

            if ( have_posts() ) : 
                
                $count = 0;
                $max = count($products);
                
                while ( have_posts() ) : the_post();

                    global $product;

                    $shop_name = \Commercants\CommercantGetShopNameUtils::get_by_pid($product->get_id(), 
                                                                                        'uppercase');

                    if ( empty( $shop_name ) ) continue;
                
                    if ( $max > 4 ) :
                
                        ProductPrintTagsBeginningListsUtils::print($count);
                            
                            ProductPrintTemplateSliderUtils::print();

                        ProductPrintTagsEndingListsUtils::print($count, $max);

                    else : ?>

                        <div class="item item-carousel">

                            <div class="products">

                <?php 			

                                ProductPrintTemplateUtils::print($product); ?>

                            </div>

                        </div>

                <?php endif;

                    $count++;
                        
                endwhile; 

            endif; 

            wp_reset_query();

            $contents = ob_get_contents();

            ob_end_clean();

            return $contents;

        }

    }