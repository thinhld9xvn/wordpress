<?php 

    namespace Search;

    class SearchGetListsQueryUtils  {

        public static function get() { 
            
            $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
           
            $args = array(

                'post_type' =>\Archive\News\NewsGetPostTypeUtils::get(),
                's' => get_query_var('s'),
                'order' => 'desc',
                'orderby' => 'date',                
                'paged' => $paged
                
            );          
                
            $results = query_posts($args);
            
            return $results;

         }

    }