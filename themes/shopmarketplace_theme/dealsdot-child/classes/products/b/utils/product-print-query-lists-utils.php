<?php 

    namespace Products;

    class ProductPrintQueryListsUtils {

        public static function print() {

            $paged = get_query_var('paged') ? (int) get_query_var('paged') : 1;

            $args = array(

                'post_type' => 'product',
                'orderby' => 'id',
                'order' => 'ASC',
                'paged' => $paged
            
            ); ?>

            <div class="page-entries-content">
                
                <?php 
                    \Products\ProductPrintSortbyFilterUtils::print();
                    \Products\ProductPrintListsInLoopUtils::print($args); ?>

            </div>

       <?php }

    }