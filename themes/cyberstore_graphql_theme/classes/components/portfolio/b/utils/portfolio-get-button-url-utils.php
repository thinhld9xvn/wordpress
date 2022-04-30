<?php 

    namespace Portfolio;

    class PortfolioGetButtonUrlUtils {

        public static function get() {         

            return get_post_meta(get_the_id(), PORTFOLIO_FIELDS::PORTFOLIO_BUTTON_URL_FIELD, true);

        }

    }