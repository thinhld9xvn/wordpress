<?php 

    namespace Archive\News;

    class NewsGetArticlesListUtils  {

        public static function get() {  
            
            $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;

            $posts_per_page = NewsGetPostsPerPageUtils::get();
            $post_type = NewsGetPostTypeUtils::get();

            $args = array(

                'post_type' => $post_type,
                'order' => 'desc',
                'orderby' => 'date',
                'posts_per_page' => $posts_per_page,
                'paged' => $paged
                
            );          
                
            $results = query_posts($args);
            
            return $results;

        }

    }