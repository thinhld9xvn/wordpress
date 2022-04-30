<?php
    namespace Categories;

    class CategoryGetAllListsUtils {

        private static function get_term_data($term, $parent = 0) {

            $n = htmlspecialchars_decode( $term->name );

            $data = [

                "id" => $term->term_id,
                "text" => $n,
                "name" => $n,
                "title" => $n,
                "url" => filter_permalink(get_term_link($term))

            ];

            $data["childrens"] = self::parse_terms($term->term_id);  

            return $data;

        }

        private static function parse_terms($parent = 0) {

            $childrens = [];

            $args = array(

                'taxonomy' => 'category',
                'hide_empty' => false,
                'parent' => $parent

            );

            $results = get_terms($args);

            if ( $results ) :

                foreach( $results as $key => $term ) :

                    $childrens[] = self::get_term_data($term, $parent);

                endforeach;

            endif;

            return $childrens;
            

        }

        private static function remove_empty_array(&$element) {

            if ( empty($element['childrens']) ) :

                unset($element['childrens']);

            endif;           

        }

        private static function travsel_elements(&$element) {

            foreach( $element as $key => &$m ) {

                self::remove_empty_array($m);

                if ( array_key_exists("childrens", $m) ) {

                    self::travsel_elements($m['childrens']);

                }
                
            }

        }

        public static function get() {

            $arrTermsList = [];

            $args = array(

                'taxonomy' => 'category',
                'hide_empty' => false,
                'parent' => 0

            );

            $results = get_terms($args);

            if ( $results ) :

                foreach( $results as $key => $term ) :

                    $arrTermsList[] = self::get_term_data($term);

                endforeach;

            endif;

            self::travsel_elements($arrTermsList);

            return $arrTermsList;

        }

    }