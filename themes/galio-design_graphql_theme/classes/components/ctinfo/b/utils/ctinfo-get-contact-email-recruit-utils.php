<?php 

    namespace CTInfo;
    use \Theme_Options\CTINFO_FIELDS;
    use \Theme_Options\Theme_Options;

    class CTInfoGetContactEmailRecruitUtils {

        public static function get() {

            return Theme_Options::get_field(CTINFO_FIELDS::CTINFO_SECTION_EMAIL_RECRUIT_ID,
                                                            CTINFO_FIELDS::CTINFO_SECTION_ID );

        }

    }