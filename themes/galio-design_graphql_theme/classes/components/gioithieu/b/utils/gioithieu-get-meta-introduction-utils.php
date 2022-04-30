<?php 

    namespace GioiThieuPage;

    class GioiThieuGetMetaIntroductionUtils {

        public static function get($pid) {

            return get_post_meta($pid, GIOITHIEU_FIELDS::INTRODUCTION_FIELD, true);

        }

    } 
