<?php 

    namespace Archive\UuDai\Single;

    use \Archive\UuDai\UDGetPostTypeUtils;

    class UDGetRelatedArticlesListUtils  {

        public static function get($pid) {

            $posts_per_page = 3;
            $post_type = UDGetPostTypeUtils::get();

            $args = array(

                'post_type' => $post_type,
                'order' => 'desc',
                'orderby' => 'date',
                'posts_per_page' => $posts_per_page,
                'no_paging' => true,
                'post__not_in' => array($pid)
                
            );          
                
            $results = query_posts($args);

            wp_reset_query();
            
            return $results;

        }

    }