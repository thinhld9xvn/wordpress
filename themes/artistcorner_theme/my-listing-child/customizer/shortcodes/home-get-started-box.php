<?php 
    add_shortcode( 'artistcorner-get-started-box', '__sc_artist_corner_get_started_box' );

    function __sc_artist_corner_get_started_box( $atts ) { ?>

        <div class="fullwidth-section section-get-started gstarted-box-layout __grab">
            <div class="container">
                <div class="section-wrapper">
                    <div class="main-content">
                        <div class="flex flex-wrap flex-algn-center flex-just-space">
                            <div class="leftpanel col-get-started">
                                <h2>Don't know where to start</h2>
                                <small>Simple plans. Efficientcy consulting. Amazing product.</small>
                            </div>
                            <div class="rightpanel col-action">
                                <a href="#" class="button-primary btnExploreProvider btnGetStarted">Get Started</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
        

<?php }