<?php 
    namespace Home\Testimolates;
    class GetTestimolatesSectionUtils {
        public static function get($lang = DEFAULT_LANG) {
            return [
                TESTIMOLATES_FIELDS::TESTIMOLATES_GQL_HEADING => GetTestimolatesHeadingUtils::get($lang),
                TESTIMOLATES_FIELDS::TESTIMOLATES_GQL_CONTENTS => GetTestimolatesContentsUtils::get($lang),
                TESTIMOLATES_FIELDS::TESTIMOLATES_GQL_BACKGROUND => GetTestimolatesBackgroundUtils::get(),
                TESTIMOLATES_FIELDS::TESTIMOLATES_GQL_DATA => GetTestimolatesItemsUtils::get($lang)
            ];
        }
    }