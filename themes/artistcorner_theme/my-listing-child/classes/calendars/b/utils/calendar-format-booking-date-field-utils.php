<?php 

    namespace Calendars;

    class CalendarFormatBookingDateFieldUtils {

        public static function format($booking_calendar) {

            $dates = explode(',', $booking_calendar);
            $dates = array_map(function($date) {
    
                $pieces = array_map('trim', explode('.', $date));
                $pieces = array_reverse($pieces);
    
                return implode('-', $pieces);
    
            }, $dates);	
    
            usort($dates, function($d1, $d2) {
    
                return DateTimeUtils::compareToDate($d1, $d2);
    
            });
    
            return implode(",", $dates);

        }

    }