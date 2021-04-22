<?php 

    namespace Commercants;

    class CommercantUpdateCoordsOptionUtils {

        public static function update($option_value) {

            update_option(_COM_COORDS_OPTION_NAME, $option_value);

        }

    }