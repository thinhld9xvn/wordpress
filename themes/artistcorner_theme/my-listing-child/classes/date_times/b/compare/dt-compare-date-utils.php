<?php 

    namespace Date_Times;

    class DtCompareDateUtils {

        public static function compare($date1, $date2) {
            
            $strDate1 = strtotime($date1);
			$strDate2 = strtotime($date2);

			if ( $strDate1 === $strDate2 ) return 0;

			return $strDate1 < $strDate2 ? -1 : 1;    

        }

    }