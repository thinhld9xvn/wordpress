<?php 

    namespace Profiles;

    class ProfileGetMetaCategoryIconUtils {

        public static function get_html($term) {

            $term_icon = get_profile_term_icon($term);

            $term_bg_color = get_profile_term_color($term);
            $term_text_color = get_profile_term_text_color($term); 
    
            $html = sprintf("<i class='%s' style='%s%s'></i>",
                                $term_icon ? $term_icon : '',
                                $term_text_color ? "color: {$term_text_color};" : "",
                                $term_bg_color ? "background-color: {$term_bg_color};" : "");
    
            return $html;


        }

    }