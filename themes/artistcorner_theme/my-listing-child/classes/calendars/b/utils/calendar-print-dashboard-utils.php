<?php 

    namespace Calendars;

    class CalendarPrintDashboardUtils {

        public static function print() {

            global $post, $current_user;             
            
            $eventsList = Calendar::getCalendarEventsByUid($current_user->ID); ?>

            <script type="text/javascript">
                var currentUserEventsList = <?= false === $eventsList ? "[]" : json_encode($eventsList) ?>;
            </script>

            <section class="i-section">

                <div class="container section-body">    

                    <div class="col-md-12">

                        <div class="woocommerce-MyAccount-content">

                            <div class="row">

                                <div class="col-md-9 mlduo-welcome-message">
                                    <h1><?php echo $post->post_title ?></h1>
                                </div>                                

                            </div>

                            <div class="woocommerce-MyAccount-navigation tab-lists calendar-tabslist">

                                <?php self::print_calendar_tablists(); ?>

                            </div>

                            <div class="tab-lists-content calendar-tab-lists-content">                                
                                
                                <?php self::print_events_calendar_tab(); ?>
                                <?php self::print_notifications_calendar_tab(); ?>
                                
                            </div>


                        </div>

                    </div>

                </div>

            </section>

            <?php print_add_listing_ajax_loader('calendar-update-loader');

        }

    }