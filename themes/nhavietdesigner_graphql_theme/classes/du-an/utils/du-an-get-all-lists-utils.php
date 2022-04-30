<?php 
    namespace DUANPAGE;
    class DUGetAllListsUtils {
        const YOAST_SEO_TITLE_META = '_yoast_wpseo_title';
        const YOAST_SEO_META_DESCRIPTION_META = '_yoast_wpseo_metadesc';
        const YOAST_SEO_OPENGRAPH_TITLE_META = '_yoast_wpseo_opengraph-title';
        const YOAST_SEO_OPENGRAPH_DESCRIPTION_META = '_yoast_wpseo_opengraph-description';        
        const YOAST_SEO_OPENGRAPH_IMAGE_ID_META = '_yoast_wpseo_opengraph-image-id';
        const YOAST_SEO_OPENGRAPH_IMAGE_META = '_yoast_wpseo_opengraph-image';
        const YOAST_SEO_TWITTER_TITLE_META = '_yoast_wpseo_twitter-title';
        const YOAST_SEO_TWITTER_DESCRIPTION_META = '_yoast_wpseo_twitter-description';
        const YOAST_SEO_TWITTER_IMAGE_ID_META = '_yoast_wpseo_twitter-image-id';
        const YOAST_SEO_TWITTER_IMAGE_META = '_yoast_wpseo_twitter-image';
        private static function get_item_yoastseo($post) {
            $name = htmlspecialchars_decode($post->post_title);
            $id = $post->ID;
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
            $yoastseo_title = get_post_meta( $id, self::YOAST_SEO_TITLE_META, true );
            $yoastseo_description = get_post_meta( $id, self::YOAST_SEO_META_DESCRIPTION_META, true );
            $yoastseo_og_title = get_post_meta( $id, self::YOAST_SEO_OPENGRAPH_TITLE_META, true );
            $yoastseo_og_description = get_post_meta( $id, self::YOAST_SEO_OPENGRAPH_DESCRIPTION_META, true );
            $yoastseo_og_image = get_post_meta( $id, self::YOAST_SEO_OPENGRAPH_IMAGE_META, true );
            $yoastseo_twitter_title = get_post_meta( $id, self::YOAST_SEO_TWITTER_TITLE_META, true );
            $yoastseo_twitter_description = get_post_meta( $id, self::YOAST_SEO_TWITTER_DESCRIPTION_META, true );
            $yoastseo_twitter_image = get_post_meta( $id, self::YOAST_SEO_TWITTER_IMAGE_META, true );  
            if ( $yoastseo_title ) :
                $arrInfos['title'] = htmlspecialchars_decode($yoastseo_title);
            endif;
            if ( $yoastseo_description ) :
                $arrInfos['description'] = $yoastseo_description;
            endif;
            if ( $yoastseo_og_title ) :
                $arrInfos['og:title'] = htmlspecialchars_decode($yoastseo_og_title);
            endif;
            if ( $yoastseo_og_description ) :
                $arrInfos['og:description'] = $yoastseo_og_description;
            endif;
            if ( $yoastseo_og_image ) :
                $arrInfos['og:image'] = $yoastseo_og_image;
            endif;
            if ( $yoastseo_twitter_title ) :
                $arrInfos['twitter:image'] = htmlspecialchars_decode($yoastseo_twitter_title);
            endif;
            if ( $yoastseo_twitter_description ) :
                $arrInfos['twitter:description'] = $yoastseo_twitter_description;
            endif;
            if ( $yoastseo_twitter_image ) :
                $arrInfos['twitter:image'] = $yoastseo_twitter_image;
            endif;
            return $arrInfos;
        }
        private static function get_template_project_data($pid) {
            $galleries = DUGetMetaGalleriesUtils::get($pid);
            $priority = DUGetMetaPriorityUtils::get($pid);
            $extras = [
                'id' => 'post_' . $pid,
                'title' => get_the_title(),
                'icon' => link_asset_theme . 'images/icon-1.png',
                'galleries' => $galleries,
                'thumbnail' => wp_get_attachment_image_src(get_post_thumbnail_id($pid), 'single-post-thumbnail')[0],
                'priority' => !empty($priority) ? intval($priority) : 99999999,
                'seo' => self::get_item_yoastseo($pid)
            ];
            return $extras;
        }
        public static function get($post_type) {
            $args = array(
                'post_type' => $post_type,
                'posts_per_page' => -1
            );
            query_posts($args);
            $data = [];
            if ( $post_type === DESIGN_POST_TYPE ) :
                $options = DUGetOptionPageFieldUtils::get_page_option(DUANTK_PID);                
            else : // PROJECT_POST_TYPE
                $options = DUGetOptionPageFieldUtils::get_page_option(DUANTC_PID);
            endif;
            $data = $options;
            $data['options'] = [];
            while ( have_posts() ) : the_post();
                global $post;
                $data['options'][] = self::get_template_project_data($post->ID);
            endwhile;    
            usort($data['options'], function($o1, $o2) {
                $pri1 = $o1['priority'];
                $pri2 = $o2['priority'];
                if ($pri1 === $pri2) return 0;
                return $pri1 < $pri2 ? -1 : 1;
            });
            wp_reset_query();
            return $data;
        }
    }