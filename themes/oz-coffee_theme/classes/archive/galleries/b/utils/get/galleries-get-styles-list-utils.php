<?php 

    namespace Archive\Galleries;

    class GalleriesGetStylesListUtils {

        public static function get() {

            $args = array(
                'taxonomy' => GALLERIES_FIELDS::GALLERIES_TAXONOMY,
                'hide_empty' => false,
                'order' => 'ASC', 
                'orderby' => 'date',
                'parent' => GALLERIES_FIELDS::GALLERIES_STYLE_TERM_ID
            );
            
            return get_terms($args); 
        }

    }