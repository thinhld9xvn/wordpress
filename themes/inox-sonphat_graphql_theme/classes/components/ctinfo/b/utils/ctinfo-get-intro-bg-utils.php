<?php 
    namespace CTInfo;
    use \Theme_Options\Theme_Options;
    use \Theme_Options\CTINFO_FIELDS;
    class CTInfoGetIntroBgUtils {
        public static function get() {
            $thumbnail = Theme_Options::get_field(CTINFO_FIELDS::CTINFO_SECTION_INTRO_BG_ID,
                                                            CTINFO_FIELDS::CTINFO_SECTION_ID );
            $id = pn_get_attachment_id_from_url($thumbnail);
            return wp_get_attachment_image_url($id, 'medium');
        }
    }