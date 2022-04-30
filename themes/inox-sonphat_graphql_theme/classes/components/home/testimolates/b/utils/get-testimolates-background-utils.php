<?php 
    namespace Home\Testimolates;
    use Theme_Options\HOME_FIELDS;
    class GetTestimolatesBackgroundUtils {
    public static function get() {
        $background = \Theme_Options\Theme_Options::get_field( HOME_FIELDS::HOME_SECTION_TESTIMOLATES_BACKGROUND_ID,
                                                                   HOME_FIELDS::HOME_SECTION_ID);
        $att_id = pn_get_attachment_id_from_url($background);
        return wp_get_attachment_image_url($att_id, 'featured_bg_testimolates');
    }
}