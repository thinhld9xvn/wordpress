<?php 
    namespace DUANPAGE;
    use DuAnPage\DUAN_FIELDS;
    class DUGetMetaPriorityUtils {
        public static function get($pid) {
            return \get_field(DUAN_FIELDS::PRIORITY_FIELD, $pid);
        }
    }