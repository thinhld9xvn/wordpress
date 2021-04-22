<?php 

    namespace Products;

    class ProductPrintListsTemplateUtils {

        public static function print() { ?>

            <div class="products product-lists">

	            <?php 		
                    if ( have_posts() ) :
                        
                        while ( have_posts() ) : the_post();

                            global $product;

                            //\Products\ProductPrintTemplateUtils::print($product);
                            echo file_get_contents(\Products\ProductPrintTemplateUtils::print($product));
                        
                        endwhile; 
                        
                    endif; ?>

			</div>

        <?php }

    }