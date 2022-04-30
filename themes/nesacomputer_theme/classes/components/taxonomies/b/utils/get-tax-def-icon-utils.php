<?php
    namespace Taxonomies;
    use Theme_Options\TAX_FIELDS;
    class GetTaxDefIconUtils {
        public static function get() {
            $id = pn_get_attachment_id_from_url(\Theme_Options\Theme_Options::get_field( TAX_FIELDS::TAX_SECTION_ICON_DEF_ID,
                                                                TAX_FIELDS::TAX_SECTION_ID));
            return wp_get_attachment_image_url($id, 'thumbnail');   
        }
    }