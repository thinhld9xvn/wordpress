<?php 

    namespace Calendars;

    class CalendarPrintEventsTablUtils {

        public static function print() { ?>

            <div id="events" class="active">
                <div id="toolbar" class="calendar-toolbar">
                    <ul class="main-toolbar">
                        <li>
                            <a href="#" class="btnCalendarNavig dropdown-toggle">
                                <span class="fa fa-calendar-check"></span>
                                <span class="padLeft5">Select range</span>
                            </a>
                            <div class="dropdown calendar-dropdown-menu dp-calendar-range">
                                <div class="input-box">
                                    <label for="dpBeginRange">
                                        Please choose range date
                                    </label>
                                    <div class="inputBoxRange flex-layout flex-algn-center">

                                        <div class="boxRangeDate">

                                            <input type="date" id="dpBeginRange" 
                                                    name="dpBeginRange"
                                                    value="<?= DateTimeUtils::getDateTomorrow() ?>"
                                                    min="<?= DateTimeUtils::getDateTomorrow() ?>" max="<?= DateTimeUtils::getLastDayMonthInCurYear(); ?>" />

                                        </div>

                                        <div class="boxRangeDate">

                                            <input type="date" id="dpEndRange" 
                                                    name="dpEndRange"
                                                    value="<?= DateTimeUtils::getDateTwoAfter() ?>"
                                                    min="<?= DateTimeUtils::getDateTwoAfter() ?>" max="<?= DateTimeUtils::getLastDayMonthInCurYear(); ?>" />

                                        </div>

                                        <div class="boxRangeDate action">
                                            <button id="btnDpChooseRange" class="buttons button-2 __sm">Choose</button>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </li>
                        <li>
                            <a id="btnDpUnselectAll" href="#" class="btnCalendarNavig">
                                <span class="fa fa-calendar-times"></span>
                                <span class="padLeft5">Unselect all</span>
                            </a>
                        </li>
                        <li>
                            <a id="btnSetupSchedules" href="#" class="btnCalendarNavig">
                                <span class="fa fa-tasks"></span>
                                <span class="padLeft5">Create event(s)</span>
                            </a>                                                
                        </li>
                        <li>
                            <a id="btnUpdateCalendarToServer" 
                                href="#" 
                                class="btnCalendarNavig">
                                <span class="fa fa-save"></span>
                                <span class="padLeft5">Update</span>
                            </a>                                                
                        </li>
                        <!--<li>
                            <a href="#" class="btnCalendarNavig btnCalendarActions dropdown-toggle">
                                <span class="fa fa-tasks"></span>
                                <span class="padLeft5">Actions</span>
                            </a>
                            <div class="dropdown calendar-dropdown-menu dp-calendar-actions-dropdown">
                                
                                <ul>
                                    <li>
                                        <a id="btnSetupSchedules" href="#">
                                            <span class="fa fa-check-double"></span> 
                                            <span class="padLeft5">Create event(s)</span>
                                        </a>
                                    </li>                                                      
                                </ul>

                            </div>
                        </li>-->
                    </ul>
                    
                </div> 

                <div id="dpCalendar"></div>                                

            </div>

        <?php }
        
    }