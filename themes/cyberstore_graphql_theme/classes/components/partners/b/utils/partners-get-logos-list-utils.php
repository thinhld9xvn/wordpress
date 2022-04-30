<?php 

    namespace Partners;

    class PartnersGetLogosListUtils {

        public static function get() {

            $args = array(
                'post_type' => PARTNERS_POST_TYPE,
                'posts_per_page' => -1,
                'no_paging' => true                
            );

            $results = query_posts($args);

            $data = [];

            foreach( $results as $key => $logo ) :

                $data[] =  convertToWebpUri(get_the_post_thumbnail_url($logo, 'full'));

            endforeach;

            wp_reset_query();

            return $data;

        }

    }