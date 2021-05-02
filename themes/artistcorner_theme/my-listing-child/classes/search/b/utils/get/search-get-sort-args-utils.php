<?php 

    namespace Search;

    class SearchGetSortArgsUtils {

        public static function get($sort) {

            $args = array();

            if ( $sort === 'top-rated' ) :
        
                $args['order'] = 'desc';
                $args['orderby'] = 'date';
        
            elseif ( $sort === 'latest' ) :
        
                $args['order'] = 'desc';
                $args['orderby'] = 'date';
        
            else :
        
                $args['order'] = 'asc';
                $args['orderby'] = 'id';
        
            endif;    

            return $args;

        }

    }