<?php

    namespace Calendars;

    class CalendarUpdateEventsUtils {

        public static function update_by_uid($uid, $eventsList) {

            update_usermeta($uid, _USER_CALENDAR_EVENTS, serialize($eventsList));

        }

    }