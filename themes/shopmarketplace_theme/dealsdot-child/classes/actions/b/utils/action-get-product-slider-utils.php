<?php 
    namespace Actions;

    class ActionGetProductSliderUtils {

        public static function perform() {

            $num_products = (int) $_POST['num_products'];
            $term_slug = $_POST['term_slug'];

            $args = array(
                'post_type' => 'product',
                'order' => 'desc',
                'orderby' => 'rand',
                'tax_query' => array(

                    array(
                        'taxonomy' => PRODUCT_TAXONOMY,
                        'field' => 'slug',
                        'terms' => $term_slug
                    )

                ),
                'posts_per_page' => $num_products
            );
    
            $html = \Products\ProductGetListsInLoopSliderUtils::get($args);

            echo $html;

            die();           

        }

    }