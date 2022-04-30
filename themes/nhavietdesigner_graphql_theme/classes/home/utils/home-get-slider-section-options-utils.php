<?php 
    namespace Home;

    class HomeGetSliderSectionOptionsUtils {

        public static function get($id) {

            $field = \get_field($id === 0 ? HOME_FIELDS::SLIDER_SECTION_ONE_OPTIONS_FIELD : 
                                                HOME_FIELDS::SLIDER_SECTION_TWO_OPTIONS_FIELD, HOME_PID);

            $data = [];

            foreach( $field as $key => $value ) :

                $data[] = [
                    'title' => $value['title'],
                    'thumbnail' => $value['thumb_image'],
                    'galleries' => $value['thu_vien']
                ];

            endforeach;

            return $data;

        }

    }