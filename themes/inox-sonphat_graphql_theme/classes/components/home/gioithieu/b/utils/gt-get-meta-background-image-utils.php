<?php 
    namespace Home\GioiThieu;
    use \Theme_Options\HOME_FIELDS;
    use \Theme_Options\Theme_Options;
    class GTGetMetaBackgroundImageUtils {
        public static function get() {
            $background = Theme_Options::get_field(HOME_FIELDS::HOME_SECTION_GT_BG_ID, HOME_FIELDS::HOME_SECTION_ID);
            $att_id = pn_get_attachment_id_from_url($background);
            return wp_get_attachment_image_url($att_id, 'large');
        }
    }
