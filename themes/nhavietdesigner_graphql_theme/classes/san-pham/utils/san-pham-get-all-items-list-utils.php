<?php 

    namespace SP;

    use \YoastSeo\YoastSeoGetPageSeoUtils;

    class SanPhamgetAllItemsListUtils {

        public static function get() {

            $args = array(

                'post_type' => PRODUCTS_POST_TYPE,
                'posts_per_page' => -1

            );

            query_posts($args);

            $data = \DUANPAGE\DUGetOptionPageFieldUtils::get_page_option(DUANSP_PID);

            $data['options'] = [];

            while ( have_posts() ) : the_post();

                global $post;

                $options = [
                    'id' => 'post_' . $post->ID,
                    'title' => get_the_title(),
                    'description' => SPGetMetaDescriptionUtils::get($post->ID),
                    'galleries' => SPGetMetaGalleriesUtils::get($post->ID),
                    'thumbnail' => convertToWebpUri(get_the_post_thumbnail_url($post->ID, 'medium')),                    
                    'seo' => YoastSeoGetPageSeoUtils::get($post)
                ];                

                $terms = get_the_terms($post->ID, PRODUCTS_TAXONOMY);
                
                if ( ! empty($terms) ) :

                    $options['categories'] = $terms;

                endif;
                
                $data['options'][] = $options;

            endwhile;

            wp_reset_query();

            return $data;

        }

    }