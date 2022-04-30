<?php 

    namespace Home\Sections;

    class GalleriesSectionGetListsUtils {

        public static function get() {

            $post_type = GalleriesSectionGetPostTypeUtils::get();

            $args = array(

                'post_type' => $post_type,
                'order' => 'desc',
                'orderby' => 'date',  
                'posts_per_page' => 3,
                'meta_key' => GALLERIES_FIELDS::GALLERIES_SHOW_PRIORITY_FIELD,
                'meta_value' => 'show-on-gallery-post-type'
                
            );          
                
            $results = query_posts($args);

            wp_reset_query();

            return $results;

        }

    }