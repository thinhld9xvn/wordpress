<?php 

    namespace Portfolio;

    class PortfolioGetButtonTextUtils {

        public static function get() {

            return get_post_meta(get_the_id(), PORTFOLIO_FIELDS::PORTFOLIO_BUTTON_TEXT_FIELD, true);

        }

    }