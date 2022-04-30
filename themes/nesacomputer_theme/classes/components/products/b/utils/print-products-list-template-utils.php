<?php 
    namespace Products;
    class PrintProductsListTemplateUtils {
        public static function print($data) {
            foreach($data as $key => $product) :
                echo $product;
            endforeach;
        }
    }   
