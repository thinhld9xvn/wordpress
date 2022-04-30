<?php 
    namespace Products;
    class GetProductStockLabelUtils {
        public static function get($stock) {
            return $stock === 'instock' ? 'Còn hàng' : 'Hết hàng';
        }
    }