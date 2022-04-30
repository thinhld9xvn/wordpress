<?php 



    namespace Slider;



    class SliderGetAllListsUtils {



        const YOAST_SEO_SLIDER_TITLE_META = '_yoast_wpseo_title';

        const YOAST_SEO_SLIDER_META_DESCRIPTION_META = '_yoast_wpseo_metadesc';

        const YOAST_SEO_SLIDER_OPENGRAPH_TITLE_META = '_yoast_wpseo_opengraph-title';

        const YOAST_SEO_SLIDER_OPENGRAPH_DESCRIPTION_META = '_yoast_wpseo_opengraph-description';        

        const YOAST_SEO_SLIDER_OPENGRAPH_IMAGE_ID_META = '_yoast_wpseo_opengraph-image-id';

        const YOAST_SEO_SLIDER_OPENGRAPH_IMAGE_META = '_yoast_wpseo_opengraph-image';

        const YOAST_SEO_SLIDER_TWITTER_TITLE_META = '_yoast_wpseo_twitter-title';

        const YOAST_SEO_SLIDER_TWITTER_DESCRIPTION_META = '_yoast_wpseo_twitter-description';

        const YOAST_SEO_SLIDER_TWITTER_IMAGE_ID_META = '_yoast_wpseo_twitter-image-id';

        const YOAST_SEO_SLIDER_TWITTER_IMAGE_META = '_yoast_wpseo_twitter-image';





        private static function get_slider_terms($id) {



            $arrTerms = [];



            $terms = get_the_terms($id, SLIDERS_TAXONOMY);



            foreach( $terms as $key => $term) :



                $n = htmlspecialchars_decode($term->name);



                $arrTerms[] = [



                    "id" => $term->term_id,

                    "text" => $n,

                    "name" => $n,

                    "title" => $n,

                    "url" => filter_permalink(get_term_link($term))



                ];



            endforeach;



            return $arrTerms;



        }



        private static function get_slider_yoastseo($post) {



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



            $yoastseo_slider_title = get_post_meta( $id, self::YOAST_SEO_SLIDER_TITLE_META, true );

            $yoastseo_slider_description = get_post_meta( $id, self::YOAST_SEO_SLIDER_META_DESCRIPTION_META, true );

            $yoastseo_slider_og_title = get_post_meta( $id, self::YOAST_SEO_SLIDER_OPENGRAPH_TITLE_META, true );

            $yoastseo_slider_og_description = get_post_meta( $id, self::YOAST_SEO_SLIDER_OPENGRAPH_DESCRIPTION_META, true );

            $yoastseo_slider_og_image = get_post_meta( $id, self::YOAST_SEO_SLIDER_OPENGRAPH_IMAGE_META, true );

            $yoastseo_slider_twitter_title = get_post_meta( $id, self::YOAST_SEO_SLIDER_TWITTER_TITLE_META, true );

            $yoastseo_slider_twitter_description = get_post_meta( $id, self::YOAST_SEO_SLIDER_TWITTER_DESCRIPTION_META, true );

            $yoastseo_slider_twitter_image = get_post_meta( $id, self::YOAST_SEO_SLIDER_TWITTER_IMAGE_META, true );   

            

            if ( $yoastseo_slider_title ) :



                $arrInfos['title'] = htmlspecialchars_decode($yoastseo_slider_title);



            endif;



            if ( $yoastseo_slider_description ) :



                $arrInfos['description'] = $yoastseo_slider_description;



            endif;



            if ( $yoastseo_slider_og_title ) :



                $arrInfos['og:title'] = htmlspecialchars_decode($yoastseo_slider_og_title);



            endif;



            if ( $yoastseo_slider_og_description ) :



                $arrInfos['og:description'] = $yoastseo_slider_og_description;



            endif;

            

            if ( $yoastseo_slider_og_image ) :



                $arrInfos['og:image'] = $yoastseo_slider_og_image;



            endif;



            if ( $yoastseo_slider_twitter_title ) :



                $arrInfos['twitter:image'] = htmlspecialchars_decode($yoastseo_slider_twitter_title);



            endif;



            if ( $yoastseo_slider_twitter_description ) :



                $arrInfos['twitter:description'] = $yoastseo_slider_twitter_description;



            endif;



            if ( $yoastseo_slider_twitter_image ) :



                $arrInfos['twitter:image'] = $yoastseo_slider_twitter_image;



            endif;



            return $arrInfos;



        }



        public static function get() {

            $args = array(

                'post_type' => SLIDERS_POST_TYPE,

                'order' => 'asc',

                'orderby' => 'id',

                'posts_per_page' => -1,

                'no_paging' => true


            );



            query_posts($args);



            $data = [];



            while ( have_posts() ) : the_post();



                global $post;



                $id = get_the_id();



                $heading = SliderGetMetaHeadingFieldUtils::get($id);



                $subheading = SliderGetMetaSubHeadingFieldUtils::get($id);



                $galleries = SliderGetMetaGalleriesFieldUtils::get($id);



                $thumbnail = convertToWebpUri(get_the_post_thumbnail_url($id, 'full'));



                $contents = apply_filters('the_content', get_the_content());



                $video = SliderGetMetaVideoFieldUtils::get($id);



                $item = [

                    'id' => 'story_' . $id,

                    'text' => get_the_title(),

                    'excerpt' => get_the_excerpt(),                    

                    'url' => filter_permalink(get_the_permalink()), 

                    'categories' => self::get_slider_terms($id),

                    'seo' => self::get_slider_yoastseo($post)

                ];



                if ( ! empty($heading) ) :



                    $item['heading'] = $heading;



                endif;



                if ( ! empty($subheading) ) :



                    $item['subheading'] = $subheading;



                endif;



                if ( ! empty($contents) ) :



                    $item['contents'] = $contents;



                endif;



                if ( ! empty($thumbnail) ) :



                    $item['thumbnail'] = $thumbnail;



                endif;



                if ( ! empty( $galleries ) ) :



                    $item['galleries'] = $galleries;



                endif;



                if ( ! empty( $video ) ) :



                    $item['video'] = [

                        'src' => $video

                    ];



                endif;



               $data[] = $item;



               $id++;



            endwhile;



            wp_reset_query();



            return $data;



        }



    }