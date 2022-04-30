<?php 

    namespace Archive\Galleries\Single;

    use \Archive\Galleries\GALLERIES_FIELDS;

    class GalleriesGetSingleListsUtils {

        public static function get($post) { 
         
            return get_post_meta($post->ID, GALLERIES_FIELDS::GALLERIES_SUBITEMS_FIELD, true);         


        }        

    }