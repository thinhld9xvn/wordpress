<?php 

    namespace WP_GraphQL;

    use \Payments\PaymentGetVisaImageUtils;
    use \Payments\PaymentGetMasterCardImageUtils;
    use \Payments\PaymentGetPaypalImageUtils;
    use \Payments\PaymentGetWesternUnionImageUtils;

    class GraphQLRegisterPaymentsFieldsUtils {

        public static function register() {

            $field_name = 'getPaymentsOption';

            $args = [];

            $resolve_callback = function($source, $args, $context, $info) {

                return json_encode([
                    [
                        'id' => 'visa',
                        'image' => PaymentGetVisaImageUtils::get()
                    ],                    
                    [
                        'id' => 'mastercard',
                        'image' => PaymentGetMasterCardImageUtils::get()
                    ],
                    [
                        'id' => 'paypal',
                        'image' => PaymentGetPaypalImageUtils::get()
                    ],
                    [
                        'id' => 'western_union',
                        'image' => PaymentGetWesternUnionImageUtils::get()
                    ]
                ]);

            };

            GraphQLRegisterFieldsUtils::register($field_name, $args, $resolve_callback);    

        }

    }