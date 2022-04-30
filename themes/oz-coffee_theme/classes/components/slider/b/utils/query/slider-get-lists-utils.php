<?php 

    namespace Slider;

    class SliderGetListsUtils {

        public static function get() {

            $args = array(

                'post_type' => SLIDER_FIELDS::POST_TYPE,
                'order' => 'desc',
                'orderby' => 'date',
                'posts_per_page' => -1
                
                );
                
            $results = query_posts($args);

            wp_reset_query();
            
            return $results;

        }

    }