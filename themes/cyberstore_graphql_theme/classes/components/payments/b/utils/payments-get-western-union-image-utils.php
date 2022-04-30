<?php 

    namespace Payments;

    class PaymentGetWesternUnionImageUtils {

        public static function get() {

            return \Theme_Options\Theme_Options::get_field( \Theme_Options\THEME_OPTIONS_FIELDS::PAYMENT_WESTERN_UNION_IMAGE_ID,
                                                                \Theme_Options\THEME_OPTIONS_FIELDS::PAYMENT_SECTION_ID);

        }

    }