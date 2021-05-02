<?php 

    namespace Calendars;

    class CalendarGetEventsUtils {

        public static function get_by_uid($uid) {

            $value = get_usermeta($uid, _USER_CALENDAR_EVENTS);

            //echo var_dump($value);
 
            return false === $value ? [] : unserialize($value);

        }

    }