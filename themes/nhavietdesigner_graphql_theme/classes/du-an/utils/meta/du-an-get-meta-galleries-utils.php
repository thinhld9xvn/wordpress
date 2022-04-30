<?php 
    namespace DUANPAGE;
    use DuAnPage\DUAN_FIELDS;
    class DUGetMetaGalleriesUtils {
        public static function get($pid) {
            return \get_field(DUAN_FIELDS::GALLERIES_FIELD, $pid);
        }
    }