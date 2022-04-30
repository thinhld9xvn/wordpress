<?php 

    namespace Portfolio;

    class PortfolioGetBackgroundUtils {

        public static function get() {

            return convertToWebpUri(get_the_post_thumbnail_url(get_the_id(), 'full'));

        }

    }