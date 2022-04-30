<?php 
    namespace Home;

    class HomeGetSliderSectionUtils {

        public static function get($id) {

            $field = \get_field($id === 0 ? HOME_FIELDS::SLIDER_SECTION_ONE_FIELD : 
                                                HOME_FIELDS::SLIDER_SECTION_TWO_FIELD, HOME_PID);

            $data = [];

            foreach( $field as $key => $value ) :

                $data[] = [
                    'background' => $value['background'],
                    'title' => $value['tieu_de'],
                    'button_url' => filter_permalink($value['link_button']),
                    'button_text' => $value['name_button']
                ];

            endforeach;

            return $data;

        }

    }