<?php 

    namespace Products;

    class ProductPrintSortbyFilterUtils {

        public static function print() {

            $messages = \MessageNotification\MessageGetUtils::get_all();

            //extract($messages);		

            $sort_by = $_GET['sort_by'];

            $order_product_default_label = $messages[\Theme_Options\THEME_OPTIONS_FIELDS::ORDER_PRODUCT_DEFAULT_LABEL_ID];
            $order_product_price_up_label = $messages[\Theme_Options\THEME_OPTIONS_FIELDS::ORDER_PRODUCT_PRICE_UP_LABEL_ID];
            $order_product_price_down_label = $messages[\Theme_Options\THEME_OPTIONS_FIELDS::ORDER_PRODUCT_PRICE_DOWN_LABEL_ID];
            $order_product_name_az_label = $messages[\Theme_Options\THEME_OPTIONS_FIELDS::ORDER_PRODUCT_NAME_AZ_LABEL_ID];
            $order_product_name_za_label = $messages[\Theme_Options\THEME_OPTIONS_FIELDS::ORDER_PRODUCT_NAME_ZA_LABEL_ID];

            echo "<div class=\"sortby_box\">
                    <select id=\"slSortBy\" name=\"sort-by\">
                        <option value=\"default\" " . ($sort_by === 'default' ? "selected='selected'" : '') . ">{$order_product_default_label}</option>
                        <option value=\"price-up\" " . ($sort_by === 'price-up' ? "selected='selected'" : '') . ">{$order_product_price_up_label}</option>
                        <option value=\"price-down\" " . ($sort_by === 'price-down' ? "selected='selected'" : '') . ">{$order_product_price_down_label}</option>
                        <option value=\"name-alphabet-az\" " . ($sort_by === 'name-alphabet-az' ? "selected='selected'" : '') . ">{$order_product_name_az_label}</option>
                        <option value=\"name-alphabet-za\" " . ($sort_by === 'name-alphabet-za' ? "selected='selected'" : '') . ">{$order_product_name_za_label}</option>
                    </select>
                </div>";

        }

    }