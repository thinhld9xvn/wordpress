<?php 
    namespace Taxonomies;
    class TaxGetAllCategoriesUtils {
        private static function get_term_yoastseo($term, $lang = DEFAULT_LANG) {
            $arrInfos = [
                'title' => $term->name,
                'metaDesc' => '',
                'metaKeywords' => '',
                'opengraphTitle' => $term->name,
                'opengraphDescription' => '',
                'opengraphUrl' => get_category_link($term),
                'opengraphImage' => null,
                'opengraphType' => 'article',
                'opengraphLocale' => $lang,
                'twitterTitle' => $term->name,
                'twitterDescription' => '',
            ];
            $yoastseo_tax_meta = get_option( 'wpseo_taxonomy_meta' );
            foreach($yoastseo_tax_meta as $key => $tax_meta) :
                if ( array_key_exists($term->term_id, $tax_meta) ) :
                    $term_meta = $tax_meta[$term->term_id];
                    if ( array_key_exists('wpseo_bctitle', $term_meta) ) :
                        $arrInfos['title'] = $term_meta['wpseo_bctitle'];
                    endif;
                    if ( array_key_exists('wpseo_desc', $term_meta) ) :
                        $arrInfos['metaDesc'] = $term_meta['wpseo_desc'];
                    endif;                   
                    if ( array_key_exists('wpseo_focuskw', $term_meta) ) :
                        $arrInfos['metaKeywords'] = $term_meta['wpseo_focuskw'];
                    endif;  
                    if ( array_key_exists('wpseo_opengraph-title', $term_meta) ) :
                        $arrInfos['opengraphTitle'] = $term_meta['wpseo_opengraph-title'];
                    endif;
                    if ( array_key_exists('wpseo_opengraph-description', $term_meta) ) :
                        $arrInfos['opengraphDescription'] = $term_meta['wpseo_opengraph-description'];
                    endif;
                    if ( array_key_exists('wpseo_opengraph-image', $term_meta) ) :
                        $arrInfos['opengraphImage'] = [];
                        $term_meta_og_image_sizes = wp_get_attachment_metadata(pn_get_attachment_id_from_url($term_meta['wpseo_opengraph-image']));
                        $arrInfos['opengraphImage']['mediaItemUrl'] = $term_meta['wpseo_opengraph-image'];
                        $arrInfos['opengraphImage']['mediaDetails']['width'] = $term_meta_og_image_sizes['width'];
                        $arrInfos['opengraphImage']['mediaDetails']['height'] = $term_meta_og_image_sizes['height'];
                    endif;          
                    if ( array_key_exists('wpseo_twitter-title', $term_meta) ) :
                        $arrInfos['twitterTitle'] = $term_meta['wpseo_twitter-title'];
                    endif;
                    if ( array_key_exists('wpseo_twitter-description', $term_meta) ) :
                        $arrInfos['twitterDescription'] = $term_meta['wpseo_twitter-description'];
                    endif;
                endif;
            endforeach;
            return $arrInfos;
        }
        private static function get_term_data($term, $post_type_slug = '', $lang = '', $tax) {
            $n = htmlspecialchars_decode( $term->name );
            $term_options = get_option("term_{$term->term_id}");
            $term_thumbnail = get_term_meta( $term->term_id, 'thumbnail_id', true );
            $term_bg = $term_thumbnail ? wp_get_attachment_image_url($term_thumbnail, 'featured_bg_banner') : '';
            $thumbnail = !empty($term_options["term-field-term-{$post_type_slug}-avatar"]) ? 
                                $term_options["term-field-term-{$post_type_slug}-avatar"] : $term_bg;
            $pl_term = pll_get_term($term->term_id, $lang === DEFAULT_LANG ? 'en' : DEFAULT_LANG );
            $data = [
                "id" => $term->term_id,
                "text" => $n,
                "name" => $n,
                "title" => $n,
                "slug" => $term->slug,
                "url" => filter_permalink(get_term_link($term)),
                "polylang_term" => $pl_term ? filter_permalink(get_term_link($pl_term)) : '',
                "thumbnail" => $thumbnail,
                'post_type' => "/{$lang}/{$post_type_slug}",
                'description' => $term->description,
                "seo" => self::get_term_yoastseo($term, $lang)
            ];
            $data["childrens"] = self::parse_terms($post_type_slug, $lang, $tax, $term->term_id);  
            return $data;
        }
        private static function parse_terms($post_type_slug, $lang, $tax, $parent = 0) {
            $childrens = [];
            $args = array(
                'taxonomy' => $tax,
                'hide_empty' => false,
                'parent' => $parent
            );
            $results = get_terms($args);
            if ( $results ) :
                foreach( $results as $key => $term ) :
                    $childrens[] = self::get_term_data($term, $post_type_slug, $lang, $tax, $parent);
                endforeach;
            endif;
            return $childrens;
        }
        private static function remove_empty_array(&$element) {
            if ( empty($element['childrens']) ) :
                unset($element['childrens']);
            endif;
        }
        private static function travsel_elements(&$element) {
            foreach( $element as $key => &$m ) {
                self::remove_empty_array($m);
                if ( array_key_exists("childrens", $m) ) {
                    self::travsel_elements($m['childrens']);
                }
            }
        }
        public static function get($tax, $term_slug = null, $lang = DEFAULT_LANG, $number = -1) {
            $arrTermsList = [];
            $args = array(
                'taxonomy' => $tax,
                'hide_empty' => false,
                'parent' => 0,
                'lang' => $lang
            );
            $taxonomy = get_taxonomy($tax);
            $post_type_slug = $taxonomy->object_type[0];
            if ( !empty($term_slug) ) :
                $arrTermsList[] = self::get_term_data(get_term_by('slug', $term_slug, $tax), $post_type_slug, $lang, $tax);
                return $arrTermsList;
            endif;
            $results = get_terms($args);
            if ( $results ) :
                foreach( $results as $key => $term ) :
                    $arrTermsList[] = self::get_term_data($term, $post_type_slug, $lang, $tax);
                endforeach;
            endif;
            self::travsel_elements($arrTermsList);
            return $number > 0 ? array_splice($arrTermsList, 0, $number) : $arrTermsList;
        }
    }