<?php 
    namespace Products;

use Comments\GetComments;
use Membership\GetUserRatingMeta;
use Ratingstars\CheckUserRatingOnProduct;
use Ratingstars\ExploreRatingStarByComments;
use Theme_Options\PRODUCT_FIELDS;
    use Theme_Options\Theme_Options;
    class GetProductLoopDataUtils {
        private static function get_featured_images($id, $func = 'get_the_post_thumbnail_url') {
            return [
                [
                    'url' => $func($id, 'full'),
                ],
                [
                    'url' => $func($id, 'medium'),
                ],
                [
                    'url' => $func($id, 'thumbnail')
                ]
            ];
        }
        private static function get_bh_info($value, $prefix = 'tháng') {
            return substr($value, 0, strlen($value) - 1) . ' ' . $prefix;
        }
        public static function get($product) {
            $current_user = wp_get_current_user();
            $uid = $current_user->ID;
            //
            $galleries = [];
            //
            $pid = $product->get_id();
            $url = $product->get_permalink();
            $name = $product->get_name();          
            $short_description = $product->short_description;
            $description = $product->description;  
            $regular_price = number_format($product->regular_price, 0, ',', '.');             
            $sale_price = number_format($product->sale_price, 0, ',', '.'); 
            $sale_off = 100 - round($sale_price / $regular_price * 100);
            $status = GetProductStockLabelUtils::get($product->get_stock_status());
            $galleries_id = $product->get_gallery_image_ids();
            $thumbnail = get_the_post_thumbnail_url($pid, 'medium');
            $prod_tssp = apply_filters('the_content', get_field('prod_tssp', $pid));
            $prod_ttbh = get_field('prod_bh', $pid);
            $prod_ttbh = $prod_ttbh ? self::get_bh_info($prod_ttbh) : '';
            $prod_qtud = apply_filters('the_content', get_field('prod_qt_uudai', $pid));
            $prod_tskt = apply_filters('the_content', get_field('prod_tskt', $pid));
            $prod_dgsp = apply_filters('the_content', get_field('prod_danhgiasp', $pid));
            $prod_khct = apply_filters('the_content', Theme_Options::get_field( PRODUCT_FIELDS::PRODUCT_KHAUHIEUCT_ID,
                                                                                   PRODUCT_FIELDS::PRODUCT_SECTION_ID));
            $prod_hotline = apply_filters('the_content', Theme_Options::get_field( PRODUCT_FIELDS::PRODUCT_HOTLINE_ID,
                                                                                   PRODUCT_FIELDS::PRODUCT_SECTION_ID));
            $prod_opts = GetProductOptUtils::get($product);            
            if ( !empty($galleries_id) ) :
                foreach( $galleries_id as $id ) :
                    $galleries[] = self::get_featured_images($id, 'wp_get_attachment_image_url');
                endforeach;
            else :
                $galleries[] = [
                    [
                        'url' => $thumbnail
                    ],
                    [
                        'url' => $thumbnail
                    ],
                    [
                        'url' => $thumbnail
                    ]
                ];
            endif;
            $rating = GetUserRatingMeta::get_by_product($uid, $pid);
            $view_count = ProductViewCountsUtils::get_count($pid);
            $comments = GetComments::get($pid);
            $explored_ratings = ExploreRatingStarByComments::perform($comments);
            //$is_rating = CheckUserRatingOnProduct::perform($uid, $pid);
            return [
                $pid, $url, $name, $view_count, $rating, $comments, $explored_ratings, $short_description, $description, $regular_price,
                $sale_price, $sale_off, $status, $thumbnail, $galleries, 
                $prod_tssp, $prod_ttbh, $prod_qtud, $prod_tskt, $prod_dgsp, $prod_khct, $prod_hotline, $prod_opts
            ];
        }
        public static function get_simple($product) {            
            $id = $product->get_id();
            $url = $product->get_permalink();
            $name = $product->get_name();
            $regular_price = number_format($product->regular_price, 0, ',', '.');             
            $sale_price = number_format($product->sale_price, 0, ',', '.'); 
            $sale_off = 100 - round($sale_price / $regular_price * 100);
            $status = GetProductStockLabelUtils::get($product->get_stock_status());
            $thumbnail = get_the_post_thumbnail_url($id, 'medium');
            return [
                $id, $url, $name, $regular_price, $sale_price, $sale_off, $status, $thumbnail
            ];
        }
    }