<?php

    namespace Actions\Woocommerce;

    class ActionWoocommerceCustomizeAccountPublishProductsContentsUtils {

        public static function init() {

            $messages = \MessageNotification\MessageGetUtils::get_all();

            //extract($messages);

            $add_your_product_label = $messages[\Theme_Options\THEME_OPTIONS_FIELDS::ADD_YOUR_PRODUCT_LABEL_ID];
            $fill_out_add_product_form_description_label = $messages[\Theme_Options\THEME_OPTIONS_FIELDS::FILL_OUT_ADD_PRODUCT_FORM_DESCRIPTION_LABEL_ID];

            $heading = "<h2 class=\"admin-panel-heading\">{$add_your_product_label}</h2>" .
                    "<p>{$fill_out_add_product_form_description_label}</p>";

            $options = array(
                \Products\PRODUCT_OPTIONS_FIELDS::FORM_HEADING => $heading,
                \Products\PRODUCT_OPTIONS_FIELDS::FORM_ID => \Products\PRODUCT_DATA::FORM_PUBLISH_ID,
                \Products\PRODUCT_OPTIONS_FIELDS::FORM_ACTION => \Products\PRODUCT_DATA::FORM_NEW_ACTION
            );

            (new \Products\UC_Product_Form($options))->print_form();


        }

    }


