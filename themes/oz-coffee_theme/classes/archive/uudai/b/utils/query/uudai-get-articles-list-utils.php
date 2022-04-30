<?php 

    namespace Archive\UuDai;

    class UDGetArticlesListUtils  {

        public static function get() {  
            
            $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;

            $posts_per_page = UDGetPostsPerPageUtils::get();

            $args = array(

                'post_type' => UD_FIELDS::POST_TYPE,
                'order' => 'desc',
                'orderby' => 'date',
                'posts_per_page' => $posts_per_page,
                'paged' => $paged
                
            );          
                
            $results = query_posts($args);
            
            return $results;

        }

    }