<?php 

    namespace Date_Times;

    class DtGetDateUtils {

        public static function getDateNow() {

            return date('Y-m-d', time());

        }

        public static function getDateTomorrow() {

            return date('Y-m-d', time() + DATE_TIMES::TIME_ONE_DATE);

        }

        public static function getDateTwoAfter() {

            return date('Y-m-d', time() + 2 * DATE_TIMES::TIME_ONE_DATE);

        }

        public static function getLastDayMonthInCurYear() {

            $year = date('Y', time());
            $month = 12;
            $day = cal_days_in_month(CAL_GREGORIAN, $month, $year);

            return date('Y-m-d', strtotime("{$year}-{$month}-{$day}"));

        }

        public static function getDiffDate($date1, $date2) {

            $strDate1 = strtotime( $date1 );
            $strDate2 = strtotime( $date2 );            

            $diff = $strDate2 - $strDate1;

            return floor($diff / DATE_TIMES::TIME_ONE_DATE);

        }

    }