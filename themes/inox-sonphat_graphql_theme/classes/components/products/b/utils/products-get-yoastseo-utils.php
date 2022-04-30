<?php
    namespace Products;
    class ProductsGetYoastseoUtils {
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
        public static function get($product, $lang = 'vi') {
            $name = htmlspecialchars_decode($product->get_name());
            $id = $product->get_id();
            $arrInfos = [
                'title' => $name,
                'metaDesc' => null,            
                'opengraphTitle' => $name,
                'opengraphDescription' => null,
                'opengraphImage' => null,
                'opengraphUrl' => filter_permalink($product->get_permalink()),
                'opengraphLocale' => $lang,
                'opengraphType' => 'article',
                'twitterTitle' => $name,
                'twitterDescription' => null,
            ];
            $yoastseo_product_title = get_post_meta( $id, self::YOAST_SEO_PRODUCT_TITLE_META, true );
            $yoastseo_product_description = get_post_meta( $id, self::YOAST_SEO_PRODUCT_META_DESCRIPTION_META, true );
            $yoastseo_product_og_title = get_post_meta( $id, self::YOAST_SEO_PRODUCT_OPENGRAPH_TITLE_META, true );
            $yoastseo_product_og_description = get_post_meta( $id, self::YOAST_SEO_PRODUCT_OPENGRAPH_DESCRIPTION_META, true );
            $yoastseo_product_og_image = get_post_meta( $id, self::YOAST_SEO_PRODUCT_OPENGRAPH_IMAGE_META, true );
            $yoastseo_product_twitter_title = get_post_meta( $id, self::YOAST_SEO_PRODUCT_TWITTER_TITLE_META, true );
            $yoastseo_product_twitter_description = get_post_meta( $id, self::YOAST_SEO_PRODUCT_TWITTER_DESCRIPTION_META, true );            
            if ( $yoastseo_product_title ) :
                $arrInfos['title'] = htmlspecialchars_decode($yoastseo_product_title);
            endif;
            if ( $yoastseo_product_description ) :
                $arrInfos['metaDesc'] = $yoastseo_product_description;
            endif;
            if ( $yoastseo_product_og_title ) :
                $arrInfos['opengraphTitle'] = htmlspecialchars_decode($yoastseo_product_og_title);
            endif;
            if ( $yoastseo_product_og_description ) :
                $arrInfos['opengraphDescription'] = $yoastseo_product_og_description;
            endif;
            if ( $yoastseo_product_og_image ) :
                $arrInfos['opengraphImage'] = [];
                $meta_og_image_sizes = wp_get_attachment_metadata(pn_get_attachment_id_from_url($yoastseo_product_og_image));
                $arrInfos['opengraphImage']['mediaItemUrl'] = $yoastseo_product_og_image;
                $arrInfos['opengraphImage']['mediaDetails']['width'] = $meta_og_image_sizes['width'];
                $arrInfos['opengraphImage']['mediaDetails']['height'] = $meta_og_image_sizes['height'];
            endif;
            if ( $yoastseo_product_twitter_title ) :
                $arrInfos['twitterTitle'] = $yoastseo_product_twitter_title;
            endif;
            if ( $yoastseo_product_twitter_description ) :
                $arrInfos['twitterDescription'] = $yoastseo_product_twitter_description;
            endif;
            return $arrInfos;
        }
    }