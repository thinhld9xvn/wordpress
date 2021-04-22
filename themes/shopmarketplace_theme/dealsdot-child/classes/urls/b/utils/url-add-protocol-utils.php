<?php 

    namespace Urls;

    class UrlAddProtocolUtils {

        /* 
            @scheme: string (http || https)
        */
        public static function add($url, $scheme = 'http') {
            
            return $url = empty(parse_url($url)['scheme']) ? $scheme . '://' . ltrim($url, '/') : $url;

        }

    }