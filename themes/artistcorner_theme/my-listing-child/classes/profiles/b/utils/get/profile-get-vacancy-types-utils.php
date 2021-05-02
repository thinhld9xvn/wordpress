<?php 

    namespace Profiles;

    class ProfileGetVacancyTypesUtils {

        public static function get_html($vacancy_types) {

            $html = '';
        
            $length = sizeof( $vacancy_types );
            foreach( $vacancy_types as $key => $item ) :

                $html .= '<span class="vacancy-name">
                            ' . $item->name . '</span>';

                if ( $key < $length - 1 ) :

                    $html .= '<span class="delimiter">,</span>';
                    
                endif;

            endforeach;

            return $html;


        }

    }