<?php 

    namespace Profiles;

    class ProfileGetMetaCategoryListUtils {

        public static function get_html($terms) {

            $html = '';

            if ( $terms ) :

                $html .= '<ul class="c27-listing-preview-category-list">';

                foreach ( $terms as $item ) : 
                    
                    $_term_bg_color = get_profile_term_color($item); 
                    $_term_text_color = get_profile_term_text_color($item);

                    $term_name = get_profile_term_name($item, array('transform' => 'uppercase'));

                    $html .= "<li>

                                <a href=\"'" . get_term_link($item) . "'\">

                                    <span class=\"cat-icon\"";

                                        if ( $_term_bg_color ) :

                                            $html .= "style=\"background-color: {$_term_bg_color};\"";

                                        endif;

                                        $html .= "><i class=\"mi bookmark_border\"";

                                            if ( $_term_text_color ) :

                                                $html .= "style=\"color: {$_term_text_color};\"";

                                            endif;
                                            
                                        $html .= "></i>

                                    </span>

                                    <span class=\"category-name\">{$term_name}</span>

                                </a>

                    </li>";

                endforeach;

                $html .= "</ul>";
                
            endif;

            return $html;


        }

    }