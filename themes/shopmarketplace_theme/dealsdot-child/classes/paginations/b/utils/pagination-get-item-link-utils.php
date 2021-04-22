<?php 

    namespace Paginations;

    class PaginationGetItemLinkUtils {

        public static function get($page) {

            $uri = '';

            if ( is_search() || is_product_category() ) :

                $query = $_GET;
                // replace parameter(s)

                $query['page'] = $page;
                // rebuild url
                
                $request_uri = $_SERVER['REQUEST_URI'] ;

                $pos = strpos($request_uri, '?');        

                if (FALSE !== $pos) :

                $request_uri = substr($request_uri, 0, $pos);

                endif;

                $uri = '//' . $_SERVER['SERVER_NAME'] . $request_uri . '?' . http_build_query($query);

            else :

                $uri = esc_url( get_pagenum_link( $page ) );

            endif;

            return $uri;
        }

    }