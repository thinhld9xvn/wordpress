<?php 

    namespace WP_GraphQL;

    use \GioiThieuPage\GioiThieuGetTitleField;
    use \GioiThieuPage\GioiThieuGetBannerField;
    use \GioiThieuPage\GioiThieuGetSection1Field;
    use \GioiThieuPage\GioiThieuGetSection2Field;
    use \GioiThieuPage\GioiThieuGetSection3Field;
    use \GioiThieuPage\GioiThieuGetSection4Field;
    use \GioiThieuPage\GioiThieuGetSection5Field;
    use \GioiThieuPage\GioiThieuGetSection6Field;
    use \GioiThieuPage\GioiThieuGetSection7Field;

    class GraphQLRegisterGioithieuFieldsUtils {

        public static function register() {

            $field_name = 'getGioiThieuPageOption';

            $args = [];

            $resolve_callback = function($source, $args, $context, $info) {              
               
                return json_encode([
                    'title' => GioiThieuGetTitleField::get(),
                    'banner' => GioiThieuGetBannerField::get(),
                    'section1' => GioiThieuGetSection1Field::get(),
                    'section2' => GioiThieuGetSection2Field::get(),
                    'section3' => GioiThieuGetSection3Field::get(),
                    'section4' => GioiThieuGetSection4Field::get(),
                    'section5' => GioiThieuGetSection5Field::get(),
                    'section6' => GioiThieuGetSection6Field::get(),
                    'section7' => GioiThieuGetSection7Field::get()
                ]);

            };

            GraphQLRegisterFieldsUtils::register($field_name, $args, $resolve_callback);    

        }

    }