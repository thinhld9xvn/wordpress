<?php 

    namespace Home\Sections;

    class ReviewsSectionGetListsUtils {

        public static function get() { 

            $post_type = ReviewsSectionGetPostTypeUtils::get();

            $args = array(

                'post_type' => $post_type,
                'order' => 'desc',
                'orderby' => 'date',
                'posts_per_page' => -1
                
            );          
                
            $results = query_posts($args);

            wp_reset_query();

            return $results;

        }

    }