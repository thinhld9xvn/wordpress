<?php 

    namespace Products;

    class ProductPrintQueryCategoriesListsUtils {

        public static function print() {

            $paged = $_GET['page'] ? (int) get_query_var('page') : 1;

            $args = array(

                'post_type' => 'product',
                'orderby' => 'id',
                'order' => 'ASC',
                'tax_query' => array(

                    array(
                        'taxonomy' => PRODUCT_TAXONOMY,
                        'field'    => 'slug',
                        'terms'    => get_query_var('term'),
                    )

                ), 
                'paged' => $paged
            
            ); ?>

            <div class="page-entries-content">

                <?php 
                    \Products\ProductPrintSortbyFilterUtils::print();
                    \Products\ProductPrintListsInLoopUtils::print($args); ?>

            </div>

       <?php }

    }