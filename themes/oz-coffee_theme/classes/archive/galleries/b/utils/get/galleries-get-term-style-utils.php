<?php 

    namespace Archive\Galleries;

    class GalleriesGetTermStyleUtils {

        public static function get($slug) {

            return $slug ? get_term_by('slug', $slug, GALLERIES_FIELDS::GALLERIES_TAXONOMY) : null;

        }

    }