<?php 
    namespace CTInfo;
    use \Theme_Options\Theme_Options;
    use \Theme_Options\CTINFO_FIELDS;
    use CTInfo\CTINFO_FIELDS as CTINFO_CFIELDS;
    class CTInfoGetSocialUtils {
        public static function get() {
            return [
                [
                    CTINFO_CFIELDS::SOCIAL_ID_FIELD => 'facebook',
                    CTINFO_CFIELDS::SOCIAL_TEXT_FIELD => 'facebook',
                    CTINFO_CFIELDS::SOCIAL_URL_FIELD => Theme_Options::get_field(CTINFO_FIELDS::CTINFO_SECTION_SOCIAL_FB_ID,
                                                                                    CTINFO_FIELDS::CTINFO_SECTION_ID ),
                ],
                [
                    CTINFO_CFIELDS::SOCIAL_ID_FIELD => 'twitter',
                    CTINFO_CFIELDS::SOCIAL_TEXT_FIELD => 'twitter',
                    CTINFO_CFIELDS::SOCIAL_URL_FIELD => Theme_Options::get_field(CTINFO_FIELDS::CTINFO_SECTION_SOCIAL_TWITTER_ID,
                                                                                    CTINFO_FIELDS::CTINFO_SECTION_ID ),
                ],
                [
                    CTINFO_CFIELDS::SOCIAL_ID_FIELD => 'youtube',
                    CTINFO_CFIELDS::SOCIAL_TEXT_FIELD => 'youtube',
                    CTINFO_CFIELDS::SOCIAL_URL_FIELD => Theme_Options::get_field(CTINFO_FIELDS::CTINFO_SECTION_SOCIAL_YOUTUBE_ID,
                                                                                    CTINFO_FIELDS::CTINFO_SECTION_ID ),
                ],
                [
                    CTINFO_CFIELDS::SOCIAL_ID_FIELD => 'google-plus',
                    CTINFO_CFIELDS::SOCIAL_TEXT_FIELD => 'google-plus',
                    CTINFO_CFIELDS::SOCIAL_URL_FIELD => Theme_Options::get_field(CTINFO_FIELDS::CTINFO_SECTION_GPLUS_ID,
                                                                                    CTINFO_FIELDS::CTINFO_SECTION_ID ),
                ],
                [
                    CTINFO_CFIELDS::SOCIAL_ID_FIELD => 'linkedin',
                    CTINFO_CFIELDS::SOCIAL_TEXT_FIELD => 'linkedin',
                    CTINFO_CFIELDS::SOCIAL_URL_FIELD => Theme_Options::get_field(CTINFO_FIELDS::CTINFO_SECTION_LINKEDIN_ID,
                                                                                    CTINFO_FIELDS::CTINFO_SECTION_ID ),
                ],
            ];
        }
    }