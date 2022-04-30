<?php 

    namespace GioiThieuPage;

    class GioiThieuGetMetaStrengthListsUtils {

        public static function get($pid) {

            $accordion = get_post_meta($pid, GIOITHIEU_FIELDS::STRENGTH_LISTS_FIELD, true);

            return array_map(function($item) {

                $thumbnail = $item[GIOITHIEU_FIELDS::ACCORDION_LIST_ITEM_ICON]['thumbnail'];
                $attachment_id = pn_get_attachment_id_from_url($thumbnail);
                $thumbnail = !empty($attachment_id) ? wp_get_attachment_image_url($attachment_id, 'thumbnail') : '';

                return [
                    GIOITHIEU_FIELDS::TITLE_FIELD => $item[GIOITHIEU_FIELDS::ACCORDION_LIST_ITEM_TITLE],
                    GIOITHIEU_FIELDS::CONTENTS_FIELD => $item[GIOITHIEU_FIELDS::ACCORDION_LIST_ITEM_CONTENTS],
                    GIOITHIEU_FIELDS::ICON_FIELD => $thumbnail,
                    GIOITHIEU_FIELDS::NO_FIELD => $item[GIOITHIEU_FIELDS::ACCORDION_LIST_ITEM_NO]
                ];

            }, $accordion);

        }

    } 
