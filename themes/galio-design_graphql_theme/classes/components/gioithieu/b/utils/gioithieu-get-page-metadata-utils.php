<?php 

    namespace GioiThieuPage;

    class GioiThieuGetPageMetaDataUtils {

        public static function get($lang = DEFAULT_LANG) {

            $page_id = $lang === DEFAULT_LANG ? GT_PAGE_ID : GT_PAGE_EN_ID;

            $durationWorkingDesc = GioiThieuGetMetaDurationWorkingDescUtils::get($page_id);
            $durationWorkingHeading = GioiThieuGetMetaDurationWorkingHeadingUtils::get($page_id);
            $durationWorkingListItems = GioiThieuGetMetaDurationWorkingListItemsUtils::get($page_id);
            $heading = GioiThieuGetMetaHeadingUtils::get($page_id);
            $introduction = GioiThieuGetMetaIntroductionUtils::get($page_id);
            $priceButtonUrl = GioiThieuGetMetaPriceButtonUrlUtils::get($page_id);
            $priceButtonText = GioiThieuGetMetaPriceButtonTextUtils::get($page_id);
            $priceContents = GioiThieuGetMetaPriceContentsUtils::get($page_id);
            $priceHeading = GioiThieuGetMetaPriceHeadingUtils::get($page_id);
            $priceThumbnail = GioiThieuGetMetaPriceThumbnailUtils::get($page_id);
            $slider = GioiThieuGetMetaSliderUtils::get($page_id);
            $strengthDesc = GioiThieuGetMetaStrengthDescUtils::get($page_id);
            $strengthHeading = GioiThieuGetMetaStrengthHeadingUtils::get($page_id);
            $strengthLists = GioiThieuGetMetaStrengthListsUtils::get($page_id);
            $userItems = GioiThieuGetMetaUserItemsUtils::get($page_id);

            return [
                GIOITHIEU_FIELDS::HEADING_GQL_FIELD => $heading,
                GIOITHIEU_FIELDS::INTRODUCTION_GQL_FIELD => $introduction,
                GIOITHIEU_FIELDS::SLIDER_GQL_FIELD => $slider,
                GIOITHIEU_FIELDS::STRENGTH_HEADING_GQL_FIELD => $strengthHeading,
                GIOITHIEU_FIELDS::STRENGTH_DESC_GQL_FIELD => $strengthDesc,
                GIOITHIEU_FIELDS::STRENGTH_LISTS_GQL_FIELD => $strengthLists,
                GIOITHIEU_FIELDS::PRICE_HEADING_GQL_FIELD => $priceHeading,
                GIOITHIEU_FIELDS::PRICE_CONTENTS_GQL_FIELD => $priceContents,
                GIOITHIEU_FIELDS::PRICE_BUTTON_TEXT_GQL_FIELD => $priceButtonText,
                GIOITHIEU_FIELDS::PRICE_BUTTON_URL_GQL_FIELD => $priceButtonUrl,
                GIOITHIEU_FIELDS::PRICE_THUMBNAIL_GQL_FIELD => $priceThumbnail,
                GIOITHIEU_FIELDS::USER_LISTS_GQL_FIELD => $userItems,
                GIOITHIEU_FIELDS::DURATION_WORKING_GQL_HEADING_FIELD => $durationWorkingHeading,
                GIOITHIEU_FIELDS::DURATION_WORKING_GQL_DESC_FIELD => $durationWorkingDesc,
                GIOITHIEU_FIELDS::DURATION_WORKING_GQL_LIST_ITEMS_FIELD => $durationWorkingListItems,
            ];

        }

    }