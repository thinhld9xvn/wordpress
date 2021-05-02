<?php 

    namespace Calendars;

    class CalendarPrintTabListsUtils {

        public static function print() { ?>

            <ul>

                <li>

                    <a class="active" data-target="#events" href="#">

                        <i class="mi event"></i>
                        <span>Events</span>

                    </a>

                </li>

                <li>

                    <a data-target="#notifications" href="#">

                        <i class="mi notifications_none"></i>
                        <span>
                            Notifications
                            <span class="required">(3)</span>
                        </span>

                    </a>

                </li>

            </ul>

        <?php }

    }