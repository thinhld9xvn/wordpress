<?php
    namespace Categories;

    class CategoryGetMetaHeadingUtils {

        public static function get($id) {

            $term_meta = get_option("term_{$id}");

            return $term_meta[CATEGORY_FIELDS::HEADING_FIELD];

        }

    }