<?php

    namespace Products;

    class ProductsGetAllListsUtils {

        const SHOW_ON_CATALOG_LIST_META = 'show_on_catalog_list';
        const SHOW_ON_FEATURED_BOX_META = 'show_on_featured_box';
        const SHOW_ON_FEATURED_PRODUCTS_BOX_META = 'show_on_featured_products_box';
        const SHOW_ON_HOT_NEW_RELEASES_BOX_META = 'show_on_hot_new_releases_box';
        const SHOW_ON_MUSIC_MOVIES_BOX_META = 'show_on_music_movies_box';
        const SHOW_ON_OFFER_BOX_META = 'show_on_offer_box';
        const SHOW_ON_POPULAR_BOX_META = 'show_on_popular_box';
        const SHOW_ON_RELEASES_BOX_META = 'show_on_releases_box';
        const SHOW_ON_TOP_SELLING_PRODUCTS_BOX_META = 'show_on_top_selling_products_box';
        const SHOW_ON_YOU_MIGHT_LIKE_BOX_META = 'show_on_you_might_like_box';

        /* */
        const YOAST_SEO_PRODUCT_TITLE_META = '_yoast_wpseo_title';
        const YOAST_SEO_PRODUCT_META_DESCRIPTION_META = '_yoast_wpseo_metadesc';
        const YOAST_SEO_PRODUCT_OPENGRAPH_TITLE_META = '_yoast_wpseo_opengraph-title';
        const YOAST_SEO_PRODUCT_OPENGRAPH_DESCRIPTION_META = '_yoast_wpseo_opengraph-description';        
        const YOAST_SEO_PRODUCT_OPENGRAPH_IMAGE_ID_META = '_yoast_wpseo_opengraph-image-id';
        const YOAST_SEO_PRODUCT_OPENGRAPH_IMAGE_META = '_yoast_wpseo_opengraph-image';
        const YOAST_SEO_PRODUCT_TWITTER_TITLE_META = '_yoast_wpseo_twitter-title';
        const YOAST_SEO_PRODUCT_TWITTER_DESCRIPTION_META = '_yoast_wpseo_twitter-description';
        const YOAST_SEO_PRODUCT_TWITTER_IMAGE_ID_META = '_yoast_wpseo_twitter-image-id';
        const YOAST_SEO_PRODUCT_TWITTER_IMAGE_META = '_yoast_wpseo_twitter-image';

        private static function isProductShowOnCatalogList($pid) {

            $v = get_post_meta($pid, self::SHOW_ON_CATALOG_LIST_META, true);

            return ! empty( $v ) && $v === '1';

        }

        private static function isProductShowOnFeaturedBox($pid) {

            $v = get_post_meta($pid, self::SHOW_ON_FEATURED_BOX_META, true);

            return ! empty( $v ) && $v === '1';

        }

        private static function isProductShowOnFeaturedProductsBox($pid) {

            $v = get_post_meta($pid, self::SHOW_ON_FEATURED_PRODUCTS_BOX_META, true);

            return ! empty( $v ) && $v === '1';

        }

        private static function isProductShowOnHotNewReleasesBox($pid) {

            $v = get_post_meta($pid, self::SHOW_ON_HOT_NEW_RELEASES_BOX_META, true);

            return ! empty( $v ) && $v === '1';

        }

        private static function isProductShowOnMusicMoviesBox($pid) {

            $v = get_post_meta($pid, self::SHOW_ON_MUSIC_MOVIES_BOX_META, true);

            return ! empty( $v ) && $v === '1';

        }

        private static function isProductShowOnOfferBox($pid) {

            $v = get_post_meta($pid, self::SHOW_ON_OFFER_BOX_META, true);

            return ! empty( $v ) && $v === '1';

        }

        private static function isProductShowOnPopularBox($pid) {

            $v = get_post_meta($pid, self::SHOW_ON_POPULAR_BOX_META, true);

            return ! empty( $v ) && $v === '1';

        }

        private static function isProductShowOnReleasesBox($pid) {

            $v = get_post_meta($pid, self::SHOW_ON_RELEASES_BOX_META, true);

            return ! empty( $v ) && $v === '1';

        }

        private static function isProductShowOnTopSellingProductsBox($pid) {

            $v = get_post_meta($pid, self::SHOW_ON_TOP_SELLING_PRODUCTS_BOX_META, true);

            return ! empty( $v ) && $v === '1';

        }

        private static function isProductShowOnYouMightLikeBox($pid) {

            $v = get_post_meta($pid, self::SHOW_ON_YOU_MIGHT_LIKE_BOX_META, true);

            return ! empty( $v ) && $v === '1';

        }

        private static function get_product_yoastseo($product) {

            $name = htmlspecialchars_decode($product->get_name());
            $id = $product->get_id();

            $arrInfos = [
                'title' => $name,
                'description' => '',            
                'og:title' => $name,
                'og:description' => '',
                'og:image' => '',
                'og:locale' => 'vi',
                'og:type' => 'article',
                'twitter:title' => $name,
                'twitter:description' => '',
                'twitter:image' => ''
            ];

            $yoastseo_product_title = get_post_meta( $id, self::YOAST_SEO_PRODUCT_TITLE_META, true );
            $yoastseo_product_description = get_post_meta( $id, self::YOAST_SEO_PRODUCT_META_DESCRIPTION_META, true );
            $yoastseo_product_og_title = get_post_meta( $id, self::YOAST_SEO_PRODUCT_OPENGRAPH_TITLE_META, true );
            $yoastseo_product_og_description = get_post_meta( $id, self::YOAST_SEO_PRODUCT_OPENGRAPH_DESCRIPTION_META, true );
            $yoastseo_product_og_image = get_post_meta( $id, self::YOAST_SEO_PRODUCT_OPENGRAPH_IMAGE_META, true );
            $yoastseo_product_twitter_title = get_post_meta( $id, self::YOAST_SEO_PRODUCT_TWITTER_TITLE_META, true );
            $yoastseo_product_twitter_description = get_post_meta( $id, self::YOAST_SEO_PRODUCT_TWITTER_DESCRIPTION_META, true );
            $yoastseo_product_twitter_image = get_post_meta( $id, self::YOAST_SEO_PRODUCT_TWITTER_IMAGE_META, true );   
            
            if ( $yoastseo_product_title ) :

                $arrInfos['title'] = htmlspecialchars_decode($yoastseo_product_title);

            endif;

            if ( $yoastseo_product_description ) :

                $arrInfos['description'] = $yoastseo_product_description;

            endif;

            if ( $yoastseo_product_og_title ) :

                $arrInfos['og:title'] = htmlspecialchars_decode($yoastseo_product_og_title);

            endif;

            if ( $yoastseo_product_og_description ) :

                $arrInfos['og:description'] = $yoastseo_product_og_description;

            endif;
            
            if ( $yoastseo_product_og_image ) :

                $arrInfos['og:image'] = $yoastseo_product_og_image;

            endif;

            if ( $yoastseo_product_twitter_title ) :

                $arrInfos['twitter:image'] = htmlspecialchars_decode($yoastseo_product_twitter_title);

            endif;

            if ( $yoastseo_product_twitter_description ) :

                $arrInfos['twitter:description'] = $yoastseo_product_twitter_description;

            endif;

            if ( $yoastseo_product_twitter_image ) :

                $arrInfos['twitter:image'] = $yoastseo_product_twitter_image;

            endif;

            return $arrInfos;

        }

        public static function get() {

            $args = array(

                'post_type' => PRODUCTS_POST_TYPE,
                'posts_per_page' => -1,
                'no_paging' => true

            );

            query_posts($args);

            $results = [];            

            while ( have_posts() ) : the_post();

                global $product;
                
                $product_id = $product->get_id();

                $product_attrs = [];
                $product_terms = [];

                $name = $product->get_name();
                $permalink = filter_permalink($product->get_permalink());
                $old_price = $product->regular_price;
                $sale_price = $product->sale_price;
                $short_description = $product->short_description;
                $description = $product->description;
                $galleries_id = $product->get_gallery_image_ids();
                $attributes = $product->get_attributes();
                $categories_ids = $product->get_category_ids();
                $galleries = [];
                $featured_image = [
                    'full' => convertToWebpUri(get_the_post_thumbnail_url($product->get_id(),'full')),
                    '589x567' => convertToWebpUri(get_the_post_thumbnail_url($product->get_id(), 
                                                                \Attachment\ATTACHMENT_SPECIFICS::PRODUCT_589x567_FEATURE_IMAGE)),
                    '381x285' => convertToWebpUri(get_the_post_thumbnail_url($product->get_id(), 
                                                                \Attachment\ATTACHMENT_SPECIFICS::PRODUCT_381x285_FEATURE_IMAGE)),
                    '357x268' => convertToWebpUri(get_the_post_thumbnail_url($product->get_id(), 
                                                                \Attachment\ATTACHMENT_SPECIFICS::PRODUCT_357X268_FEATURE_IMAGE)),
                    '240x180' => convertToWebpUri(get_the_post_thumbnail_url($product->get_id(), 
                                                                \Attachment\ATTACHMENT_SPECIFICS::PRODUCT_240x180_FEATURE_IMAGE)),
                    '196x147' => convertToWebpUri(get_the_post_thumbnail_url($product->get_id(), 
                                                                \Attachment\ATTACHMENT_SPECIFICS::PRODUCT_196x147_FEATURE_IMAGE)),
                    '103x77' => convertToWebpUri(get_the_post_thumbnail_url($product->get_id(), 
                                                                \Attachment\ATTACHMENT_SPECIFICS::PRODUCT_103x77_FEATURE_IMAGE)),
                    'thumbnail' => convertToWebpUri(get_the_post_thumbnail_url($product->get_id(),'thumbnail'))
                ];

                foreach( $galleries_id as $key => $id ) :

                    $gallery = [];

                    $gallery['full'] = convertToWebpUri(wp_get_attachment_image_url($id, 'full'));
                    $gallery['589x567'] = convertToWebpUri(wp_get_attachment_image_url($id, \Attachment\ATTACHMENT_SPECIFICS::PRODUCT_589x567_FEATURE_IMAGE));
                    $gallery['381x285'] = convertToWebpUri(wp_get_attachment_image_url($id, \Attachment\ATTACHMENT_SPECIFICS::PRODUCT_381x285_FEATURE_IMAGE));
                    $gallery['357x268'] = convertToWebpUri(wp_get_attachment_image_url($id, \Attachment\ATTACHMENT_SPECIFICS::PRODUCT_357X268_FEATURE_IMAGE));
                    $gallery['240x180'] = convertToWebpUri(wp_get_attachment_image_url($id, \Attachment\ATTACHMENT_SPECIFICS::PRODUCT_240x180_FEATURE_IMAGE));
                    $gallery['196x147'] = convertToWebpUri(wp_get_attachment_image_url($id, \Attachment\ATTACHMENT_SPECIFICS::PRODUCT_196x147_FEATURE_IMAGE));
                    $gallery['103x77'] = convertToWebpUri(wp_get_attachment_image_url($id, \Attachment\ATTACHMENT_SPECIFICS::PRODUCT_103x77_FEATURE_IMAGE));
                    $gallery['thumbnail'] = convertToWebpUri(wp_get_attachment_image_url($id, 'thumbnail'));

                    $galleries[$id] = $gallery;

                endforeach;

                foreach ( $attributes as $key => $attr ) :                   

                    //echo $product->get_attribute( 'kich-thuoc' ); die();

                   // $product_attrs['sizes'] = array_map('trim',explode(',', $product->get_attribute( 'kich-thuoc' )));
                    //$product_attrs['brands'] = array_map('trim',explode(',', $product->get_attribute( 'thuong-hieu' )));
                    $product_attrs['colors'] = array_map('trim',explode(',', $product->get_attribute( 'colors' )));

                    /*$product_attrs['sizes'] = array_map(function($size) {

                        $term = get_term_by('name', $size, PA_KICHTHUOC_TAXONOMY);
                        
                        return $term->slug;


                    }, $product_attrs['sizes']);*/

                    /*$product_attrs['brands'] = array_map(function($brand) {

                        $term = get_term_by('name', $brand, PA_THUONGHIEU_TAXONOMY);
                        
                        return $term->slug;


                    }, $product_attrs['brands']);*/

                    $product_attrs['colors'] = array_map(function($color) {

                        $term = get_term_by('name', $color, PA_MAUSAC_TAXONOMY);
                        
                        return $term->slug;


                    }, $product_attrs['colors']);

                endforeach;

                foreach ( $categories_ids as $key => $id ) :

                    $term = get_term_by('id', $id, PRODUCTS_TAXONOMY);

                    $product_terms[] = [
                        "id" => 'term_' . $term->term_id,
                        "name" => 'cat',
                        "title" => $term->name,
                        "text" => $term->name,
                        "url" => filter_permalink(get_term_link($term))
                    ];

                endforeach;

                $result = [
                    'id' => 'product_' . $product_id,
                    'name' => $name,
                    'title' => $name,
                    'text' => $name,
                    'url' => $permalink,
                    'price' => '$' . number_format($sale_price, 0, '.', ','),
                    'old_price' => '$' . number_format($old_price, 0, '.', ','),
                    'sale_price' => $sale_price,
                    /*'format' => [
                        'old_price' => number_format($old_price, 0, ',', '.') . ' vnđ',
                        'sale_price' => number_format($sale_price, 0, ',', '.') . ' vnđ'
                    ],*/                 
                    'image' => $featured_image['381x285'],
                    'thumbnail' => $featured_image['381x285'],
                    'short_description' => apply_filters('the_content', $short_description),
                    'description' => apply_filters('the_content', $description),
                    'thumbnails' => $featured_image,                    
                    'galleries' => $galleries,
                    'attributes' => $product_attrs,
                    'categories' => $product_terms,
                    'metadata' => [],
                    'seo' => self::get_product_yoastseo($product)
                ];

                if ( self::isProductShowOnCatalogList($product_id) ) :

                    $result['metadata'][self::SHOW_ON_CATALOG_LIST_META] = true;

                endif;

                if ( self::isProductShowOnFeaturedBox($product_id) ) :

                    $result['metadata'][self::SHOW_ON_FEATURED_BOX_META] = true;

                endif;

                if ( self::isProductShowOnFeaturedProductsBox($product_id) ) :

                    $result['metadata'][self::SHOW_ON_FEATURED_PRODUCTS_BOX_META] = true;

                endif;

                if ( self::isProductShowOnHotNewReleasesBox($product_id) ) :

                    $result['metadata'][self::SHOW_ON_HOT_NEW_RELEASES_BOX_META] = true;

                endif;

                if ( self::isProductShowOnMusicMoviesBox($product_id) ) :

                    $result['metadata'][self::SHOW_ON_MUSIC_MOVIES_BOX_META] = true;

                endif;

                if ( self::isProductShowOnOfferBox($product_id) ) :

                    $result['metadata'][self::SHOW_ON_OFFER_BOX_META] = true;

                endif;

                if ( self::isProductShowOnPopularBox($product_id) ) :

                    $result['metadata'][self::SHOW_ON_POPULAR_BOX_META] = true;

                endif;

                if ( self::isProductShowOnReleasesBox($product_id) ) :

                    $result['metadata'][self::SHOW_ON_RELEASES_BOX_META] = true;

                endif;

                if ( self::isProductShowOnTopSellingProductsBox($product_id) ) :

                    $result['metadata'][self::SHOW_ON_TOP_SELLING_PRODUCTS_BOX_META] = true;

                endif;

                if ( self::isProductShowOnYouMightLikeBox($product_id) ) :

                    $result['metadata'][self::SHOW_ON_YOU_MIGHT_LIKE_BOX_META] = true;

                endif;

                $results[] = $result;

            endwhile;

            wp_reset_query();

            return $results;

        }

    }