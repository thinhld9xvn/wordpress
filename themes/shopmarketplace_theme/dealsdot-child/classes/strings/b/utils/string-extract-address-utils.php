<?php
    
    namespace Strings;

    class StringExtractAddressUtils {

        public static function parse($str) {

            $strs = explode(",", $str);
            $myAddress = $strs[0];

            $myDetailsInfo = explode(" ", $myAddress);

            if ( count($myDetailsInfo) === 1 ) :

                return [

                    \Stores\STORE_DATA_FIELDS::STORE_NO_ADDRESS => '',
                    \Stores\STORE_DATA_FIELDS::STORE_STREET_ADDRESS => $myDetailsInfo[0]

                ];

            endif;

            $no = $myDetailsInfo[0];

            array_splice($myDetailsInfo, 0, 1);

            return [

                \Stores\STORE_DATA_FIELDS::STORE_NO_ADDRESS => $no,
                \Stores\STORE_DATA_FIELDS::STORE_STREET_ADDRESS => implode(" ", $myDetailsInfo)

            ];

        }

    }