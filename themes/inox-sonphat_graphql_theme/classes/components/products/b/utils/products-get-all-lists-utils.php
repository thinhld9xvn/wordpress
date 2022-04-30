<?php
    namespace Products;
    use Taxonomies\TaxGetMetaTermsUtils;
    class ProductsGetAllListsUtils {
        private static function get_afc_field($key, $pid, $locale = DEFAULT_LANG) {
            $field = get_field($key, $pid);
            $v = array_map('trim', explode('|', $field['label']));
            if ( count($v) === 1 ) return $v[0];
            return $locale === DEFAULT_LANG ? $v[0] : $v[1];
        }
        private static function getFeaturedFullImage($image) {
            if ( empty($image) ) return false;
            return $image[0]['url'];
        }
        private static function get_meta($product, $lang) {
            $product_id = $product->get_id();
            $name = $product->get_name();
            $slug = $product->get_slug();
            $permalink = filter_permalink($product->get_permalink());
            //$old_price = $product->regular_price;
            $sale_price = $product->regular_price;                        
            $status = $product->get_stock_status();
            $short_description = $product->short_description;
            $description = $product->description;
            $galleries_id = $product->get_gallery_image_ids();
            $galleries = [];
            $featured_image = ProductsGetGalleriesDataUtils::get($product_id, 'get_the_post_thumbnail_url');
            $hasThumbnail = !empty($featured_image) && !empty(self::getFeaturedFullImage($featured_image));
            $places = self::get_afc_field('xuat_xu', $product_id, $lang);
            $brands = self::get_afc_field('nhan_hieu', $product_id, $lang);
            $colors = self::get_afc_field('mau_sac', $product_id, $lang);
            $sizes = self::get_afc_field('kich_thuoc', $product_id, $lang);
            $specifications = get_post_meta($product_id, 'tskt', true);
            $banner_id = get_post_meta($product_id, 'anh_banner', true);
            $banner_bg = !empty($banner_id) ? wp_get_attachment_image_url($banner_id, 'featured_bg_banner') : \CTInfo\CTInfoGetDefaultBannerPageUtils::get();
            if ( !empty($galleries_id) ) :
                foreach( $galleries_id as $key => $id ) :
                    $gallery = [
                        PRODUCTS_FIELDS::DATA_GQL_FIELD => ProductsGetGalleriesDataUtils::get($id, 'wp_get_attachment_image_url')
                    ];
                    $galleries[] = $gallery;
                endforeach;
            else :
                $galleries[] = [
                    PRODUCTS_FIELDS::DATA_GQL_FIELD => [
                        [
                            'url' => $hasThumbnail ? self::getFeaturedFullImage($featured_image) : EMPTY_PRODUCT_THUMBNAIL
                        ]
                    ]
                ];
            endif;
            if ( empty($sale_price) ) return false;
            return [
                PRODUCTS_FIELDS::ID_GQL_FIELD => $product_id,
                PRODUCTS_FIELDS::NAME_GQL_FIELD => $name,
                PRODUCTS_FIELDS::TITLE_GQL_FIELD => $name,
                PRODUCTS_FIELDS::TEXT_GQL_FIELD => $name,
                PRODUCTS_FIELDS::URL_GQL_FIELD => $permalink,
                PRODUCTS_FIELDS::SLUG_GQL_FIELD => $slug,
                PRODUCTS_FIELDS::PRICE_GQL_FIELD => [
                    [
                        PRODUCTS_FIELDS::PRICE_FIXED_GQL_FIELD => $sale_price,
                        PRODUCTS_FIELDS::PRICE_FORMAT_GQL_FIELD => number_format($sale_price, 0, ',', '.')
                    ]
                ],
                PRODUCTS_FIELDS::OLD_PRICE_GQL_FIELD => [
                    [
                        PRODUCTS_FIELDS::PRICE_FIXED_GQL_FIELD => $sale_price,
                        PRODUCTS_FIELDS::PRICE_FORMAT_GQL_FIELD => number_format($sale_price, 0, ',', '.')
                    ]
                ],
                PRODUCTS_FIELDS::STATUS_GQL_FIELD => $status,
                PRODUCTS_FIELDS::SHORT_DESCRIPTION_GQL_FIELD => apply_filters('the_content', $short_description),
                PRODUCTS_FIELDS::DESCRIPTION_GQL_FIELD => apply_filters('the_content', $description),
                PRODUCTS_FIELDS::THUMBNAILS_GQL_FIELD => $featured_image,                    
                PRODUCTS_FIELDS::GALLERIES_GQL_FIELD => $galleries,
                PRODUCTS_FIELDS::BANNER_IMAGE_GQL_FIELD => $banner_bg,    
                PRODUCTS_FIELDS::CATEGORIES_GQL_FIELD => TaxGetMetaTermsUtils::get(get_the_id(), PRODUCTS_TAXONOMY),
                PRODUCTS_FIELDS::BRANDS_GQL_FIELD => $brands,  
                PRODUCTS_FIELDS::PLACES_GQL_FIELD => $places,  
                PRODUCTS_FIELDS::COLORS_GQL_FIELD => $colors,  
                PRODUCTS_FIELDS::SIZES_GQL_FIELD => $sizes,  
                PRODUCTS_FIELDS::SPECIFICATIONS_GQL_FIELD => $specifications,  
                PRODUCTS_FIELDS::POLYLANG_PRODUCTS_GQL_FIELD => null,
                PRODUCTS_FIELDS::LOCALE_GQL_FIELD => $lang,
                PRODUCTS_FIELDS::SEO_GQL_FIELD => ProductsGetYoastseoUtils::get($product, $lang)
            ];
        }
        public static function get($params) {
            $lang = $params['lang'];
            $term_slug = $params['term_slug'];
            $slug = $params['slug'];
            $limit = $params['limit'];
            $show_featured_box = $params['show_featured_box'];
            $tabs = $params['tabs'];
            $related = $params['related'];
            $s = $params['s'];
            $args = array(
                'post_type' => PRODUCTS_POST_TYPE,
                'posts_per_page' => -1,
                'no_paging' => true,
                'lang' => $lang
            );
            if ( !is_null($s) ) :
                $args['s'] = $s;
                unset($args['lang']);
            endif;
            if ( !is_null($show_featured_box) && $show_featured_box ) :
                $args['meta_key'] = 'advanced_options';
                $args['meta_value'] = 'show_on_pfeatured_box_homepage';
                $args['meta_compare'] = 'LIKE';
            endif;
            if ( !is_null($term_slug) ) :
                $args['tax_query'] = [
                    [
                        'taxonomy' => PRODUCTS_TAXONOMY,
                        'field' => 'slug',
                        'terms' => $term_slug
                    ]
                ];
            endif;
            if ( !is_null($slug) ) :
                if ( !is_null($related) && $related ) :
                    $args['posts_per_page'] = 4;
                    $args['post__not_in'] = [get_page_by_path($slug, OBJECT, PRODUCTS_POST_TYPE)->ID];
                else :
                    $args['post_name__in'] = [$slug];
                endif;
            endif;     
            query_posts($args);
            $results = [];
            while ( have_posts() ) : the_post();
                global $product;                
                $result = self::get_meta($product, $lang);
                if (!$result) continue;
                $poly_lang = $lang === DEFAULT_LANG ? 'en' : DEFAULT_LANG;
                $poly_product = wc_get_product(pll_get_post($product->get_id(), $poly_lang));
                if ( !empty($poly_product) ) :
                    $result[PRODUCTS_FIELDS::POLYLANG_PRODUCTS_GQL_FIELD] = self::get_meta($poly_product, $poly_lang);
                endif;
                $results[] = $result;
            endwhile;
            wp_reset_query();
            if ( !is_null($show_featured_box) && $show_featured_box ) :
                $results = ProductsGroupListsUtils::perform($results, $limit, $tabs);
            endif;
            return $results;
        }
    }