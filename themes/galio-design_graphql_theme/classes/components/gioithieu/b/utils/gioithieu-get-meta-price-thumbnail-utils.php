<?php 

    namespace GioiThieuPage;

    class GioiThieuGetMetaPriceThumbnailUtils {

        public static function get($pid) {

            $field = get_post_meta($pid, GIOITHIEU_FIELDS::PRICE_THUMBNAIL_FIELD, true);

            $thumbnail = $field['thumbnail'];
            $attachment_id = pn_get_attachment_id_from_url($thumbnail);
            return !empty($attachment_id) ? wp_get_attachment_image_url($attachment_id, 'full') : '';


        }

    } 
