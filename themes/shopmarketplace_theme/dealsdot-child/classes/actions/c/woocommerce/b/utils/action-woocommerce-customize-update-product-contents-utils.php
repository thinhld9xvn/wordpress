<?php

    namespace Actions\Woocommerce;

    class ActionWooCommerceCustomizeUpdateProductContentsUtils {

        public static function init() {

            $messages = \MessageNotification\MessageGetUtils::get_all();

            //extract($messages);

            $options = array(
                \Products\PRODUCT_OPTIONS_FIELDS::FORM_HEADING => '<h2 class="admin-panel-heading">' . $messages[\Theme_Options\THEME_OPTIONS_FIELDS::UPDATE_PRODUCT_LABEL_ID] . '</h2>',
                \Products\PRODUCT_OPTIONS_FIELDS::FORM_ID => \Products\PRODUCT_DATA::FORM_UPDATE_ID,
                \Products\PRODUCT_OPTIONS_FIELDS::FORM_ACTION => \Products\PRODUCT_DATA::FORM_UPDATE_ACTION
            );

            (new \Products\UC_Product_Form($options))->print_form();


        }

    }


