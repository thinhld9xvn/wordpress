<?php 

    namespace Home\Sections;

    class SVSectionGetCatalogEntriesListUtils {

        public static function get() {

            $post_type = SVSectionGetPostTypeUtils::get();

            $args = array(
                'post_type' => $post_type,
                'showposts' => 8,
                'order' => 'asc',
                'orderby' => 'date'
            );

            $results = query_posts($args);

            wp_reset_query();

            return $results;

        }

    }