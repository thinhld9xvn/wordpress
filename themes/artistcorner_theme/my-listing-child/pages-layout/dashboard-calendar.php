<?php
/* Template Name: Dashboard Calendar */

get_header(); ?>

<div class="woocommerce-account">

    <div class="woocommerce">

        <div class="mlduo-account-menu">

<?php

            /* Menu navigation */

            do_action( 'woocommerce_before_account_navigation' );

                print_admin_menu_navigation();

            do_action( 'woocommerce_after_account_navigation' );

            /* #Menu navigation */ ?>

        </div>

        <?php Calendar::print_dashboard_calendar(); ?>

    </div>

</div>

<!-- Modal -->
<div class="modal modalCalendar modalSetupSchedules fade" id="modalSetupSchedules"  tabindex="-1" role="dialog" aria-labelledby="modalSetupSchedules" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create events</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="fa fa-close"></span>
                </button>
            </div>
            <div class="modal-body">                

                <div class="setup-schedules">

                </div>
            
            </div>

            <div class="modal-footer">
                <button id="btnSetupSchedulesSaveChanges" class="buttons button-2 __sm">Save changes</button>
            </div>

        </div>

    </div>

</div>

<div class="modal modalCalendar modalDayTimeline fade" 
    id="modalDayTimeline"  
    tabindex="-1" 
    role="dialog" 
    aria-labelledby="modalDayTimeline" 
    aria-hidden="true">

    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Timeline: <span class="lg-day"></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="fa fa-close"></span>
                </button>
            </div>
            <div class="modal-body">     

                <div class="calendar-toolbar">
                    <ul class="timeline-toolbar main-toolbar flex-layout flex-just-center">
                        <li>
                            <a id="btnTimelineCreateEvents" href="#" class="btnCalendarNavig">
                                <span class="fa fa-tasks"></span>
                                <span class="padLeft5">Create event(s)</span>
                            </a>                                                
                        </li>
                    </ul>
                </div>           

                <div id="timeline"><ul></ul></div>
            
            </div>

            <div class="modal-footer">
                <button class="btn btn-default" data-dismiss="modal">Close</button>
            </div>

        </div>

    </div>

</div>

<?php

    get_footer();