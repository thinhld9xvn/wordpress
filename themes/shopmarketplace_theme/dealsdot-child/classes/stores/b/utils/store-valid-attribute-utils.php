<?php 

    namespace Stores;

    class StoreValidAttributeUtils {
      
        public static function yes($v) {            
            
            return $v === STORE_DATA::YES_VALUE;
            
        }

        public static function no($v) {            
            
            return $v === STORE_DATA::NO_VALUE;
            
        }

    }