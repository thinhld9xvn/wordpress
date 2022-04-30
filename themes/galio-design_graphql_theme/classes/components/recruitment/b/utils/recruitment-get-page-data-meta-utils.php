<?php 

    namespace Recruitment;

    class RecruitmentGetPageDataMetaUtils {

        public static function get($lang) {

            $pid = $lang === DEFAULT_LANG ? RECRUITMENT_PAGE_ID : RECRUITMENT_PAGE_EN_ID;

            $heading = RecruitmentGetMetaHeadingUtils::get($pid);
            $introduction = RecruitmentGetMetaIntroductionUtils::get($pid);
            $button_text = RecruitmentGetMetaButtonTextUtils::get($pid);
            $button_url = RecruitmentGetMetaButtonUrlUtils::get($pid);
            $posts = RecruitmentGetAllItemsUtils::get($lang);

            return [
                RECRUITMENT_FIELDS::HEADING_GQL_FIELD => $heading,
                RECRUITMENT_FIELDS::INTRODUCTION_GQL_FIELD => $introduction,
                RECRUITMENT_FIELDS::BUTTON_TEXT_GQL_FIELD => $button_text,
                RECRUITMENT_FIELDS::BUTTON_URL_GQL_FIELD => $button_url,
                RECRUITMENT_FIELDS::POSTS_GQL_FIELD => $posts
            ];

        }

    }