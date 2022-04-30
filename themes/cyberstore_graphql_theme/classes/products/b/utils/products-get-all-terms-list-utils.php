<?php

    namespace Products;

    class ProductsGetAllTermsListUtils {    
        
        const PRODUCT_TERM_ADVANCED_OPTIONS_META = 'term-field-term-product-advanced-options';
        const SHOW_ON_GADGETS_HOMEPAGE_SETTING = 'show-on-gadgets-homepage';

        private static function get_term_thumbnail($term) {

            $thumbnail_id = get_woocommerce_term_meta( $term->term_id, 'thumbnail_id', true );

            return [
               'full' => convertToWebpUri(wp_get_attachment_image_url($thumbnail_id, "full")),
               //'370x215' => convertToWebpUri(wp_get_attachment_image_url($thumbnail_id, \Attachment\ATTACHMENT_SPECIFICS::CATEGORY_370x215_FEATURED_IMAGE)),
               'thumbnail' => convertToWebpUri(wp_get_attachment_image_url($thumbnail_id, "thumbnail"))
            ];

        }

        private static function get_term_yoastseo($term) {

            $arrInfos = [
                'title' => htmlspecialchars_decode($term->name),
                'description' => '',
                'keywords' => '',
                'og:title' => htmlspecialchars_decode($term->name),
                'og:description' => '',
                'og:image' => '',
                'og:locale' => 'vi',
                'og:type' => 'article',
                'twitter:title' => htmlspecialchars_decode($term->name),
                'twitter:description' => '',
                'twitter:image' => ''
            ];

            $yoastseo_tax_meta = get_option( 'wpseo_taxonomy_meta' );

            if ( array_key_exists(PRODUCTS_TAXONOMY, $yoastseo_tax_meta) ) :

                $tax_meta =& $yoastseo_tax_meta[PRODUCTS_TAXONOMY];

                if ( array_key_exists($term->term_id, $tax_meta) ) :

                    $term_meta = $tax_meta[$term->term_id];

                    if ( array_key_exists('wpseo_bctitle', $term_meta) ) :

                        $arrInfos['title'] = htmlspecialchars_decode($term_meta['wpseo_bctitle']);                   

                    endif;

                    if ( array_key_exists('wpseo_desc', $term_meta) ) :

                        $arrInfos['description'] = $term_meta['wpseo_desc'];                  

                    endif;                   

                    if ( array_key_exists('wpseo_focuskw', $term_meta) ) :

                        $arrInfos['keywords'] = $term_meta['wpseo_focuskw'];

                    endif;  

                    if ( array_key_exists('wpseo_opengraph-title', $term_meta) ) :

                        $arrInfos['og:title'] = htmlspecialchars_decode($term_meta['wpseo_opengraph-title']);

                    endif;

                    if ( array_key_exists('wpseo_opengraph-description', $term_meta) ) :

                        $arrInfos['og:description'] = $term_meta['wpseo_opengraph-description'];

                    endif;

                    if ( array_key_exists('wpseo_opengraph-image', $term_meta) ) :

                        $arrInfos['og:image'] = $term_meta['wpseo_opengraph-image'];

                    endif;          

                    if ( array_key_exists('wpseo_twitter-title', $term_meta) ) :

                        $arrInfos['twitter:title'] = htmlspecialchars_decode($term_meta['wpseo_twitter-title']);

                    endif;

                    if ( array_key_exists('wpseo_twitter-description', $term_meta) ) :

                        $arrInfos['twitter:description'] = $term_meta['wpseo_twitter-description'];

                    endif;

                    if ( array_key_exists('wpseo_twitter-image', $term_meta) ) :

                        $arrInfos['twitter:image'] = $term_meta['wpseo_twitter-image'];

                    endif;

                endif;

            endif;         

            return $arrInfos;

        }

        private static function get_term_metadata($term) {

            $metadata = [];

            $thumbnail_id = get_term_meta($term->term_id, 'thumbnail_id', true);

            $option = get_option("term_{$term->term_id}");

            $option = $option[self::PRODUCT_TERM_ADVANCED_OPTIONS_META];

            if ($option === self::SHOW_ON_GADGETS_HOMEPAGE_SETTING) :

                $metadata[self::SHOW_ON_GADGETS_HOMEPAGE_SETTING] = true;

            endif;

            if ( ! empty($thumbnail_id) ) :

                $metadata['image'] = convertToWebpUri(wp_get_attachment_image_url($thumbnail_id, 'full'));

            endif;

            return $metadata;

        }

        private static function get_term_data($term, $parent = 0) {

            $n = htmlspecialchars_decode( $term->name );

            $id = 'term_' . $term->term_id;

            $data = [

                "id" => $id,
                "text" => $n,
                "name" => 'cat',
                "title" => $n,
                "value" => $id,
                "url" => filter_permalink(get_term_link($term)),
                "seo" => self::get_term_yoastseo($term),
                "metadata" => self::get_term_metadata($term)

            ];

            $thumbnails = self::get_term_thumbnail($term);

            if ( empty( $thumbnails['full'] ) ) :

                unset($thumbnails['full']);

            endif;

            /*if ( empty( $thumbnails['370x215'] ) ) :

                unset($thumbnails['370x215']);

            endif;*/

            if ( empty( $thumbnails['thumbnail'] ) ) :

                unset($thumbnails['thumbnail']);

            endif;

            if ( ! empty( $thumbnails ) ) :

                $data['thumbnails'] = $thumbnails;
            
            endif;

            //if ( $parent === 0 ) :

                //$data['isMegaMenu'] = true;

                $data["childrens"] = self::parse_terms($term->term_id);  

            /*else :

                $data['isMegaParent'] = true;

                $data["items"] = self::parse_terms($term->term_id);  */

            //endif;

            return $data;

        }

        private static function parse_terms($parent = 0) {

            $childrens = [];

            $args = array(

                'taxonomy' => PRODUCTS_TAXONOMY,
                'hide_empty' => false,
                'parent' => $parent

            );

            $results = get_terms($args);

            if ( $results ) :

                foreach( $results as $key => $term ) :

                    $childrens[] = self::get_term_data($term, $parent);

                endforeach;

            endif;

            return $childrens;
            

        }

        private static function remove_empty_array(&$element) {

            if ( empty($element['childrens']) ) :

                unset($element['childrens']);
                unset($element['isMegaMenu']);

            endif;

            if ( empty($element['items']) ) :

                unset($element['items']);
                unset($element['isMegaParent']);

            endif;

        }

        private static function travsel_elements(&$element) {

            foreach( $element as $key => &$m ) {

                self::remove_empty_array($m);

                if ( array_key_exists("childrens", $m) ) {

                    self::travsel_elements($m['childrens']);

                }

                if ( array_key_exists("items", $m) ) {

                    self::travsel_elements($m['items']);

                }
                
            }

        }

        public static function get() {

            $arrTermsList = [];

            $args = array(

                'taxonomy' => PRODUCTS_TAXONOMY,
                'hide_empty' => false,
                'parent' => 0

            );

            $results = get_terms($args);

            if ( $results ) :

                foreach( $results as $key => $term ) :

                    $arrTermsList[] = self::get_term_data($term);

                endforeach;

            endif;

            self::travsel_elements($arrTermsList);

            return $arrTermsList;

        }

    }