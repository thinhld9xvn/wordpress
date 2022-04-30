<?php 

    namespace NhaMayPage;

    class NhaMayGetSectionField {

        public static function get($id) {

            $data = [];

            $section = \get_field($id === 0 ? 
                                    NHAMAY_FIELDS::SECTION_ONE_FIELD : 
                                    NHAMAY_FIELDS::SECTION_TWO_FIELD, NHAMAY_PID);            

            if ( ! empty( $section[NHAMAY_FIELDS::TITLE_FIELD] ) ) :

                $data['title'] = $section[NHAMAY_FIELDS::TITLE_FIELD];

            endif;

            if ( ! empty( $section[NHAMAY_FIELDS::DESCRIPTION_RIGHT_FIELD] ) || 
                    ! empty( $section[NHAMAY_FIELDS::_DESCRIPTION_RIGHT_FIELD ]) ) :

                $data['description_right'] = ! empty( $section[NHAMAY_FIELDS::DESCRIPTION_RIGHT_FIELD] ) ? 
                                                $section[NHAMAY_FIELDS::DESCRIPTION_RIGHT_FIELD] : 
                                                    $section[NHAMAY_FIELDS::_DESCRIPTION_RIGHT_FIELD];

            endif;

            if ( ! empty( $section[NHAMAY_FIELDS::DESCRIPTION_LEFT_FIELD] ) ) :

                $data['description_left'] = $section[NHAMAY_FIELDS::DESCRIPTION_LEFT_FIELD];

            endif;

            return $data;

        }

    }