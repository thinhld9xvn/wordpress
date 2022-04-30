<?php 

    namespace WP_GraphQL;

    use \Delivery\DeliveryGetBox1Utils;
    use \Delivery\DeliveryGetBox2Utils;
    use \Delivery\DeliveryGetBox3Utils;

    class GraphQLRegisterDeliveryFieldsUtils {

        public static function register() {

            $field_name = 'getDeliveryOption';

            $args = [];

            $resolve_callback = function($source, $args, $context, $info) {

                return json_encode([
                    DeliveryGetBox1Utils::get(),
                    DeliveryGetBox2Utils::get(),
                    DeliveryGetBox3Utils::get(),
                ]);

            };

            GraphQLRegisterFieldsUtils::register($field_name, $args, $resolve_callback);    

        }

    }