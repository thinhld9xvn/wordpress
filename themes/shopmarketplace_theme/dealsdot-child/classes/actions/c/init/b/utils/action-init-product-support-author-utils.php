<?php

    namespace Actions\Init;

    class ActionInitProductSupportAuthorUtils {

        public static function init() {

            add_post_type_support( 'product', 'author' );

        }

    }


