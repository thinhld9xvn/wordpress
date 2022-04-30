<?php 

    namespace GioiThieuPage;

    class GioiThieuGetMetaUserItemsUtils {

        private static function getUserType($type_id) {

            return USER_LISTS_TYPES[$type_id];

        }

        public static function get($pid) {

            $accordion = get_post_meta($pid, GIOITHIEU_FIELDS::USER_ITEMS_FIELD, true);

            return array_map(function($item) {

                $thumbnail = $item[GIOITHIEU_FIELDS::ACCORDION_USER_ITEM_AVATAR]['thumbnail'];
                $attachment_id = pn_get_attachment_id_from_url($thumbnail);
                $thumbnail = !empty($attachment_id) ? wp_get_attachment_image_url($attachment_id, 'thumbnail') : '';

                $type = $item[GIOITHIEU_FIELDS::ACCORDION_USER_ITEM_TYPE];

                return [
                    GIOITHIEU_FIELDS::NAME_FIELD => $item[GIOITHIEU_FIELDS::ACCORDION_USER_ITEM_NAME],
                    GIOITHIEU_FIELDS::AVATAR_FIELD => $thumbnail,
                    GIOITHIEU_FIELDS::PROFESSOR_FIELD => $item[GIOITHIEU_FIELDS::ACCORDION_USER_ITEM_PROFESSOR],
                    GIOITHIEU_FIELDS::TYPE_FIELD => self::getUserType($type)
                ];
                

            }, $accordion);

        }

    } 
