<?php
    namespace Taxonomies\Products;
    class GetProductCatBanners {
        public static function get($term) {
            $banner1 = get_field('prod_cat_banner1', $term);
            $banner2 = get_field('prod_cat_banner2', $term);
            return [!empty($banner1) && !empty($banner1['url']) ? $banner1['url'] : '', 
                    !empty($banner2) && !empty($banner2['url']) ? $banner2['url'] : ''];
        }
    }