<?php
    namespace Products;
    class ProductsGetGalleriesDataUtils {
        public static function get($id, $func = 'get_the_post_thumbnail_url') {
            return [
                [
                    'url' => $func($id,'full'),
                ],
                [
                    'url' => $func($id,'medium'),
                ],
                [
                    'url' => $func($id,'thumbnail')
                ]
            ];
        }
    }