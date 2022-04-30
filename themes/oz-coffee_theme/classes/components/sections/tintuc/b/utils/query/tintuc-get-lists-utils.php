<?php 

    namespace Home\Sections;

    class NewsSectionGetListsUtils {

        public static function get() {

            $post_type = NewsSectionGetPostTypeUtils::get();

            $args = array(

                'post_type' => $post_type,
                'order' => 'desc',
                'orderby' => 'date',                  
                'showposts' => 4
                
            );          
                
            $results = query_posts($args);

            wp_reset_query();

            return $results;

        }

    }