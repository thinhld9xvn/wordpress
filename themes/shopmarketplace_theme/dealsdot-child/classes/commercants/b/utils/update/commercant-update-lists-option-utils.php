<?php 

    namespace Commercants;

    class CommercantUpdateListsOptionUtils {

        public static function update($option_value) {

            update_option(_COM_OPTION_NAME, $option_value);

        }

    }