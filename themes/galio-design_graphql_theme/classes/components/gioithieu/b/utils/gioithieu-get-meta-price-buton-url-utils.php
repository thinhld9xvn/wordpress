<?php 

    namespace GioiThieuPage;

    class GioiThieuGetMetaPriceButtonUrlUtils {

        public static function get($pid) {

            $page_id = get_post_meta($pid, GIOITHIEU_FIELDS::PRICE_PAGE_ID_FIELD, true);
            $post = get_post($page_id);

            return filter_permalink(get_the_permalink($post));

        }

    } 
