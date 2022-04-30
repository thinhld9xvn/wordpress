<?php
    namespace Filterbar;
    use Theme_Options\FILTERBAR_FIELDS;
    class ProductGetFilterPriceOptions {
        public static function get() {
            $options = \Theme_Options\Theme_Options::get_field( FILTERBAR_FIELDS::FILTERBAR_SECTION_PROD_PRICE_ID,
                                                                    FILTERBAR_FIELDS::FILTERBAR_SECTION_ID);
            $options = explode(PHP_EOL, $options);
            $arrOptions = [];
            foreach($options as $key => $option) :
                $st_price = explode(':', $option);
                $value = trim($st_price[0]);
                $text = trim($st_price[1]);
                $arrOptions[] = [
                    'value' => $value,
                    'text' => $text
                ];
            endforeach;
            return $arrOptions;
        }
    }