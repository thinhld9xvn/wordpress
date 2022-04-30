<?php
    namespace Taxonomies\Products;
    class GetProductCatDescription {
        public static function get($term) {
            return get_field('prod_cat_desc', $term);
        }
    }