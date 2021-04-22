<?php

    namespace Actions\Woocommerce;

    class ActionWoocommerceGetPriceHtmlUtils {

        public static function init($price, $product) {

            $messages = \MessageNotification\MessageGetUtils::get_all();

            //extract($messages);

            $html = '<span class="woocommerce-from-label">' . $messages[\Theme_Options\THEME_OPTIONS_FIELDS::FROM_PRICE_LABEL_ID] . ': </span>';
            $html_price = woocommerce_price( $product->price );

            $isPriceFrom = get_post_meta($product->get_id(), 'bool_from_price', true);

            if ( $isPriceFrom === 'yes' ) :

                $html .= $html_price;

            else :

                $html = $html_price;

            endif;

            return $html;

        }

    }


